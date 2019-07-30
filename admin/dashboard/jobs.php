<?php 
	require_once '../../config/config.php';
	include '../inc/header.php';
	include '../inc/nav.php';


?>

	<div class="tab-pane">
		
		<div class="container container1">
		  <div class="row">
		    <div class="col-md-6 col-xs-6">
		    	<div class="row job-header">
		    		<div class="col-md-9">
				    	<h3 class="jobs-heading">Create or Edit jobs</h3>
				    </div>
				    <div class="col-md-3">
				    	<input type="button" id="add_new" class="btn btn-success" value="Insert Job"/>
				    </div>
			    </div>
			    <div class="job-body text-center">
			
			    	<ul class="list-group" id="data-list">
			    		<!-- Data loaded here -->
			    	</ul>

			    </div>
		    </div>
		    <div class="col-md-6 col-xs-6 text-center">
		    	<div class="job-header">
		    		<h3 class="jobs-heading">The People who applied</h3>
		    	</div>
		    	<div class="job-body">
				      <ul class="list-group" id="data-list1">
				      	
						
					  </ul>
			  	</div>
		    </div>
		  </div>
		</div>

	</div>

	<?php include '../inc/modals.php'; ?>
   <script>
   	
   
  	
   	
</script>




             
   