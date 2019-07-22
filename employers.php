
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
	<script>
		function goBack() {
    window.history.back()
}
	</script>
</head>

<body class="landing">

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

					<input name="age" type="text" id="age" class="age" style="display: none;" />

					<div class="g-recaptcha form-group form-group-full" data-sitekey="6Lf43pkUAAAAALoejBeq3FZ5KApN9Cmb3yovD-dC"></div>

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
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/jquery.scrolly.min.js"></script>
	<script src="assets/js/jquery.scrollex.min.js"></script>
	<script src="assets/js/skel.min.js"></script>
	<script src="assets/js/util.js"></script>
	<!--[if lte IE 8]><script src="assets/js/ie/respond.min.js"></script><![endif]-->
	<script src="assets/js/main.js"></script>
	<script>

$(function () {
			var body = $('body');
			var backgrounds = new Array(
			'url(images/med.jpg) ',	
			'url(images/doc1.jpg) ',								
			'url(images/doctors.jpg) '
);
		var current = 0;

		function nextBackground() {
			body.css(
				'background-image',
				backgrounds[current = ++current % backgrounds.length]);
			setTimeout(nextBackground, 6000);
	    	}
		    setTimeout(nextBackground, 6000);
	    	body.css('background-image', backgrounds[0]);
});



		$(function () {
			$('#reused_form').submit(function (e) {
				e.preventDefault();

				$form = $(this);

				$.ajax({
					type: "POST",
					url: '/sendEmployers.php',
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
							$('#success_message').append("<span><?php echo $content['form2_success']; ?></span>");
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
		
	</script>
</body>

</html>