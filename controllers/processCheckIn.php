<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once
    /**
     * Created by PhpStorm.
     * User: kenan
     * Date: 2/7/14
     * Time: 3:25 AM
     */
check_auth("index.php");

function displayCheckInData()
{
    if (!empty($_POST) && isset($_POST['mark_attendance'])) {
        $job_id = $_POST['job_id'];
        $applicant = new Applicant();
        $result_set = $applicant->get_check_in_data($job_id);
        $tbody_data = "";
        while ($row = $result_set->fetch_array(MYSQL_ASSOC)) {
            $tbody_data.='<tr>';
            $tbody_data.='    <td>'.$row['Firstname']." ".$row['Lastname'].'</td>';
            $tbody_data.='    <td>'.$row['NRIC'].'</td>';
            $tbody_data.='    <td>'.$row['ScopeName'].'</td>';
            $tbody_data.='    <td>'.date("d M Y", strtotime($row['JobDate'])).'</td>';
            $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobStartTime'])).'</td>';
            $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobEndTime'])).'</td>';
            $tbody_data.='    <td>'.$row['MobileNo'].'</td>';
            $tbody_data.='    <td>';
            $tbody_data.='        <div class="text-center">';
            $tbody_data.='            <input type="checkbox" name="attendance" onClick="updateCheckIn('.$row['JobAppID'].')" />';
            $tbody_data.='        </div>';
            $tbody_data.='    </td>';
            $tbody_data.='</tr>';
        }
    }

}
