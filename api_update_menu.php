<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
        
    include_once 'connectdb.php';
    include_once 'menu.php';
        
    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();
        
    $menu = new Menu($conndb);
    $data = json_decode(file_get_contents('php://input'));
    $menu->menuId = $data->menuId;
    $menu->menuName = $data->menuName;
    $menu->menuPrice = $data->menuPrice;
    $menu->menuType = $data->menuType;
    $menu->shopId = $data->shopId;

    if(!empty($data->menuImg1)){
        $menu->menuImg1 = 'MENU1_' . uniqid() . '.jpg';
        $fileName1 = base64_decode($data->menuImg1);
        file_put_contents('images/menus/' . $menu->menuImg1 , $fileName1);
    }

    if(!empty($data->menuImg2)){
        $menu->menuImg2 = 'MENU2_' . uniqid() . '.jpg';
        $fileName2 = base64_decode($data->menuImg2);
        file_put_contents('images/menus/' . $menu->menuImg2 , $fileName2);
    }

    if(!empty($data->menuImg3)){
        $menu->menuImg3 = 'MENU3_' . uniqid() . '.jpg';
        $fileName3 = base64_decode($data->menuImg3);
        file_put_contents('images/menus/' . $menu->menuImg3 , $fileName3);
    }

    if($menu->updateMenu()){
        $result = array(
            'message' => '1'
        );
        http_response_code(200);
        echo json_encode($result);
    }else{
        $result = array(
            'message' => '0'
        );
        http_response_code(500);
        echo json_encode($result);
    }
?>