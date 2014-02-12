<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/User.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Comment.php");


check_auth("index.php");
//Declare variables

$company_id = $_SESSION["company_id"];
$uid = "";
$imgurl = "";
$userdetails = "";
$totalExp = "";


// ===================== //
if (isset($_GET['uid']) && !empty($_GET['uid'])) {
    $uid = $_GET['uid'];
    get_details($uid, $imgurl, $userdetails, $totalExp);

}



function get_details(&$uid, &$imgurl, &$userdetails, &$totalExp)
{
    $imageurl = "avatar/" . $uid . "x.jpg";

    if (!file_exists($imageurl)) {
        $imageurl = "../avatar/default.jpg";
    }

    $user = new User();
    $userdetails = $user->get_user_by_id($uid);

    $experience_string = $userdetails['TotalExp'];
    $totalExp = convertToHoursMins($experience_string, '%d hours %02d minutes');
}




