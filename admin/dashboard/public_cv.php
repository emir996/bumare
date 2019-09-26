<?php 

	require_once '../../config/config.php';
	include '../inc/header.php';
	include '../inc/nav.php';

?>

	<div class="tab-pane">
		
		<div class="container container1">
		  <div class="row">
		    <div class="col-md-12 col-xs-12">
		    	<div class="job-header">

                    <div class="cv-header-1">
                        <h3 class="jobs-heading">Create Public Profile</h3>
                    </div>
					
					<div class="cv-header-2">
                        <div id="btn-start">
                            <input type="button" id="add_profile" class="btn btn-success" value="Create Profile"/>
                        </div>
                        <div id="pag-center">
                            <ul class="pagination pg-blue"><!-- pagination --></ul>
                        </div>
					
			    </div>
			    <div class="job-body text-center">
                
			    	<ul class="list-group" id="list-profile">
                        <!-- Data loaded here -->
                        
                    </ul>
                    

			    </div>
            </div>
		  </div>
		</div>

    </div>

    <?php include '../inc/modals.php'; ?>