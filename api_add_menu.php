<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
        
    include_once 'connectdb.php';
    include_once 'menu.php';
        
    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();
        
    $menu = new Menu($conndb);
    $data = json_decode(file_get_contents('php://input'));
    $menu->menuName = $data->menuName;
    $menu->menuPrice = $data->menuPrice;
    $menu->menuType = $data->menuType;
    $menu->shopId = $data->shopId;

    $menu->menuImg1 = 'MENU1_' . uniqid() . '.jpg';
    $menu->menuImg2 = 'MENU2_' . uniqid() . '.jpg';
    $menu->menuImg3 = 'MENU3_' . uniqid() . '.jpg';
    $fileName1 = base64_decode($data->menuImg1);
    $fileName2 = base64_decode($data->menuImg2);
    $fileName3 = base64_decode($data->menuImg3);
    file_put_contents('images/menus/' . $menu->menuImg1 , $fileName1);
    file_put_contents('images/menus/' . $menu->menuImg2 , $fileName2);
    file_put_contents('images/menus/' . $menu->menuImg3 , $fileName3);

    if($menu->addMenu()){
        $result = array(
            'message' => '1'
        );
        http_response_code(201);
        echo json_encode($result);
    }else{
        $result = array(
            'message' => '0'
        );
        http_response_code(500);
        echo json_encode($result);
    }
?>