<?php
    require_once('../libraries/password_compatibility_library.php');
    require_once("../config/db.php");
    require_once("../classes/Login.php");

    $login=new Login();
    var_dump($_SESSION);
    var_dump($_POST);
    if ($login->isUserLoggedIn()==true){

    	echo ("logged in");

    }
        if ($login->errors) {
        foreach ($login->errors as $error) {
            echo $error;
        }
    }

 ?>