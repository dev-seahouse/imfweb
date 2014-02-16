<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/JobCategory.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/JobScope.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Job.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");

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
 * TODO:
 * - This entire section to handle post actions
 * should have been in another some handler class,i think.
 **/
/*==========  Handle populate dropdown request  ==========*/

if (isset($_POST["getScopes"])) {
    if (isset($_POST["categoryID"])) {
        $category_id = $_POST["categoryID"];
        $jobScope = new JobScope();
        $scopes = $jobScope->get_scopes_by_id($category_id);
        echo json_encode($scopes);
    }
}

/*==========  Detect new job  ==========*/

/**
 *
 * TODO:
 * - Complete the validations below.
 **/

if (isset($_POST["post_new_job"]) == 1) {
    if (empty($_POST["job_cat_id"])) {
        echo "No category ID selected";
    } elseif (empty($_POST['job_scope_id'])) {
        echo "No Scope ID selected";
    } else {
        /*==========  creating new job object  ==========*/
        $company_id = $_SESSION['company_id'];
        $job_cat_id = $_POST['job_cat_id'];
        $job_scope_id = $_POST['job_scope_id'];
        $job_date = $_POST['job_date'];
        $job_start_time = $_POST['job_start_time'];
        $job_end_time = $_POST['job_end_time'];
        $vacancy = $_POST['vacancy'];
        $standard_pay = $_POST['standard_pay'];
        $min_exp_hours = $_POST['min_exp_hours'];
        $bonus_pay = $_POST['bonus_pay'];
        $job_requirement = $_POST['job_requirement'];
        //echo $job_start_time;


        $job = new Job();

        $job->create_job($company_id, $job_cat_id, $job_scope_id, $job_date, $job_start_time, $job_end_time, $vacancy, $standard_pay, $min_exp_hours, $bonus_pay, $job_requirement);
        if (isset($job)) {
            if ($job->errors) {
                echo "errors";
            } else {
                echo "success";
            }
        }

    }
}


/*=============================================
=            All display functions            =
=============================================*/

function populate_jobcategory()
{
    $jobCategory = new JobCategory();
    // run this only when categories data are not cached to reduce query.
    if (!isset($categories)) {
        $categories = $jobCategory->get_all_categories();
    }
    foreach ($categories as $row) {
        echo "<option value='" . $row["CategoryID"] . "'>" . $row["CategoryName"] . "</option>";
    }
    //var_dump($categories);
}

?>




