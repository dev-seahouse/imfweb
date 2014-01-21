<?php
    require_once("libraries/password_compatibility_library_php");
    require_once("config/db.php");
    require_once("classes/Login.php")

    $login=new Login();
    if ($login->isUserLoggedIn()==true){
    	header("Location: user_profile.html");
		exit;

    }
    else{
    	header("Location: index.html");
		exit;
    }
 ?>