<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $email = $_POST['email'];
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $description = $_POST['description'];

    $query = "INSERT INTO contactus(email,`name`,mobile,`description`) VALUES('$email','$name','$mobile','$description')";
    if($conn->query($query) == true){
        array_push($data,array("message"=>"Data sent to ADMIN"));
    }
    else{
        array_push($data,array("message"=>"Something went wrong"));
    }

    echo json_encode(array("data"=>$data));
?>