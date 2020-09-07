<?php 
    header('content-type: application/json');
    include_once '../mail/mail_sender.php';
    include_once '../connection.php';
    $conn = getConn();
    
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    
    $password = hash("sha256",$password);
    
    $query = "insert into consumer(first_name,last_name,mobile,email,password) values('$first_name','$last_name',$mobile,'$email','$password')";
    if($conn->query($query) == true){
        echo json_encode(array("message"=>array("success"=>"Successfully Registered")));
        sendMail($email,"New Registration","Thank you for registering on Neighbour-1st app, Hope you will be beneficial from us with our service, Do rating our app if you like our services");
    }
    else{
        echo json_encode(array("message"=>array("error"=>"Email or mobile already registered")));
    }
?>