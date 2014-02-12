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

    public function get_comments_by_user($uid,$page_limit)
    {
        $per_page=8;
        $page_limit=$page_limit;

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
            if (!$stmt->bind_param("iii", $uid,$page_limit,$per_page)) {
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


    }


} 