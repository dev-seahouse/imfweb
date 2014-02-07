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
            $sql = "SELECT Firstname,Lastname,Email,MobileNo FROM jobapplicant_t join user_t on jobapplicant_t.userid=user_t.userid where MarkAsPresent='A' AND JobID=?";
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

    public function get_check_in_data($job_id)
    {
        // Error handling : when there is error , it will return false.so if (!get_check_in_data){handle error}

        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset('utf8')) {
            $this->errors[] = "Error setting charset:(" . $this->db_connection->error . ")";
            return false;
        }
        if ($this->db_connection->connect_errno) {
            $sql = 'SELECT CONCAT(Firstname," ",Lastname) as Namej,ScopeName,JobDate,JobStartTime,JobEndTime,MobileNo,JobAppID,NRIC';
            $sql .= ' FROM user_t join jobapplicant_t on user_t.userid = jobapplicant_t.userid ';
            $sql .= ' join  job_t on job_t.jobid = jobapplicant_t.jobid';
            $sql .= ' join scope_t on job_t.scopeid = scope_t.scopeid ';
            $sql .= ' where MarkAsPresent="A" AND CheckIn IS NULL AND jobapplicant_t.jobid=?';

            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error:(" . $this->db_connection->error . ")";
                return false;
            }
            if (!$stmt->bind_param("i", $job_id)) {
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
        } else {
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