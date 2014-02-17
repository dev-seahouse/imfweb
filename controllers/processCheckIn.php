<?php
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/libraries/utilities.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/config/db.php");
require_once($_SERVER["DOCUMENT_ROOT"] . "/imfweb/classes/Applicant.php");
/**
 * Created by PhpStorm.
 * User: kenan
 * Date: 2/7/14
 * Time: 3:25 AM
 */
check_auth("index.php");

if (isset($_POST['check_in']) && isset($_POST['app_id'])){

    $applicant = new Applicant();
    $applicant->update_check_in($_POST['app_id']);

}




function display_checkin_data()
{
    $company_id = $_SESSION['company_id'];
    $applicant = new Applicant();
    $result_set = $applicant->get_check_in_data($company_id);


    $tbody_data = "";
    while ($row = $result_set->fetch_array(MYSQL_ASSOC)) {
        $tbody_data .= '<tr>';
        $tbody_data .= '    <td><a class="badge" href="viewuser.php?uid='.$row['user_id'] .'" target="_blank">' . $row['Name'] . '</a></td>';
        $tbody_data .= '    <td>' . $row['NRIC'] . '</td>';
        $tbody_data .= '    <td>' . $row['MobileNo'] . '</td>';
        $tbody_data .= '    <td>' . $row['ScopeName'] . '</td>';
        $tbody_data .= '    <td>' . date("d M Y", strtotime($row['JobDate'])) . '</td>';
        $tbody_data .= '    <td>' . date("h:i A", strtotime($row['JobStartTime'])) . '</td>';
        $tbody_data .= '    <td>' . date("h:i A", strtotime($row['JobEndTime'])) . '</td>';
        $tbody_data .= '    <td>';
        $tbody_data .= '        <div class="text-center">';
        $tbody_data .= '<input type="checkbox" class="checkbox-inline" name="attendance" onClick="updateCheckIn(' . $row['JobAppID'] . ',\''.$row['Name'].'\')" />';
        $tbody_data .= '        </div>';
        $tbody_data .= '    </td>';
        $tbody_data .= '</tr>';
    }
    echo $tbody_data;


}

?>
