<?php
// API access key from Google API's Console
define( 'API_ACCESS_KEY', 'AIzaSyBHQcwr3aVGVNukW50vSXHj-6pzR1mZTtc' );
 
$registrationIds = array( "APA91bHegMnzV_9qtFBpwP00MdLIdSFnYVbxfg_m9Jq7QUdQiBxVEZ0LgYs87525hXkuNo6Dpj7xnKHIGEWOl7JEJeZALc_iIgjvjU5TpSrS9fKj0trwdPH-UcFCUuNntIlLvYhNxsQlu6bfXf02YlYwSJZPcP0CRg" 
);
 
// prep the bundle
$msg = array
(
	'title'		=> 'Job Cancellation Notice',
    	'message' 	=> 'An applied job have been cancelled!',
	'vibrate'	=> 1,
	'sound'		=> 1,
	'msgcnt'	=> 5
);
 
$fields = array
(
	'registration_ids' 	=> $registrationIds,
	'data'			=> $msg
);
 
$headers = array
(
	'Authorization: key=' . API_ACCESS_KEY,
	'Content-Type: application/json'
);
 
$ch = curl_init();
curl_setopt( $ch,CURLOPT_URL, 'https://android.googleapis.com/gcm/send' );
curl_setopt( $ch,CURLOPT_POST, true );
curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
$result = curl_exec($ch );
curl_close( $ch );
 
echo $result;
?>