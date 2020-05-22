<?php
    require 'connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();
    if(!isset($_GET['state']) || $_GET['state'] == null){
        $data = array("message"=>"Send Proper State Id");
    }
    else{
        $state = $_GET['state'];
        $result = $conn->query("select id,name from city where state_id=$state");
        while($row = $result->fetch_array()){
            array_push($data,array("id"=>$row['id'],"name"=>$row['name']));
        }
    }
    $data = json_encode($data);
    echo $data;
?>