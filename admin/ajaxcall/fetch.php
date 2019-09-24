<?php

	require_once '../../config/config.php';

	$lang = new Language();
	$job = new Job();
	$fm = new Format();
	$app = new Application();
	$profile = new Profile();
	$db = new Database();
	$conn = $db->conn;


	if(isset($_POST['key'])){

		if($_POST['key'] == 'getTableData'){

			$getLanguage = $lang->getAllLang();

			$output = '';

			if($getLanguage){
				$i=0;
				while($rw = $getLanguage->fetch_assoc()){
					$i++;
					$output .= '
						<tr class="text-center" data-language="'.strtolower($rw['language']).'">

						    <td> '.$i.' </td>
						    <td> '.$rw['array_key'].' </td>
						    <td> '.$rw['language'].' </td>
						    <td> '.$rw['array_value'].' </td>
						    
						    <div class="buttons">
						    	<td><button type="button" onclick="showText('.$rw["id"].',\''.$rw["array_value"].'\')" class="btn edit"><i class="fa fa-edit"></i></button></td>
						    	<td><a href="?dellang= '.$rw['id'].'" onclick="return check();"><button class="btn del"><i class="fa fa-trash"></i></button></a></td>
						    </div>

						</tr>';	
				}
				exit($output);
			} else {
				exit('reached_max');
			} 
	}

	if($_POST['key'] == 'getExistingData'){
		$start = $conn->real_escape_string($_POST['start']);
		$limit = $conn->real_escape_string($_POST['limit']);

		$getAllJobs = $job->getLimitedRecords($start, $limit);

		$response = '';

		if($getAllJobs){
			while($data = $getAllJobs->fetch_assoc()){
				$response .= '
					<li class="list-group-item justify-content-between list-info">
		    			<h5 id="profession_'.$data["id"].'">Profession: </span>'.$data["profession"].'</h5>
		    			<p id="interest_'.$data["id"].'"><span>Interest: </span>'.$data["interest"].'</p>
		    			<div class="job_btn">
			    			<button type="submit" name="job_edit" onclick="edit('.$data["id"].')" class="job_btn btn-warning"><i class="fa fa-edit"></i></button>
			    			<a href="?deljob='.$data["id"].'"><button type="submit" onclick="return check();" name="job_delete" class="job_btn btn-danger" style="width:34px;"><i class="fa fa-trash"></i></button></a>
		    			</div>
		    		</li>
				';
			}
			exit($response);
		} else {
			exit('reachedMax');
		}
	}

	if($_POST['key'] == 'getJobData'){

		$getJobData = $job->getAllResults();
		$response = '';

		if($getJobData){
			while($row = $getJobData->fetch_assoc()){
				$response .='
			
				    <div class="box">
			    		<div class="box-header">
			    			<h4 id="2job" class="job1">'.$row["profession"].'</h4>
			    			<h5 id="1job" class="job2">-'.$row["interest"].'</h5>
			    		</div>
			    		<div class="box-body">
			    			<div class="enterleave">
			    				<p id="short_text" class="job1_description">'.ucfirst($row["description"]).'</p>
			    			</div>
			    		</div>
			    		<div class="box-footer">
			    			<input type="submit" onclick="showData(\''.$row["id"].'\',\''.$row["profession"].'\',\''.$row["interest"].'\')" name="btn_apply" id="btn_apply" class="btn btn-primary" value="Apply Now"/>
			    		</div>
			    	</div>';
			}
			exit($response);
		} else {
			$response = '<div class="box-body">
			    			<h4 class="empty_message"></h4>
			    		</div>';
			exit($response);
			exit('reached_max');
		}
	}

	if($_POST['key'] == 'getApplicationsData'){
		$getAppData = $app->getRecords();
		$is_public = 1;
		$response = '';

		if($getAppData){
			while($rw = $getAppData->fetch_assoc()){
				$response .= '
					<li class="list-group-item list-info">

						<div class="row justify-content-around application-info">
							<div class="col-md-6 personal-info">
							
								<h5>Personal info</h5>
								<p>name: '.$rw["name"].'</p>
								<p>mail: '.$rw["email"].'</p>
								<div class="tooltip">
									
								</div>
								<p>Check CV: <a target="_blank" href="download.php?file_id='.$rw["id"].'">download</i></a></p>
							
							</div>
							<div class="col-md-4 job-info">
							
								<h5>Job</h5>
								<p>'.$rw["profession"].'</p><p>'.$rw["interest"].'</p>
							
							</div>
						</div>
						<p class="time">Time: '.$rw["created_at"].'</p>
						<div class="del_btn">
							<a href="?delapp= '.$rw['id'].'" onclick="return check();"><button class="btn del"><i class="fa fa-trash"></i></button></a>
						</div>

                    </li>';
			}
			exit($response);
		} else {
			exit('reachedMax');
		}
	}

	if($_POST['key'] == 'getProfileData'){
		$getProfileData = $profile->getAllRecords();
		$is_public = 1;
		$response = '';
		if($getProfileData){
			while($rw = $getProfileData->fetch_assoc()){
				$response .= '
					<li class="list-group-item list-info">
						<div id="'.$rw["id"].'" class="row justify-content-around card-section">

							<div class="card text-white col-md-3 col-xs-3 mb-3 px-0 border-0">
								<div class="card-header">Personal Info</div>
								<div class="card-body">

								<p class="card-text">Name: <span data-target="pName">'.$rw["name"].'</span></p>
								<p class="card-text">e-mail: <span data-target="pEmail">'.$rw["email"].'</span></p>
									
								</div>
							</div>

							<div class="card text-white col-md-3 col-xs-3 mb-3 px-0 border-0">
								<div class="card-header">Job Skill</div>
								<div class="card-body">
									<p>Profession: <span data-target="pProfession">'.$rw["profession"].'</span></p>
									<p>Interest: <span data-target="pInterest">'.$rw["interest"].'</span></p>
									<p class="card-text">Check CV: <span data-target="pFile">'.$rw["cv_file_name"].'</span><a href="download.php?profile_id='.$rw["id"].'"> download</i></a></p>
								</div>
							</div>

							<div class="card text-white col-md-4 col-xs-4 mb-3 px-0 border-0">
								<div class="card-header">Description</div>
								<div class="card-body">
									<p data-target="pDescription" class="card-text">'.$rw["description"].'</p>
									
								</div>
							</div>

							<div class="col-md-1 col-xs-1">
								
								<div class="operations">
									<p style="color:#dc3545;">Actions</p>
									<button type="button" data-role="update" data-id="'.$rw["id"].'" class="p-btn-edit btn-warning"><i class="fa fa-edit"></i></button>
									<a href="?delprofile='.$rw["id"].'" onclick="return check();"><button type="button" class="p-btn-del btn-danger"><i class="fa fa-trash" style="width:16px";></i></button></a><br>
										
									<label>On/Off</label>
									<input id="public_'.$rw["id"].'" name="public" onclick="return getValue('.$rw["id"].')" '.($is_public == $rw["is_public"]?"checked":"").' type="checkbox" class="chk_value" />
									
								</div>
								
							</div>
							
						</div>
					</li>
				';
			}
			exit($response);
		} else {
			exit('reached_max');
		}
	}

	if($_POST['key'] == 'getPublicProfileData'){
		$is_public = 1;
		$getPublicProfileData = $profile->getAllPublicRecords($is_public);
		$response = '';

		if($getPublicProfileData){
			while($rw = $getPublicProfileData->fetch_assoc()){
				$response .= '
					<div class="section-one-row card">
						<div class="header-img">
							<img class="card-img-top" src="https://img.icons8.com/officel/80/000000/change-user-male.png">
						</div>
						<div class="card-body">
							<div class="profile-job">
								<h4 class="profile-job-title">Job Skill</h4>
								<p class="profile-job-skill">'.ucfirst($rw["profession"]).'</p>
								<p class="profile-job-skill">'.ucfirst($rw["interest"]).'</p>
								<p class="profile-job-cv">Check CV Profile</p>
								<p style="margin-top: 0px;" class="profile-job-cv">Click below for download</p>
								<a class="" alt="CV_PROFILE_JOB" href="admin/dashboard/download.php?profile_id='.$rw["id"].'"><img style="width:40px; height:40px;" src="images/download-file.png"></a>
							</div>
								<img alt="LOGO OF BUMARE" src="./images/logo-icon.png" style="width:40px; height:40px;" />
							<div class="desc">
								<button class="btn-desc" onclick="toggleSlide('.$rw["id"].')" id="btn_desc_'.$rw["id"].'">Click for description</button>
								<div class="panel-desc" id="panel_desc_'.$rw["id"].'">'.ucfirst($rw["description"]).'</div>
							</div>
						</div>
					</div>
				';
			}
			exit($response);
		} else {
			$response = "<h5 style='width:100%;' class='profile_message'></h5>";
			exit($response);
			exit('reached_max');
		}
	}

}

?>
<!--<br>-->
							



