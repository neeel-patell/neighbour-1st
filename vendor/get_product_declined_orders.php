<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $product = $_POST['product'];
    $product_query = $conn->query("SELECT price from product where id=$product");
    $product_query = $product_query->fetch_array();
    $product_price = $product_query['price'];
    $query = "SELECT order_id,quantity from order_product where product_id=$product";
    $order_product = $conn->query($query);
    while($row = $order_product->fetch_array()){
        $query = "SELECT id,created_at'date',address_id from `order` where `status`=3 AND id=".$row['order_id'];
        $order = $conn->query($query);
        if(mysqli_num_rows($order) != 0){
            $order = $order->fetch_array();
            $user = $conn->query("select first_name,last_name from user_address where id=".$order['address_id']);
            $user = $user->fetch_array();
            $user = $user['first_name']." ".$user['last_name'];
            $date = date('dS F Y',strtotime($order['date']));
            $time = date('H:i A',strtotime($order['date']));
            $total = $product_price * $row['quantity'];
            array_push($data,array("id"=>$order['id'],"username"=>$user,"total"=>$total,"date"=>$date,"time"=>$time));
        }
    }
    
    echo json_encode(array("data"=>$data));
?>