<?php
    header('content-type: application/json');
    $data = array();
    require '../connection.php';
    $conn = getConn();

    $user = $_POST['user'];
    $product = $_POST['product'];
    $quantity = $_POST['quantity'];

    $db_product = $conn->query("SELECT quantity from product where id=$product");
    $db_product = $db_product->fetch_array();
    if($db_product['quantity'] >= $quantity){
        $query = "INSERT INTO cart(product_id,user_id,quantity) VALUES($product,$user,$quantity)";
        if($conn->query($query) == true){
            array_push($data,array("message"=>"Item(s) added to cart"));
        }
        else{
            array_push($data,array("message"=>"Item(s) not added to cart"));
        }
    }
    else{
        array_push($data,array("message"=>"Try with less number of quantity"));
    }

    echo json_encode(array("data"=>$data));
?>