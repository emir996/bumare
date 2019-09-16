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
						<input type="button" id="add_job" class="btn btn-success" value="Insert Job"/>
					</div>
					
			    </div>
			    <div class="job-body text-center">
			
			    	<ul class="list-group" id="data-list">
			    		<!-- Data loaded here -->
			    	</ul>

			    </div>
		    </div>
		    <div class="col-md-6 col-xs-6">
		    	<div class="job-header">
		    		<h3 class="jobs-heading">The People who applied</h3>
		    	</div>
		    	<div class="job-body">
				    <ul class="list-group" id="data-list1">
						<!-- Data loaded here -->	
					</ul>
				  </div>
				<div class="">
					
						<ul class="pagination">
							<li class="page-item">

								<a class="page-link" href="#">Prev</a>

							</li>
							<li class="page-item">

								<a class="page-link" href="?page=1">1</a>

							</li>
							<li class="page-item">
							
								<a class="page-link" href="#">2</a>
			
							</li>
							<li class="page-item">

								<a class="page-link" href="#">3</a>

							</li>
							<li class="page-item">

								<a class="page-link" href="#">Next</a>

							</li>
						</ul>
					
				</div>
		    </div>
		  </div>
		</div>

	</div>

	<?php include '../inc/modals.php'; ?>
   <script>
   	function copy(text){
		var textarea = document.createElement('textarea');
		textarea.value = text;
		document.body.appendChild(textarea);
		textarea.select();
		document.execCommand('copy');
	}
	$(function(){
		$('[data-toggle="tooltip"]').tooltip()
	})
   </script>




             
   