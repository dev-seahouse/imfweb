<?php

/**
* login class handles login and logout process
*/

class login
{
	/**
	 * @var object declare database connection
	 *
	 */
	private $db_connection=null;
	/**
	 * @var array Collection of error messages
	 */
	public $errors=array();
	/**
	 * @var array Collection of succesful message
	 */
	public $messages=array();

	/**
	 * constructor
	 */
	public function_construct()
	{
		session_start();

		if (isset($_GET["logout"])){
			$this->doLogout();
		}
		elseif(isset($_POST["login"])){
			$this->dologinWithPostData();
		}

	}

	private function dologinWithPostData(){
		if (empty($_POST['user_name'])){
			$this->erros[]="User field was empty.";
		}
		elseif(empty($POST["user_password"])){
			$this->errors[]="Password field was empty";
		}elseif(!empty($_POST["user_name"])&& !empty($_POST['user_password'])){
			$this->db_connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

			//change character set and verify, output error message into errors[];
			if(!$this->db_connection->set_charset("utf8")){
				$this->errors[]=$this->db_connection->error;
				//$error returns string description of last error
			}

			//check for connection error
			if (!$this->db_connection->connect_errno){

			}

		}

	}








}