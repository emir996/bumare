<?php 

class Userslist {

	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAll(){

		$query = "SELECT * FROM users";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllEmp(){

		$query = "SELECT * FROM employers";
		$result = $this->db->select($query);
		return $result;
	}	
}