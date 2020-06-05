<?php
    header('content-type: application/json');
    require 'connection.php';
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];
    $address = $_POST['address'];
    $area = $_POST['area'];
    
    $query = "UPDATE login set address='$address', area_id=$area where id=$login";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Data updated"));
    }
    else{
        array_push($data,array("message"=>"Data not Updated"));
    }

    echo json_encode(array("data"=>$data));
?>