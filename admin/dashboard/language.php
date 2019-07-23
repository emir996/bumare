<?php
	require_once '../../config/config.php';
	include '../inc/header.php';
	include '../inc/nav.php';

	$text = new Language();


	$selected_id = -1;
	$selected_language = "";

	if(isset($_GET['lid'])){
		$getLanguage = $text->getCatByOneLang($selected_id)->fetch_object();
		if($getLanguage){
			$selected_id = $getLanguage->id;
			$selected_language = $getLanguage->language;
		}
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_add'])){

		$insert_lang = $text->catInsert();
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_update']) && isset($_GET['lid'])){

		$update_lang = $text->catUpdate();	
	}

	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['btn_delete']) && isset($_GET['lid'])){

		//$selected_id = $_GET['lid'];

		$delete_lang = $text->catDelete();
	}

 ?>

 
 	<div class="tab-pane">
		
		<div class="container container1">
		  <div class="row text-center">
		    <div class="col">
		    	<h3>Settings</h3>
		     <form action="" method="POST">
		      <select class="browser-default custom-select custom-select-lg mb-3" name="lang" id="lang" onchange="if(this.value <= 0) return; window.location='?lid='+this.value">
		      	<option value="-1">Choose your language</option>
		    	<?php
		    		$getLang = $text->getAllCatLang();
		    		  	if($getLang){
		    		  	while($rw = $getLang->fetch_object()){
		    		  		echo "<option ".($selected_id == $rw->id?"selected":"")." value='{$rw->id}'>$rw->language</option>";
		    			}
		    		}	  		
		    	?>
		      </select><br><br>
		    	<input type="text" name="tb_name" placeholder="Type Here..." value="<?php echo $selected_language; ?>"/>
		    	<div class="btn-group">
		    		<button type="submit" class="btn btn-success" name="btn_add">Add New</button>
		    		<button type="submit" class="btn btn-warning" name="btn_update">Update</button>
		    		<button type="submit" class="btn btn-danger" name="btn_delete">Delete</button>
		    	</div>
		     </form>
		    </div>
		    <div class="col">
		    	<h3>List of Languages:</h3>
		    	
		      <ul class="list-group">
		      	<?php
		      		$getLang = $text->getAllCatLang(); 
		      		if($getLang){
		      			while($rw = $getLang->fetch_object()){
		      	?>
				  <li class="list-group-item"><?php echo $rw->language; ?></li>
				<?php
				}}
				?>
			  </ul>
			  	
		    </div>
		  </div>
		</div>

	</div>
	<?php include '../inc/modals.php'; ?>
