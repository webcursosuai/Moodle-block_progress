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
require_once($CFG->dirroot.'/blocks/progress/upload_form.php');

// Gather form data.
$progressbarid = required_param('progressbarid', PARAM_INT);
$courseid = required_param('courseid', PARAM_INT);
$action = optional_param('action','form', PARAM_TEXT);

// Determine course and context.
$course = $DB->get_record('course', array('id' => $courseid), '*', MUST_EXIST);
$context = block_progress_get_course_context($courseid);

// Get specific block config and context.
$progressblock = $DB->get_record('block_instances', array('id' => $progressbarid), '*', MUST_EXIST);
$progressconfig = unserialize(base64_decode($progressblock->configdata));
$progressblockcontext = block_progress_get_block_context($progressbarid);


// Set up page parameters.
$PAGE->set_course($course);
$PAGE->set_url(
    '/blocks/progress/test_form.php',
array(
	'courseid' => $courseid
)
);
$PAGE->set_context($context);
$title = get_string('testform', 'block_progress');
$PAGE->set_title($title);
$PAGE->set_heading($title);
$PAGE->navbar->add($title);
$PAGE->set_pagelayout('standard');

// Check user is logged in and capable of grading.
require_login($course, false);
require_capability('block/progress:overview', $progressblockcontext);

//redirect url for form cancelation
$url = new moodle_url('/course/view.php', array('id'=>$courseid));

// Start page output.
echo $OUTPUT->header();

// Options for uploading the csv file within the form
$options = array('maxbytes'=>get_max_upload_file_size($CFG->maxbytes, $course->maxbytes, $course->maxbytes), 'accepted_types'=>'.csv');

//Form creation
$mform = new progress_csvform(null, 
		array( 'options'=>$options, 'courseid'=>$courseid, 'progressbarid'=>$progressbarid));

if ($mform->is_cancelled()) {
	redirect($url);
} else if ($mform->get_data()) {
	
	//Getting data from csv file
	$data = $mform->get_file_content('csvdates');
	
	//Separating data in array by row in csv
	$datas = explode("\n", $data);
	
	//Number of data rows
	$max=count($datas)-2;
	
	//data base input object
	$dataobject = new stdClass();
	
	//data counter
	$counter=0;
	
	//If records for this course exists delete
	$sql_delete_records = " 
	SELECT *
	FROM {block_progress}
	Where courseid = :courseid";
	if($DB->record_exists_sql($sql_delete_records, array('courseid'=>$courseid) )){
		$DB->delete_records('block_progress', array('courseid'=>$courseid));
	}
	
	//Data input on data base
	for($i=1; $i<=$max; $i++){
		//Separation
		$dbinput= explode(";", $datas[$i]);
		$idnumber = explode("-", $dbinput[0]);
		// Looking for user id from id number
		$sql = "
		SELECT id
		FROM {user}
		WHERE idnumber = :idnumber";
		$userid = $DB->get_record_sql($sql, array('idnumber'=>(int)$idnumber[0]));
		//var_dump($userid);die();
		// date transformation to unix timestamp
		$date = explode("-", $dbinput[1]);
		$date = $date[2]."-".$date[1]."-".$date[0];
		$fecha = new DateTime($date);
		if ($userid = false) {
			// Filling in object
			$dataobject->userid = $userid->id;
			$dataobject->test_time = $fecha->getTimestamp ();
			$dataobject->room = $dbinput [2];
			$dataobject->test_name = $dbinput [3];
			$dataobject->modulo = $dbinput [4];
			$dataobject->courseid = $courseid;
			$counter ++;
			// data base completition
			$DB->insert_record ( 'block_progress', $dataobject );
		}else{
			$url_error = new moodle_url('/blocks/progress/upload.php', array('courseid'=>$courseid, 'progressbarid'=>$progressbarid, 'action'=>$action));
			echo $OUTPUT->heading(get_string('uploaderror', 'block_progress'));
			$label = 'Back';
			echo $OUTPUT->single_button($url_error, $label, 'post');
			echo $OUTPUT->footer();
			die();
		}
	}
	
	echo $OUTPUT->heading(get_string('uploadsucces', 'block_progress'));
	$label = 'Back';
	echo $OUTPUT->single_button($url, $label, 'post');
	echo $OUTPUT->footer();
}

echo $OUTPUT->heading(get_string('testform', 'block_progress'));

// Form display
$mform -> display();
echo $OUTPUT->footer();
