<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $order = $_POST['order'];

    $query = "select product_id,quantity from `order` where id=$order";
    $result = $conn->query($query);
    $result = $result->fetch_array();
    $product = $result['product_id'];
    $quantity = $result['quantity'];

    $query = "UPDATE product SET quantity=quantity+$quantity WHERE id=$product;
              UPDATE `order` SET `status`=3 WHERE id=$order;";
    // notification to user
    if($conn->multi_query($query)){
        array_push($data,array("message"=>"Order has been declined"));
    }
    else{
        array_push($data,array("message"=>"Something Went Wrong ... "));
    }

    echo json_encode(array("data"=>$data));
?>