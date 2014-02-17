<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Pay.php");
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/9/14
 * Time: 2:56 AM
 */
check_auth("index.php");

function display_pay_data(){
    $company_id = $_SESSION['company_id'];
    $pay=new Pay();
    $result_set=$pay->get_all_pay_data($company_id);
    date_default_timezone_set("Asia/Singapore");
    $tbody_data = "";
    foreach($result_set as $row){
        $planned_hours=convertToHoursMins($row['JobEstHours'],"%dh %2dm");
        $actual_hours=get_time_interval_hours_minutes( $row['CheckIn'],$row['CheckOut']);
        $tbody_data.='<tr>';
        $tbody_data .= '    <td>' . date("d M Y", strtotime($row['JobDate'])) . '</td>';
        $tbody_data .= '    <td><a class="badge" href="viewuser.php?uid='.$row['UserID'] .'" target="_blank">' . $row['Name'] . '</a></td>';
        $tbody_data .= '    <td>' . $row['NRIC'] . '</td>';
        $tbody_data .= '    <td>' . $row['MobileNo'] . '</td>';
        $tbody_data .= '    <td>' . $row['ScopeName'] . '</td>';
        $tbody_data .= '    <td>' . $planned_hours . '</td>';
        $tbody_data .= '    <td>' . $actual_hours . '</td>';
        $tbody_data .= '    <td><span class="text-error">' . $row['Pay'] . '</span></td>';
        $tbody_data.='</tr>';
    };
    echo $tbody_data;
}