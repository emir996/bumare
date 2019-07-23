<?php 

// LOCALIZATION
function get_ip(){
    if(isset($_SERVER['HTTP_CLIENT_IP'])){
        return $_SERVER['HTTP_CLIENT_IP'];
    }
    elseif(isset($_SERVER['HTTP_X_FORWARDED_FOR'])){
        return $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
    else {
        return(isset($_SERVER['REMOTE_ADDR']) ? $_SERVER['REMOTE_ADDR'] : '');
    }
}
    $ip=get_ip();
   
    // USE AN API TO GET VISITOR DATA
    $query=@unserialize(file_get_contents('http://ip-api.com/php/'.$ip));

    if($query && $query['status'] == 'success'){
            // echo "ISP:".$query['isp']."<br/>";
            // echo "COUNTRY:".$query['country']."<br/>";
            // echo "COUNTRY CODE:".$query['countryCode']."<br/>";
            // echo "REGION NAME:".$query['regionName']."<br/>";
            // echo "CITY:".$query['city']."<br/>";
            // echo "ZIP:".$query['zip']."<br/>";
            // echo "LATITUDE:".$query['latitude']."<br/>";
            // echo "LONGITUDE:".$query['longitude']."<br/>";
            // echo "TIMEZONE:".$query['timezone']."<br/>";
            // echo "ORG:".$query['org']."<br/>";
			// echo "AS:".$query['as']."<br/>"; 
		if(!isset($_GET["lang"])){
			if($query['country'] == 'Bosnia and Herzegovina'){
				header("Location: http://bumare.de/?lang=ba");
					die();
			  }
			  else if($query['country'] =='Germany'){
				header("Location: http://bumare.de/?lang=de");
				die();
			  }
			  else{
				header("Location: http://bumare.de/?lang=en");
				die();
			  }
		}
		
    }
    else {
        echo 'Localization Error!';
    }

	  ini_set('display_errors', 1);
	  ini_set('display_startup_errors', 1);
	  error_reporting(E_ALL);
	// DB CONNECTION
	  include 'config/config.php';
	// TRANSLATIONS
	  include 'translation.php';

?>
<!DOCTYPE HTML>
<!--
	Hologram by Pixelarity
	pixelarity.com | hello@pixelarity.com
	License: pixelarity.com/license
-->

<html>
<head>
	<title>Bumare</title>

	<!--<link rel="shortcut icon" type="image/png" href="apple-icon-120x120.png"/> -->
	<link rel="shortcut icon" type="image/png" href="logo-icon.png"/>

	<link rel="image_src" href="/images/med.jpg" / >
	<meta property='og:image' content='http://bumare.de/images/med.jpg'/>
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
</head>

<body class="landing">
	<!-- Banner -->
	<section id="banner">
		<div id="translations" style="display: block;position: absolute; top: 10px;right: 45px;font-size: 14px;">
				<img class="flags" src="languages/en.png">
				<a class="trans" href="?lang=en" ><p><?php echo $content["en_translation"]; ?></p></a>
				<img class="flags" src="languages/de.png">
				<a class="trans" href="?lang=de" ><p><?php echo $content["de_translation"]; ?></p></a>
				<img class="flags" src="languages/ba.png">
				<a class="trans" href="?lang=ba" ><p><?php echo $content["ba_translation"]; ?></p></a>
		</div>
		<div class="row-inner">
		<header class="major">
			<div class="logo1">
				<img src="logo1.png">
			</div>
			<!-- <span class="icon fas fa-heartbeat style3"></span>  
			<h1>Agency Name</h1>
			-->
			<div id="headingDiv">
			<p class="heading"><b class="first"><?php echo $content["heading1"]; ?></b></p>	
							
			<p class="heading"><b class="second"><?php echo $content["heading2"]; ?></b></p>	
		</div>	
		</header>
		<ul class="actions">
			<li>
				<a href="#four" class="button scrolly"><?php echo $content["four"]; ?></a>
			</li>
			<li>
				<a href="#info" class="button scrolly"><?php echo $content["info"]; ?></a>
			</li>
			<li>
				<a href="employers.php?lang=<?php echo $lang; ?>" class="button scrolly"><?php echo $content["employers"]; ?></a>
			</li>
			<li>
				<a href="actually.php?lang=<?php echo $lang; ?>" class="button scrolly"><?php echo $content["actually"]; ?></a>
			</li>
		</ul>
			</div>
	</section>

	<!-- One -->
	<section id="one" class="wrapper style1 special">
		<div class="inner">
			<header class="major alt style2">
				<span class="one-title"><h2><?php echo $content["welcome"]; ?></h2></span>
				<span class="one-subtitle"><p><?php echo $content["subtitle"]; ?></p><span>
				<div class="row-inner">
					<div class="row-1 section-one-row">
						<div class="icon"><img src="images/mail.png"></div>
						<div class="title"><h3><?php echo $content["b2_title1"]; ?></h3></div>
						<div class="body"><?php echo $content["b2_body1"]; ?></div>
					</div>

					<div class="row-2 section-one-row">
						<div class="icon"><img src="images/money.png"></div>
						<div class="title"><h3><?php echo $content["b2_title2"]; ?></h3></div>
						<div class="body"><?php echo $content["b2_body2"]; ?></div>
					</div>

					<div class="row-3 section-one-row">
						<div class="icon"><img src="images/partners.png"></div>
						<div class="title"><h3><?php echo $content["b2_title3"]; ?></h3></div>
						<div class="body"><?php echo $content["b2_body3"]; ?></div>
					</div>
					
				</div>
			</header>

			</div>
			<?php /*
				<ul class="menu">
					<li>
						<div id="more">
							<a href="more_info.php?lang=<?php echo $lang ?>"><?php echo $content["more_info"]; ?></a>
						</div>
					</li>
				</ul>
				*/
			?>	
			
	</section>

	<!-- Four class="inner split" -->
	<section id="four" class="wrapper style4 special-alt">
		<div>
			<section id="form-header">
				<header class="major" id="formMajor">
					<h2><?php echo $content["form-header"]; ?></h2>
				</header>
				<span>
					<p id="formp"><?php echo $content["formp"]; ?></p>
				</span>
			</section>
			<form method="post" action="sendEmail.php" class="inner split" id="reused_form" autocomplete="off">
				<div id="form_div">
					<div class="form-inner">
					<div class="form-group form-group-left">
							<label for="name"><?php echo $content["name"]; ?></label>
							<input type="text" id="name" name="name" required/>
					</div>

					<div class="form-group form-group-righ">
							<label for="email"><?php echo $content["email"]; ?></label>
							<input type="email" id="email" name="email" required />
					</div>

					<div class="form-group form-group-full">
						<label for="jobTitle"><?php echo $content["jobTitle"]; ?></label>
						<select id="drop" required name="jobTitle">
							<option value=""></option>
							<option value="Nurse"><?php echo $content["job-nurse"]; ?></option>
							<option value="Doctor"><?php echo $content["job-doctor"]; ?></option>
							<option value="Engineer"><?php echo $content["job-engineer"]; ?></option>
							<option value="Architect"><?php echo $content["job-architect"]; ?></option>
						</select>
					</div>

					<div class="form-group form-group-full">
							<label for="phoneNumber"><?php echo $content["phoneNumber"]; ?></label>
							<input type="text" id="phoneNumber" name="phoneNumber" placeholder="<?php echo $content['placeholder_form']; ?>"/>
					</div>

					<div class="form-group form-group-full">
						<label for="message"><?php echo $content["message"]; ?></label>
						<textarea cols=3 rows="4.5" id="textarea_form" name="message" required></textarea>
					</div>

					<input name="age" type="text" id="age" class="age" style="display: none;" />



					<div class="g-recaptcha form-group form-group-full" data-sitekey="aaaaaaaaaaaaaaaaaaaaaaaaaa"></div>

					<ul class="actions" style="padding: 0;display: inline;">
						
						<li>

							<button type="submit" name="btn_submit" class="button" id="btn"><?php echo $content["submit"];?> </button>

							<div id="success_message" style="display:none;">
								
							</div>

						</li>
					</ul><br><br>
					
	
				</div>
			</div>		
			</form>
		</div>
	</section>

	<!-- INFO-->
	<section id="info" class="wrapper style1 special">
			<div class="inner">

				<span class="info-title"><h2><?php echo $content["info-title"]; ?></h2></span>
				<span class="info-subtitle"><p><?php echo $content["info-subtitle"]; ?></p><span>
				<div class="row-inner">

					<div class="row-1 section-info-row">
						<div class="title"><h3><?php echo $content["b4_title1"]; ?></h3></div>
						<div class="icon"><img src="images/cv.png"></div>
						<div class="body"><?php echo $content["b4_body1"]; ?></div>
					</div>

					<div class="row-2 section-info-row">
						<div class="title"><h3><?php echo $content["b4_title2"]; ?></h3></div>
						<div class="icon"><img src="images/certificate.png"></div>
						<div class="body"><?php echo $content["b4_body2"]; ?></div>
					</div>

					<div class="row-3 section-info-row">
						<div class="title"><h3><?php echo $content["b4_title3"]; ?></h3></div>
						<div class="icon"><img src="images/proposal.png"></div>
						<div class="body"><?php echo $content["b4_body3"]; ?></div>
					</div>

					<div class="row-1 section-info-row">
						<div class="title"><h3><?php echo $content["b4_title4"]; ?></h3></div>
						<div class="icon"><img src="images/partners.png"></div>
						<div class="body"><?php echo $content["b4_body4"]; ?></div>
					</div>

					<div class="row-2 section-info-row">
						<div class="title"><h3><?php echo $content["b4_title5"]; ?></h3></div>
						<div class="icon"><img src="images/transport.png"></div>
						<div class="body"><?php echo $content["b4_body5"]; ?></div>
					</div>

					<div class="row-3 section-info-row">
						<div class="title"><h3><?php echo $content["b4_title6"]; ?></h3></div>
						<div class="icon"><img src="images/interview.png"></div>
						<div class="body"><?php echo $content["b4_body6"]; ?></div>
					</div>
					
				</div>
			</div>
	</section>

	<!-- Two -->
	<?php /*
	<section id="two" class="wrapper style3 special">
		<div class="inner">
			<header class="major" id=majorHeader>
				<h2>Friendly working enviroment</h2>
				<p>We will find you high paid job</p>
			</header>
			<section class="spotlights">
				<section>
					<span class="image">
						<img src="images/nurse.jpg" alt="" />
					</span>
					<h4>Become a nurse</h4>
					<p class="justify">The Office of Early Childhood (OEC) is a unique state agency in Connecticut that helps families with young children
						achieve better life outcomes. A new State agency, OEC is called on in its enabling statute to be data-driven, human-centered,
						and result-focused. We touch the lives of over 200,000 young children, parents, and caregivers annually through our
						integrated focus on early care and education programs and safety supports, our home visiting programs, and other critical
						early childhood services. By scale of funding, OEC is one of the largest departments of Connecticut state government,
						deploying and leveraging approximately half a billion dollars each year in service of vulnerable families and communities.
						Connecticut is a leader in the nation. </p>

				</section>
				<section>
					<span class="image">
						<img src="images/pic03.jpg" alt="" />
					</span>
					<h4>Become a doctor</h4>
					<p class="justify">Teamwork is the collaborative effort of a team to achieve a common goal or to complete a task in the most effective
						and efficient way. This concept is seen within the greater framework of a team, which is a group of interdependent
						individuals who work together towards a common goal. Basic requirements for effective teamwork are an adequate team
						size (about 6-8 members), available resources for the team to make use of (i.e. meeting space and time, guidance from
						a supervisor, support from the organization, etc.), and clearly defined roles within the team in order for everyone
						to have a clear purpose. Teamwork is present in any context where a group of people are working together to achieve
						a common goal.</p>

				</section>
			</section>
		</div>
	</section>
	*/ ?>

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
				<a href="terms_of_use.html">Terms of Use</a>
			</li>
			<li>
				<a href="#four">Contact Us</a>
			</li>
		</ul>
		<p class="copyright">
			&copy; Bumare. All rights reserved. 
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
			'url(images/doctors.jpg) ',
			'url(images/architecture.jpg)',
			'url(images/engineer.jpg) ',
			'url(images/arhitect.jpg) '
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
					url: '/sendEmail.php',
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
							$('#success_message').append("<span><?php echo $content['form_success']; ?></span>");
							$('#success_message').show();
						}
						else {
							$("#success_message").text("");
							$('#success_message').append("<span><?php echo $content['form_error']; ?></span>");
							$('#success_message').show();
						}
					},
					dataType: 'application/json'
				});
			});
		});
	</script>
	<!--<script src="script.js"></script>-->
</body>

</html>