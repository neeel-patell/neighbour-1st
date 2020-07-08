<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();
    $vendor_product = array();
    $product = array();

    $order = $_POST['order'];
    $store = $_POST['store'];

    $query = "SELECT id from product where store_id=$store";
    $result = $conn->query($query);
    if(mysqli_num_rows($result) != 0){
        while($row = $result->fetch_array()){
            array_push($product,$row['id']);
        }

        $query = "SELECT product_id,quantity FROM order_product where order_id=$order";
        $result = $conn->query($query);
        while($row = $result->fetch_array()){
            if(in_array($row['product_id'],$product)){
                array_push($vendor_product,array("product_id"=>$row['product_id'],"quantity"=>$row['quantity']));
            }
        }

        $vendor_product_string = "";
        for($i=0; $i<count($vendor_product);$i++){
            $vendor_product_string .= $vendor_product[$i]['product_id'].",";
        }
        $vendor_product_string[-1] = " ";
        $vendor_product_string = rtrim($vendor_product_string);
        
        $query = "DELETE FROM order_product where order_id=$order AND product_id IN($vendor_product_string)";
        if($conn->query($query) == true){
            $order_details = $conn->query("SELECT user_id,address_id from `order` where id=$order");
            $order_details = $order_details->fetch_array();
            $user_id = $order_details['user_id'];
            $address_id = $order_details['address_id'];
            $query = "INSERT INTO `order`(user_id,address_id,`status`) VALUES($user_id,$address_id,3)";
            if($conn->query($query) == true){
                $query = "select id from `order` where user_id=$user_id AND address_id=$address_id AND `status`=3 order by id desc LIMIT 0,1";
                $order_id = $conn->query($query);
                $order_id = $order_id->fetch_array();
                $order_id = $order_id['id'];
                $query = "";
                for($i=0; $i<count($vendor_product);$i++){
                    $product_id = $vendor_product[$i]['product_id'];
                    $quantity = $vendor_product[$i]['quantity'];
                    $update_query = "UPDATE product
                                      SET quantity = quantity + $quantity
                                      WHERE id=$product_id;";
                    $conn->query($update_query);
                    $query .= "INSERT INTO order_product(order_id,product_id,quantity) VALUES($order_id,$product_id,$quantity);";
                }
                if($conn->multi_query($query) == true){
                    array_push($data,array("message"=>"Status has changed to declined"));
                }
                else{
                    array_push($data,array("message"=>"Status has not changed"));
                }
            }
            else{
                array_push($data,array("message"=>"Status has not changed"));
            }
        }
        else{
            array_push($data,array("message"=>"Status has not changed"));
        }
    }

    echo json_encode(array("data"=>$data));
?>