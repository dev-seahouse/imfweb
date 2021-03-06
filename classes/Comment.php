<?php

/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/12/14
 * Time: 3:54 PM
 */
class Comment
{
    private $errors;
    private $db_connection;

    public function __construct()
    {
        $this->db_connection = null;

    }

    public function get_comments_by_user($uid, $page_limit, $per_page)
    {


        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return false;
            //$error returns string description of last error
        }

        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($uid);
            $sql = "SELECT * FROM fyp_imf.comment_t  where user_id=? limit ?,?";
            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
            }
            if (!$stmt->bind_param("iii", $uid, $page_limit, $per_page)) {
                $this->errors[] = "Error binding data :( " . $stmt->errno . ")" . $stmt->error;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
            }
            if (!$result_set = $stmt->get_result()) {
                $this->errors[] = "Error getting results:";
            }


            return $result_set;


        } else {
            $this->errors[] = "Database connection error.";
            return false;
        }
    }

    public function get_all_comments($company_id)
    {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return false;
            //$error returns string description of last error
        }


        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($company_id);
            $sql = "SELECT concat(Firstname,' ',Lastname) as username,user_t.userid as user_id,company_id,NRIC,rating,";
            $sql .= " comment,DATE_FORMAT(comment_date,'%d-%b-%Y') as comment_date,";
            $sql .= " DATE_FORMAT(comment_date,'%H:%i') as comment_time";
            $sql .= " FROM comment_t right join user_t on comment_t.user_id=user_t.UserID";
            $sql .= " where user_t.UserID in";
            $sql .= " (SELECT UserID FROM fyp_imf.jobapplicant_t join job_t on job_t.JobID=jobapplicant_t.JobID";
            $sql .= " WHERE job_t.HotelID=? AND job_t.JobStatus!=3)";


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


            return $result_set;


        } else {
            $this->errors[] = "Database connection error.";
            return false;
        }
    }

    public function add_comment($company_id, $company_name, $rating, $comment, $user_id)
    {
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

        //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return  $this->errors;
            //$error returns string description of last error
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($company_id);
            $this->db_connection->real_escape_string(strip_tags($company_name, ENT_QUOTES));
            $this->db_connection->real_escape_string(strip_tags($rating, ENT_QUOTES));
            $this->db_connection->real_escape_string(strip_tags($comment, ENT_QUOTES));
            $this->db_connection->real_escape_string(strip_tags($user_id, ENT_QUOTES));

            $sql = 'insert into comment_t (company_id,company_name,rating,comment,user_id) values';
            $sql .= '(?,?,?,?,?)';
            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
                return  $this->errors;
            }
            if (!$stmt->bind_param("isssi", $company_id, $company_name, $rating, $comment, $user_id)) {
                $this->errors[] = "Error binding data :( " . $stmt->errno . ")" . $stmt->error;
                return  $this->errors;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
                return  $this->errors;
            }
            return "success";

        } else {
            $this->errors[] = "Database connection error.";
            return  $this->errors;
        }


    }

    public function update_comment($company_id,$rating,$comment,$user_id){
        $this->db_connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);    //set utf character set.
        if (!$this->db_connection->set_charset("utf8")) {
            $this->errors[] = $this->db_connection->error;
            return  $this->errors;
            //$error returns string description of last error
        }
        if (!$this->db_connection->connect_errno) {
            $this->db_connection->real_escape_string($company_id);
            $this->db_connection->real_escape_string(strip_tags($rating, ENT_QUOTES));
            $this->db_connection->real_escape_string(strip_tags($comment, ENT_QUOTES));
            $this->db_connection->real_escape_string(strip_tags($user_id, ENT_QUOTES));

            $sql = 'update comment_t set rating=?,comment=?,comment_date=now()';
            $sql.=' where user_id=? and company_id=?';
            if (!$stmt = $this->db_connection->prepare($sql)) {
                $this->errors[] = "Prepare statement error." . $this->db_connection->error;
                return  $this->errors;
            }
            if (!$stmt->bind_param("ssii", $rating, $comment, $user_id, $company_id)) {
                $this->errors[] = "Error binding data :( " . $stmt->errno . ")" . $stmt->error;
                return  $this->errors;
            }
            if (!$stmt->execute()) {
                $this->errors[] = "Execution error:(" . $stmt->errno . ")" . $stmt->error;
                return  $this->errors;
            }
            return "success";

        } else {
            $this->errors[] = "Database connection error.";
            return  $this->errors;
        }

    }


} 