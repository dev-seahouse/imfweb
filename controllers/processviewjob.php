<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Job.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");

check_auth("index.php");

//display applicants who have applied jobs

if (!empty($_POST) && isset($_POST['jobid'])){
    $applicant=new Applicant();
    $job_id=$_POST['jobid'];
    $result_set=$applicant->get_applicants_by_id($job_id);
    $modal_data = "";
    if(!$result_set->num_rows){
        $modal_data = "No Applicants Found.";
    }else{
//        $modal_data.="<div class='box-content box-no-padding'>";
//        $modal_data.="<div class='responsive-table'>";
        $modal_data.="<table class='table'>";
        $modal_data.="<thead><tr>";
        $modal_data.="<th>Name</th>";
        $modal_data.="<th>Phone</th>";
        $modal_data.="<th>Email</th>";
        $modal_data.="</tr></thead><tbody>";

        while($row =$result_set->fetch_array(MYSQLI_ASSOC))
        {
           // $modal_data.= "<tr>".$row['Firstname']." ".$row['Lastname']."</tr>";
            $modal_data.="<tr>";
            $modal_data.="<td>".$row['Firstname']." ".$row['Lastname']."</td>";
            $modal_data.="<td>".$row['Email']."</td>";
            $modal_data.="<td>".$row['MobileNo']."</td>";
            $modal_data.="</tr>";
        }

        $modal_data.="</tbody></table>";
//        $modal_data.="</div>";
//        $modal_data.="</div>";
    }
    echo $modal_data;

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
        $tbody_data.='    <td><a href="#" class="has-tooltip" data-toggle="tooltip" data-placement="top" title="View Current applicants." onClick="loadnames('.$row['JobID'].')">'.$row['JobSlotVacLeft'].'</a></td>';
        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobStartTime'])).'</td>';
        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobEndTime'])).'</td>';
        $tbody_data.='</tr>';
    };
    echo $tbody_data;
}


