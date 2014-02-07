<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");

/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/8/14
 * Time: 4:01 AM
 */
check_auth("index.php");

if (isset($_POST['check_out']) && isset($_POST['app_id'])){

    $applicant = new Applicant();
    $applicant->update_check_out($_POST['app_id']);
    echo "this shows it is success";

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
        $tbody_data .= '            <input type="checkbox" name="attendance" onClick="updateCheckIn(' . $row['JobAppID'] . ')" />';
        $tbody_data .= '        </div>';
        $tbody_data .= '    </td>';
        $tbody_data .= '</tr>';
    }
    echo $tbody_data;


}