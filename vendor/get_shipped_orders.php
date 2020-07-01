<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $store = $_POST['store'];
    $product = $conn->query("select id from product where store_id=$store");
    $product_array = array();
    while($row = $product->fetch_array()){
        array_push($product_array,$row['id']);
    }
    $product_string = implode(",",$product_array);
    $query = "SELECT DISTINCT(order_id)'id' FROM order_product where product_id IN($product_string)";
    $order = $conn->query($query);
    $order_array = array();
    while($row = $order->fetch_array()){
        array_push($order_array,$row['id']);
    }
    $order_string = implode(",",$order_array);
    $query = "SELECT id,address_id,created_at'date' from `order` where id IN($order_string) AND `status`=1  order by created_at desc";
    $result = $conn->query($query);
    while($row = $result->fetch_array()){
        $user = $conn->query("select first_name,last_name from user_address where id=".$row['address_id']);
        $user = $user->fetch_array();
        $user = $user['first_name']." ".$user['last_name'];
        $date = date('dS F Y',strtotime($row['date']));
        $time = date('H:i A',strtotime($row['date']));
        $order_product = $conn->query("SELECT product_id,quantity from order_product where order_id=".$row['id']);
        $total = 0;
        while($row1 = $order_product->fetch_array()){
            $product = $conn->query("select price,weight from product where store_id=$store AND id=".$row1['product_id']);
            if(mysqli_num_rows($product) != 0){
                $product = $product->fetch_array();
                $total += ($product['price']*$row1['quantity']);
            }
        }
        array_push($data,array("id"=>$row['id'],"username"=>$user,"total"=>$total,"date"=>$date,"time"=>$time));
    }

    echo json_encode(array("data"=>$data));
?>