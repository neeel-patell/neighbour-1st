<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $order = $_POST['order'];
    $query = "UPDATE `order`
              SET status = 1
              WHERE id = $order";
    //not to user
    if($conn->query($query)){
        array_push($data,array("message"=>"Order Status changed Successfully"));
    }
    else{
        array_push($data,array("message"=>"Something Went Wrong ... "));
    }

    echo json_encode(array("data"=>$data));
?>