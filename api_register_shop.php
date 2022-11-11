<?php 
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');
    
    include_once 'connectdb.php';
    include_once 'shop.php';
    
    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();
    
    $shop = new Shop($conndb);
    $data = json_decode(file_get_contents('php://input'));
    $shop->shopName = $data->shopName;
    $shop->shopAddress = $data->shopAddress;
    $shop->shopPhone = $data->shopPhone;
    $shop->shopLatitude = $data->shopLatitude;
    $shop->shopLongtitude = $data->shopLongtitude;
    $shop->shopStatus = $data->shopStatus;
    $shop->shopProvince = $data->shopProvince;

    $shop->shopImage = 'SHOP_' . uniqid() . '.jpg';
    $fileName = base64_decode($data->shopImage);
    file_put_contents('images/shops/' . $shop->shopImage , $fileName);

    if($shop->registerShop()){
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