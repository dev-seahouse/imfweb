<?php
//Object relation mapper class

class JobCategory
{
	private $db_connection;
	/*@var array Collction of erro messages
	*/
	public $errors;
	/*
	@var array Cetegory array CategoryID=>CategoryName contains all all category data.
	*/
	private $categories;

	public function __construct()
	{
		$this->db_connection=null;
		$this->errors=array();
		$this->categories[]=array();

	}

/*======================================
=            Categories Getter & Setter           =
======================================*/

/*==========  Get all categories  ==========*/

	public function get_all_categories(){

    if (!$this->categories=$this->db_all_categories()){
    	   var_dump($this->get_errors());
    	}
        
		return $this->categories;
	}

/*==============================================
=            DB connection function            =
==============================================*/

/*==========  Get all categories  ==========*/

	    //TODO: validate this funciton
    private function db_all_categories(){
        $this->db_connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        //change character set and verify, output error message into errors[];
        if(!$this->db_connection->set_charset("utf8")){
            $this->errors[]=$this->db_connection->error;
            return false;
            //$error returns string description of last error
        }

        $sql="select * from category_t order by CategoryName ASC";

        if (!$this->db_connection->connect_errno){
            $result_set=$this->db_connection->query($sql);
            if ($result_set=$this->db_connection->query($sql)){
            	return ($result_set->fetch_all(MYSQLI_ASSOC));

                // while($row=$result_set->fetch_array(MYSQLI_ASSOC)){
                //     echo "<option value='".$row["CategoryID"]."'>".$row["CategoryName"]."</option>";
                // }
            }
            else{
                $this->errors[]="retrieving result_set failed.";
                return false;
            }


/*            while($row=mysqli_fetch_ob($result_set)){
                echo var_dump($row);
                //echo "<option value=.'".$row["CategoryID"]."'>".$row["CategoryName"]."</option>";
            }*/

        }else{
            $this->errors[]="Database connection error.";
            return false;
        }
        $result_set->close();
        $this->db_connection->close();
    }


    /*===============================================
    =            Error handling function            =
    ===============================================*/
    private function get_errors(){
    	return $errors;
    }
}

?>