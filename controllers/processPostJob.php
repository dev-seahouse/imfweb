<?php
require_once("libraries/utilities.php");
require_once("classes/JobCategory.php");
/*========================================================================
  =            All postjob presentational controllers here            =
  ========================================================================*/

    // public $errors=array();
    // public $messages=array();

     check_auth("index.php");
     
     
     function populate_jobcategory(){
        $jobCategory=new JobCategory();
        $categories=$jobCategory->get_all_categories();
        foreach ($categories as $row) {
            echo "<option value='".$row["CategoryID"]."'>".$row["CategoryName"]."</option>\n";
        }
        //var_dump($categories);
    }

    function populate_jobscope(){
        
    }
?>




