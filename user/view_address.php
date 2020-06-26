<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $user = $_POST['user'];
    $query = "SELECT id,first_name,last_name,line1,line2,area_id,mobile from user_address where user_id=$user";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        $name = $row['first_name']." ".$row['last_name'];
        $address = $row['line1'].", ".$row['line2'];

        $area = $conn->query("select name,pincode,city_id from area where id=".$row['area_id']);
        $area = $area->fetch_array();
        
        $city = $conn->query("select name,state_id from city where id=".$area['city_id']);
        $city = $city->fetch_array();

        $state = $conn->query("select name from state where id=".$city['state_id']);
        $state = $state->fetch_array();

        $address .= ", ".$area['name'].", ".$city['name'].", ".$state['name']." - ".$area['pincode'];

        array_push($data,array("id"=>$row['id'],"name"=>$name,"address"=>$address,"mobile"=>$row['mobile']));
    }

    echo json_encode(array("data"=>$data));
?>