<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();
    
    $store = $_POST['store'];
    $query = "SELECT subcategory.id'id',subcategory.name'name' FROM subcategory JOIN store_subcategory WHERE
    subcategory.id = store_subcategory.`subcategory_id` AND store_subcategory.`store_id` = $store";
    $result = $conn->query($query);
    
    while($row = $result->fetch_array()){
        array_push($data,array("id"=>$row['id'],"name"=>$row['name']));
    }

    echo json_encode(array("data"=>$data));
?>