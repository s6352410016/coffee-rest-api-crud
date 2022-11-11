<?php
    class Menu{
       private $conndb;  
       public $menuId;     
       public $menuName;        
       public $menuPrice;       
       public $menuImg1;        
       public $menuImg2;        
       public $menuImg3;        
       public $menuType;        
       public $shopId;          
       
       public function __construct($db){
        $this->conndb = $db;
       }

       public function addMenu(){
        $strSql = 'INSERT INTO coffee_menu_tb (menuName , menuPrice , menuImg1 , menuImg2 , menuImg3 , menuType , shopId) VALUES(? , ? , ? , ? , ? , ? , ?)';
        $stmt = $this->conndb->prepare($strSql);
        $this->menuName = htmlspecialchars(strip_tags($this->menuName));
        $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
        $this->menuImg1 = htmlspecialchars(strip_tags($this->menuImg1));
        $this->menuImg2 = htmlspecialchars(strip_tags($this->menuImg2));
        $this->menuImg3 = htmlspecialchars(strip_tags($this->menuImg3));
        $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
        $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
        $stmt->bindparam(1 , $this->menuName);
        $stmt->bindparam(2 , $this->menuPrice);
        $stmt->bindparam(3 , $this->menuImg1);
        $stmt->bindparam(4 , $this->menuImg2);
        $stmt->bindparam(5 , $this->menuImg3);
        $stmt->bindparam(6 , $this->menuType);
        $stmt->bindparam(7 , $this->shopId);
        
        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function updateMenu(){
        if(empty($this->menuImg1) && empty($this->menuImg2)){
            $strSql = 'UPDATE coffee_menu_tb SET menuName = ? , menuPrice = ? , menuImg3 = ? , menuType = ? , shopId = ? WHERE menuId = ?';
            $stmt = $this->conndb->prepare($strSql);
            $this->menuName = htmlspecialchars(strip_tags($this->menuName));
            $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
            $this->menuImg3 = htmlspecialchars(strip_tags($this->menuImg3));
            $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
            $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
            $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
            $stmt->bindparam(1 , $this->menuName);
            $stmt->bindparam(2 , $this->menuPrice);
            $stmt->bindparam(3 , $this->menuImg3);
            $stmt->bindparam(4 , $this->menuType);
            $stmt->bindparam(5 , $this->shopId);
            $stmt->bindparam(6 , $this->menuId); 
        }

        if(empty($this->menuImg2) && empty($this->menuImg3)){
            $strSql = 'UPDATE coffee_menu_tb SET menuName = ? , menuPrice = ? , menuImg1 = ? , menuType = ? , shopId = ? WHERE menuId = ?';
            $stmt = $this->conndb->prepare($strSql);
            $this->menuName = htmlspecialchars(strip_tags($this->menuName));
            $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
            $this->menuImg1 = htmlspecialchars(strip_tags($this->menuImg1));
            $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
            $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
            $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
            $stmt->bindparam(1 , $this->menuName);
            $stmt->bindparam(2 , $this->menuPrice);
            $stmt->bindparam(3 , $this->menuImg1);
            $stmt->bindparam(4 , $this->menuType);
            $stmt->bindparam(5 , $this->shopId);
            $stmt->bindparam(6 , $this->menuId);
        }

        if(empty($this->menuImg1) && empty($this->menuImg3)){
            $strSql = 'UPDATE coffee_menu_tb SET menuName = ? , menuPrice = ? , menuImg2 = ? , menuType = ? , shopId = ? WHERE menuId = ?';
            $stmt = $this->conndb->prepare($strSql);
            $this->menuName = htmlspecialchars(strip_tags($this->menuName));
            $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
            $this->menuImg2 = htmlspecialchars(strip_tags($this->menuImg2));
            $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
            $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
            $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
            $stmt->bindparam(1 , $this->menuName);
            $stmt->bindparam(2 , $this->menuPrice);
            $stmt->bindparam(3 , $this->menuImg2);
            $stmt->bindparam(4 , $this->menuType);
            $stmt->bindparam(5 , $this->shopId);
            $stmt->bindparam(6 , $this->menuId);
        }

        if(empty($this->menuImg1)){
            $strSql = 'UPDATE coffee_menu_tb SET menuName = ? , menuPrice = ? , menuImg2 = ? , menuImg3 = ? , menuType = ? , shopId = ? WHERE menuId = ?';
            $stmt = $this->conndb->prepare($strSql);
            $this->menuName = htmlspecialchars(strip_tags($this->menuName));
            $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
            $this->menuImg2 = htmlspecialchars(strip_tags($this->menuImg2));
            $this->menuImg3 = htmlspecialchars(strip_tags($this->menuImg3));
            $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
            $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
            $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
            $stmt->bindparam(1 , $this->menuName);
            $stmt->bindparam(2 , $this->menuPrice);
            $stmt->bindparam(3 , $this->menuImg2);
            $stmt->bindparam(4 , $this->menuImg3);
            $stmt->bindparam(5 , $this->menuType);
            $stmt->bindparam(6 , $this->shopId);
            $stmt->bindparam(7 , $this->menuId);
        }
        
        if(empty($this->menuImg2)){
            $strSql = 'UPDATE coffee_menu_tb SET menuName = ? , menuPrice = ? , menuImg1 = ? , menuImg3 = ? , menuType = ? , shopId = ? WHERE menuId = ?';
            $stmt = $this->conndb->prepare($strSql);
            $this->menuName = htmlspecialchars(strip_tags($this->menuName));
            $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
            $this->menuImg1 = htmlspecialchars(strip_tags($this->menuImg1));
            $this->menuImg3 = htmlspecialchars(strip_tags($this->menuImg3));
            $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
            $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
            $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
            $stmt->bindparam(1 , $this->menuName);
            $stmt->bindparam(2 , $this->menuPrice);
            $stmt->bindparam(3 , $this->menuImg1);
            $stmt->bindparam(4 , $this->menuImg3);
            $stmt->bindparam(5 , $this->menuType);
            $stmt->bindparam(6 , $this->shopId);
            $stmt->bindparam(7 , $this->menuId);
        }
        
        if(empty($this->menuImg3)){
            $strSql = 'UPDATE coffee_menu_tb SET menuName = ? , menuPrice = ? , menuImg1 = ? , menuImg2 = ? , menuType = ? , shopId = ? WHERE menuId = ?';
            $stmt = $this->conndb->prepare($strSql);
            $this->menuName = htmlspecialchars(strip_tags($this->menuName));
            $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
            $this->menuImg1 = htmlspecialchars(strip_tags($this->menuImg1));
            $this->menuImg2 = htmlspecialchars(strip_tags($this->menuImg2));
            $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
            $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
            $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
            $stmt->bindparam(1 , $this->menuName);
            $stmt->bindparam(2 , $this->menuPrice);
            $stmt->bindparam(3 , $this->menuImg1);
            $stmt->bindparam(4 , $this->menuImg2);
            $stmt->bindparam(5 , $this->menuType);
            $stmt->bindparam(6 , $this->shopId);
            $stmt->bindparam(7 , $this->menuId);
        }
        
        if(empty($this->menuImg1) && empty($this->menuImg2) && empty($this->menuImg3)){
            $strSql = 'UPDATE coffee_menu_tb SET menuName = ? , menuPrice = ? , menuType = ? , shopId = ? WHERE menuId = ?';
            $stmt = $this->conndb->prepare($strSql);
            $this->menuName = htmlspecialchars(strip_tags($this->menuName));
            $this->menuPrice = doubleval(htmlspecialchars(strip_tags($this->menuPrice)));
            $this->menuType = intval(htmlspecialchars(strip_tags($this->menuType)));
            $this->shopId = intval(htmlspecialchars(strip_tags($this->shopId)));
            $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
            $stmt->bindparam(1 , $this->menuName);
            $stmt->bindparam(2 , $this->menuPrice);
            $stmt->bindparam(3 , $this->menuType);
            $stmt->bindparam(4 , $this->shopId);
            $stmt->bindparam(5 , $this->menuId);
        }

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function deleteMenu(){
        $strSql = 'DELETE FROM coffee_menu_tb WHERE menuId = ?';
        $stmt = $this->conndb->prepare($strSql);
        $this->menuId = intval(htmlspecialchars(strip_tags($this->menuId)));
        $stmt->bindparam(1 , $this->menuId);

        if($stmt->execute()){
            return true;
        }else{
            return false;
        }
    }

    public function showAllMenu(){
        $strSql = 'SELECT coffee_menu_tb.menuId , coffee_menu_tb.menuName , coffee_menu_tb.menuPrice , coffee_menu_tb.menuImg1 , coffee_menu_tb.menuImg2 , coffee_menu_tb.menuImg3 , coffee_menu_tb.menuType , coffee_menu_tb.shopId , shop_tb.shopName , shop_tb.shopId FROM coffee_menu_tb INNER JOIN shop_tb ON coffee_menu_tb.shopId = shop_tb.shopId ORDER BY menuId ASC';
        $stmt = $this->conndb->query($strSql);
        return $stmt;
    }
}
?>