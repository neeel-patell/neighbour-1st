<?php
    header('content-type: application/json');
    require 'connection.php';
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];
    $password = hash('sha256',$_POST['password']);
    
    $query = "UPDATE login set password='$password' where id=$login";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Password Changed"));
    }
    else{
        array_push($data,array("message"=>"Password is not changed"));
    }

    echo json_encode(array("data"=>$data));
?>