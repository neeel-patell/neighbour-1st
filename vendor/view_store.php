<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $user = $_POST['id'];
    $query = "select id,name from store where user_id=$user";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        array_push($data,array("id"=>$row['id'],"name"=>$row['name']));
    }

    echo json_encode(array("data"=>$data));
?>