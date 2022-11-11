<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
            
    include_once 'connectdb.php';
    include_once 'menu.php';
            
    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();
            
    $menu = new Menu($conndb);
    $data = json_decode(file_get_contents('php://input'));
    $menu->shopId = $data->shopId;
    $stmt = $menu->showAllMenu();

    $arr = array();  
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $menu_arr = array(
            'message' => '1',
            'menuName' => $row['menuName'],
            'menuPrice' => $row['menuPrice'],
            'menuImg1' => $row['menuImg1'],
            'menuImg2' => $row['menuImg2'],
            'menuImg3' => $row['menuImg3'],
            'menuType' => $row['menuType'],
            'shopId' => $row['shopId']
        ); 
        array_push($arr , $menu_arr);
    }

    http_response_code(200);
    echo json_encode($arr);
?>