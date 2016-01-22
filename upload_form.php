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
 * Progress Bar block overview page
 *
 * @package    contrib
 * @subpackage block_progress
 * @copyright  2010 Michael de Raadt
 * @copyright  2015 Nicolas Perez
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
global $CFG, $DB, $OUTPUT, $PAGE, $USER;

// Include required files.
require_once(dirname(__FILE__) . '/../../config.php');
require_once($CFG->dirroot.'/blocks/progress/lib.php');
require_once($CFG->libdir.'/tablelib.php');
require_once("$CFG->libdir/formslib.php");

// File upload form
class progress_csvform extends moodleform {
	//Add elements to form
	public function definition() {
		global $CFG;

		$mform = $this->_form;
		$instance = $this->_customdata;

		// Adding filepicker
		$mform->addElement('filepicker', 'csvdates', get_string('onlycsv', 'block_progress'), null, $instance['options']);
		// Adding hidden id for page required param
		$mform->addElement('hidden', 'progressbarid', $instance['progressbarid']);
		$mform->setType('progressbarid', PARAM_RAW);
		// Adding hidden id for page required param
		$mform->addElement('hidden', 'courseid', $instance['courseid']);
		$mform->setType('courseid', PARAM_RAW);
		// Adding submit buttons
		$this -> add_action_buttons(true);
	}
	function validation($data, $files) {
		return array();
	}

}