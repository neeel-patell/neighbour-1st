<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $id = $_POST['address'];
    $query = "SELECT first_name,last_name,line1,line2,area_id,mobile from user_address where id=$id";
    $result = $conn->query($query);

    $row = $result->fetch_array();
    
    $area = $conn->query("select name,pincode,city_id from area where id=".$row['area_id']);
    $area = $area->fetch_array();
    
    $city = $conn->query("select name,state_id from city where id=".$area['city_id']);
    $city = $city->fetch_array();

    $state = $conn->query("select name from state where id=".$city['state_id']);
    $state = $state->fetch_array();

    array_push($data,array("first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"line1"=>$row['line1'],"line2"=>$row['line2'],"mobile"=>$row['mobile'],"area_id"=>$row['area_id'],"area_name"=>$area['name'],"city_id"=>$area['city_id'],"city_name"=>$city['name'],"state_id"=>$city['state_id'],"state_name"=>$state['name']));

    echo json_encode(array("data"=>$data));
?>