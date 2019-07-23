<!DOCTYPE HTML>
<!--
	Hologram by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->
<?php include 'translation.php'; ?>
<html>
<head>
	<title>Bumare</title>

	<link rel="shortcut icon" type="image/png" href="apple-icon-120x120.png"/>



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
	
</head>

<body class="other">

		<header id="more_header">
			<div class="center_content">
			<a href="/">
				<img src="logo1.png" id="logo">
			</a> 
			<nav class="more_nav">
				<a href="/#four" class="button scrolly"><?php echo $content["four"]; ?></a>
				<a href="/#info" class="button scrolly" ><?php echo $content["info"]; ?></a>


			</nav>
			</div>
		</header>

		<section class="wrapper" id="jobs">
				<div class="inner">
					<div class="row-inner">
				<article class="first">

					<div class="slides">
						<!-- <img class="myslides" src=" images/med-equipment4.jpg" />
						<img class="myslides" src=" images/med-equipment2.jpg" />
						<img class="myslides" src="images/med-equipment3.jpg" /> -->
						<img class="myslides" src=" images/med_equip.jpg" />

						<!-- <button class="button-display-left" onclick="plusDivs(-1)">&#10094;</button>
						<button class="button-display-right" onclick="plusDivs(+1)">&#10095;</button> -->
					</div>

					<!-- <script>
						var slideIndex = 1;
						showDivs(slideIndex);

						function plusDivs(n) {
  							showDivs(slideIndex += n);
						}

						function showDivs(n) {
  							var i;
  							var x = document.getElementsByClassName("myslides");
						  	if (n > x.length) {slideIndex = 1}    
						  	if (n < 1) {slideIndex = x.length}
						  	for (i = 0; i < x.length; i++) {
						     	x[i].style.display = "none";  
						  		}
						  	x[slideIndex-1].style.display = "block";  
							}
					</script>
 -->
					<h4><?php echo $content["more_info_heading1"]; ?></h4>
					<p class="justify"> <?php echo $content["more_info_content1"]; ?></p>

				</article>

				<article class="second">
					
					<h4 id="upper"><?php echo $content["more_info_heading2"]; ?></h4>
					<p class="justify"><?php echo $content["more_info_content2"]; ?></p>

					<div class="slides2">
						<img class="myslides2" src="images/pic04.jpg" />
						<!-- <img class="myslides2" src="images/profs2.jpg" />
						<img class="myslides2" src=" images/profs1.jpg" />
						<img class="myslides2" src=" images/profs3.jpeg" />

						<button class="button-display-left" onclick="plusDivs2(-1)">&#10094;</button>
						<button class="button-display-right" onclick="plusDivs2(+1)">&#10095;</button> -->
					</div>
					<!-- <script>
						var slideIndex2 = 1;
						showDivs2(slideIndex2);

						function plusDivs2(n) {
  							showDivs2(slideIndex2 += n);
							}

						function showDivs2(n) {
  							var i;
  							var y = document.getElementsByClassName("myslides2");
						  	if (n > y.length) {slideIndex2 = 1}    
						  	if (n < 1) {slideIndex2 = y.length}
						  	for (i = 0; i < y.length; i++) {
						     	y[i].style.display = "none";  
						  		}
						  	y[slideIndex2-1].style.display = "block";  
							}
					</script> -->
				</article>
			
					<div id="back">
						<a href="/" class="button scrolly"><?php echo $content["back"]; ?></a>								
					</div>

				</div> 
			</div>
			</section>


	<!-- Footer-->

	<footer id="footer">
		<!--
				<ul class="alt-icons">			
					<li><a href="#" class="icon fa-facebook"><span class="label">Facebook</span></a></li>
					<li><a href="#" class="icon fa-linkedin"><span class="label">LinkedIn</span></a></li>
					<li><a href="#" class="icon fa-phone"><span class="label">Phone</span></a></li>
					<li><a href="#" class="icon fa-envelope"><span class="label">Email</span></a></li>
				</ul>
				 -->
		<ul class="menu">
			<li>
				<a href="#">Terms of Use</a>
			</li>
			<li>
				<a href="#four">Contact Us</a>
			</li>
		</ul>
		<p class="copyright">
			&copy; Untitled Corp. All rights reserved. 
		</p>
	</footer>

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
					url: 'https://foodproject.zendev.se/sendEmail.php',
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
							$('#success_message').append("<span>Posted your message successfully!</span>");
							$('#success_message').show();
						}
						else {
							$("#success_message").text("");
							$('#success_message').append("<span> Sorry there was an error sending your form.</span>");
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