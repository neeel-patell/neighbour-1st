<?php
    header('content-type: application/json');
    require 'connection.php';
    $conn = getConn();
    $data = array();
    
    $name = $_POST['name'];
    $name = strtolower($name);
    $query = "select id,name from subcategory where lower(name) like '%$name%' and active=1 and service=0 order by name";
    $result = $conn->query($query);
    
    while($row = $result->fetch_array()){
    	array_push($data,array("id"=>$row['id'],"name"=>$row['name']));
    }
    
    echo json_encode(array("data"=>$data));
?>