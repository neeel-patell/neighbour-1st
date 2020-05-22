<?php
    require 'connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();
    if(!isset($_GET['city']) || $_GET['city'] == null){
        $data = array("message"=>"Send Proper City Id");
    }
    else{
        $city = $_GET['city'];
        $result = $conn->query("select id,name,pincode from area where city_id=$city");
        while($row = $result->fetch_array()){
            array_push($data,array("id"=>$row['id'],"name"=>$row['name'],"pincode"=>$row['pincode']));
        }
    }
    $data = json_encode($data);
    echo $data;
?>