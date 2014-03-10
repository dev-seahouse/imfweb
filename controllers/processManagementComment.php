<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Comment.php");

check_auth("index.php");
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/15/14
 * Time: 7:14 PM
 */

$company_id = $_SESSION['company_id'];
$company_name = $_SESSION['company_name'];
if (!empty($_POST) && isset($_POST['display_comment'])) {
    display_comments($company_id);
}
if (!empty($_POST) && isset($_POST['add_comment'])) {
    $jobapp_id=$_POST["jobapp_id"];
    $user_id=$_POST["user_id"];
    $user_name=$_POST["user_name"];
    $comment_content=$_POST["comment_content"];
    $rating=$_POST["rating"];
    $comment = new Comment();
    echo $comment->add_comment($company_id,$company_name,$rating,$comment_content,$jobapp_id,$user_id);

}
if (!empty($_POST) && isset($_POST['update_comment'])) {
    $jobapp_id=$_POST["jobapp_id"];
    $comment_content=$_POST["comment_content"];
    $rating=$_POST["rating"];
    $comment = new Comment();
    echo $comment->update_comment($company_id,$rating,$comment_content,$jobapp_id);
}


function display_comments($company_id)
{
    $comments = new Comment();
    $result_set = $comments->get_all_comments($company_id);
    $tbody_data = "";
    while ($row = $result_set->fetch_assoc()) {
        $comment_null = empty($row['comment']);
        $tbody_data .= '<tr>';
        $tbody_data .= '  <td class="td_user_name"><a class="badge" href="viewuser.php?uid='.$row["user_id"].'" target="_blank">' . $row["username"] . '</a></td>';
        $tbody_data .= '  <td>' . $row["NRIC"] . '</td>';
        if (!$comment_null) {
            $tbody_data .= '  <td>' . $row["comment_date"] . '</td>';
            $tbody_data .= '  <td>' . $row["comment_time"] . '</td>';
            $tbody_data .= '  <td><div class="raty" data-score=' . $row["rating"] . '></div></td>';
        } else {
            $tbody_data .= '  <td class="text-red">Nill</td>';
            $tbody_data .= '  <td class="text-red">Nill</td>';
            $tbody_data .= '  <td class="text-red">No Rating</td>';
        }
        if (!$comment_null) {
            $comment_content=$row['comment'];
            $comment_cutoff=substr($comment_content,0,15);
            $comment_cutoff.="...";
            $tbody_data .= '  <td class="has-popover td_comment"  data-content="'. $comment_content .'" data-comment="'. $comment_content. '">' .$comment_cutoff. '</td>';
            $tbody_data .= '  <td><button class="btn btn-sm contrast btn-edit-comment"  data-jobapp_id="' . $row["jobapp_id"] . '" >Edit</button></td>';
        } else {
            $tbody_data .= '  <td class="text-red">No comment</td>';
            $tbody_data .= '  <td><button class="btn btn-sm contrast btn-add-comment" data-jobapp_id="' . $row["jobapp_id"] . '" data-userid="'.$row["user_id"] .'">Add</button></td>';
        }

        $tbody_data .= '</tr>';

    }
    echo $tbody_data;

}





