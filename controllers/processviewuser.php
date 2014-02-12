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
$comments;


// ===================== //
if (isset($_GET['uid']) && !empty($_GET['uid'])) {
    $uid = $_GET['uid'];
    get_details($uid, $imgurl, $userdetails, $totalExp);

}


$comment = new Comment();
if (isset($_POST['pageLimit']) && !empty($_POST['pageLimit'])) {
    $pageLimit = $_POST['pageLimit'];
} else {
    $pageLimit = '0';
}
$result = $comment->get_comments_by_user($uid, $pageLimit);
$count = $result->num_rows;
$HTML = '';
if ($count > 0) {
    while ($row = $result->fetch_assoc()) {
        $company_name = $row['company_name'];
        $html = '<div class="bubble clearfix box-content">';
        $html .= '     <div class="text-fb box-header-small">Regent Hotel';
        $html .= '         <div class="time pull-right">';
        $html .= '             <small class="date pull-right text-muted">';
        $html .= '                 <span class="timeago fade has-tooltip" data-placement="top"';
        $html .= '                       title="2013-09-15 17:33:35 +0200"></span>';
        $html .= '                 <i class="icon-time"></i>';
        $html .= '             </small>';
        $html .= '         </div>';
        $html .= '         <div class="raty" data-score="4"></div>';
        $html .= '     </div>';
        $html .= '     <div class="bubble-content box-content clearfix">';
        $html .= '         <div class="point"></div>';
        $html .= '          <div>';
        $html .= '             <p>This is a very long soemthin dfd test test setes ests et ste tse';
        $html .= '                        tset set set set set set set set set set set set set set set set';
        $html .= '                 set set est set est est es tse tse t tes t set t es </p>';
        $html .= '         </div>';
        $html .= '    </div>';
        $html .= '</div>';
        $html .= '<hr class="fancy-line">';
    }

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




