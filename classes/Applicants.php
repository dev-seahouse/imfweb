<?php
class Applicants
{
    private $errors;
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = null;

    }

    public function get_applicants_by_id($job_id){
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
        if (!$this->db_connection->connect_errno){
            $sql="";

        }else{
            $this->errors[]="Database connection error.";
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