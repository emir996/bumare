
	<!DOCTYPE HTML>
<!--
	Hologram by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<?php

	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include 'translation.php'; 
	require_once 'config/config.php';

	?>

<html>

<head>
	<title>Bumare</title>

	<!--<link rel="shortcut icon" type="image/png" href="apple-icon-120x120.png"/> -->
	<link rel="shortcut icon" type="image/png" href="images/logo-icon.png"/>


	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/main.css" />

	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

	<script>
		function goBack() {
    window.history.back()
}
$(document).ready(function(){
    $("#app_form").on('submit', function(e){
        e.preventDefault();
        
        $.ajax({
            url:'admin/ajaxcall/ajax.php',
            method:'POST',
            data: new FormData(this),
            contentType: false,
            processData: false,
            success:function(data){
				swal({
					title: "Good Job!",
					text: data,
					icon: "success"
				});
                $("#applyModal").modal('hide');
            }
        });
    });

    getJobData();
});

function getJobData(){
    $.ajax({
        url:'admin/ajaxcall/fetch.php',
        method: 'POST',
        dataType: 'text',
        data: {
            key: 'getJobData'
        }, success: function(response){
            if(response != 'reached_max'){

                $('.job-body').append(response);
                
                }
            }, complete: function(){
                if($(".box-body").children().hasClass("empty_message")){
                    var message = $("h4").append("<?php echo $content["empty_job_message"]; ?>");
                } else {
                    return false;
                }
            }
        });
    }



function showData(rowId, profession, interest){
    $("#profession").text(profession);
    $("#interest").text(interest);
    $("#modal_job_id").val(rowId);
    $("#applyModal").modal('show');
}

	</script>
	<style>
		.swal-button {
			padding-top: 2px;
		}
		
	</style>
</head>

<body>

	<div class="tab-pane">
		
		<div class="container container1">
			<span><h2 class="main-title"><?php echo $content["application_modal-header"]; ?></h2></span>
		  <div class="row">
		    <div class="col-md-12 col-xs-12 one-row">
		    	
		    	<div class="job-header">
				    <h3 class="jobs-heading"><?php echo $content["application_modal-subtitle"]; ?>.</h3>
				</div>
			    
			    <div class="job-body">
					


			    </div>
		    </div>
		    
		  </div>
		</div>
		<div class="exit">
			<a href="index.php"><button type="button" name="back_btn" class="btn-primary"><?php echo $content["btn_back"]; ?></button></a>
		</div>
	</div>

	<!-- job application -->



	<div class="modal fade" id="applyModal" tabindex="-1" role="dialog" aria-hidden="true">
	  <div class="modal-dialog" role="document">
	    <div class="modal-content">
	        <form method="POST" enctype="multipart/form-data" action="#" id="app_form" style="margin-bottom:0px;">
		      <div class="modal-header">
		        <h4 class="modal-title">JOB APPLICATION</h4>
		        
		        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
		          <span aria-hidden="true">&times;</span>
		        </button>
		      </div>
		      
		      <div class="modal-body">

		      	<div class="app-header">
		      		<h5>Your application for:</h5>
			      	<p id="profession" class="app-title"></p>
			      	<p id="interest" class="app-title"></p>
			    </div>

		      	<label>Enter Name:</label>
		      	<input type="text" name="name" id="app_name" class="form-control" required /> 

		      	<label>Enter E-mail:</label>
		      	<input type="email" name="email" id="app_email" class="form-control" required />

		      	<label>CV:</label>
		      	<input type="file" name="filedoc" id="app_filedoc" required /><br><br>

		      	<div class="g-recaptcha form-group form-group-full" data-sitekey=""></div>

		      	<input type="hidden" name="job_id" id="modal_job_id">
				
		      </div>
		      <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="submit" id="btnInsert" class="btn btn-primary">Send</button>
			  </div>
	        </form>
	    
	  </div>
	</div>

<!-- end -->
			

	

	<!-- Four class="inner split" -->
	

	<!-- Scripts -->
	<!--<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]
	<script src="assets/js/main.js"></script>-->
</body>

</html>