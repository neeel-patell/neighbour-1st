<?php
    header('content-type: application/json');
    require_once '../connection.php';
    require_once '../mail/mail_sender.php';
    $conn = getConn();

    $email = $_POST['email'];
    $password = hash("sha256",$_POST['password']);
    
    if(is_numeric($email))
        $query = "select active,id,first_name,last_name,email,mobile from consumer where mobile = '$email' and password = '$password'";
    else
        $query = "select active,id,first_name,last_name,email,mobile from consumer where email = '$email' and password = '$password'";
    $result = $conn->query($query);
    
    if(mysqli_num_rows($result) != 0){
        $row = $result->fetch_array();
        if($row['active'] == 0){
            sendMail($row['email'],"Login Activity","Your login is just blocked due to unfair or suspecious mean If you want to solve this query then contact support center");
            echo json_encode(array("data"=>array("message"=>"New account will be activated in 24hrs or contact admin")));
        }
        else{
            $model = $_POST['model'];
            sendMail($row['email'],"New Login Found","You have just logged in to neighbour-1st app through $model, kindly change the password if that's not you");
            echo json_encode(array("data"=>array("id"=>$row['id'],"first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"message"=>0)));
        }
    }
    else{
        $result = $conn->query("select id from consumer where email = '$email'");
        if(mysqli_num_rows($result) == 0){
            echo json_encode(array("data"=>array("message"=>"Email / Mobile Not registered")));
        }
        else{
            echo json_encode(array("data"=>array("message"=>"Wrong Password")));
        }
    }
?>