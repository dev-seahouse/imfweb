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

function convertToHoursMins($time, $format = '%d:%d') {
    settype($time, 'integer');
    if ($time < 1) {
        return;
    }
    $hours = floor($time / 60);
    $minutes = ($time % 60);
    return sprintf($format, $hours, $minutes);
}

?>