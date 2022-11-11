<?php 
    class Shop{
        private $conndb;
        public $shopId; 
        public $shopName;      
        public $shopAddress;    
        public $shopPhone;    
        public $shopLatitude;  
        public $shopLongtitude; 
        public $shopImage;  
        public $shopStatus;  
        public $shopProvince;  

        public function __construct($db){
            $this->conndb = $db;
        }

        public function registerShop(){
            $strSql = 'INSERT INTO shop_tb (shopName , shopAddress , shopPhone , shopLatitude , shopLongtitude , shopImage , shopStatus , shopProvince) VALUES(? , ? , ? , ? , ? , ? , ? , ?);';
            $stmt = $this->conndb->prepare($strSql);
            $this->shopName = htmlspecialchars(strip_tags($this->shopName));
            $this->shopAddress = htmlspecialchars(strip_tags($this->shopAddress));
            $this->shopPhone = htmlspecialchars(strip_tags($this->shopPhone));
            $this->shopLatitude = doubleval(htmlspecialchars(strip_tags($this->shopLatitude)));
            $this->shopLongtitude = doubleval(htmlspecialchars(strip_tags($this->shopLongtitude)));
            $this->shopImage = htmlspecialchars(strip_tags($this->shopImage));
            $this->shopStatus = intval(htmlspecialchars(strip_tags($this->shopStatus)));
            $this->shopProvince = htmlspecialchars(strip_tags($this->shopProvince));
            $stmt->bindparam(1 , $this->shopName);
            $stmt->bindparam(2 , $this->shopAddress);
            $stmt->bindparam(3 , $this->shopPhone);
            $stmt->bindparam(4 , $this->shopLatitude);
            $stmt->bindparam(5 , $this->shopLongtitude);
            $stmt->bindparam(6 , $this->shopImage);
            $stmt->bindparam(7 , $this->shopStatus);
            $stmt->bindparam(8 , $this->shopProvince);

            if($stmt->execute()){
                return true;
            }else{
                return false;
            }
        }

        public function updateShop(){
            if(empty($this->shopImage)){
                $strSql = 'UPDATE shop_tb SET shopName = ? , shopAddress = ? , shopPhone = ? , shopLatitude = ? , shopLongtitude = ? , shopStatus = ? , shopProvince = ? WHERE shopId = ?';
                $stmt = $this->conndb->prepare($strSql);
                $this->shopName = htmlspecialchars(strip_tags($this->shopName));
                $this->shopAddress = htmlspecialchars(strip_tags($this->shopAddress));
                $this->shopPhone = htmlspecialchars(strip_tags($this->shopPhone));
                $this->shopLatitude = doubleval(htmlspecialchars(strip_tags($this->shopLatitude)));
                $this->shopLongtitude = doubleval(htmlspecialchars(strip_tags($this->shopLongtitude)));
                $this->shopStatus = intval(htmlspecialchars(strip_tags($this->shopStatus)));
                $this->shopProvince = htmlspecialchars(strip_tags($this->shopProvince));
                $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
                $stmt->bindparam(1 , $this->shopName);
                $stmt->bindparam(2 , $this->shopAddress);
                $stmt->bindparam(3 , $this->shopPhone);
                $stmt->bindparam(4 , $this->shopLatitude);
                $stmt->bindparam(5 , $this->shopLongtitude);
                $stmt->bindparam(6 , $this->shopStatus);
                $stmt->bindparam(7 , $this->shopProvince);
                $stmt->bindparam(8 , $this->shopId);

                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }else{
                $strSql = 'UPDATE shop_tb SET shopName = ? , shopAddress = ? , shopPhone = ? , shopLatitude = ? , shopLongtitude = ? , shopImage = ? , shopStatus = ? , shopProvince = ? WHERE shopId = ?';
                $stmt = $this->conndb->prepare($strSql);
                $this->shopName = htmlspecialchars(strip_tags($this->shopName));
                $this->shopAddress = htmlspecialchars(strip_tags($this->shopAddress));
                $this->shopPhone = htmlspecialchars(strip_tags($this->shopPhone));
                $this->shopLatitude = doubleval(htmlspecialchars(strip_tags($this->shopLatitude)));
                $this->shopLongtitude = doubleval(htmlspecialchars(strip_tags($this->shopLongtitude)));
                $this->shopImage = htmlspecialchars(strip_tags($this->shopImage));
                $this->shopStatus = intval(htmlspecialchars(strip_tags($this->shopStatus)));
                $this->shopProvince = htmlspecialchars(strip_tags($this->shopProvince));
                $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
                $stmt->bindparam(1 , $this->shopName);
                $stmt->bindparam(2 , $this->shopAddress);
                $stmt->bindparam(3 , $this->shopPhone);
                $stmt->bindparam(4 , $this->shopLatitude);
                $stmt->bindparam(5 , $this->shopLongtitude);
                $stmt->bindparam(6 , $this->shopImage);
                $stmt->bindparam(7 , $this->shopStatus);
                $stmt->bindparam(8 , $this->shopProvince);
                $stmt->bindparam(9 , $this->shopId);

                if($stmt->execute()){
                    return true;
                }else{
                    return false;
                }
            }
        }

        public function showAllShop(){
            $strSql = 'SELECT * FROM shop_tb';
            $stmt = $this->conndb->query($strSql);
            return $stmt;
        }
    }
?>