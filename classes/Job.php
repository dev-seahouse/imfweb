<?php

class Job
{
    public $errors;
    /*@var array Collction of erro messages
    */
    private $db_connection;
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

    public function __construct()
    {
        $this->db_connection = null;
        $this->errors = array();
        $this->company_id = 0;
        $this->job_cat_id = 0;
        $this->job_scope_id = 0;
        $this->job_date = ""; // mysql should return string
        $this->job_start_time = "";
        $this->job_end_time = "";
        $this->job_est_hours = ""; // sql function
        $this->vacancy = 0;
        $this->vacancy_left = 0;
        $this->standard_pay = "";
        $this->min_exp_hours = null;
        $this->bonus_pay = null;
        $this->job_status = "";
        $this->job_requirement = null;
    }

    public function create_job($company_id, $job_cat_id, $job_scope_id, $job_date, $job_start_time, $job_end_time, $vacancy, $standard_pay, $min_exp_hours, $bonus_pay, $job_requirement)
    {

       // set default time zone
        date_default_timezone_set("Asia/Singapore");
        //var_dump($job_start_time);
        //convert start and end time into timestamp
        $t1 = strtotime($job_start_time);
        $t2 = strtotime($job_end_time);
        $differenceInSeconds = $t2 - $t1;
        $differenceInMinutes = $differenceInSeconds / 60;


       // echo $differenceInMinutes;
        //echo $differenceInMinutes;


        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }

        if(!$this->db_connection->connect_errno){
            $this->job_date= $this->db_connection->real_escape_string(strip_tags($job_date, ENT_QUOTES));
            $this->job_cat_id= $this->db_connection->real_escape_string(strip_tags($job_cat_id, ENT_QUOTES));
            $this->job_scope_id= $this->db_connection->real_escape_string(strip_tags($job_scope_id, ENT_QUOTES));
            $this->company_id= $this->db_connection->real_escape_string(strip_tags($company_id, ENT_QUOTES));
            $this->vacancy= $this->db_connection->real_escape_string(strip_tags($vacancy, ENT_QUOTES));
            $this->standard_pay= $this->db_connection->real_escape_string(strip_tags($standard_pay, ENT_QUOTES));
            $this->min_exp_hours= $this->db_connection->real_escape_string(strip_tags($min_exp_hours, ENT_QUOTES));
            $this->job_requirement= $this->db_connection->real_escape_string(strip_tags($job_requirement, ENT_QUOTES));
            $this->job_est_hours= $this->db_connection->real_escape_string(strip_tags($differenceInMinutes, ENT_QUOTES));
            $this->job_start_time= $this->db_connection->real_escape_string(strip_tags($job_start_time, ENT_QUOTES));
            $this->job_end_time= $this->db_connection->real_escape_string(strip_tags($job_end_time, ENT_QUOTES));
            $this->bonus_pay= $this->db_connection->real_escape_string(strip_tags($bonus_pay, ENT_QUOTES));





            $sql = "call createJob (?,?,?,?,?,?,?,?,?,?,?,?,?)";
            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[]=  "Prepare checking user exist statement sql failed" . $this->db_connection->error;
            }
            if (!$stmt->bind_param("iiisssiiissss", $this->company_id,$this->job_cat_id,$this->job_scope_id,$this->job_date,$this->job_start_time,$this->job_end_time,$this->job_est_hours,$this->vacancy,$this->vacancy_left,$this->standard_pay,$this->min_exp_hours,$this->bonus_pay,$this->job_requirement)) {
               $this->errors[]= "Error binding parameter for prepared statement :(" . $stmt->errno . ")" . $stmt->error;
            }
            if (!$stmt->execute()) {
                $this->errors[]= "Execute failed :(" . $stmt->errno . ")" . $stmt->error;
            };
        }



    }
}
?>