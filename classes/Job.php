<?php 

class Job {

	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}


	public function getAllResults(){
		$query = "SELECT * FROM jobs";
		$result = $this->db->select($query);
		return $result;
	}

	public function getLimitedRecords($start, $limit){
		$query = "SELECT * FROM jobs LIMIT $start, $limit";
		$result = $this->db->select($query);
		return $result;
	}

	public function getSingleRecord($rowId){
		$query = "SELECT * FROM jobs WHERE id = '$rowId'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getNumberRows(){
		$query = "SELECT * FROM jobs";
		$result = $this->db->select($query);
		
	}

	public function checkAndInsertRecord(){

		$profession = mysqli_real_escape_string($this->db->conn, $_POST['profession']);
		$interest = mysqli_real_escape_string($this->db->conn, $_POST['interest']);
		$description = mysqli_real_escape_string($this->db->conn, $_POST['description']);

		$profession = $this->fm->validation($profession);
		$interest = $this->fm->validation($interest);
		$description = $this->fm->validation($description);

		if(empty($profession) || empty($interest) || empty($description)){
			$msg = "Fields must not be empty!";
			exit($msg);
		} else {

		$chkquery = "SELECT id FROM jobs WHERE profession='$profession' AND interest='$interest'";
		$result = $this->db->select($chkquery);
		
		if($result){
			$msg = 'This Job Already Exist!';
			exit($msg);
		} else {
			$query = "INSERT INTO jobs (profession,interest,description) VALUES ('$profession','$interest','$description')";
			$create_job = $this->db->insert($query);

			if($create_job){
				$msg = 'Job Posted Successfully.';
				exit($msg);
			}

		}
	}

}

	public function updateRecord(){
		$rowId = mysqli_real_escape_string($this->db->conn, $_POST['rowId']);
		$profession = mysqli_real_escape_string($this->db->conn, $_POST['profession']);
		$interest = mysqli_real_escape_string($this->db->conn, $_POST['interest']);
		$description = mysqli_real_escape_string($this->db->conn, $_POST['description']);

		$profession = $this->fm->validation($profession);
		$interest = $this->fm->validation($interest);
		$description = $this->fm->validation($description);

		

		$query = "UPDATE jobs SET profession='$profession', interest='$interest', description='$description' WHERE id = '$rowId'";
		$update_row = $this->db->update($query);

		if($update_row){
			$msg = "Job Updated Successfully";
			exit($msg);
		}
	}

	public function deleteRecord(){

		$del_id = $_GET['deljob'];
		$query = "DELETE FROM jobs WHERE id='$del_id'";
		$del_result = $this->db->delete($query);
	}

}
