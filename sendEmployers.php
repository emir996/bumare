<?php 

error_reporting(E_ALL);
ini_set('display_errors', 1);
header_remove(); 
header('Access-Control-Allow-Origin: *');

include 'config/config.php';

$send_email = new Email();

if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$sendEmail = $send_email->sendToEmployer();
}

	if(isset($sendEmail)){

		echo $sendEmail;
	}