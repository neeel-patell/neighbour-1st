<?php 
    require 'connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();
    $result = $conn->query("select id,name from state");
    while($row = $result->fetch_array()){
        array_push($data,array("id"=>$row['id'],"name"=>$row['name']));
    }
    echo json_encode(array("data"=>$data));
?>