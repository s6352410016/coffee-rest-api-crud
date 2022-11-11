<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
            
    include_once 'connectdb.php';
    include_once 'menu.php';
            
    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();
            
    $menu = new Menu($conndb);
    $stmt = $menu->showAllMenu();

    $menu_arr = array();
    while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($rows);
        $rows_arr = array(
            'message' => '1',
            'menuId' => $menuId,
            'menuName' => $menuName,
            'menuPrice' => $menuPrice,
            'menuImg1' => $menuImg1,
            'menuImg2' => $menuImg2,
            'menuImg3' => $menuImg3,
            'menuType' => $menuType,
            'shopId_coffee_menu' => $shopId,
            'shopId_shop_tb' => $shopId,
            'shopName' => $shopName   
        );
        array_push($menu_arr , $rows_arr);
    }
    http_response_code(200);
    echo json_encode($menu_arr);

?>