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
 * For a given question type, list the number of
 *
 * @package    report
 * @subpackage userrecommendation
 * @copyright  2008 Tim Hunt
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

require(__DIR__.'/../../config.php');
require_once($CFG->libdir.'/adminlib.php');
require_once($CFG->libdir.'/questionlib.php');

// Get URL parameters.

echo $OUTPUT->header();

// Fetching data and add to the table

global $DB;
$recommendation = $DB->get_records('local_custompopupredirection');

echo "<table class = 'user-recom-table table-striped'>";
echo "<h1 class = 'user-recom-table-header'> User Recommendation Details</h1>";
echo "<tr class = 'user-recom-table'>";
    echo "<th class = 'userinfo text-center'> User Id </th>";
    echo "<th class = 'userinfo text-center'> User Name </th>";
    echo "<th class = 'recominfo text-center'> Interested Categories </th>";
    echo "<th class = 'recominfo text-center'> Interested Courses </th>";
echo "</tr>";
foreach($recommendation as $recom){
    $catstring = $recom->interested_category;
    $courstring = $recom->interrested_course;
    $idstring = $recom->u_id;
    $namestring = $recom->u_name;

    
    echo "<tr class = 'user-recom-table table-striped'>";
    echo "<td class = 'userinfo text-center'>'$idstring'</td>";
    echo "<td class = 'userinfo text-center'>'$namestring'</td>";
    echo "<td class = 'recominfo'>$catstring</td>";
    echo "<td class = 'recominfo'>$courstring</td>";
    echo "</tr>";
   
}
echo "</table>";
// Fetching data and add to the table end

?>

<!-- Table style -->
<style>
.user-recom-table {
  border:1px solid #AAB7B8;
  min-width: 100%;
}
.userinfo{
    width: 90px;
    border:1px solid #AAB7B8;

}
.recominfo{
    width: 200px;
    border:1px solid #AAB7B8;

}
.user-recom-table-header{
    text-align: center;
    margin-bottom: 40px;
}
</style>
<!-- Table style end -->

<?php




// Footer.
echo $OUTPUT->footer();
