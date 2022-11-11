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

        public function registerCustomer(){
            $strSql = 'INSERT INTO customer_tb (custName , custPhone , custEmail , custImage , custUsername , custPassword) VALUES(? , ? , ? , ? , ? , ?)';
            $stmt = $this->conndb->prepare($strSql);
            $this->custName = htmlspecialchars(strip_tags($this->custName));
            $this->custPhone = htmlspecialchars(strip_tags($this->custPhone));
            $this->custEmail = htmlspecialchars(strip_tags($this->custEmail));
            $this->custImage = htmlspecialchars(strip_tags($this->custImage));
            $this->custUsername = htmlspecialchars(strip_tags($this->custUsername));
            $this->custPassword = htmlspecialchars(strip_tags($this->custPassword));
            $stmt->bindparam(1 , $this->custName);
            $stmt->bindparam(2 , $this->custPhone);
            $stmt->bindparam(3 , $this->custEmail);
            $stmt->bindparam(4 , $this->custImage);
            $stmt->bindparam(5 , $this->custUsername);
            $stmt->bindparam(6 , $this->custPassword);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }             
        }

        public function updateCustomer(){
            $strSql = '';
            if(empty($this->custImage)){
                $strSql = 'UPDATE customer_tb SET custName = ? , custPhone = ? , custEmail = ? , custUsername = ? , custPassword = ? WHERE custId = ?';
                $stmt = $this->conndb->prepare($strSql);            
                $this->custName = htmlspecialchars(strip_tags($this->custName));
                $this->custPhone = htmlspecialchars(strip_tags($this->custPhone));
                $this->custEmail = htmlspecialchars(strip_tags($this->custEmail));
                $this->custUsername = htmlspecialchars(strip_tags($this->custUsername));
                $this->custPassword = htmlspecialchars(strip_tags($this->custPassword));
                $this->custId = intval(htmlspecialchars(strip_tags($this->custId)));
                $stmt->bindparam(1 , $this->custName);
                $stmt->bindparam(2 , $this->custPhone);
                $stmt->bindparam(3 , $this->custEmail);
                $stmt->bindparam(4 , $this->custUsername);
                $stmt->bindparam(5 , $this->custPassword);
                $stmt->bindparam(6 , $this->custId);
            }else{
                $strSql = 'UPDATE customer_tb SET custName = ? , custPhone = ? , custEmail = ? , custImage = ? , custUsername = ? , custPassword = ? WHERE custId = ?';
                $stmt = $this->conndb->prepare($strSql);            
                $this->custName = htmlspecialchars(strip_tags($this->custName));
                $this->custPhone = htmlspecialchars(strip_tags($this->custPhone));
                $this->custEmail = htmlspecialchars(strip_tags($this->custEmail));
                $this->custImage = htmlspecialchars(strip_tags($this->custImage));
                $this->custUsername = htmlspecialchars(strip_tags($this->custUsername));
                $this->custPassword = htmlspecialchars(strip_tags($this->custPassword));
                $this->custId = intval(htmlspecialchars(strip_tags($this->custId)));
                $stmt->bindparam(1 , $this->custName);
                $stmt->bindparam(2 , $this->custPhone);
                $stmt->bindparam(3 , $this->custEmail);
                $stmt->bindparam(4 , $this->custImage);
                $stmt->bindparam(5 , $this->custUsername);
                $stmt->bindparam(6 , $this->custPassword);
                $stmt->bindparam(7 , $this->custId);
            }
            
            if($stmt->execute()){
                return true;
            }else{
                return false;
            }    
        }

        
    }
?>