<?php
require_once("libraries/utilities.php");
require_once("classes/JobCategory.php");
class Postjob
{
    
    // public $errors=array();
    // public $messages=array();

    public function __construct(){
        check_auth("index.php");
    }
    public function populate_jobcategory(){
        $jobCategory=new JobCategory();
        $categories=$jobCategory->get_all_categories();
        foreach ($categories as $row) {
            echo "<option value='".$row["CategoryID"]."'>".$row["CategoryName"]."</option>\n";
        }
        //var_dump($categories);
        

    }


}

?>




