<?php
    include '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $email = $_POST['email'];
    $password = hash('sha256',$_POST['password']);

    $query = "UPDATE vendor
              SET `password`='$password'
              where email='$email'";
    
    if($conn->query($query) == true){
        array_push($data,array("message"=>"Updated Successfully"));
    }
    else{
        array_push($data,array("message"=>"Updatation fail"));
    }

    echo json_encode(array("data"=>$data));
?>