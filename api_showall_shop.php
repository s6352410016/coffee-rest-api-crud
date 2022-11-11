<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    
    include_once 'connectdb.php';
    include_once 'shop.php';
    
    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();
    
    $shop = new Shop($conndb);
    $stmt = $shop->showAllShop();

    $shop_arr = array();
    while($rows = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($rows);
        $rows_arr = array(
            'message' => '1',
            'shopId' => $shopId,
            'shopName' => $shopName,
            'shopAddress' => $shopAddress,
            'shopPhone' => $shopPhone,
            'shopLatitude' => $shopLatitude,
            'shopLongtitude' => $shopLongtitude,
            'shopImage' => $shopImage,
            'shopStatus' => $shopStatus,
            'shopProvince' => $shopProvince
        );
        array_push($shop_arr , $rows_arr);
    }
    http_response_code(200);
    echo json_encode($shop_arr);
?>