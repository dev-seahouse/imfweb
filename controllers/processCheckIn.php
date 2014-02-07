<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/7/14
 * Time: 3:25 AM
 */
check_auth("index.php");

if (!empty($_POST) && isset($_POST['check_in'])){
    if (isset($_POST['app_id'])){
        $app_id=$_POST['app_id'];
        $job_id="";



    }
}