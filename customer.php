<?php 
    class Customer{
        private $conndb;

        public $custId;
        public $custName;
        public $custPhone;
        public $custEmail;
        public $custImage;
        public $custUsername;
        public $custPassword;
        public $modifyDate;
        public $message;

        public function __construct($db){
            $this->conndb = $db;
        }

        public function checkSignIn(){
            $strSql = 'SELECT * FROM customer_tb WHERE custUsername=? AND custPassword=?';
            $stmt = $this->conndb->prepare($strSql);
            $this->custUsername = htmlspecialchars(strip_tags($this->custUsername));
            $this->custPassword = htmlspecialchars(strip_tags($this->custPassword));
            $stmt->bindparam(1 , $this->custUsername);
            $stmt->bindparam(2 , $this->custPassword);
            $stmt->execute();
            return $stmt;
        }


    }
?>