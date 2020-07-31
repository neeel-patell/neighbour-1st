<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];

    $query = "select first_name,last_name,mobile,email,gender,dob,address,area_id from vendor where id=$login";
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

        $date_of_birth = date('d/m/Y',strtotime($row['dob']));
        $image = base64_encode(file_get_contents("../images/profile/vendor/".$login.".jpg"));

        array_push($data,array("message"=>"Data found","first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"mobile"=>$row['mobile'],"gender"=>$gender,"date_of_birth"=>$date_of_birth,"address"=>$address,"image"=>$image));

    }
    else{
        array_push($data,array("message"=>"No user found"));
    }
    
    echo json_encode(array("data"=>$data));

?>