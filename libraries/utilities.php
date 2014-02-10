<?php
//redirect function
function redirect_to($new_location)
{
    header("Location:" . $new_location);
    exit;
}

;


function check_auth($redirect)
{
    session_start();
    if (isset($_SESSION["user_login_status"]) AND $_SESSION["user_login_status"] == 1) {
        return true;
    } else {
        if ($redirect) {
            redirect_to($redirect);
        };
    }
    return false;
}

function convertToHoursMins($time, $format = '%d hours %2d minutes') {

    settype($time, 'integer');
    if ($time < 1) {
        return 0;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    if (!empty($hours)){
        return sprintf($format, $hours, $minutes);
    }else{
        $format="%2d minutes";
        return sprintf($format,$minutes);
    }

}

function get_time_interval_decimal($in,$out){
    $datetime1 = new DateTime($in);
    $datetime2 = new DateTime($out);
    $interval = $datetime1->diff($datetime2);
    $hours=$interval->days*24;
    $hours+=$interval->h;
    $hours+=$interval->i/60;
    return $hours;
}
function get_time_interval_hours_minutes($in,$out){
    $datetime1 = new DateTime($in);
    $datetime2 = new DateTime($out);
    $interval = $datetime1->diff($datetime2);
    $minutes=$interval->days*24*60;
    $minutes+=$interval->h*60;
    $minutes+=$interval->i;
    return convertToHoursMins($minutes,"%dh %2dm");

}

?>