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
 * Instance settings file.
 *
 * @package    block_supportlinks
 * @copyright  2019 Richard Oelmann
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_supportlinks_edit_form extends block_edit_form {

    protected function specific_definition($mform) {

        // Section header title according to language file.
        $mform->addElement('header', 'config_header', get_string('blocksettings', 'block'));

        // Block instance heading.
        $mform->addElement('text', 'config_title', get_string('blocktitle', 'block_supportlinks'));
        $mform->setDefault('config_title', 'default value');
        $mform->setType('config_title', PARAM_TEXT);

        // Block instance text content.
        $mform->addElement('text', 'config_text', get_string('blocktext', 'block_supportlinks'));
        $mform->setDefault('config_text', 'default value');
        $mform->setType('config_text', PARAM_RAW);

        // Block instance main image url.
        $mform->addElement('text', 'config_img', get_string('blockimage', 'block_supportlinks'));
        $mform->setDefault('config_img', '');
        $mform->setType('config_img', PARAM_URL);

        // Block instance main image FA icon.
        $mform->addElement('text', 'config_mainicon', get_string('blockmainicon', 'block_supportlinks'));
        $mform->setDefault('config_mainicon', 'FA icon name');
        $mform->setType('config_mainicon', PARAM_RAW);

        // Block instance direct link url.
        $mform->addElement('text', 'config_directlink', get_string('directlink', 'block_supportlinks'));
        $mform->setDefault('config_directlink', '');
        $mform->setType('config_directlink', PARAM_URL);

        // Block instance direct link url.
        $mform->addElement('advcheckbox', 'config_dashboardonly', get_string('dashboard', 'block_supportlinks'), '');
        $mform->setDefault('config_dashboardonly', '');
        $mform->setType('config_dashboardonly', PARAM_RAW);

        // Block instance small size - no image.
        $mform->addElement('advcheckbox', 'config_smallsize', get_string('smallsize', 'block_supportlinks'), '');
        $mform->setDefault('config_dashboardonly', '');
        $mform->setType('config_dashboardonly', PARAM_RAW);

        // Block colour.
        $mform->addElement('text', 'config_colour', get_string('blockcolour', 'block_supportlinks'));
        $mform->setDefault('config_colour', '');
        $mform->setType('config_colour', PARAM_RAW);

        // Text colour.
        $mform->addElement('text', 'config_textcolour', get_string('textcolour', 'block_supportlinks'));
        $mform->setDefault('config_textcolour', '');
        $mform->setType('config_textcolour', PARAM_RAW);

        for ($x = 1; $x <= 8; $x++) {
            // Block link icon.
            $mform->addElement('text', 'config_l'.$x.'icon', get_string('blocklinkicon', 'block_supportlinks'));
            $mform->setDefault('config_l'.$x.'icon', 'FA icon name');
            $mform->setType('config_l'.$x.'icon', PARAM_RAW);

            // Block link text.
            $mform->addElement('text', 'config_l'.$x.'text', get_string('blocklinktext', 'block_supportlinks'));
            $mform->setDefault('config_l'.$x.'text', 'Link name');
            $mform->setType('config_l'.$x.'text', PARAM_RAW);

            // Block link url.
            $mform->addElement('text', 'config_l'.$x.'url', get_string('blocklinkurl', 'block_supportlinks'));
            $mform->setDefault('config_l'.$x.'url', '');
            $mform->setType('config_l'.$x.'url', PARAM_URL);
        }

    }
}
