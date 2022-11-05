<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json; charset=UTF-8');

    include_once 'connectdb.php';
    include_once 'customer.php';

    $connectDB = new ConnectDB();
    $conndb = $connectDB->getConnection();

    $customer = new Customer($conndb);
    $data = json_decode(file_get_contents('php://input'));
    $customer->custUsername = $data->custUsername;
    $customer->custPassword = $data->custPassword;
    $stmt = $customer->checkSignIn();
    $num = $stmt->rowCount();

    $customer_arr = array();
    if($num > 0){ 
        while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $customer_item = array(
                'message' => '1',
                'custId' => $custId,             
                'custName' => $custName,             
                'custPhone' => $custPhone,             
                'custEmail' => $custEmail,             
                'custImage' => $custImage,             
            );
            array_push($customer_arr , $customer_item);
        }
        http_response_code(200);
        echo json_encode($customer_arr);
    }else{
        $customer_item = array(
            'message' => '0'
        );
        array_push($customer_arr , $customer_item);
        http_response_code(400);
        echo json_encode($customer_arr);
    }
?>