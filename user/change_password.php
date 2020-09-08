<?php
    include_once '../mail/mail_sender.php';
    include_once '../connection.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $mobile = $_POST['mobile'];
    $password = hash('sha256',$_POST['password']);

    $query = "UPDATE consumer
              SET `password`='$password'
              where mobile=$mobile";
    
    if($conn->query($query) == true){
        $result = $conn->query("SELECT email from consumer where mobile=$mobile");
        $result = $result->fetch_array();
        sendMail($result['email'],"Password Change","Your Password is just changed successfully, Do forget password attemp if you haven't changed your password and do some steps to create new password");
        array_push($data,array("message"=>"Updated Successfully"));
    }
    else{
        echo $query;
        array_push($data,array("message"=>"Password is not changed"));
    }

    echo json_encode(array("data"=>$data));
?>