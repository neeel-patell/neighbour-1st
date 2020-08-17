<?php
    header('content-type: application/json');
    $data = array();
    require '../connection.php';
    $conn = getConn();

    $cart = $_POST['cart'];
    $quantity = $_POST['quantity'];

    $cart_item = $conn->query("SELECT product_id from cart where id=$cart");
    $cart_item = $cart_item->fetch_array();

    $db_product = $conn->query("SELECT quantity from product where id=".$cart_item['product_id']);
    $db_product = $db_product->fetch_array();
    if($db_product['quantity'] >= $quantity){
        $query = "UPDATE cart SET quantity=$quantity WHERE id=$cart";
        if($conn->query($query) == true){
            array_push($data,array("message"=>"Quantity Updated"));
        }
        else{
            array_push($data,array("message"=>"Quantity is not updated"));
        }
    }
    else{
        array_push($data,array("message"=>"Try with less number of quantity"));
    }

    echo json_encode(array("data"=>$data));
?>