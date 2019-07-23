<?php

require_once './config/config.php';
$translate = new Translation();
$content = array();

$lang_id = 1;

$get_english = $translate->getLang($lang_id);

while($row = $get_english->fetch_assoc()){
	$content[$row['array_key']] = $row['array_value'];
}




/*

$conn = mysqli_connect($servername, $username, $password);

if(!$conn){
	die(mysqli_error());
}

$db_selected = mysqli_select_db($conn, $database);

if(!$db_selected){
	die(mysqli_error());
}

$sql = "SELECT * FROM languages_id where lang_id=1";

$result = mysqli_query($conn, $sql);

$content = array();

while($rw=mysqli_fetch_assoc($result)){
	$content[$rw['array_key']] = $rw['array_value'];
}

*/


//translation
/*
$content["en_translation"] = 'English';
$content["de_translation"] = 'German';
$content["ba_translation"] = 'Bosnian';
//1. banner
$content["heading1"] = 'Do you wish to live and work in Germany ?';
$content["heading2"] = 'We can make it happen for you without any costs!';
$content["four"] = 'Contact us';
$content["info"] = 'Learn more';
$content["employers"] = 'For employers';
//2. banner
$content["welcome"] = 'Welcome';
$content["subtitle"] = 'A professional and secure way to work as a doctor or nurse in Germany';
$content["b2_title1"] = 'First fill the contact form bellow';
$content["b2_title2"] = 'Our service is completely without charge';
$content["b2_title3"] = 'Your dream job is reacheable now';
$content["b2_body1"] = 'Do you want to live and work in Germany? Contact us and complete the form below. Write to us, and we will get in touch with you!';
$content["b2_body2"] = 'Our service is completely free and you do not have additional costs. We will take care of accommodation, workplace and education (German language course)';
$content["b2_body3"] = 'We from Bumare will help you in every way. You do not have to worry about being left alone upon your arrival. The Bumare team will make your move seemless.';
$content["more_info"] = 'Work with professionals and Top quality medical equipment (read more)';
//3. banner
$content["form-header"] = 'Contact Us';
$content["formp"] = 'Fill out this form if you are interested. We are looking forward to meet you.';
$content["name"] = 'Name';
$content["email"] = 'Email';
$content["jobTitle"] = 'Job title';
$content["phoneNumber"] = 'Phone number';
$content["message"] = 'Message';
$content["submit"] = 'Submit';

//placeholder form
$content["placeholder_form"] = 'Optional Field...';

//4. banner
$content["info-title"] = 'Choose us';
$content["info-subtitle"] = 'Why we are the right partner for you:';
$content["b4_title1"] = 'CV review';
$content["b4_title2"] = 'Fast service';
$content["b4_title3"] = 'Optimized job offers';
$content["b4_title4"] = 'Attractive partners';
$content["b4_title5"] = 'Transport';
$content["b4_title6"] = 'Interview preparation';
$content["b4_body1"] = 'We update your CV along with all required application documents';
$content["b4_body2"] = 'You stay informed about latest and the most interesting opportunities';
$content["b4_body3"] = 'We have optimized job offers to meet your requirements and needs';
$content["b4_body4"] = 'Get connected with the best healthcare employers';
$content["b4_body5"] = 'With us you get support for transport and accomodation';
$content["b4_body6"] = 'You will get prepared for the interview through personalized cocahing';
//more_info
$content["more_info_heading1"] = 'Top quality medical equipment';
$content["more_info_heading2"] = 'Work with professionals';
$content["more_info_content1"] = 'We source the most trusted names in surgical, treatment and medical supplies. Whether you’re looking to purchase or lease, Midmed provides both the Public Hospital sector and Australasian businesses with a wide variety of  equipment, consumables and other treatment solutions. From the smallest medical centres to the largest metropolitan hospitals, supplies accompanied with proven clinical performance, great warranties and high levels of cost effectiveness.';
$content["more_info_content2"] = 'The Department of Veterans Affairs is recruiting for a per diem, 2nd shift Registered Nurse to work at this Healthcare Center in Rocky Hill, CT. This position will average 24 hours per week. All applicants must include a resume within the "Resume Tab" of their application, as well as upload a cover letter with their submission. Applicants invited to interview may be required to submit additional documentation which support their qualification(s) for this position.';
$content["back"]="Back";
//employers
$content["employers_heading"] = 'For Employers';
$content["employers_subtitle"] = 'Sign up now!';
$content["employers_title1"] = 'Are you an employer in need of medical staff?';
$content["employers_title2"] = 'A time saving service';
$content["employers_title3"]= 'Working closely with both parties.';
$content["employers_body1"] = 'If you are an employer in need of competent workforce, Bumare will help you connect you with the the right prospects from Bosnia-Herzegovina, Croatia and Serbia.';
$content["employers_body2"] = 'Partner up with us and let us take care of your recruitment needs. You will save time and money.';
$content["employers_body3"] ='We work closely with our employers, as well as your potential future employees. We prepare the employees so that they come prepared and ready for their new job.';
$content["employers_more_info"]='-';

$content["employers_form-header"] = 'Contact us';
$content["employers_formp"] = 'Fill out this form to get in touch with us. We are looking forward hear from you.';
$content["employers_name"]= 'Name';
$content["employers_email"] = 'Email';
$content["employers_message"] ='Message';
$content["employers_submit"]='Submit';

$content["job-doctor"] ='Doctor';
$content["job-nurse"]='Nurse';
*/

