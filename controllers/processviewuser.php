<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/User.php");


check_auth("index.php");
//Declare variables

$company_id=$_SESSION["company_id"];
$company_name=$_SESSION["company_name"];
$uid="";
// ===================== //
if (isset($_GET['uid']) && !empty($_GET['uid'])) {
    $uid = $_GET['uid'];
    display_details($uid);
}

function display_details($uid)
{
    $imageurl = "../avatar" . $uid . "x.jpg";
    if (!file_exists($imageurl)) {
        $imageurl = "../avatar/default.jpg";
    }

    $user=new User();
    $result_set=$user->get_user_by_id($uid);





}


