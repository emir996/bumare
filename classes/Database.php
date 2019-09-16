<?php 

	class Database {

		public $conn;
		public $error;

		public function __construct(){

			$this->connectDB();
		}

		private function connectDB(){

			$this->conn = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

			if(!$this->conn){

				$this->error = "Connection Failed" . $this->conn->connect_error;
			}
		}

		public function select($query){

			$result = $this->conn->query($query) or die($this->conn->error.__LINE__);

			if($result->num_rows > 0){

				return $result;
			} else {

				return false;
			}
		}

		public function insertMessage($query){
        $insert_row = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if($insert_row){
            header('location: ../dashboard/index.php?msg='.urlencode("Data Successfuly Created"));
            exit();
        }else{
            die("Error: (".$this->conn->error.")".$this->conn->error);
        }
    }

        public function updateMessage($query){
            $update_row = $this->conn->query($query) or die($this->conn->error.__LINE__);

            if($update_row){
                header('location: ../dashboard/index.php?msg='.urlencode("Data Sucessfully Updated"));
                exit();
            }else{
                die("Error: (".$this->conn->error.")".$this->conn_error);
            }
        }

        public function deleteMessage($query){
            $delete_row = $this->conn->query($query) or die($this->conn->error.__LINE__);

            if($delete_row){
                header('location: ../dashboard/index.php?msg='.urlencode("Data Successfully Deleted"));
                exit();
            }else{
                die("Error: (".$this->conn->error.")".$this->conn->error);
            	}
        	}

        public function insert($query){

            $insert_message = $this->conn->query($query) or die($this->conn->error.__LINE__);

            if($insert_message){

                return $insert_message;
                exit();
            } else {

                return false;
            }
        }

        public function update($query){

            $update_message = $this->conn->query($query) or die($this->conn->error.__LINE__);

            if($update_message){

                return $update_message;
                exit();
            } else {
                return false;
            }
        }

        public function delete($query){

            $delete_message = $this->conn->query($query) or die($this->conn->error.__LINE__);

            if($delete_message){
                
                return $delete_message;
                exit();
            } else {
                return false;
            }
        }

        public function __destruct(){
            mysqli_close($this->conn);
        }

}