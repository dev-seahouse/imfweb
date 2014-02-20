<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Job.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Message.php");



/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/8/14
 * Time: 12:36 PM
 */
check_auth("index.php");

if (!empty($_POST) && isset($_POST['cancel_job'])) {
    $job = new Job();
    $applicant=new Applicant();
    $job_id = $_POST["job_id"];
    $company_id=$_SESSION['company_id'];
    $company_name=$_SESSION['company_name'];
    $job->update_job_status($job_id);
    $message=new Message();
    $message->sent_message($job_id,$company_id,$company_name);
    $applicant->update_applicant_status($job_id);
    display_cancel_job();

}
if (!empty($_POST) && isset($_POST['show_vacancy'])) {
    $job = new Job();
    $applicant = new Applicant();
    $job_vac = $_POST['job_vac'];
    $job_vac_left = $_POST['job_vac_left'];
    $job_id = $_POST["job_id"];
    $result_set = $applicant->get_applicants_by_id($job_id);
    $modal_data = "";
    if (!$result_set->num_rows) {
        $modal_data = "No one has applied yet.";
    } else {
//        $modal_data.="<div class='box-content box-no-padding'>";
//        $modal_data.="<div class='responsive-table'>";
        $modal_data .= "<table class='table responsive table-bordered table-stripped'>";
        $modal_data .= "<thead><tr>";
        $modal_data .= "<th>Name</th>";
        $modal_data .= "<th>Email</th>";
        $modal_data .= "<th>Phone</th>";
        $modal_data .= "<th>Experience</th>";
        $modal_data .= "</tr></thead><tbody>";

        while ($row = $result_set->fetch_array(MYSQLI_ASSOC)) {
            $experience_string = $row['TotalExp'];
            $experience_hours = convertToHoursMins($experience_string, '%d hours %02d minutes');

            // $modal_data.= "<tr>".$row['Firstname']." ".$row['Lastname']."</tr>";
            $modal_data .= "<tr>";
            $modal_data .= "<td><a class='badge' href='viewuser.php?uid=".$row['UserID'] ."'target='_blank'>" . $row['Firstname'] . " " . $row['Lastname'] . "</a></td>";
            $modal_data .= "<td>" . $row['Email'] . "</td>";
            $modal_data .= "<td>" . $row['MobileNo'] . "</td>";
            $modal_data .= "<td>" . $experience_hours . "</td>";
            $modal_data .= "</tr>";
        }

        $modal_data .= "</tbody></table>";
//        $modal_data.="</div>";
//        $modal_data.="</div>";
    }
    echo $modal_data;
}


function display_cancel_job()
{
    $job = new Job();
    $company_id = $_SESSION["company_id"];
    $job_data = $job->get_cancel_job_data($company_id);

    $tbody_data = "";
    foreach ($job_data as $row) {
        $is_cancelled = false;
        $tbody_data .= '<tr>';
        $tbody_data .= '    <td>' . date("d M Y", strtotime($row['JobDate'])) . '</td>';
        $tbody_data .= '    <td>' . $row['ScopeName'] . '</td>';
        $jobstatus = $row['JobStatus'];
        if ($jobstatus == 0) {
            $tbody_data .= '    <td><span class="label label-default center-block has-tooltip" data-placement="top" title="Job Open for application.">Pending</span></td>';
            $tbody_data .= '    <td><a href="#" class="has-tooltip center-block badge" data-toggle="tooltip" data-placement="top" title="View Current applicants." onClick="loadnames(' . $row['JobID'] . ',' . $row['JobSlotVacancy'] . ',' . $row['JobSlotVacLeft'] . ')">' . $row['JobSlotVacLeft'] . '</a></td>';
        } else if ($jobstatus == 1) {
            $tbody_data .= '    <td><span class="label label-success center-block has-tooltip" data-placement="top" title="All job vacancies are filled.Changes could still be made before job application closed.">Fulfilled</span></td>';
            //$tbody_data.='    <td><a href="#" onClick="loadnames('.$row['JobID'].')">'.$row['JobSlotVacLeft'].' remaining</a></td>';
            $tbody_data .= '    <td><a href="#" class="has-tooltip center-block badge" data-toggle="tooltip" data-placement="top" title="View Current applicants." onClick="loadnames(' . $row['JobID'] . ',' . $row['JobSlotVacancy'] . ',' . $row['JobSlotVacLeft'] . ')">' . $row['JobSlotVacLeft'] . '</a></td>';
        } else if ($jobstatus == 3) {
            $tbody_data .= '    <td><span class="label label-danger center-block has-tooltip" data-placement="top" title="Job cancelled by employer.">Cancelled</span></td>';
            $tbody_data .= '    <td><span class="label label-default center-block has-tooltip" data-placement="top" title="Job cancelled by employer.">-</span></td>';
            $is_cancelled = true;
        }
        $tbody_data .= '    <td>' . date("h:i A", strtotime($row['JobStartTime'])) . '</td>';
        if ($is_cancelled) {
            $tbody_data .= "    <td><button id='cancelJob' class='btn btn-default btn-xs center-block' type='button' disabled>Cancel</button></td>";
        } else {
            $tbody_data .= "    <td><button id='cancelJob' class='btn btn-danger btn-xs center-block' type='button' onClick='cancel_job(" . $row['JobID'] . ")'>Cancel</button></td>";
        }
        $tbody_data .= '</tr>';
    };
    echo $tbody_data;
}

?>