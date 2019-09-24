<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
header_remove(); 
header('Access-Control-Allow-Origin: *'); 


include 'config/config.php';

$s_email = new Email();

    if($_SERVER["REQUEST_METHOD"] == "POST" && $_POST["age"] == "maincontact"){

        $send_email = $s_email->send();

        if(isset($send_email)){
            echo $send_email;
        }
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST' && $_POST["age"] == "employers"){

        $sendEmail = $s_email->sendToEmployer();
    
        if(isset($sendEmail)){
            echo $sendEmail;
        }
    }



/*
OLD CODE
$db = new Database();


$email = mysqli_real_escape_string($db->conn, $_POST['email']);
$name = mysqli_real_escape_string($db->conn, $_POST['name']);
$message = mysqli_real_escape_string($db->conn, $_POST['message']);
$job = mysqli_real_escape_string($db->conn, $_POST['jobTitle']);
$phone = mysqli_real_escape_string($db->conn, $_POST['phoneNumber']);

 $age = $_POST['age'];
 $time= time();

if(empty($email) || empty($name) || empty($message) || empty($job)){   
    $response = "Fill all the fields.";
    var_dump(http_response_code(404));
    die();
}
else if(!$age===""){
    var_dump(http_response_code(404));
    var_dump("age");
    die();
}else{

    $secretKey = "6Lf43pkUAAAAAM5vpqKOre7ps5piRNBbnFSkzcyV";
    $responseKey = $_POST['g-recaptcha-response'];
    $userIP = $_SERVER['REMOTE_ADDR'];
    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
    $res = file_get_contents($url);
    $res = json_decode($res);

    if($res->success){

    $result = mysqli_query($db->conn, "INSERT INTO users(email, name, message, jobTitle, phone) VALUES ('$email', '$name', '$message' , '$job', '$phone')");
    //$result = mysqli_query($conn, "INSERT INTO users(email, name, messsage, jobTitle, phone) VALUES ('$email' , '$name' , '$message' , '$job', '$phone')");
    
    $response ="Successful";
    //var_dump($result);
    

    if($result){
        $to      = 'edzinovic96@gmail.com';
        $subject = 'Bumare job application';
        $message = "Name: " . $name . "\r\nE-mail: " . $email . "\r\nJob title: " . $job . "\r\nPhone: " . $phone . "\r\nMessage: " . $message;
        //$headers = 'From: emina.custovic11@gmail.com' . "\r\n" .
            //'Reply-To: emina.custovic11@gmail.com' . "\r\n" .
            //'X-Mailer: PHP/' . phpversion();
            //ini_set("SMTP","ssl://smtp.gmail.com");
            //ini_set("smtp_port","465");

        $mail_result = mail($to, $subject, $message);
        //var_dump( $mail_result );
    }else{
          $response_array['status'] = 'error';
          die();
        }
    }else{
        var_dump(http_response_code(404));
        die();
    } 
}
*/
?>