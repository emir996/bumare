<?php 

class Language {

	private $db;
	private $fm;

	public function __construct(){

		$this->db = new Database();
		$this->fm = new Format();
	}

	public function getAllCatLang(){ 

		$query = "SELECT * FROM categories_lang";
		$result = $this->db->select($query);
		return $result;

	}

	public function getCatByOneLang($id){

		$query = "SELECT * FROM categories_lang WHERE id = '{$_GET["lid"]}'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getAllLang(){ 

		$query = "SELECT languages_id.*, categories_lang.language
				  FROM languages_id
				  INNER JOIN categories_lang
				  ON languages_id.lang_id = categories_lang.id
				  ORDER BY languages_id.id ASC"; 
		$result = $this->db->select($query);
		return $result;

	}

	public function getLangById($id){

		$query = "SELECT * FROM languages_id WHERE id = $id";
		$result = $this->db->select($query);
		return $result;
	}

	public function getOneLang($lid){
		$query = "SELECT * FROM languages_id WHERE lang_id = '$lid'";
		$result = $this->db->select($query);
		return $result;
	}

	public function getLangByCat($q){

		$query = "SELECT * FROM languages_id WHERE lang_id = '".$q."'";
		$result = $this->db->select($query);
		return $result;
	}



	public function langInsert(){

		$key = mysqli_real_escape_string($this->db->conn, $_POST['txt_key']);
		$text_value = mysqli_real_escape_string($this->db->conn, $_POST['txt_value']);
		$selected_lang = mysqli_real_escape_string($this->db->conn, $_POST['sel_lang']);

		$key = $this->fm->validation($key);
		$text_value = $this->fm->validation($text_value);
		$selected_lang = $this->fm->validation($selected_lang);

		if(empty($key) || empty($text_value)){

			$error = "Fields must not be empty";
			return $error;
		}else if($selected_lang <= 0 || $selected_lang == NULL){

			$error = "You have to choose on of these languages above.";
			return $error;
		} else {

			$query = "INSERT INTO languages_id (array_key, array_value, lang_id) VALUES ('$key', '$text_value', $selected_lang)";
			$create = $this->db->insertMessage($query);
			if(!$create){

				$error = "Something get wrong, text did not created successfully.";
				return $error;
			}
		}
	}

	public function langUpdate(){

		$id = mysqli_real_escape_string($this->db->conn, $_POST['txt_id']);
		$textarea = mysqli_real_escape_string($this->db->conn, $_POST['tb_value']);
		$textarea = $this->fm->validation($textarea);
		

		if(empty($textarea)){

			$error = "Field for text must not be empty.";
			return $error;
		} else {

			$query = "UPDATE languages_id SET array_value='$textarea' WHERE id = $id";
			$result = $this->db->updateMessage($query);

			if(!$result){

				$error = "Something get wrong, text did not updated successfully.";
				return $error;
			}
		}

	}

	public function langDelete(){
		$id = $_GET['dellang'];
		$query = "DELETE FROM languages_id WHERE id=$id";
		$result = $this->db->deleteMessage($query);

		if(!$result){

			$error = "Something get wrong, text did not deleted successfully";
			return $error;
		}
	}

	public function catInsert(){
		$language = mysqli_real_escape_string($this->db->conn, $_POST['tb_name']);
		$language = $this->fm->validation($language);
		

		if(empty($language)){
			$error = "Field must not be empty";
			return $error;
		} else {

			$query = "INSERT INTO categories_lang (language) VALUES ('$language')";
			$create = $this->db->insert($query);

			if(!$create){
				$error = "Error, Something get Wrong!";
				return $error;
			}
		}
	}

	public function catUpdate(){

		$language = mysqli_real_escape_string($this->db->conn, $_POST['tb_name']);
		$language = $this->fm->validation($language);
		

		$selected_id = mysqli_real_escape_string($this->db->conn, $_GET['lid']);

		if(empty($language)){
			$error = "Field for text must not be empty.";
			return $error;
		} else {

			$query = "UPDATE categories_lang SET language='$language' WHERE id = '$selected_id'";
			$result = $this->db->update($query);

			if(!$result){
				$error = "Something get wrong, language did not updated successfully.";
				return $error;
			}
		}
	}

	public function catDelete(){

		$selected_id = $_GET['lid'];
		$query = "DELETE FROM categories_lang WHERE id = '$selected_id'";
		$result = $this->db->delete($query);

		if(!$result){
			$error = "Something get wrong, language did not deleted successfully";
			return $error; 
		}
	}



}