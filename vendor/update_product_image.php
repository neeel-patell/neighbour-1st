<?php
    header('content-type: application/json');
    $data = array();

    $image = $_POST['image'];
    $name = $_POST['name'];
    
    file_put_contents("../images/vendor/products/$name.jpg",base64_decode($image));
    array_push($data,array("message"=>"updated"));
    echo json_encode(array("data"=>$data));
?>