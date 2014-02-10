<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Job.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");


check_auth("index.php");

//display applicants who have applied jobs

if (!empty($_POST) && isset($_POST['jobid'])){
    $applicant=new Applicant();
    $job_vac=$_POST['job_vac'];
    $job_vac_left=$_POST['job_vac_left'];
    $job_id=$_POST['jobid'];
    $result_set=$applicant->get_applicants_by_id($job_id);
    $modal_data = "";
    if(!$result_set->num_rows){
        $modal_data = "No one has applied yet.";
    }else{
//        $modal_data.="<div class='box-content box-no-padding'>";
//        $modal_data.="<div class='responsive-table'>";
        $modal_data.="<table class='table table-bordered table-stripped'>";
        $modal_data.="<thead><tr>";
        $modal_data.="<th>Name</th>";
        $modal_data.="<th>Phone</th>";
        $modal_data.="<th>Email</th>";
        $modal_data.="<th>Past Experience</th>";
        $modal_data.="</tr></thead><tbody>";

        while($row =$result_set->fetch_array(MYSQLI_ASSOC))
        {
            $experience_string=$row['TotalExp'];
            $experience_hours=convertToHoursMins($experience_string,'%d hours %02d minutes');


           // $modal_data.= "<tr>".$row['Firstname']." ".$row['Lastname']."</tr>";
            $modal_data.="<tr>";
            $modal_data.="<td>".$row['Firstname']." ".$row['Lastname']."</td>";
            $modal_data.="<td>".$row['Email']."</td>";
            $modal_data.="<td>".$row['MobileNo']."</td>";
            $modal_data.="<td>".$experience_hours."</td>";
            $modal_data.="</tr>";
        }

        $modal_data.="</tbody></table>";
//        $modal_data.="</div>";
//        $modal_data.="</div>";
    }
    echo $modal_data;
    $result_set->close();

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
        switch($jobstatus){
            case 0:
                $tbody_data.='    <td><span class="label label-default center-block has-tooltip" data-placement="top" title="Job Open for application">Pending</span></td>';
                $tbody_data.='    <td><a href="#" class="has-tooltip badge center-block" data-toggle="tooltip" data-placement="top" title="View applicants." onClick="loadnames('.$row['JobID'].','.$row['JobSlotVacancy'].','.$row['JobSlotVacLeft'].')">'.$row['JobSlotVacLeft'].'</a></td>';
                break;
            case 1:
                $tbody_data.='    <td><span class="label label-success center-block has-tooltip" data-placement="top" title="All job vacancies are filled.Changes could still be made before job application closed.">vi</span></td>';
                $tbody_data.='    <td><a href="#" class="has-tooltip badge center-block" data-toggle="tooltip" data-placement="top" title="View applicants." onClick="loadnames('.$row['JobID'].','.$row['JobSlotVacancy'].','.$row['JobSlotVacLeft'].')">'.$row['JobSlotVacLeft'].'</a></td>';
                break;
            case 2:
                $tbody_data.='    <td><span class="label label-warning center-block has-tooltip" data-placement="top" title="Job application closed,changes can no longer be made and applicants can no longer cancel job application.">Closed</span></td>';
                $tbody_data.='    <td><a href="#" class="has-tooltip badge center-block" data-toggle="tooltip" data-placement="top" title="View applicants." onClick="loadnames('.$row['JobID'].','.$row['JobSlotVacancy'].','.$row['JobSlotVacLeft'].')">-</a></td>';
                break;
            case 3:
                $tbody_data.='    <td><span class="label label-danger center-block has-tooltip" data-placement="top" title="Job cancelled by employer.">Cancelled</span></td>';
                $tbody_data.='    <td><a href="#" class="has-tooltip badge center-block" data-toggle="tooltip" data-placement="top" title="Job Cancelled." onClick="loadnames('.$row['JobID'].','.$row['JobSlotVacancy'].','.$row['JobSlotVacLeft'].')">-</a></td>';
                break;
        }


        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobStartTime'])).'</td>';
        $tbody_data.='    <td>'.date("h:i A", strtotime($row['JobEndTime'])).'</td>';
        $tbody_data.='</tr>';
    };
    echo $tbody_data;
}


