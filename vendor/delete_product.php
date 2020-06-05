<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $product = $_POST['product'];

    $query = "delete from product where id=$product";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Product Deleted"));
    }
    else{
        array_push($data,array("message"=>"Product is not Deleted"));
    }
    echo json_encode(array("data"=>$data));
    
?>