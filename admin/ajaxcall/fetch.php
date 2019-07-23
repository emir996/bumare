<?php

	require_once '../../config/config.php';

	$lang = new Language();
	$job = new Job();
	$fm = new Format();
	$app = new Application();
	$db = new Database();
	$conn = $db->conn;


	if(isset($_POST['key'])){

		if($_POST['key'] == 'getTableData'){

			$getLanguage = $lang->getAllLang();

			$output = '';

			if($getLanguage){

				while($rw = $getLanguage->fetch_assoc()){
					$output .= '
						<tr class="text-center">
						    <td> '.$rw['id'].' </td>
						    <td> '.$rw['array_key'].' </td>
						    <td> '.$rw['language'].' </td>
						    <td> '.$rw['array_value'].' </td>
						    
						    <div class="buttons">
						    	<td><button type="button" onclick="showText(\''.$rw["id"].'\',\''.$rw["array_value"].'\')" class="btn edit"><i class="fa fa-edit"></i></button></td>
						    	<td><a href="?dellang= '.$rw['id'].'" onclick="return check();"><button class="btn del"><i class="fa fa-trash"></i></button></a></td>
						    </div>

						</tr>';	
				}
				exit($output);
			} else {
				exit('reached_max');
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
			    				<p id="short_text" class="job1_description">'.$row["description"].'</p>
			    			</div>
			    		</div>
			    		<div class="box-footer">
			    			<input type="submit" onclick="showData(\''.$row["id"].'\',\''.$row["profession"].'\',\''.$row["interest"].'\')" name="btn_apply" id="btn_apply" class="btn btn-primary" value="Apply Now"/>
			    			<p>'.$row["created_at"].'</p>
			    		</div>
			    	</div>
				    ';
			}
			exit($response);
		} else {
			$response .= '<div class="box-body">
			    			<h4>Sorry, We dont have any job offer for you at this moment.</h4>
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
					<li class="list-group-item">
                        <p>name: '.$rw["name"].'</p>
                        <p>mail: '.$rw["email"].'</p>
                        <p>Check CV: <a href="download.php?file_id='.$rw["id"].'">download</i></a></p>
                        <p>'.$rw["profession"].'</p><p>'.$rw["interest"].'</p>
                        <p>time: '.$rw["created_at"].'</p>

                        <label>Set Public</label><br>
                        <input id="public_'.$rw["id"].'" name="public" onclick="return getValue('.$rw["id"].')" '.($is_public == $rw["is_public"]?"checked":"").' type="checkbox" class="chk_value" /><br>
                        

                        <a href="?delapp= '.$rw['id'].'" onclick="check()"><button class="btn del"><i class="fa fa-trash"></i></button></a>

                    </li>';
			}
			exit($response);
		} else {
			exit('reachedMax');
		}
	}


}

?>
<script>
	
</script>							



