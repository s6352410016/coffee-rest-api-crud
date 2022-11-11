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
    
    if($menu->deleteMenu()){
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