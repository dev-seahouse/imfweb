<?php
    require_once('../libraries/password_compatibility_library.php');
    require_once('../libraries/utilities.php');
    require_once("../config/db.php");
    require_once("../classes/Login.php");


    $login=new Login();
    //var_dump($_SESSION);
    //var_dump($_POST);
    if ($login->isUserLoggedIn()==true){
        redirect_to("../user_profile.html"); 	
    }elseif ($login->errors) {
        redirect_to("../index.html");
        foreach ($login->errors as $error) {
            echo $error;
        }
    }else{
        redirect_to("../index.html");
    }

 ?>