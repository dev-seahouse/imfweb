<?php

class Job
{
    private $db_connection;
    /*@var array Collction of erro messages
    */
    public $errors;

    private $company_id; //int 10
    private $job_cat_id; //int 10
    private $job_scope_id; //int 10
    private $job_date; // need to format
    private $job_start_time; //datetime
    private $job_end_time; //datetime
    private $job_est_hours; //int 10
    private $vacancy; // int 10
    private $vacancy_left; //int 10
    private $standard_pay; // varchar 10
    private $min_exp_hours; //varchar 100
    private $bonus_pay; //varchar 10
    private $job_status; //int 1
    private $job_requirement;

    public function __construct(){
        $this->db_connection=null;
        $this->errors=array();
        $this->company_id=0;
        $this->job_cat_id=0;
        $this->job_scope_id=0;
        $this->job_date=""; // mysql should return string
        $this->job_start_time="";
        $this->job_end_time="";
        $this->job_est_hours="";// sql function
        $this->vacancy=0;
        $this->vacancy_left=0;
        $this->standard_pay="";
        $this->min_exp_hours=null;
        $this->bonus_pay=null;
        $this->job_status="";
        $this->job_requirement=null;
    }

    private function create_job($company_id,$job_cat_id,$job_scope_id,$job_date,$job_start_time,$job_end_time,$vacancy,$standard_pay,$min_exp_hours,$bonus_pay,$job_status,$job_requirement){

        //set default time zone
        date_default_timezone_set("Asia/Singapore");
        //convert start and end time into timestamp
        $e_time=new DateTime($job_end_time);
        $s_time=new DateTime($job_start_time);
        $interval=$e_time->diff($s_time);
        $this->job_est_hours=$interval;






    }


}
?>