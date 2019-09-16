<?php 

require_once '../../config/config.php';
$job = new Job();
$profile = new Profile();
$app = new Application();
$fm = new Format();
$db = new Database();
//$conn = $db->conn;


if(isset($_POST['key'])){

	if($_POST['key'] == 'getRowData'){
		$rowId = $_POST['rowId'];
		$getSingleJob = $job->getSingleRecord($rowId)->fetch_assoc();
		
		$jsonArray = array(
			'profession' => $getSingleJob['profession'],
			'interest' => $getSingleJob['interest'],
			'description' => $getSingleJob['description']
		);

		exit(json_encode($jsonArray));
	}

	

	if($_POST['key'] == 'updateRow'){

		$updateJob = $job->updateRecord();

		if(isset($updateJob)){
			echo $updateJob;
		}

	}

	if($_POST['key'] == 'add_new') {

		$check_and_insert_job = $job->checkAndInsertRecord();

		if(isset($check_and_insert_job)){
			echo $check_and_insert_job;
		}
	}

	if(isset($_POST['key']) == 'addProfile'){
		$insert_profile = $profile->insertProfile();

		if(isset($insert_profile))
		{
			echo $insert_profile;
		}
	}

	/*if($_POST['key'] == 'add_profile'){

		$p_name = $_POST['p_name'];
			$p_email = $_POST['p_email'];
			$p_description = $_POST['p_description'];
			$p_checkbox = $_POST['p_checkbox'] == "true" ? 1 : 0;
			$p_file_name = $_FILES['p_file']['name'];

			$parsed = explode(".",$p_file_name);
			$ext = strtolower(end($parsed));
				
			$unique_name = substr(md5(time()),0,7).".".$ext;
			$destination = "../../upload/" . $unique_name;

			move_uploaded_file($_FILES['p_file']['tmp_name'], $destination);
			$sql = "INSERT INTO profiles (name, email, description, cv_file_name, is_public) VALUES ('$p_name','$p_email','$p_description','$unique_name','$p_checkbox')";
			$inserted_profile = $db->insert($sql);

			if($inserted_profile){
				$msg = "Profile Created.";
				exit($msg);
			}
	}*/

}
	
	/*if(isset($_POST['p_id'])){

		$p_id = $_POST['p_id'];
		$p_name = $_POST['p_name'];
		$p_email = $_POST['p_email'];
		$p_profession = $_POST['p_profession'];
		$p_interest = $_POST['p_interest'];
		$p_description = $_POST['p_description'];
		//$p_file = $_FILES['p_file']['name'];

		$query = "UPDATE profiles SET name='$p_name', email='$p_email', description='$p_description', profession='$p_profession', interest='$p_interest' WHERE id = '$p_id'";
		$result = mysqli_query($db->conn, $query);
		if($result){
			return 'Data Updated';
		}
	}*/
	
	
		if(isset($_FILES['filedoc']['name']) && isset($_POST['name']) && isset($_POST['email']))
		{
			if($_FILES['filedoc']['name'] != '' || $_POST['name'] != '' || $_POST['email'] != '')
			{
			$insert_app = $app->insertApplication();
			}
			else 
			{
				$msg = "Fields must not be empty!";
				exit($msg);
			}
		}
	
	
	
		if(isset($_FILES['p_file']['name']) && isset($_POST['p_name']) && isset($_POST['p_email']) && isset($_POST['p_description']) && isset($_POST['p_profession']) && isset($_POST['p_interest']))
		{
			if($_FILES['p_file']['name'] != '' || $_POST['p_name'] != '' || $_POST['p_email'] != '' || $_POST['p_description'] != '' || $_POST['p_profession'] != '' || $_POST['p_interest'] != '' || is_numeric($_POST['p_checkbox']))
			{

				if(isset($_POST['p_id']))
				{
					if(empty($_POST['p_id'])){
						//exit("you will insert something");
						$insert_profile = $profile->insertProfile();
					} else {
						//exit("you will update something " . $_FILES['p_file']['name']);
						$update_profile = $profile->updateProfile();
					}
				}

			}
		}

		/*if(isset($_POST['p_id'])){
			$p_id = $_POST['p_id'];
			$p_name = $_POST['p_name'];
			var_dump($p_name);
			$p_email = $_POST['p_email'];
			$p_description = $_POST['p_description'];
			$p_file = $_FILES['p_file']['name'];
			var_dump($p_file);
			$p_profession = $_POST['p_profession'];
			$p_interest = $_POST['p_interest'];
			$p_description = $_POST['p_description'];

			$query = "UPDATE profiles SET name='$p_name', email='$p_email', description='$p_description', profession='$p_profession',interest='$p_interest' WHERE id = '$p_id'";
			$update_record = mysqli_query($db->conn, $query);

			if($update_record){
				$msg = "Data Updated";
				exit($msg);
			}
		}*/
		
	


