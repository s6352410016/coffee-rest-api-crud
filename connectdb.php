<?php 
    class ConnectDB{
        private $host = 'localhost';
        private $username = 'root';
        private $password = '';
        private $database = 'coffee_cafe_db';
        public $conn;

        public function getConnection(){
           try{
            $this->conn = null;
            $this->conn = new PDO("mysql:host={$this->host};dbname={$this->database}" , $this->username , $this->password);
            $this->conn->exec('set names utf8');
           }catch(PDOException $e){
            echo $e->getMessage();
           }
           return $this->conn;
        }
    }
?>