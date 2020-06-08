<?php
    header('content-type: application/json');
    $data = array();
    include '../connection.php';
    $conn = getConn();

    $store = $_POST['store'];
    $address = $_POST['address'];
    $area = $_POST['area'];

    $query = "UPDATE store
              SET address='$addres', area_id=$area
              WHERE id=$store";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Data Updated"));
    }
    else{
        array_push($data,array("message"=>"Data is not Updated"));
    }
    
    echo json_encode(array("data"=>$data));

?>