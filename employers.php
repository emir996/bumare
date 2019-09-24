
	<!DOCTYPE HTML>
<!--
	Hologram by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<?php 
	error_reporting(E_ALL);
	ini_set('display_errors', 1);
	include 'translation.php'; ?>
<html>

<head>
	<title>Bumare</title>

	<!--<link rel="shortcut icon" type="image/png" href="apple-icon-120x120.png"/> -->
	<link rel="shortcut icon" type="image/png" href="logo-icon.png"/>


	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<!--[if lte IE 8]><script src="assets/js/ie/html5shiv.js"></script><![endif]-->
	<link rel="stylesheet" href="assets/css/main.css" />
	<!--[if lte IE 9]><link rel="stylesheet" href="assets/css/ie9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="assets/css/ie8.css" /><![endif]-->
	<script src="https://www.google.com/recaptcha/api.js" async defer></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	
	
	<!-- scripts -->

	<script>
		$(document).ready(function(){
			getPublicProfileData();
		});

		function toggleSlide(descId){
			$("#panel_desc_"+descId).slideToggle("fast");
		}

		
		
		$(function () {
			$('#reused_form').submit(function (e) {
				e.preventDefault();

				$form = $(this);

				$.ajax({
					type: "POST",
					url: 'sendEmail.php',
					data: $form.serialize(),
					crossDomain: true,
					success: function (data) {

					},
					complete: function (data, xhr) {
						console.log(data);
						if (data.statusText === 'OK') {
							$('button[type="submit"]', $form).each(function () {
								$btn = $(this);
								$btn.prop('type', 'button');
								$btn.prop('orig_label', $btn.text());
								$btn.text('Sent');
							});
							$("#success_message").text("");
							$('#success_message').append("");
							$('#success_message').show();
						}
						else {
							$("#success_message").text("");
							$('#success_message').append("<span><?php echo $content['form2_error']; ?></span>");
							$('#success_message').show();
						}
					},
					dataType: 'application/json'
				});
			});
		});
		
		function getPublicProfileData(){
			$.ajax({
				url: 'admin/ajaxcall/fetch.php',
				method: 'POST',
				dataType: 'text',
				data: {
					key:'getPublicProfileData'
				},
				success: function(response){
					if(response != 'reached_max'){
						$('#profile-info').append(response);
					}
				},
				complete: function()
				{

					var numProfiles = $("#profile-info .section-one-row").length;
					var limitPerPage = 3;
					var totalPages = Math.ceil(numProfiles / limitPerPage);
					$("#profile-info .section-one-row:gt("+(limitPerPage - 1)+")").hide();

					if(numProfiles > limitPerPage){

						$(".indicators").append("<li class='current-page dot activec'></li>");
						for(var i = 2; i <= totalPages; i++){
							$(".indicators").append("<li class='current-page dot'></li>");
						}

						$(".indicators li.current-page").on("click", function()
						{

							if($(this).hasClass("activec"))
							{
								return false;
							} 
							else 
							{
								var currentPage = $(this).index() + 1;
								alert(currentPage);
								$(".indicators li").removeClass("activec");
								$(this).addClass("activec");
								$("#profile-info .section-one-row").hide();
								
								var grandTotal = limitPerPage * currentPage;

								for(var i = grandTotal - limitPerPage; i < grandTotal;i++)
								{
									$("#profile-info .section-one-row:eq("+i+")").show();
								}
							}
						});
					}

							if($("#profile-info").children().hasClass("profile_message")){
								var message = $("h5").append("<?php echo $content["message_profile"] ?>");
							} 
							else
							{
								return false;
							}
				}	
					
				});
			}

	</script>
	
</head>

<body>

	<!-- One -->
	<section id="one" class="wrapper style1 special">
		<div class="inner">
			<header class="major alt style2">
				<span class="one-title"><h2><?php echo $content["employers_heading"]; ?></h2></span>
				<span class="one-subtitle"><p><?php echo $content["employers_subtitle"]; ?></p><span>
				<div class="row-inner">
					<div class="row-1 section-one-row">
						<div class="icon"><img src="images/mail.png"></div>
						<div class="title"><h3><?php echo $content["employers_title1"]; ?></h3></div>
						<div class="body"><?php echo $content["employers_body1"]; ?></div>
					</div>

					<div class="row-2 section-one-row">
						<div class="icon"><img src="images/money.png"></div>
						<div class="title"><h3><?php echo $content["employers_title2"]; ?></h3></div>
						<div class="body"><?php echo $content["employers_body2"]; ?></div>
					</div>

					<div class="row-3 section-one-row">
						<div class="icon"><img src="images/stethoscope.png"></div>
						<div class="title"><h3><?php echo $content["employers_title3"]; ?></h3></div>
						<div class="body"><?php echo $content["employers_body3"]; ?></div>
					</div>
					
				</div>
			</header>
		</div>	
	</section>

	<section id="two" class="wrapper style1 special">
		<div class="header-inner">
			<h2><?php ?>?</h2>
		</div>
		<div class="inner">
		<div class=""><h4><?php ?>?</h4></div>
			<div id="profile-info" class="row-inner">
				
			</div>
			<ul class="indicators">

			</ul>
		
		</div>
	</section>

	

	<!-- Four class="inner split" -->
	<section id="four" class="wrapper style4 special-alt">
		<div>
			<section id="form-header">
				<header class="major" id="formMajor">
					<h2><?php echo $content["employers_form-header"]; ?></h2>
				</header>
				<span>
					<p id="formp"><?php echo $content["employers_formp"]; ?></p>
				</span>
			</section>
			<form method="post" action="sendEmployers.php" class="inner split" id="reused_form" autocomplete="off">
				<div id="form_div">
					<div class="form-inner">
					<div class="form-group form-group-left">
							<label for="name"><?php echo $content["employers_name"]; ?></label>
							<input type="text" id="name" name="name" required/>
					</div>

					<div class="form-group form-group-righ">
							<label for="email"><?php echo $content["employers_email"]; ?></label>
							<input type="email" id="email" name="email" required />
					</div>
					
					<div class="form-group form-group-left" style="height: 0; width: 0; visibility:hidden;">
							<label for="jobTitle"><?php echo $content["jobTitle"]; ?></label>
							<input type="text" id="jobTitle" name="jobTitle" value=" " required/>
					</div>

				<div class="form-group form-group-full">
					<label for="message"><?php echo $content["employers_message"]; ?></label>
					<textarea cols=3 rows="4.5" id="textarea_form" name="message" required></textarea>
				</div>

					<input name="age" type="text" id="age" value="employers" class="age" style="display: none;" />

					<div class="g-recaptcha form-group form-group-full" data-sitekey="6LcVOq8UAAAAABiG17dxTQvQ2g-qpuK-Si6RJJAI"></div>

					<ul class="actions" style="padding: 0;display: inline;">
						
						<li>
							<button type="submit" class="button" id="btn"><?php echo $content["employers_submit"]; ?></button>
							<div id="success_message" style="display:none;">

							</div>
						</li>
					</ul><br><br>
				</div>
			</div>		
			</form>


		</div>
	</section>

	<!-- Scripts -->
</body>

</html>