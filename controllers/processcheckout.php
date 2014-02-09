<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Pay.php");

/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/8/14
 * Time: 4:01 AM
 */
check_auth("index.php");

if (isset($_POST['check_out']) && isset($_POST['app_id'])){
//Define variables
    $check_in="";
    $check_out="";
    $std_rate="";
    $prem_rate="";
    $eligibility="";
    // Eligibility for premium pay rate ia always determined by experience before updating job rather than
    // taking new experience into account.
    $prev_total_exp=$_POST['total_exp']; // int in minutes

    $applicant = new Applicant();
    $applicant->update_check_out($_POST['app_id']);

    $pay=new Pay();

    $result_set=$pay->get_pay_data_by_appid($_POST['app_id']);
    while($row=$result_set->fetch_assoc()){
        $check_in=$row['CheckIn'];
        $check_out=$row['CheckOut'];
        $std_rate=$row['JobRate'];//varchar rate/hour
        $prem_rate=$row['JobEBR'];//varchar rate/hour
        $eligibility=$row['JobMinEBRHours'];//varchar in hours
    }

    $pay_result=$pay->calculate_pay($check_in,$check_out,$std_rate,$prem_rate,$eligibility,$prev_total_exp,$_POST['app_id']);










    //To get the checkout-time in database, we have to update it first.





}

function display_checkout_data()
{
    $company_id = $_SESSION['company_id'];
    $applicant = new Applicant();
    $result_set = $applicant->get_check_out_data($company_id);

    $tbody_data = "";
    while ($row = $result_set->fetch_array(MYSQL_ASSOC)) {
        $tbody_data .= '<tr>';
        $tbody_data .= '    <td>' . $row['Name'] . '</td>';
        $tbody_data .= '    <td>' . $row['NRIC'] . '</td>';
        $tbody_data .= '    <td>' . $row['ScopeName'] . '</td>';
        $tbody_data .= '    <td>' . date("d M Y", strtotime($row['JobDate'])) . '</td>';
        $tbody_data .= '    <td>' . date("h:i A", strtotime($row['JobStartTime'])) . '</td>';
        $tbody_data .= '    <td>' . date("h:i A", strtotime($row['JobEndTime'])) . '</td>';
        $tbody_data .= '    <td>' . $row['MobileNo'] . '</td>';
        $tbody_data .= '    <td>' . date("h:i A", strtotime($row['CheckIn'])) . '</td>';
        $tbody_data .= '    <td>';
        $tbody_data .= '        <div class="text-center">';
        $tbody_data .= '            <input type="checkbox" name="attendance" onClick="updateCheckOut(' . $row['JobAppID'] .','.$row['TotalExp'] .')" />';
        $tbody_data .= '        </div>';
        $tbody_data .= '    </td>';
        $tbody_data .= '</tr>';
    }
    echo $tbody_data;


}