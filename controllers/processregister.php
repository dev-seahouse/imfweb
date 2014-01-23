<?php
    require_once('../libraries/password_compatibility_library.php');
    require_once('../libraries/utilities.php');
    require_once("../config/db.php");
    require_once("../classes/Registration.php");

    $registration = new Registration();
    //var_dump($registration);
    if (isset($registration)){
    	if ($registration->errors){
    		foreach($registration->errors as $error){
    			//echo $error;
                echo json_encode($error);
    		}
    	}
    }
    



?>