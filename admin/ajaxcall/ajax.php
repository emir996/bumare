<?php 

require_once '../../config/config.php';
$job = new Job();
$fm = new Format();
$db = new Database();
$conn = $db->conn;


if(isset($_POST['key'])){


	if($_POST['key'] == 'getExistingData'){
		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$getAllJobs = $job->getAllRecords($start, $limit);

		$response = '';

		if($getAllJobs){
			while($data = $getAllJobs->fetch_assoc()){
				$response .= '
					<li class="list-group-item justify-content-between">
		    			<h5 id="profession_'.$data["id"].'"><span>Profession: </span>'.$data["profession"].'</h5>
		    			<p id="interest_'.$data["id"].'"><span>Interest: </span>'.$data["interest"].'</p>
		    			<div class="job_btn">
			    			<button type="submit" name="job_edit" onclick="edit('.$data["id"].')" class="job_btn btn-warning"><i class="fa fa-edit"></i></button>
			    			<a href="?deljob='.$data["id"].'"><button type="submit" onclick="return check(); name="job_delete" class="job_btn btn-danger"><i class="fa fa-trash"></i></button></a>
		    			</div>
		    		</li>
				';
			}
			exit($response);
		} else {
			exit('reachedMax');
		}
	}

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
}
