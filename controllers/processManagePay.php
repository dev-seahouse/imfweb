<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/9/14
 * Time: 2:56 AM
 */
check_auth("index.php");

function display_pay_data(){
    $company_id = $_SESSION['company_id'];
}