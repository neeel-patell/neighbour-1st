<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();
    if(!isset($_POST['city']) || $_POST['city'] == null){
        $data = json_encode(array("error"=>array("message"=>"Send Proper City Id")));
    }
    else{
        $city = $_POST['city'];
        $result = $conn->query("select id,name,pincode from area where city_id=$city and active=1");
        while($row = $result->fetch_array()){
            array_push($data,array("id"=>$row['id'],"name"=>$row['name'],"pincode"=>$row['pincode']));
        }
        $data = json_encode(array("data"=>$data));
    }
    echo $data;
?>