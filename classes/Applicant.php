<?php

class Applicant
{
    private $errors;
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = null;

    }

    public function get_applicants_by_id($job_id)
    {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return false;
            //$error returns string description of last error
        }
        if (!$this->db_connection->connect_errno) {
            $sql = "SELECT * FROM jobapplicant_t join user_t on jobapplicant_t.userid=user_t.userid where MarkAsPresent='A' AND JobID=?";
            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
            }
            if (!$stmt->bind_param("i", $job_id)) {
                $this->errors[] = "Error binding data :( " . $stmt->errno . ")" . $stmt->error;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
            }
            if ($result_set = $stmt->get_result()) {
                return $result_set;
            } else {
                $this->errors[] = "Error getting results:";
            }


        } else {
            $this->errors[] = "Database connection error.";
            return false;
        }
        // in this page try return result set instead of an array and retrieve data from result set in presentation page.


    }


}
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/7/14
 * Time: 12:32 AM
 */ 