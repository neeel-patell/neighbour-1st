<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];
    $email = $_POST['email'];
    
    $query = "UPDATE consumer set
              email='$email'
              where id=$login";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Email address Updated"));
    }
    else{
        array_push($data,array("message"=>"Email is already Associated with other Account"));
    }

    echo json_encode(array("data"=>$data));
?>