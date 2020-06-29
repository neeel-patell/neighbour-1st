<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $store = $_POST['store'];
    $order = $_POST['order'];
    
    $order_array = $conn->query("select created_at'date',address_id from `order` where id=$order");
    $order_array = $order_array->fetch_array();
    $query = "SELECT line1,line2,area_id,first_name,last_name,mobile from user_address where id=".$order_array['address_id'];
    $address = $conn->query($query);
    $address = $address->fetch_array();
    $user = $address['first_name']." ".$address['last_name'];

    $area = $conn->query("select name,pincode,city_id from area where id=".$address['area_id']);
    $area = $area->fetch_array();

    $city = $conn->query("select name,state_id from city where id=".$area['city_id']);
    $city = $city->fetch_array();

    $state = $conn->query("select name from state where id=".$city['state_id']);
    $state = $state->fetch_array();

    $address = $address['line1'].", ".$address['line2'].", ".$area['name'].", ".$city['name'].", ".$state['name']." - ".$area['pincode'];

    $product = $conn->query("select id from product where store_id=$store");
    $product_db = array();
    while($row = $product->fetch_array()){
        array_push($product_db,$row['id']);
    }
    $product_array = $conn->query("SELECT product_id,quantity from order_product where order_id=$order");
    $product_response = array();
    while($row = $product_array->fetch_array()){
        if(in_array($row['product_id'],$product_db) == true){
            array_push($product_response,array("id"=>$row['product_id'],"quantity"=>$row['quantity']));
        }
    }

    $date = date('dS F Y',strtotime($order_array['date']));
    $time = date('H:i A',strtotime($order_array['date']));
    
    if($product_response != null){
        array_push($data,array("name"=>$user,"date"=>$date,"time"=>$time,"address"=>$address,"product"=>$product_response));
    }
    echo json_encode(array("data"=>$data));
?>