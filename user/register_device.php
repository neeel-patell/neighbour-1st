<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();
    
    $date = new DateTime("now", new DateTimeZone('Asia/Kolkata'));
    $now = $date->format('Y-m-d H:i:s');

    $user = $_POST['user'];
    $token = $_POST['token'];

    $result = $conn->query("SELECT id from user_devices where token='$token'");
    if(mysqli_num_rows($result) == 0){
        $query = "INSERT INTO user_devices(user_id,token,last_login) VALUES($user,'$token','$now')";
    }
    else{
        $query = "UPDATE user_devices
                  SET user_id=$user, last_login='$now'
                  WHERE token='$token'";
    }
    if($conn->query($query)){
        array_push($data,array("message"=>"Device Registered"));
    }
    else{
        array_push($data,array("message"=>"Device is not Registered"));
    }
    
    echo json_encode(array("data"=>$data));
?>