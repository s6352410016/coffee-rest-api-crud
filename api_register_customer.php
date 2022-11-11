<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    include_once 'connectdb.php';
    include_once 'customer.php';
   
    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();

    $customer = new Customer($conndb);
    $data = json_decode(file_get_contents('php://input'));
    $customer->custName = $data->custName;
    $customer->custPhone = $data->custPhone;
    $customer->custEmail = $data->custEmail;
    $customer->custUsername = $data->custUsername;
    $customer->custPassword = $data->custPassword;

    $customer->custImage = 'DTI_' . uniqid() . '.jpg';  
    $realImage = base64_decode($data->custImage);
    file_put_contents('images/customers/' . $customer->custImage , $realImage);

    if($customer->registerCustomer()){
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