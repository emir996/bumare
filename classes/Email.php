<?php 

class Email
{

	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}


	public function send(){

		$email = mysqli_real_escape_string($this->db->conn, $_POST['email']);
		$name = mysqli_real_escape_string($this->db->conn, $_POST['name']);
		$message = mysqli_real_escape_string($this->db->conn, $_POST['message']);
		$job = mysqli_real_escape_string($this->db->conn, $_POST['jobTitle']);
		$phone = mysqli_real_escape_string($this->db->conn, $_POST['phoneNumber']);
		$age = mysqli_real_escape_string($this->db->conn, $_POST['age']);

		$email = $this->fm->validation($email);
		$name = $this->fm->validation($name);
		$message = $this->fm->validation($message);
		$job = $this->fm->validation($job);
		$phone = $this->fm->validation($phone);

		if(empty($email) || empty($name) || empty($message) || empty($job)){

			$response = "Fill all fields";
			return $response;
			var_dump(http_response_code(404));
			die();
		} else if(!$age === ""){

			var_dump("age");
			var_dump(http_response_code(404));
			die();
		} else {

			$secretKey = "";
		    $responseKey = $_POST['g-recaptcha-response'];
		    $userIP = $_SERVER['REMOTE_ADDR'];
		    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
		    $res = file_get_contents($url);
		    $res = json_decode($res);

			if($res->success){

				$query = "INSERT INTO users (email, name, message, jobTitle, phone) VALUES ('$email','$name','$message','$job','$phone')";
				$result = $this->db->insert($query);
				$response = "Successfully";

					if($result){
						$to = "arman@bumare.de";
						$subject = "Bumare";
						$msg = $message;
						$headers = "MIME-Version: 1.0" . "\r\n";
						$headers. = "Content-type:text/html;charset=UTF-8" . "\r\n";

						mail($to, $subject, $msg, $headers);
					}
			} else {

				var_dump(http_response_code(404));
				die();
			}
		}
	}

	public function sendToEmployer(){

		$name = mysqli_real_escape_string($this->db->conn, $_POST['name']);
		$email = mysqli_real_escape_string($this->db->conn, $_POST['email']);
		$message = mysqli_real_escape_string($this->db->conn, $_POST['message']);
		$age = mysqli_real_escape_string($this->db->conn, $_POST['age']);

		$name = $this->fm->validation($name);
		$email = $this->fm->validation($email);
		$message = $this->fm->validation($message);


		if(empty($name) || empty($email) || empty($message)){

			$response = "Fill all fields";
			return $response;
			var_dump(http_response_code(404));
			die();
		} else if(!$age === ""){

			$response = "Error";
			return $response;
			var_dump("age");
			var_dump(http_response_code(404));
		} else {

				$secretKey = "";
			    $responseKey = $_POST['g-recaptcha-response'];
			    $userIP = $_SERVER['REMOTE_ADDR'];
			    $url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$responseKey&remoteip=$userIP";
			    $res = file_get_contents($url);
			    $res = json_decode($res);

			    if($res->success){

					$query = "INSERT INTO employers (name, email, message) VALUES ('$name','$email','$message')";
					$result = $this->db->insert($query);
					$response = "Success";

						if($result){
							
							$to = "arman@bumare.de";
							$subject = "Bumare Employers";
							$msg = $message;
							$headers = "MIME-Version: 1.0" . "\r\n";
							$headers. = "Content-type:text/html;charset=UTF-8" . "\r\n";

							mail($to, $subject, $msg, $headers);

						}

					} else {

						var_dump(http_response_code(404));
						die();
					}
				}
			}
			
}