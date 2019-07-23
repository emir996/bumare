<?php

class Translation {

	private $db;
	private $fm;

	public function __construct(){
		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getLang($lang_id){

		$query = "SELECT * FROM languages_id WHERE lang_id = $lang_id";
		$result = $this->db->select($query);
		return $result;

	}

}

