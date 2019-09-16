<?php 

Session::checkLogin();

class Adminlogin {

	private $db;
	private $fm;

	public $username;
	public $password;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}

	public function adminLogin(){

		$username = mysqli_real_escape_string($this->db->conn, $_POST['tb_username']);
		$password = mysqli_real_escape_string($this->db->conn, md5($_POST['tb_password']));

		$username = $this->fm->validation($username);
		$password = $this->fm->validation($password);

		if(empty($username) || empty($password)){
			$loginmsg = "Field must not be empty";
			return $loginmsg;
		} else {

			$query = "SELECT * FROM administrator WHERE username='$username' AND password='$password' LIMIT 1";
			$result = $this->db->select($query);

			if($result == true){

				$value = $result->fetch_assoc();
				Session::set("adminlogin", true);
				Session::set("id", $value['id']);
				Session::set("username", $value['username']);
				header('location: dashboard/');

			}else{

				$loginmsg = "Check your username or password.";
				return $loginmsg;
			}
		} 
		
	}
}