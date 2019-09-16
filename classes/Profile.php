<?php 

class Profile {

    private $db;
    private $fm;

    public function __construct(){
        $this->db = new Database();
        $this->fm = new Format();
    }

    public function getAllRecords(){
        $query = "SELECT * FROM profiles ORDER BY id DESC";
        $result = $this->db->select($query);
        return $result;
    }

    public function getAllPublicRecords($is_public){
        $query = "SELECT * FROM profiles WHERE is_public = '$is_public'";
        $result = $this->db->Select($query);
        return $result;
    }

    public function getSingleRecord($id){
        $query = "SELECT * FROM profiles WHERE id=$id";
        $result = $this->db->select($query);
        return $result;
    }

    public function changeStatus(){

		$value = $_POST["public"]['value'] == "true" ? 1:0;

		$id = mysqli_real_escape_string($this->db->conn, $_POST['public']['id']);
		$value = mysqli_real_escape_string($this->db->conn, $value);

		$query = "UPDATE profiles SET is_public='$value' WHERE id ='$id'";
		$statusChanged = $this->db->update($query);
	}

    public function insertProfile(){

        $p_name = mysqli_real_escape_string($this->db->conn, $_POST['p_name']);
        $p_email = mysqli_real_escape_string($this->db->conn, $_POST['p_email']);
        $p_description = mysqli_real_escape_string($this->db->conn, $_POST['p_description']);
        $p_file_name = mysqli_real_escape_string($this->db->conn, $_FILES['p_file']['name']);
        $p_profession = mysqli_real_escape_string($this->db->conn, $_POST['p_profession']);
        $p_interest = mysqli_real_escape_string($this->db->conn, $_POST['p_interest']);

        $p_checkbox = isset($_POST['p_checkbox']) ? 1:0;
        mysqli_real_escape_string($this->db->conn, $p_checkbox);

        $parse_file = explode(".",$p_file_name);
        $ext = strtolower(end($parse_file));

        $allowed_type = array('pdf','docx','zip','doc');

        $unique_name = substr(md5(time()),0,7).".".$ext;
        $destination = "../../upload/" . $unique_name;

        if($_FILES['p_file']['size'] > 2000000){
            $msg = "File too large";
            exit($msg);
        }

        if(in_array($ext, $allowed_type)){
            move_uploaded_file($_FILES['p_file']['tmp_name'], $destination);
            $query = "INSERT INTO profiles (name, email, description, cv_file_name, profession,  interest, is_public) VALUES ('$p_name','$p_email','$p_description','$unique_name','$p_profession','$p_interest','$p_checkbox')";
            $inserted_profile = $this->db->insert($query);

            if($inserted_profile){
                $msg = "Profile Created Successfully";
                exit($msg);
            }
            
        } else {
            $msg = "You can only upload these extensions " . implode(",",$allowed_type);
            exit($msg);
        }

    }

    public function updateProfile(){

        $p_id = mysqli_real_escape_string($this->db->conn, $_POST['p_id']);
        $p_name = mysqli_real_escape_string($this->db->conn, $_POST['p_name']);
        $p_email = mysqli_real_escape_string($this->db->conn, $_POST['p_email']);
        $p_description = mysqli_real_escape_string($this->db->conn, $_POST['p_description']);
        $p_profession = mysqli_real_escape_string($this->db->conn, $_POST['p_profession']);
        $p_interest = mysqli_real_escape_string($this->db->conn, $_POST['p_interest']);

        $p_file_name = mysqli_real_escape_string($this->db->conn, $_FILES['p_file']['name']);

        $parsed = explode(".", $p_file_name);
        $ext = strtolower(end($parsed));

        $allowed_type = array('pdf','docx','doc');
        $unique_name = substr(md5(time()), 0, 7).".".$ext;
        $destination = "../../upload/" . $unique_name;

        if(empty($p_file_name))
        {
            $query = "UPDATE profiles SET
                name='$p_name',
                email='$p_email',
                description='$p_description',
                profession='$p_profession',
                interest='$p_interest'
                    WHERE id='$p_id'";

            $updated_row = $this->db->update($query);

            if($updated_row){
                $msg = "New changes successfuly done!";
                exit($msg);
            }
        } 
        else
        {
            if($_FILES['p_file']['size'] > 2000000){
                $msg = "Your file size must be less than 2mb";
                exit($msg);
            } else if(in_array($ext, $allowed_type) === false){
                $msg = "You can only upload files with these extensions " . implode(',',$allowed_type);
                exit($msg);
            } else {
                $this->unlinkProfileFile();
                move_uploaded_file($_FILES['p_file']['tmp_name'], $destination);
                $query = "UPDATE profiles SET
                    name='$p_name',
                    email='$p_email',
                    description='$p_description',
                    cv_file_name='$unique_name',
                    profession='$p_profession',
                    interest='$p_interest'
                        WHERE id='$p_id'";

                $updated_row = $this->db->update($query);
                if($updated_row){
                    $msg = "New changes successfuly done!";
                    exit($msg);
                }
            }
        }

    }

    private function unlinkProfileFile(){
        $selectFile = "SELECT cv_file_name FROM profiles WHERE id={$_POST['p_id']}";
        $getProfileFile = $this->db->select($selectFile);
        
        if($getProfileFile){
            while($delRowFile = $getProfileFile->fetch_assoc()){
                $del_link = "../../upload/" . $delRowFile["cv_file_name"];
                unlink($del_link);
            }
        }
    }

    public function delProfile(){
        $del_id = $_GET['delprofile'];
        $selectFile = "SELECT cv_file_name FROM profiles WHERE id={$del_id}";
        $getProfileFile = $this->db->select($selectFile);
        
        if($getProfileFile){
            while($delRowFile = $getProfileFile->fetch_assoc()){
                $del_link = "../../upload/" . $delRowFile["cv_file_name"];
                unlink($del_link);
            }
        }

        $query = "DELETE FROM profiles WHERE id={$del_id}";
        $deleted_row = $this->db->delete($query);

    }

}