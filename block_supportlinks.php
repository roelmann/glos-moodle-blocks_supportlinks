<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Main block file.
 *
 * @package    block_supportlinks
 * @copyright  2019 Richard Oelmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();
class block_supportlinks extends block_base {

    public function init() {
        $this->title = get_string('blocktitle', 'block_supportlinks');
    }

    public function has_config() {
        return false;
    }

    public function applicable_formats() {
        return array('all' => true);
    }

    public function instance_allow_multiple() {
        return true;
    }

    public function hide_header() {
        return true;
    }

    public function get_content() {

        global $COURSE, $DB, $PAGE;

        if (isset($this->config->dashboardonly)) {
            $dashboardonly = $this->config->dashboardonly;
        } else {
            $dashboardonly = '';
        }
        if ($dashboardonly) {
            if ($PAGE->pagetype != 'my-index' && $PAGE->pagetype != 'site-index') {
                return false;
            }
        }

        if (isset($this->config->smallsize)) {
            $smallsize = $this->config->smallsize;
            $smallclass = 'smallclassnoimg';
        } else {
            $smallsize = false;
            $smallclass = 'withimg';
        }
        $colour = ' style="';
        if (isset($this->config->colour) && $this->config->colour != '') {
            $colour .= 'background-color:'.$this->config->colour.'; ';
        } else {
            $colour .= 'background-color:rgba(0,0,0,0); ';
        }
        if (isset($this->config->textcolour) && $this->config->textcolour != '') {
            $colour .= 'color:'.$this->config->textcolour.'; ';
        } else {
            $colour .= 'color:rgba(255,255,255,1); ';
        }
        $colour .= '" ';

        if (isset($this->config->mainicon)) {
            $mainicon = $this->config->mainicon;
        } else {
            $mainicon = '';
        }

        if (empty($this->config->directlink)) {
            // Get url links for pop up.
            if (isset($this->config->l1url)) {
                $url[1] = $this->config->l1url;
            } else {
                $url[1] = '';
            }
            if (isset($this->config->l1icon)) {
                $icon[1] = $this->config->l1icon;
            } else {
                $icon[1] = '';
            }
            if (isset($this->config->l1text)) {
                $text[1] = $this->config->l1text;
            } else {
                $text[1] = '';
            }
            if (isset($this->config->l2url)) {
                $url[2] = $this->config->l2url;
            } else {
                $url[2] = '';
            }
            if (isset($this->config->l2icon)) {
                $icon[2] = $this->config->l2icon;
            } else {
                $icon[2] = '';
            }
            if (isset($this->config->l2text)) {
                $text[2] = $this->config->l2text;
            } else {
                $text[2] = '';
            }
            if (isset($this->config->l3url)) {
                $url[3] = $this->config->l3url;
            } else {
                $url[3] = '';
            }
            if (isset($this->config->l3icon)) {
                $icon[3] = $this->config->l3icon;
            } else {
                $icon[3] = '';
            }
            if (isset($this->config->l3text)) {
                $text[3] = $this->config->l3text;
            } else {
                $text[3] = '';
            }
            if (isset($this->config->l4url)) {
                $url[4] = $this->config->l4url;
            } else {
                $url[4] = '';
            }
            if (isset($this->config->l4icon)) {
                $icon[4] = $this->config->l4icon;
            } else {
                $icon[4] = '';
            }
            if (isset($this->config->l4text)) {
                $text[4] = $this->config->l4text;
            } else {
                $text[4] = '';
            }
            if (isset($this->config->l5url)) {
                $url[5] = $this->config->l5url;
            } else {
                $url[5] = '';
            }
            if (isset($this->config->l5icon)) {
                $icon[5] = $this->config->l5icon;
            } else {
                $icon[5] = '';
            }
            if (isset($this->config->l5text)) {
                $text[5] = $this->config->l5text;
            } else {
                $text[5] = '';
            }
            if (isset($this->config->l6url)) {
                $url[6] = $this->config->l6url;
            } else {
                $url[6] = '';
            }
            if (isset($this->config->l6icon)) {
                $icon[6] = $this->config->l6icon;
            } else {
                $icon[6] = '';
            }
            if (isset($this->config->l6text)) {
                $text[6] = $this->config->l6text;
            } else {
                $text[6] = '';
            }
            if (isset($this->config->l7url)) {
                $url[7] = $this->config->l7url;
            } else {
                $url[7] = '';
            }
            if (isset($this->config->l7icon)) {
                $icon[7] = $this->config->l7icon;
            } else {
                $icon[7] = '';
            }
            if (isset($this->config->l7text)) {
                $text[7] = $this->config->l7text;
            } else {
                $text[7] = '';
            }
            if (isset($this->config->l8url)) {
                $url[8] = $this->config->l8url;
            } else {
                $url[8] = '';
            }
            if (isset($this->config->l8icon)) {
                $icon[8] = $this->config->l8icon;
            } else {
                $icon[8] = '';
            }
            if (isset($this->config->l8text)) {
                $text[8] = $this->config->l8text;
            } else {
                $text[8] = '';
            }

            $this->content = new stdClass;

            $blocktitle = str_replace(" ", "", $this->title);

            // Create actual block with image and text.
            $this->content->text = '<a class="supportlink ' . $smallclass .
                '" data-toggle="modal" data-target = "#'.$blocktitle.'" href="" '. $colour . '>';
            if (!$smallsize) {
                if (isset($this->config->img)) {
                    $this->content->text .= '<img src="'.$this->config->img.'">';
                }
            }
            if (isset($this->config->text)) {
                $this->content->text .= '<h5 class = "supportblocktext '.$blocktitle.'text" ' . $colour . '>';
                if (isset($this->config->mainicon)) {
                    $this->content->text .= '<span style="font-size:125%;" class="fa fa-'.$mainicon.'"></span>&nbsp;';
                }
                $this->content->text .= $this->config->text;
                $this->content->text .= '</h5>';
            }
            $this->content->text .= '</a>';

            // Create modal pop up with links.
            $this->content->text .= '<div class="modal fade" id="'.$blocktitle.
                '" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">';
                $this->content->text .= '<div class="modal-dialog" role="document">';
                    $this->content->text .= '<div class="modal-content">';
                        $this->content->text .= '<div class="modal-header">';
                            $this->content->text .= '<h5 class="modal-title" id="exampleModalLabel">'.$this->title.'</h5>';
                            $this->content->text .= '<button type="button" class="close"
                                data-dismiss="modal" aria-label="Close">';
                                $this->content->text .= '<span aria-hidden="true">&times;</span>';
                            $this->content->text .= '</button>';
                        $this->content->text .= '</div>';
                        $this->content->text .= '<div class="modal-body">';
                        // Create link blocks on popup.
            for ($x = 1; $x <= 8; $x++) {
                if ($url[$x] !== '') {
                    $this->content->text .= '<a href="'.$url[$x].'" alt="'.$text[$x].'" class="blocklink">';
                        $this->content->text .= '<p class="text-center">'.$text[$x].'</p>';
                        $this->content->text .= '<span class="fa fa-3x fa-'.$icon[$x].'"></span>';
                    $this->content->text .= '</a>';
                }
            }

                        $this->content->text .= '</div>';
                    $this->content->text .= '</div>';
                $this->content->text .= '</div>';
            $this->content->text .= '</div>';
            // End of modal.
        } else {
            // Create actual block with image and text - for single link.
            $this->content->text = '<a class="supportlink" href = "' . $this->config->directlink . '">';
            if (isset($this->config->img)) {
                $this->content->text .= '<img src="'.$this->config->img.'">';
            }
            if (isset($this->config->text)) {
                $this->content->text .= '<h5 class = "supportblocktext">';
                if (isset($this->config->mainicon)) {
                    $this->content->text .= '<span style="font-size:125%;" class="fa fa-' .
                        $mainicon . '"></span>&nbsp;';
                }

                $this->content->text .= $this->config->text;
                $this->content->text .= '</h5>';
            }
            $this->content->text .= '</a>';
        }

        return $this->content;
    }

    public function specialization() {
        if (isset($this->config)) {
            if (empty($this->config->title)) {
                $this->title = get_string('defaulttitle', 'block_supportlinks');
            } else {
                $this->title = $this->config->title;
            }

            if (empty($this->config->text)) {
                $this->config->text = get_string('defaulttext', 'block_supportlinks');
            }
        }
    }

    public function instance_config_save($data, $nolongerused = false) {
        if (get_config('supportlinks', 'Allow_HTML') == '1') {
            $data->text = strip_tags($data->text);
        }

        // And now forward to the default implementation defined in the parent class.
        return parent::instance_config_save($data, $nolongerused);
    }

    public function html_attributes() {
        $attributes = parent::html_attributes(); // Get default values.
        $attributes['class'] .= ' block_'. $this->name(); // Append our class to class attribute.
        $attributes['class'] .= ' block_'. $this->title; // Append our class to class attribute.
        return $attributes;
    }
}
