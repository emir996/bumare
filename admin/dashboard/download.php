<?php 

require_once '../../config/config.php';
$app = new Application();
$profile = new Profile();
$db = new Database();

if(isset($_GET['file_id'])){
	//echo "<script>window.location='jobs.php';</script>";
	$id = $_GET['file_id'];

	$getSingleData = $app->getSingleRecord($id)->fetch_assoc();
	$file_path = "../../upload/" . $getSingleData['filedoc_name'];


	if(file_exists($file_path)){

		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . basename($file_path));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_path));
		@readfile($file_path);

		$newCount = $getSingleData['downloads'] + 1;
		$updateCountQuery = "UPDATE applications SET downloads='$newCount' WHERE id='$id'";
		mysqli_query($db->conn, $updateCountQuery);
		exit;

	}
}
if(isset($_GET['profile_id'])){
	//echo "<script>window.location='public_cv.php';</script>";
	$id = $_GET['profile_id'];

	$getProfileRecord = $profile->getSingleRecord($id)->fetch_assoc();
	$file_path = "../../upload/" . $getProfileRecord["cv_file_name"];

	if(file_exists($file_path)){
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename=' . basename($file_path));
		header('Expires: 0');
		header('Cache-Control: must-revalidate');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file_path));
		@readfile($file_path);
	}
}

if(!isset($_GET['file_id']) || !isset($_GET['profile_id'])){
	echo "<script>window.location='index.php';</script>";
}








