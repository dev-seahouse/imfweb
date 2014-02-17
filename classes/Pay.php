<?php
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/9/14
 * Time: 2:58 AM
 */
class Pay
{
    public $errors;
    /*@var array Collction of erro messages
    */
    private $db_connection;

    public function __construct(){

    }

    public function get_all_pay_data($company_id){

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        if (!$this->db_connection->connect_errno) {
            $sql="select jobapplicant_t.UserID,concat(Firstname,' ',LastName) as Name,";
            $sql.=" ScopeName,user_t.NRIC,JobDate,CheckIn,CheckOut,JobRate,JobEBR,JobMinEBRHours,ExpHours,JobApplicant_t.UserID,jobapplicant_t.Pay,";
            $sql.="  JobEstHours,MobileNo,";
            $sql.=" (select sum(expHours) from jobapplicant_t where jobapplicant_t.UserID=User_t.UserID) as TotalExp from user_t";
            $sql.=" join jobapplicant_t on user_t.UserID=jobapplicant_t.UserID";
            $sql.=" join job_t on job_t.JobID=jobapplicant_t.JobID";
            $sql.=" join scope_t on job_t.ScopeID=scope_t.ScopeID";
            $sql.=" where MarkAsPresent='T' AND Checkout IS NOT NULL AND HotelID=?";

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
            }
            if (!$stmt->bind_param("i", $company_id)) {
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

        }

        else{
            $this->errors[] = "Database connection error.";
            return false;
        }

    }

    public function get_pay_data_by_appid($job_app_id){
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($job_app_id);
            $sql="select JobDate,CheckIn,CheckOut,JobRate,JobEBR,JobMinEBRHours,ExpHours,JobApplicant_t.UserID,";
            $sql.=" (select sum(expHours) from jobapplicant_t where jobapplicant_t.UserID=User_t.UserID) as TotalExp from user_t";
            $sql.=" join jobapplicant_t on user_t.UserID=jobapplicant_t.UserID ";
            $sql.=" join job_t on job_t.JobID=jobapplicant_t.JobID ";
            $sql.=" join scope_t on job_t.ScopeID=scope_t.ScopeID";
            $sql.=" where MarkAsPresent='T' AND Checkout IS NOT NULL";
            $sql.=" AND JobAppID=?";

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
            }
            if (!$stmt->bind_param("i", $job_app_id)) {
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
        }else{
            $this->errors[] = "Database connection error.";
            return false;
        }
    }



    public function calculate_pay($checkin,$checkout,$std_rate,$prem_rate,$eligibility,$total_exp){

        $has_premium_rate=(!empty($prem_rate)&&!empty($eligibility));
        $is_eligible=$total_exp>=$eligibility;

        date_default_timezone_set("Asia/Singapore");
        $datetime1 = new DateTime($checkin);
        $datetime2 = new DateTime($checkout);
        $interval = $datetime1->diff($datetime2);
        $hours=$interval->days*24;
        $hours+=$interval->h;
        $hours+=$interval->i/60;

        if($has_premium_rate&&$is_eligible){
            $pay_result=$prem_rate*$hours;
            return number_format($pay_result, 2, '.', '');
        }
        else{
            $pay_result=$std_rate*$hours;
            return number_format($pay_result, 2, '.', '');
        }

    }

    public function get_total_pay_summary($company_id){
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($company_id);
            $sql="call get_pay_sum(?,@weekly,@monthly,@quarterly,@yearly)";
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
            $sql="select @weekly,@monthly,@quarterly,@yearly";
            if (!$stmt = $this->db_connection->prepare($sql)){
                $this->errors[]="Prepare statement error." . $this->db_connection->error;
                return false;
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

    public function get_avg_pay_summary($company_id){
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($company_id);
            $sql="call get_pay_average(?,@weekly,@monthly,@quarterly,@yearly)";
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
            $sql="select @weekly,@monthly,@quarterly,@yearly";
            if (!$stmt = $this->db_connection->prepare($sql)){
                $this->errors[]="Prepare statement error." . $this->db_connection->error;
                return false;
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