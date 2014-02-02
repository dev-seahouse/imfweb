<?php
require_once('../libraries/password_compatibility_library.php');
require_once('../libraries/utilities.php');
require_once("../config/db.php");
require_once("../classes/Login.php");

/*===============================
=            Handle display login error /sucess etc  =
===============================*/

$login = new Login();
//var_dump($_SESSION);
//var_dump($_POST);
if ($login->isUserLoggedIn() == true) {
    echo "success";
    //redirect_to("../user_profile.php");
} elseif ($login->errors) {
    //redirect_to("../index.php");
    foreach ($login->errors as $error) {
        echo $error;
    }
} elseif ($login->messages) {
    foreach ($login->messages as $message) {
        echo $message;
    }
}
?>