<?php
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/10/14
 * Time: 11:25 AM
 */
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Job.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Pay.php");

check_auth("index.php");
$job_summary=get_job_summary();
$applicant_summary=get_applicants_summary();
$pay_summary=get_pay_summary();
$pay_avg=get_pay_avg();




function get_job_summary(){
    $company_id = $_SESSION['company_id'];
    $job=new Job();
    $result_set=$job->get_job_status_count($company_id);
    $result=array();
    $pending=0;
    $fufilled=0;
    $closed=0;
    $cancelled=0;
    $total_jobs=0;
    foreach($result_set as $row){

        switch ($row['JobStatus']) {
            case 0:
                $pending=$row['count'];
                break;
            case 1:
                $fufilled=$row['count'];
                break;
            case 2:
                $closed=$row['count'];
                break;
            case 3:
                $cancelled=$row['count'];
        }
    };
    $result_set=$job->get_total_job_count($company_id);
    foreach($result_set as $row){
        $total_jobs=$row['count'];

    }
    return $result=[$pending,$fufilled,$closed,$cancelled,$total_jobs];

}

function get_applicants_summary(){
    $company_id = $_SESSION['company_id'];
    $applicant=new Applicant();
    $result_set=$applicant->get_applicants_summary($company_id);
    $result=array();
    $applied=0;
    $completed=0;
    $absent=0;
    $cancelled=0;
    $total_applicants=0;
    foreach($result_set as $row){

        switch ($row['MarkAsPresent']) {
            case 'A':
                $applied=$row['count'];
                break;
            case 'F':
                $absent=$row['count'];
                break;
            case 'C':
                $cancelled=$row['count'];
                break;
            case 'T':
                $completed=$row['count'];
        }
    };
    $result_set=$applicant->get_total_applicants_count($company_id);
    foreach($result_set as $row){
        $total_applicants=$row['count'];
    }
    return $result=[$applied,$completed,$absent,$cancelled,$total_applicants];


}

function get_pay_summary(){
    $company_id = $_SESSION['company_id'];
    $pay=new Pay();
    $result=array();
    $weekly=0;
    $monthly=0;
    $quarterly=0;
    $yearly=0;
    $result_set=$pay->get_total_pay_summary($company_id);
    foreach($result_set as $row){
        $weekly='S$'.number_format($row["@weekly"], 2, '.', '');
        $monthly='S$'.number_format($row["@monthly"],2,".","");
        $quarterly='S$'.number_format($row['@quarterly'],2,".","");
        $yearly='S$'.number_format($row['@yearly'],2,".","");
    }
    return $result=[$weekly,$monthly,$quarterly,$yearly];


}

function get_pay_avg(){
    $company_id = $_SESSION['company_id'];
    $pay=new Pay();
    $result=array();
    $weekly=0;
    $monthly=0;
    $quarterly=0;
    $yearly=0;
    $result_set=$pay->get_avg_pay_summary($company_id);
    foreach($result_set as $row){
        $weekly='S$'.number_format($row["@weekly"], 2, '.', '');
        $monthly='S$'.number_format($row["@monthly"],2,".","");
        $quarterly='S$'.number_format($row['@quarterly'],2,".","");
        $yearly='S$'.number_format($row['@yearly'],2,".","");
    }
    return $result=[$weekly,$monthly,$quarterly,$yearly];

}
