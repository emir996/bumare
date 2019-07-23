<?php 
require_once 'config/config.php';
$app = new Application();
$job = new Job();

//if($_FILES['filedoc']['name'] != '' && $_POST['name'] != '' && $_POST['email'] != '')
if(isset($_FILES['filedoc']['name']) && isset($_POST['name']) && isset($_POST['email']))
{
	if($_FILES['filedoc']['name'] != '' && $_POST['name'] != '' && $_POST['email'] != ''){


		$insert_app = $app->insertApplication();
	}
	else 
	{
		$msg = "Fields must not be empty!";
		exit($msg);
	}
} 