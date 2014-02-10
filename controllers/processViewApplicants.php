<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");

/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/10/14
 * Time: 1:07 AM
 */
check_auth("index.php");

function display_applicants(){
    $company_id=$_SESSION["company_id"];
    $applicant=new Applicant();
    $result_set=$applicant->get_all_applicants($company_id);
    $tbody_data = "";

    foreach($result_set as $row){
        $tbody_data.='<tr>';
        $tbody_data.='    <td>'.$row['Name'].'</td>';
        $tbody_data.='    <td>'.$row['NRIC'].'</td>';
        $tbody_data.='    <td>'.$row['MobileNo'].'</td>';
        $tbody_data.='    <td>'.$row['TotalExp'].'</td>';
        $app_status = $row['MarkAsPresent'];
        switch($app_status){
            case 'T':
                $tbody_data.='    <td><span class="label label-success center-block has-tooltip" data-placement="top" title="Job has completed a job.">Completed</span></td>';
                break;
            case 'F':
                $tbody_data.='    <td><span class="label label-warning center-block has-tooltip" data-placement="top" title="This applicant has been absent for a previous job.">Absent</span></td>';
                break;
            case 'A':
                $tbody_data.='    <td><span class="label label-default center-block has-tooltip" data-placement="top" title="This applicant has just applied a job.">Applied</span></td>';
                break;
            case 'C':
                $tbody_data.='    <td><span class="label label-danger center-block has-tooltip" data-placement="top" title="Job has been cancelled.">Cancelled</span></td>';
                break;
        }
        $tbody_data.='    <td>'.$row['ScopeName'].'</td>';
        $tbody_data.='    <td>'.date("d M Y", strtotime($row['JobDate'])).'</td>';
        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobStartTime'])).'</td>';
        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobEndTime'])).'</td>';
        $tbody_data.='</tr>';
    };
    echo $tbody_data;

}