<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/User.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Comment.php");
check_auth("index.php");
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/12/14
 * Time: 8:09 PM
 */
$comment = new Comment();
$uid = $_GET['uid'];
$per_page=8;
//echo $_POST['pageLimit'];
if (isset($_POST['pageLimit']) && !empty($_POST['pageLimit'])) {
    $pageLimit = $_POST['pageLimit'];
} else {
    $pageLimit = 0;
}

$result = $comment->get_comments_by_user($uid, $pageLimit,$per_page);

$count = $result->num_rows;


$html = '';
if ($count > 0) {
    while ($row = $result->fetch_assoc()) {
        $company_name = $row['company_name'];
        $comment_datetime=$row['comment_date'];
        $rating=$row['rating'];
        $comment_content=$row['comment'];
        $html .= '<div class="bubble clearfix box-content">';
        $html .= '     <div class="text-fb box-header-small">'.$company_name;
        $html .= '         <div class="time pull-right">';
        $html .= '             <small class="date pull-right text-muted">';
        $html .= '<span class="timeago fade has-tooltip text-fb in" data-placement="top" title="'.$comment_datetime.'"></span>';
        $html .= '                 <i class="icon-time"></i>';
        $html .= '             </small>';
        $html .= '         </div>';
        $html .= '         <div class="raty" data-score="'.$rating.'"></div>';
        $html .= '     </div>';
        $html .= '     <div class="bubble-content box-content clearfix">';
        $html .= '         <div class="point"></div>';
        $html .= '          <div>';
        $html .= '             <p>';
        $html .= $comment_content;
        $html .= '            </p>';
        $html .= '         </div>';
        $html .= '    </div>';
        $html .= '</div>';
        $html .= '<hr class="fancy-line">';
    }


    $loadCount=$pageLimit+$per_page;


    if($count >= $per_page){
        $html.='<div class="load_more_link">';
        $html.='<input type="button" class="btn btn-primary" value="Load More" onclick=loadData('.$loadCount.')>';
        $html.='<span class="flash"></span></div>';
    }
    echo $html;
}
