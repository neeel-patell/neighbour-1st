<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();

    $data = array();
    $query = "select id,name from category where active=1 and service=0 order by name asc";
    $result = $conn->query($query);
    
    while($row = $result->fetch_array()){
        array_push($data,array("id"=>$row['id'],"name"=>$row['name']));
    }

    echo json_encode(array("data"=>$data));
?>