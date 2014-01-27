<?php
require_once("libraries/utilities.php");

class Postjob
{
    private $db_connection=null;
    public $errors=array();
    public $messages=array();

    public function __construct(){
        check_auth("index.php");


    }
    public function getJobCategory(){
        $this->db_connection=new mysqli(DB_HOST,DB_USER,DB_PASS,DB_NAME);

        //change character set and verify, output error message into errors[];
        if(!$this->db_connection->set_charset("utf8")){
            $this->errors[]=$this->db_connection->error;
            //$error returns string description of last error
        }

        $sql="select * from category_t order by CategoryName ASC";

        if (!$this->db_connection->connect_errno){
            $result_set=$this->db_connection->query($sql);
            while($row=mysqli_fetch_row($result_set)){
                var_dump($row); //var_dump dump information about a variable
                echo "<hr />";
            }

        }else{
            $this->errors[]="Database connection error.";
        }


    }

}
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 1/28/14
 * Time: 1:08 AM
 */



/*
 *                                  <option value='Administration'>Administration</option>
                                    <option value='Bartender'>Bartender</option>
                                    <option value='Bellhop'>Bellhop</option>
                                    <option value='NM'>Cashier</option>
                                    <option value='Customer Relation'>Customer Relation</option>
                                    <option value='Concierges'>Concierges</option>
                                    <option value="Consultant">Consultant</option>
                                    <option value='Driver'>Driver</option>
                                    <option value='Event Assistant'>Event Assistant</option>
                                    <option value='Event Planner'>Event Planner</option>
                                    <option value='Front Desk'>Front Desk</option>
                                    <option value='Gaming'>Game</option>
                                    <option value='Housekeeping'>Housekeeping</option>
                                    <option value='Hostee'>Hostee</option>
                                    <option value='Health Care'>Health Care</option>
                                    <option value='Room Service'>Room Service</option>
                                    <option value='Store'>Store</option>
                                    <option value='Kitchen Staff'>Kitchen Staff</option>
                                    <option value='Management'>Management</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Medical">Medical</option>
                                    <option value='Purchase'>Purchase</option>
                                    <option value='Sales'>Sales</option>
                                    <option value="Sports">Sports</option>
                                    <option value="Reservation">Reservation</option>
                                    <option value='Security'>Security</option>
                                    <option value='Technician'>Technician</option>
                                    <option value='Valet'>Valet</option>
 *
 *
 */
?>




