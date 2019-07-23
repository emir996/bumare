<?php

class Database{ 
/*
    private static $host = 'localhost';
    private static $user = 'root';
    private static $pass = '';
    private static $dbname = 'bumare_db';

    private static $conn;

    public static function connect(){
        self::$conn = null;

        if(!self::$conn){
            self::$conn = mysqli_connect(self::$host,self::$user,self::$pass, self::$dbname);
        }
        return self::$conn;
    }
    
    
*/

    private $host = 'localhost';
    private $user = 'bumare_user';
    private $pass = 'Bumare123!';
    private $dbname = 'bumare_db';

    public $conn;
    public $error;

    public function __construct(){
        $this->connect();
    }

    private function connect(){
        $this->conn = new mysqli($this->host, $this->user, $this->pass, $this->dbname);

        if(!$this->conn){
            $this->error = "Connection failed".$this->conn->connect_error();
        }
    }

    public function select($query){
        $result = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if($result->num_rows > 0){
            return $result;
        }else{
            return false;
        }
    }

    public function insert($query){
        $insert_row = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if($insert_row){
            header('location: index.php?msg='.urlencode("Data Successfuly Created"));
            exit();
        }else{
            die("Error: (".$this->conn->error.")".$this->conn->error);
        }
    }

    public function send_message($query){
        $message_sent = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if($message_sent){
            header('location: index.php?msg=Your email has been sent. We will get back to you as soon as possible!');
            exit();
        }else{
            die("Error: (".$this->conn->error.")".$this->conn->error);
      }
    }

    public function update($query){
        $update_row = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if($update_row){
            header('location: index.php?msg='.urlencode("Data Sucessfully Updated"));
            exit();
        }else{
            die("Error: (".$this->conn->error.")".$this->conn_error);
        }
    }

    public function delete($query){
        $delete_row = $this->conn->query($query) or die($this->conn->error.__LINE__);

        if($delete_row){
            header('location: index.php?msg='.urlencode("Data Successfully Deleted"));
            exit();
        }else{
            die("Error: (".$this->conn->error.")".$this->conn->error);
        }
    }


}