<?php
    // Post variables will be product,quantity,user,address,payment_by(card/vpa/cash),payment_method,amount
    require 'order_required_functions.php';
    require_once '../connection.php';
    require '../mail/mail_sender.php';
    require 'random_string_generator.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $flag = true;
    while($flag){
        $order = getRandomString(15);
        $result = $conn->query("SELECT id from `order` where id='$order'");
        if(mysqli_num_rows($result) == 0){
            $flag = false;
        }
    }

    $flag = true;
    while($flag){
        $payment = getRandomString(15);
        $result = $conn->query("SELECT id from `order_payment` where id='$payment'");
        if(mysqli_num_rows($result) == 0){
            $flag = false;
        }
    }

    $product = $_POST['product'];
    $product_details = $conn->query("SELECT price,store_id from product where id=$product");
    $product_details = $product_details->fetch_array();
    $price = $product_details['price'];
    $store = $product_details['store_id'];
    $quantity = $_POST['quantity'];

    $payment_by = $_POST['payment_by'];
    $payment_method = $_POST['payment_method'];
    $amount = $_POST['amount'];

    $login = $_POST['user'];
    $address = $_POST['address'];    

    $query = "INSERT INTO order_payment(id,amount,method,payment_by) VALUES('$payment',$amount,$payment_method,'$payment_by');";
    
    if($conn->query($query)){
        $query = "INSERT INTO `order`(id,user_id,address_id,payment_id) VALUES('$order',$login,$address,'$payment');";
        if($conn->query($query)){
            $query = "INSERT INTO order_product(order_id,product_id,quantity,price) VALUES('$order',$product,$quantity,$price);";
            $query .= "INSERT INTO order_stores(order_id,store_id) VALUES('$order',$store);";
            if($conn->multi_query($query) == true){

                // I got error as (Commands out of sync; you can't run this command now) which means I can't update quantity on id came in $product so I just changed connection by destroying old one and by applying new connection ... 
                $conn->close();
                $conn = getConn();

                $query = "UPDATE product SET quantity = quantity - $quantity WHERE id=$product";
                if($conn->query($query) == true){
                    $data = array("message"=>"Your order is successfully Placed");
                }
                else{
                    delete_order_products($order);
                    delete_order_store($order);
                    delete_order($order);
                    delete_payment($payment);
                    $data = array("message"=>"Order Failed");
                }
            }
            else{
                delete_order($order);
                delete_payment($payment);
                $data = array("message"=>"Order Failed");
            }
        }
        else{
            delete_payment($payment);
            $data = array("message"=>"Order Failed");
        }
    }
    else{
        $data = array("message"=>"Order Failed");
    }

    echo json_encode(array("data"=>$data));
?>