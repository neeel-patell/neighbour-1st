<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];
    $mobile = $_POST['mobile'];
    
    $query = "UPDATE consumer set
              mobile=$mobile, verified=1
              where id=$login";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Mobile number is Verified and Updated"));
    }
    else{
        array_push($data,array("message"=>"Mobile is already Associated with other Account"));
    }

    echo json_encode(array("data"=>$data));
?>