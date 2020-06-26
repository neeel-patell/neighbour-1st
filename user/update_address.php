<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $address = $_POST['id'];
    $line1 = $_POST['line1'];
    $line2 = $_POST['line2'];
    $mobile = $_POST['mobile'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $area = $_POST['area'];

    $query = "UPDATE user_address SET
              first_name = '$first_name', last_name='$last_name', mobile=$mobile, line1='$line1', line2='$line2', area_id=$area
              WHERE id=$address";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Address Updated"));
    }
    else{
        array_push($data,array("message"=>"Address is not Updated"));
    }
    
    echo json_encode(array("data"=>$data));
?>