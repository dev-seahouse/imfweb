<?php

/**
 * Created by PhpStorm.
 * User: Carbon
 * Date: 2/11/14
 * Time: 6:49 PM
 */
class User
{
    private $errors;
    private $db_connection;

    public function  __construct()
    {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

    }

    public function get_user_by_id($uid)
    {
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($uid);
            $sql="SELECT UserID, firstname,lastname, gender, nric, dateofbirth, mobileno,";
            $sql.="email,spokenlang,spokenlangOther from user_t where userid=?";


            if (!$stmt = $this->db_connection->prepare($sql)){
                $this->errors[]="Prepare statement error." . $this->db_connection->error;
                return false;
            }
            if (!$stmt->bind_param("i",$uid)){
                $this->errors[]="Error binding data :( ".$stmt->errno.")" . $stmt->error;
                return false;
            }
            if (!$stmt->execute()){
                $this->errors[]="Execution error:(".$stmt->errno.")".$stmt->error;
                return false;
            }

            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting results:";
            }
            $this->db_connection->close();
            return $result_set;

        }
        else{
            $this->errors[] = "Database connection error.";
            $this->db_connection->close();
            return false;
        }

    }

} 