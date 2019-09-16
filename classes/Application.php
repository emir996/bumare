<?php 

class Application 
{

	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllRecords(){
		$query = "SELECT * FROM applications ORDER BY id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getRecords(){
		$query = "SELECT applications.*, jobs.profession, jobs.interest FROM applications
					INNER JOIN jobs
					ON applications.jobs_id = jobs.id
					ORDER BY applications.id DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getSingleRecord($id){
		$query = "SELECT * FROM applications WHERE id='$id'";
		$result = $this->db->select($query);
		return $result;
	}

	public function changeStatus(){

		$value = $_POST["public"]['value'] == "true" ? 1:0;

		$id = mysqli_real_escape_string($this->db->conn, $_POST['public']['id']);
		$value = mysqli_real_escape_string($this->db->conn, $value);

		$query = "UPDATE applications SET is_public='$value' WHERE id ='$id'";
		$statusChanged = $this->db->update($query);
	}

	public function insertApplication(){

		$name = mysqli_real_escape_string($this->db->conn, $_POST['name']);
		$email = mysqli_real_escape_string($this->db->conn, $_POST['email']);
		$job_id = mysqli_real_escape_string($this->db->conn, $_POST['job_id']);


		$file_name = $_FILES['filedoc']['name'];
		$file_size = $_FILES['filedoc']['size'];
		$file_temp = $_FILES['filedoc']['tmp_name'];

		$div = explode(".", $file_name);
		$ext = strtolower(end($div));

		$allowed_type = array('pdf','docx','doc');

		$unique_name = substr(md5(time()),0, 10) .'.'. $ext;

		$destination = "../../upload/" . $unique_name;

		if($file_size > 1000000){
			$msg = "File too large";
			exit($msg);
		} else if(!in_array($ext, $allowed_type)){
			$msg = "You can only upload this file ".implode(",",$allowed_type);
			exit($msg);
		} else {

			$secretKey = "6LcVOq8UAAAAANPjkvMl3HeTciC4z0qyxM-4zUNo";
			$responseKey = $_POST['g-recaptcha-response'];
			$userIP = $_SERVER['REMOTE_ADDR'];
			$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";

			$res = file_get_contents($url);
			$res = json_decode($res);

			if($res->success){

			move_uploaded_file($file_temp, $destination);
			$query = "INSERT INTO applications (name, email, filedoc_name, filedoc_size, downloads, jobs_id) VALUES ('$name','$email','$unique_name','$file_size', 0, '$job_id')";
			$inserted_row = $this->db->insert($query);

				if($inserted_row){
					$msg = "Your application successfully sent";
					exit($msg);
				} else {
					$msg = "Something went wrong, try again";
					exit($msg);
				}

			} else {
				$msg = "You have to finish recapcha survey";
				exit($msg);
			}
		}
		
	}

	public function delApplication(){
		$id = $_GET['delapp'];
		$query = "SELECT * FROM applications WHERE id='$id'";
		$getAppData = $this->db->select($query);

		if($getAppData){
			while($del_file = $getAppData->fetch_assoc()){
				$del_link = "../../upload/" . $del_file['filedoc_name'];
				unlink($del_link);
			}
		}

		$delquery = "DELETE FROM applications WHERE id='$id'";
		$deleted_app = $this->db->delete($delquery);
	}
		
}