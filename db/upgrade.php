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
 * This file keeps track of upgrades to the settings block
 *
 * Sometimes, changes between versions involve alterations to database structures
 * and other major things that may break installations.
 *
 * The upgrade function in this file will attempt to perform all the necessary
 * actions to upgrade your older installation to the current version.
 *
 * If there's something it cannot do itself, it will tell you what you need to do.
 *
 * The commands in here will all be database-neutral, using the methods of
 * database_manager class
 *
 * Please do not forget to use upgrade_set_timeout()
 * before any action that may take longer time to finish.
 *
 * @package    contrib
 * @subpackage block_progress
 * @copyright  2010 Michael de Raadt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

/**
 * @global moodle_database $DB
 * @param int $oldversion
 * @param object $block
 */
function xmldb_block_progress_upgrade($oldversion, $block) {
    global $DB;
    
    $dbman = $DB->get_manager();

    // Fix bad filtering on posted_to values.
    if ($oldversion >= 2013073000 && $oldversion < 2013080500) {
        $configs = $DB->get_records('block_instances', array('blockname' => 'progress'));
        foreach ($configs as $blockid => $blockrecord) {
            $config = (array)unserialize(base64_decode($blockrecord->configdata));
            foreach ($config as $key => $value) {
                if ($value == 'postedto') {
                    $config[$key] = 'posted_to';
                }
            }
            $configdata = base64_encode(serialize((object)$config));
            $DB->set_field('block_instances', 'configdata', $configdata, array('id' => $blockid));
        }
    }

    // Update colours to match new icons, if default colours are used.
    if ($oldversion < 2015111200) {
        $colourvalues = array(
            'attempted_colour' => array(
                'oldcolour' => '#5CD85C',
                'newcolour' => '#73A839',
            ),
            'notattempted_colour' => array(
                'oldcolour' => '#FF5C5C',
                'newcolour' => '#C71C22',
            ),
            'futurenotattempted_colour' => array(
                'oldcolour' => '#5C5CFF',
                'newcolour' => '#025187',
            ),
        );

        foreach ($colourvalues as $setting => $details) {
            if (get_config('block_progress', $setting) == $details['oldcolour']) {
                set_config($setting, $details['newcolour'], 'block_progress');
            }
        }
    }
    if ($oldversion < 2015122801) {
    
    	// Define table block_progress to be created.
    	$table = new xmldb_table('block_progress');
    
    	// Adding fields to table block_progress.
    	$table->add_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null);
    	$table->add_field('userid', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('day', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('month', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('year', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('hour', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('minute', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null);
    	$table->add_field('room', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null);
    
    	// Adding keys to table block_progress.
    	$table->add_key('primary', XMLDB_KEY_PRIMARY, array('id'));
    
    	// Conditionally launch create table for block_progress.
    	if (!$dbman->table_exists($table)) {
    		$dbman->create_table($table);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122801, 'progress');
    }
    if ($oldversion < 2015122802) {
    
    	// Define field test_name to be added to block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('test_name', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null, 'room');
    
    	// Conditionally launch add field test_name.
    	if (!$dbman->field_exists($table, $field)) {
    		$dbman->add_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122802, 'progress');
    }
    if ($oldversion < 2015122803) {
    
    	// Define field id to be dropped from block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('day');
    
    	// Conditionally launch drop field id.
    	if ($dbman->field_exists($table, $field)) {
    		$dbman->drop_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122803, 'progress');
    }
    if ($oldversion < 2015122804) {
    
    	// Define field id to be dropped from block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('month');
    
    	// Conditionally launch drop field id.
    	if ($dbman->field_exists($table, $field)) {
    		$dbman->drop_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122804, 'progress');
    }
    if ($oldversion < 2015122805) {
    
    	// Define field id to be dropped from block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('year');
    
    	// Conditionally launch drop field id.
    	if ($dbman->field_exists($table, $field)) {
    		$dbman->drop_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122805, 'progress');
    }
    if ($oldversion < 2015122806) {
    
    	// Define field id to be dropped from block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('hour');
    
    	// Conditionally launch drop field id.
    	if ($dbman->field_exists($table, $field)) {
    		$dbman->drop_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122806, 'progress');
    }
    if ($oldversion < 2015122807) {
    
    	// Define field id to be dropped from block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('minute');
    
    	// Conditionally launch drop field id.
    	if ($dbman->field_exists($table, $field)) {
    		$dbman->drop_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122807, 'progress');
    }
    if ($oldversion < 2015122808) {
    
    	// Define field test_time to be added to block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('test_time', XMLDB_TYPE_INTEGER, '20', null, null, null, null, 'userid');
    
    	// Conditionally launch add field test_time.
    	if (!$dbman->field_exists($table, $field)) {
    		$dbman->add_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122808, 'progress');
    }
    if ($oldversion < 2015122809) {
    
    	// Define field id to be added to block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('id', XMLDB_TYPE_INTEGER, '10', null, XMLDB_NOTNULL, XMLDB_SEQUENCE, null, null);
    
    	// Conditionally launch add field id.
    	if (!$dbman->field_exists($table, $field)) {
    		$dbman->add_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122809, 'progress');
    }
if ($oldversion < 2015122811) {

        // Changing nullability of field test_time on table block_progress to not null.
        $table = new xmldb_table('block_progress');
        $field = new xmldb_field('test_time', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null, 'userid');

        // Launch change of nullability for field test_time.
        $dbman->change_field_notnull($table, $field);

        // Progress savepoint reached.
        upgrade_block_savepoint(true, 2015122811, 'progress');
    }
    if ($oldversion < 2015122812) {
    
    	// Define field modulo to be added to block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('modulo', XMLDB_TYPE_TEXT, null, null, XMLDB_NOTNULL, null, null, 'test_name');
    
    	// Conditionally launch add field modulo.
    	if (!$dbman->field_exists($table, $field)) {
    		$dbman->add_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122812, 'progress');
    }
    if ($oldversion < 2015122900) {
    
    	// Define field courseid to be added to block_progress.
    	$table = new xmldb_table('block_progress');
    	$field = new xmldb_field('courseid', XMLDB_TYPE_INTEGER, '20', null, XMLDB_NOTNULL, null, null, 'modulo');
    
    	// Conditionally launch add field courseid.
    	if (!$dbman->field_exists($table, $field)) {
    		$dbman->add_field($table, $field);
    	}
    
    	// Progress savepoint reached.
    	upgrade_block_savepoint(true, 2015122900, 'progress');
    }
    
    return true;
}