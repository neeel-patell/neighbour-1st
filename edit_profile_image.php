<?php
    header('content-type: application/json');
    require 'connection.php';
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];
    $image = $_POST['image'];

    if(file_put_contents("images/profile/$id.jpg",base64_decode($image)) == true){
        array_push($data,array("message"=>"Profile Picture is updated"));
    }
    else{
        array_push($data,array("message"=>"Profile Picture is not updated"));
    }

    echo json_encode(array("data"=>$data));
?>