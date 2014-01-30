<?php

/**
* login class handles login and logout process
*/

class Login
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
	public function __construct()
	{
		//session_set_cookie_params(0);
		session_start();

		if (isset($_GET["logout"])){
			$this->doLogout();
		}
		elseif(isset($_POST["btnSignin"])){
			$this->dologinWithPostData();
		}

	}

	private function dologinWithPostData(){
		if (empty($_POST['username'])){
			$this->erros[]="User field was empty.";
		}
        elseif(empty($_POST["password"])){
			$this->errors[]="Password field was empty";
		}elseif(!empty($_POST["username"])&& !empty($_POST['password'])){
			$this->db_connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

			//change character set and verify, output error message into errors[];
			if(!$this->db_connection->set_charset("utf8")){
				$this->errors[]=$this->db_connection->error;
				//$error returns string description of last error
			}

			//check for connection error
			if (!$this->db_connection->connect_errno){
				//SQL injection prevention
				$user_name=$this->db_connection->real_escape_string($_POST['username']);

				//sql statement
				//Todo: convert this into stored procedure
                $sql = "select user_t.userid,username,password,email,HotelName from user_t join hotel_t on user_t.userid=hotel_t.userid
                        WHERE user_t.username =?";
                // Prepare select user statement
                if (!($stmt=$this->db_connection->prepare($sql))){
                    $this->errors[]="Prepare login stmt failed:".$this->db_connection->error;
                }
                //bind and execute
                if (!$stmt->bind_param("s",$user_name)){
                    $this->errors[]="Binding parameter failed:(".$stmt->errno.")".$stmt->error;
                }

                if (!$stmt->execute()){
                    $this->errors[]="Execute failed:(".$stmt->errno.")".$stmt->error;
                }
                // retrieve result set from stmt
                $result_of_login_check=$stmt->get_result();

                //if user exists (if number of returned ==1 )
                if ($result_of_login_check->num_rows==1){
                	$result_row=$result_of_login_check->fetch_object();

                	if (password_verify($_POST['password'],$result_row->password)){

                        $_SESSION['company_name']=$result_row->HotelName;
                		$_SESSION['user_name']=$result_row->username;
                		$_SESSION["user_login_status"]=1;
                	}else{

                		// checking returned result_row

                		$this->errors[]="Wrong password. Try again";
                	}
                }else{
                	$this->errors[]="This user does not exist.";
                }

			}else{
				$this->errors[]="Database connection problem.";
			}


		}

	}

	public function isUserLoggedIn(){
		if (isset($_SESSION["user_login_status"]) AND $_SESSION["user_login_status"]==1){
			return true;
		}
		return false;
	}

    public function doLogout()
    {
        // delete the session of the user
        $_SESSION = array();
        session_destroy();
        // return a little feeedback message
        $this->messages[] = "You have been logged out.";
        redirect_to("../index.php");

    }

}