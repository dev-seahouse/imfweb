<?php
//Object relation mapper class

class JobScope
{
	private $db_connection=null;
	/*@var array Collction of erro messages
	*/
	public $errors=array();	
	/*
	@var array Cetegory array CategoryID=>CategoryName
	*/
	private $scopes;

	public function __construct()
	{
		$this->scopes=array();
	}

/*======================================
=            Job Scopes Getter & Setter           =
======================================*/

/*==========  Get all jobscopes ==========*/

	public function get_scopes_by_id($category_id){
        if (!$this->scopes=$this->db_scopes_by_id()){
         var_dump($this->get_errors());
        }
        return $this->scopes;        
    }

/*==============================================
=            DB connection function            =
==============================================*/

/*==========  Get all job scopes  ==========*/

	   
    private function db_scopes_by_id($category_id){
        $this->db_connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        //change character set and verify, output error message into errors[];
        if(!$this->db_connection->set_charset("utf8")){
            $this->errors[]=$this->db_connection->error;
            return false;
            //$error returns string description of last error
        }

        if (!$this->db_connection->connect_errno){
            //the sql statemnet
            $sql="SELECT * FROM scope_t where CategoryID=?order by ScopeName ASC";
            //prepare statement
            if (!$stmt = $this->db_connection->prepare($sql)){
                $this->errors[]="Prepare statement error." . $this->db_connection->error;
            }
            // bind parameters
            if (!$stmt->bind_param("i",$category_id)){
                $this->errors[]="Error binding data :( ".$stmt->errno.")" . $stmt->error;
            }
            //execute statement
            if (!$stmt->execute()){
                $this->errors[]="Execution error:(".$stmt->errno.")".$stmt->error;
            }
            /**
            
                TODO:
                - see whats inside result set.
                - continue from there.
            
            **/
            
            $result_set=$stmt->get_result();
            var_dump($result_set);


//             $result_set=$this->db_connection->query($sql);
//             if ($result_set=$this->db_connection->query($sql)){
//             	return ($result_set->fetch_all(MYSQLI_ASSOC));

//                 // while($row=$result_set->fetch_array(MYSQLI_ASSOC)){
//                 //     echo "<option value='".$row["CategoryID"]."'>".$row["CategoryName"]."</option>";
//                 // }
//             }
//             else{
//                 $this->errors[]="retrieving result_set failed.";
//                 return false;
//             }


// /*            while($row=mysqli_fetch_ob($result_set)){
//                 echo var_dump($row);
//                 //echo "<option value=.'".$row["CategoryID"]."'>".$row["CategoryName"]."</option>";
//             }*/

        }else{
            $this->errors[]="Database connection error.";
            return false;
        }
    }


    /*===============================================
    =            Error handling function            =
    ===============================================*/
    private function get_errors(){
    	return $errors;
    }
}

?>