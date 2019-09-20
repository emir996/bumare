<?php 
	require_once '../../config/config.php';
	include '../inc/header.php';
	include '../inc/nav.php';

	


?>

	<div class="tab-pane">
		
		<div class="container container1">
		  <div class="row">
		    <div class="col-md-5 col-xs-5">
		    	<div class="job-header-1">
					<div class="job-h">
						<h3 class="jobs-heading">Create or Edit jobs</h3>
					</div>
					<div class="job-cr-btn">
						<input type="button" id="add_job" class="btn btn-success" value="Insert Job"/>
					</div>
					
			    </div>
			    <div class="job-body text-center">
			
			    	<ul class="list-group" id="data-list">
			    		<!-- Data loaded here -->
			    	</ul>

			    </div>
		    </div>
		    <div class="col-md-7 col-xs-7">
		    	<div class="job-header-2">
		    		<h3 class="jobs-heading">The People who applied</h3>
		    	</div>
		    	<div class="job-body">
				    <ul class="list-group" id="data-list1">
						<!-- Data loaded here -->	
					</ul>
				  </div>
		    </div>
		  </div>
		</div>

	</div>

	<?php include '../inc/modals.php'; ?>
   <script>
   </script>




             
   