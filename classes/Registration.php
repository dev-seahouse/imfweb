<?php
/**
 * Registration class
 */
 class Registration
 {
 	private $db_connection=null;

 	public $errors=array();

 	public $messages=array();

 	public function __construct(){
 		if (isset($_POST["register"])){
 			$this->registerNewUser();
 		}
 	}

 	private function registerNewUser(){
 		if (empty($_POST['inputUserName'])){
 			$this->errors[]="Empty Username";
 		}elseif(empty($_POST["inputPasswd"])||empty($_POST["inputConfirmPasswd"])){
 			$this->errors[]="Empty Password";
 		}elseif($_POST['inputPasswd']!==$_POST['inputConfirmPasswd']){
 			$this->errors[]="Password and Password repeat are not the same";
 		}elseif(strlen($_POST['inputPasswd'])<6){
 			$this->erros[]="Password must have minimum length of 6 characters";
 		}elseif(strlen($_POST['inputUserName'])>50 || strlen($_POST['inputUserName'])<2){
 			$this->errors[]="Username cannot be shorter than 2 or longer than 50 characters";
 		}elseif(!preg_match('/^[a-z\d]{2,50}$/i', $_POST['inputUserName'])){
 			$this->errors[]="Username does can only be letter and numbers from 2 to 50 characters";
 		}elseif(empty($_POST['inputEmail'])){
 			$this->errors[]="Email cannot be empty";
 		}elseif(strlen($_POST["inputEmail"])>50){
 			$this->errors[]="Emails cannot be longer than 50 characters";
 		}elseif(!filter_var($_POST["inputEmail"],FILTER_VALIDATE_EMAIL)){
 			$this->errors[]="Email address is not valide in a valid email format.";
 		}elseif(!empty($_POST["inputUserName"])
 			&& strlen($_POST["inputUserName"])<=50
 			&& strlen($_POST["inputUserName"])>=2
 			&& preg_match('/^[a-z\d]{2,64}$/i', $_POST["inputUserName"])
 			&& !empty($_POST['inputEmail'])
 			&& strlen($_POST["inputEmail"])<=50
 			&& filter_var($_POST["inputEmail"],FILTER_VALIDATE_EMAIL)
 			&& !empty($_POST["inputPasswd"])
 			&& !empty($_POST["inputConfirmPasswd"])
 			&&($_POST["inputPasswd"]===$_POST["inputConfirmPasswd"])

 			){

 			// if eveything is fine start connection
 			$this->db_connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

 			// change character set to utf8
 			if (!$this->db_connection->set_charset("utf8")){
 				$this->errors[]=$this->db_connection->error;
 			}

 			// if there is no error then remove javascript/html code
 			if (!$this->db_connection->connect_errno){
 				$user_name=$this->db_connection->real_escape_string(strip_tags($_POST["inputUserName"],ENT_QUOTES));
 				$user_email=$this->db_connection->real_escape_string(strip_tags($_POST["inputEmail"],ENT_QUOTES));
 				$user_password=$_POST["inputPasswd"];

 				$user_password_hash=password_hash($user_password,PASSWORD_DEFAULT);
 				//construct sql
 				$sql="SELECT * FROM user_t where username=?";
 				//prepare statement
 				if(!$stmt=$this->db_connection->prepare($sql)){
 					$this->errors[]="Prepare checking user exist statement sql failed".$this->db_connection->error;
 				}
 				//bind statement
 				if(!$stmt->bind_param("s",$user_name)){
 					$this->errors[]="Error binding parameter for prepared statement :(".$stmt->errno.")".$stmt->error;
 				}
 				//execute statement errno =error code, error=error descritpion
 				if (!$stmt->execute()){
 					$this->errors[]="Execute failed :(".$stmt->errno.")".$stmt->error;
 				}
 				//retrieve resultset from stmt object
 				$query_check_user_name=$stmt->get_result();
 				//var_dump($query_check_user_name);
 				if ($query_check_user_name->num_rows==1){
 					$this->errors[]="User name already taken.";
 				}else{
 					//define sql statement username,passwordhash,email
 					$sql="call regUser(?,?,?)";
 					//prepare statement
 					if (!$stmt=$this->db_connection->prepare($sql)){
 						$this->errors[]="Prepare register statement failed".$this->db_connection->error;
 					}
 					// bind parameter
 					if (!$stmt->bind_param("sss",$user_name,$user_password_hash,$user_email)){
 						$this->errors[]="Binding registration data error:(".$stmt->errno.")".$stmt->error;
 					}
 					// execute statement
 					if (!$stmt->execute()){
 						$this->errors[]="Error executing prepared statement:(".$stmt->errno.")".$stmt->error;
 					}

 					//automatically login after registration
 					


 					
 				}
 				// //$query_new_user_insert=$this->db_connection->query($sql);
 				// if (!$this->db_connection->multi_query($sql)){
 				// 	echo "Call failed: (". $this->db_connection->errno.").".$this->db_connection->error;
 				// }

 			}

 		}

 	}



 }
?>