<?php
require_once($_SERVER["DOCUMENT_ROOT"]."/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/imfweb/classes/JobCategory.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/imfweb/classes/JobScope.php");
require_once($_SERVER["DOCUMENT_ROOT"]."/imfweb/config/db.php");
/*========================================================================
  =            All postjob presentational controllers here            =
  ========================================================================*/

    // public $errors=array();
    // public $messages=array();

  // check authentication
  check_auth("index.php");

  /*===============================================
  =            Detect post submissions            =
  ===============================================*/
  /**
      TODO:
      - This entire section to handle post actions
      should have been in another some handler class,i think.
  **/

  if (isset($_POST["getScopes"])){
    if (isset($_POST["categoryID"])){
        $category_id=$_POST["categoryID"];
        $jobScope=new JobScope();
        $scopes=$jobScope->get_scopes_by_id($category_id);
        var_dump(json_encode($scopes));
        
    }
  }

  /*=============================================
  =            All display functions            =
  =============================================*/
  
  function populate_jobcategory(){
    $jobCategory=new JobCategory();
    // run this only when categories data are not cached to reduce query.
    if (!isset($categories)){
        $categories=$jobCategory->get_all_categories();
    }
    foreach ($categories as $row) {
        echo "<option value='".$row["CategoryID"]."'>".$row["CategoryName"]."</option>\n";
    }
        //var_dump($categories);
}

?>




