<?php
    require 'connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];

    $query = "select id,first_name,last_name,mobile,email,gender,date_of_birth,address,area_id from login where id=$login";
    $result = $conn->query($query);

    if(mysqli_num_rows($result) != 0){
        $row = $result->fetch_array();

        $area = $conn->query("select name,pincode,city_id from area where id=".$row['area_id']);
        $area = $area->fetch_array();

        $city = $conn->query("select name,state_id from city where id=".$area['city_id']);
        $city = $city->fetch_array();

        $state = $conn->query("select name from state where id=".$city['state_id']);
        $state = $state->fetch_array();

        $address = $row['address'].", ".$area['name'].", ".$city['name'].", ".$state['name']." - ".$area['pincode'];

        $gender = $row['gender'];
        
        if($gender == 0){
            $gender = "Male";
        }
        else if($gender == 1){
            $gender = "Female";
        }
        else if($gender == 2){
            $gender = "Rather not say";
        }

        $row['date_of_birth'] = date('d/m/Y',strtotime($row['date_of_birth']));

        array_push($data,array("message"=>"Data found","first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"mobile"=>$row['mobile'],"gender"=>$gender,"date_of_birth"=>$row['date_of_birth'],"address"=>$address));

    }
    else{
        array_push($data,array("message"=>"No user found"));
    }
    
    echo json_encode(array("data"=>$data));

?>