<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $quantity = $_POST['quantity'];
    $method = $_POST['method'];
    $id = $_POST['product'];

    $query = "SELECT quantity FROM product WHERE id=$id";
    $result = $conn->query($query);
    $pro_quantity = $result->fetch_array();
    if($method === "add"){
        $quantity = $pro_quantity['quantity'] + $quantity;
    }
    else if($method === "remove"){
        $quantity = $pro_quantity['quantity'] - $quantity;
        if($quantity < 0){
            $quantity = 0;
        }
    }

    $query = "UPDATE product SET
              quantity=$quantity
              WHERE id=$id";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"updated"));
    }
    else{
        array_push($data,array("message"=>"not updated"));
    }
    echo json_encode(array("data"=>$data));
?>