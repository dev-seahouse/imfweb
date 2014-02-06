<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Job.php");

check_auth("index.php");

if (!empty($_POST) && isset($_POST['jobid'])){

}


function displayJobData(){
    $job=new Job();
    $company_id=$_SESSION["company_id"];
    $job_data=$job->getJobData($company_id);
    $tbody_data = "";
    foreach($job_data as $row){
        $tbody_data.='<tr>';
        $tbody_data.='    <td>'.date("d M Y", strtotime($row['JobDate'])).'</td>';
        $tbody_data.='    <td>'.$row['CategoryName'].'</td>';
        $tbody_data.='    <td>'.$row['ScopeName'].'</td>';
        $jobstatus = $row['JobStatus'];
        if($jobstatus==0){
            $tbody_data.='    <td><span class="label label-warning">Pending</span></td>';
        } else {
            $tbody_data.='    <td><span class="label label-success">Fulfilled</span></td>';
        }
        $tbody_data.='    <td><a href="#" onClick="loadnames('.$row['JobID'].')">'.$row['JobSlotVacLeft'].'</a></td>';
        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobStartTime'])).'</td>';
        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobEndTime'])).'</td>';
        $tbody_data.='</tr>';
    };
    echo $tbody_data;
}


