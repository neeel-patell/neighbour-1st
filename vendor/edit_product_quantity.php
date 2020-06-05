<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $quantity = $_POST['quantity'];
    $id = $_POST['product'];

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