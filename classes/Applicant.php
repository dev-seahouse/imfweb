<?php

class Applicant
{
    private $errors;
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = null;

    }

    // ---------  Function to display list applicants applied under a job for viewjob.php ---------
    public function get_applicants_by_id($job_id)
    {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return false;
            //$error returns string description of last error
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($job_id);
            $sql = "SELECT Firstname,Lastname,Email,MobileNo,";
            $sql.="(select sum(expHours) from jobapplicant_t where jobapplicant_t.UserID=User_t.UserID) as TotalExp";
            $sql.=" FROM jobapplicant_t join user_t on jobapplicant_t.userid=user_t.userid";
            $sql.=" WHERE JobID=?";
            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
            }
            if (!$stmt->bind_param("i", $job_id)) {
                $this->errors[] = "Error binding data :( " . $stmt->errno . ")" . $stmt->error;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting results:";
            }
            $this->db_connection->close();
            return $result_set;

        } else {
            $this->errors[] = "Database connection error.";
            return false;
        }
        // in this page try return result set instead of an array and retrieve data from result set in presentation page.


    }

    public function get_applicants_detail_for_msg($job_id){
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return false;
            //$error returns string description of last error
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($job_id);
            $sql = "SELECT * FROM jobapplicant_t join user_t on jobapplicant_t.userid=user_t.userid join mobilesession_t on mobilesession_t.userid=user_t.userid where MarkAsPresent='A' AND JobID=?";
            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
            }
            if (!$stmt->bind_param("i", $job_id)) {
                $this->errors[] = "Error binding data :( " . $stmt->errno . ")" . $stmt->error;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting results:";
            }
            $this->db_connection->close();
            return $result_set;

        } else {
            $this->errors[] = "Database connection error.";
            return false;
        }
        // in this page try return result set instead of an array and retrieve data from result set in presentation page.

    }

    // This function gets result set of applicants who have applied for jobs,
    public function get_check_in_data($company_id)
    {
        // Error handling : when there is error , it will return false.so if (!get_check_in_data){handle error}

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset('utf8')) {
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }

        if (!$this->db_connection->connect_errno) {
            $company_id=$this->db_connection->real_escape_string($company_id);
            $sql = 'SELECT CONCAT(Firstname," ",Lastname) as Name,ScopeName,JobDate,JobStartTime,JobEndTime,MobileNo,JobAppID,NRIC';
            $sql .= ' FROM user_t join jobapplicant_t on user_t.userid = jobapplicant_t.userid ';
            $sql .= ' join  job_t on job_t.jobid = jobapplicant_t.jobid';
            $sql .= ' join scope_t on job_t.scopeid = scope_t.scopeid ';
            $sql .= ' where MarkAsPresent="A" AND CheckIn IS NULL AND HotelID=?';
            $sql .= ' AND job_t.JobDate BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 DAY) AND DATE_ADD(CURDATE(),INTERVAL 1 DAY) ';
            $sql .= ' AND job_t.JobStatus<=2';
            //AND jobapplicant_t.jobid=?

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }

            if (!$stmt->bind_param("i", $company_id)) {
                $this->errors[] = "Error binding data(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting result set";
                return false;
            }
            return $result_set;
        } else {
            $this->errors[] = "Database connection error.";
            return false;
        }


    }

    public function update_check_in($job_app_id){
        $this->db_connection=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db_connection->set_charset('utf8')){
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }
        if (!$this->db_connection->connect_errno){
            $job_app_id=$this->db_connection->real_escape_string($job_app_id);
            $sql="UPDATE jobapplicant_t SET CheckIn=NOW() WHERE JobAppID=?";

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }

            if (!$stmt->bind_param("i", $job_app_id)) {
                $this->errors[] = "Error binding data(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;

                return false;
            }

        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }
    }

    public function get_check_out_data($company_id){

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset('utf8')) {
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }
        if (!$this->db_connection->connect_errno) {
            $company_id=$this->db_connection->real_escape_string($company_id);
            $sql = 'SELECT CONCAT(Firstname," ",Lastname) as Name,ScopeName,CheckIn,JobDate,JobStartTime,JobEndTime,MobileNo,JobAppID,NRIC,';
            $sql .=' (select sum(expHours) from jobapplicant_t where jobapplicant_t.UserID=User_t.UserID) as TotalExp';
            $sql .= ' FROM user_t join jobapplicant_t on user_t.userid = jobapplicant_t.userid ';
            $sql .= ' join  job_t on job_t.jobid = jobapplicant_t.jobid';
            $sql .= ' join scope_t on job_t.scopeid = scope_t.scopeid ';
            $sql .= ' where MarkAsPresent="A" AND CheckIn IS NOT NULL AND HotelID=?';
            $sql .= ' AND job_t.JobDate BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 DAY) AND DATE_ADD(CURDATE(),INTERVAL 1 DAY)';
            $sql .= ' AND job_t.JobStatus<=2';
            //AND jobapplicant_t.jobid=?

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }

            if (!$stmt->bind_param("i", $company_id)) {
                $this->errors[] = "Error binding data(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting result set";
                return false;
            }
            return $result_set;
        } else {
            $this->errors[] = "Database connection error.";
            return false;
        }

    }



    public function update_check_out($job_app_id){
        $this->db_connection=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db_connection->set_charset('utf8')){
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }
        if (!$this->db_connection->connect_errno){
            $job_app_id=$this->db_connection->real_escape_string($job_app_id);
            $sql="call checkout(?)";

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }

            if (!$stmt->bind_param("i", $job_app_id)) {
                $this->errors[] = "Error binding data(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;

                return false;
            }

        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }
    }

    public function update_pay($job_app_id,$pay){
        $this->db_connection=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db_connection->set_charset('utf8')){
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }
        if (!$this->db_connection->connect_errno){
            $job_app_id=$this->db_connection->real_escape_string($job_app_id);
            $sql="UPDATE jobapplicant_t join job_t ON jobapplicant_t.JobID = job_t.JobID SET
            Pay=? where JobAppID=?";

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }

            if (!$stmt->bind_param("si",$pay,$job_app_id)) {
                $this->errors[] = "Error binding data(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;

                return false;
            }

        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }
    }

    public function update_applicant_status($job_id){
        $this->db_connection=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db_connection->set_charset('utf8')){
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }
        if (!$this->db_connection->connect_errno){
            $job_app_id=$this->db_connection->real_escape_string($job_id);
            $sql="UPDATE jobapplicant_t SET MarkAsPresent='C' WHERE JobID=?";

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }
            if (!$stmt->bind_param("i", $job_app_id)) {
                $this->errors[] = "Error binding data(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            $this->db_connection->close();

        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }

    }

    public function get_all_applicants($company_id){
        $this->db_connection=new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if(!$this->db_connection->set_charset('utf8')){
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }
        if (!$this->db_connection->connect_errno){
            $this->db_connection->real_escape_string($company_id);
            $sql="select concat(Firstname,' ',Lastname) as Name,User_t.UserID,NRIC,MobileNo,MarkAsPresent,ScopeName,JobDate,";
            $sql.=" (select sum(expHours) from jobapplicant_t where jobapplicant_t.UserID=User_t.UserID) as TotalExp,";
            $sql.=" JobStartTime,JobEndTime";
            $sql.=" from jobapplicant_t join job_t on jobapplicant_t.JobID=job_t.JobID";
            $sql.=" join user_t on user_t.UserID = jobapplicant_t.UserID";
            $sql.=" join scope_t on job_t.ScopeID=scope_t.ScopeID";
            $sql.=" Where HotelID=?";


            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }
            if (!$stmt->bind_param("i", $company_id)) {
                $this->errors[] = "Error binding data(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
                return false;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting result set";
                return false;
            }
            $this->db_connection->close();
            return $result_set;


        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }

    }

    public function get_applicants_summary($company_id){

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return false;
            //$error returns string description of last error
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($company_id);
            $sql="select MarkAsPresent,count(jobapplicant_t.MarkAsPresent) as count from jobapplicant_t ";
            $sql.="join job_t on job_t.JobID=jobapplicant_t.JobID ";
            $sql.= "where (job_t.hotelID=1 and JobDate between date_sub(curdate(),INTERVAL 1 MONTH) and curdate() and job_t.HotelID=?) ";
            $sql.="group by MarkAsPresent";

            if (!$stmt = $this->db_connection->prepare($sql)){
                $this->errors[]="Prepare statement error." . $this->db_connection->error;
                return false;
            }
            if (!$stmt->bind_param("i",$company_id)){
                $this->errors[]="Error binding data :( ".$stmt->errno.")" . $stmt->error;
            }
            if (!$stmt->execute()){
                $this->errors[]="Execution error:(".$stmt->errno.")".$stmt->error;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting results:";
            }
            $this->db_connection->close();
            return $result_set;
        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }

    }

    public function get_total_applicants_count($company_id){
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return false;
            //$error returns string description of last error
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($company_id);
            $sql="select count(JobAppID) as count from jobapplicant_t join job_t on jobapplicant_t.JobID=job_t.JobID ";
            $sql.="where job_t.HotelID=? and job_t.JobDate between date_sub(curdate(),INTERVAL 1 MONTH) and curdate()";
            if (!$stmt = $this->db_connection->prepare($sql)){
                $this->errors[]="Prepare statement error." . $this->db_connection->error;
                return false;
            }
            if (!$stmt->bind_param("i",$company_id)){
                $this->errors[]="Error binding data :( ".$stmt->errno.")" . $stmt->error;
            }
            if (!$stmt->execute()){
                $this->errors[]="Execution error:(".$stmt->errno.")".$stmt->error;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting results:";
            }
            $this->db_connection->close();
            return $result_set;
        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }
    }


}
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/7/14
 * Time: 12:32 AM
 */