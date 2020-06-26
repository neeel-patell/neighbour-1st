<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $address = $_POST['id'];
    $query = "delete from user_address where id=$address";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Address Deleted"));
    }
    else{
        array_push($data,array("message"=>"Address is not Deleted"));
    }
    
    echo json_encode(array("data"=>$data));
?>