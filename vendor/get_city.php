<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();
    if(!isset($_POST['state']) || $_POST['state'] == null){
        $data = json_encode(array("error"=>array("message"=>"Send Proper State Id")));
    }
    else{
        $state = $_POST['state'];
        $result = $conn->query("select id,name from city where state_id=$state");
        while($row = $result->fetch_array()){
            array_push($data,array("id"=>$row['id'],"name"=>$row['name']));
        }
        $data = json_encode(array("data"=>$data));    
    }
    echo $data;
?>