<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();

    $email = $_POST['email'];
    $password = hash("sha256",$_POST['password']);
    
    $query = "select active,id,first_name,last_name from vendor where email = '$email' and password = '$password'";
    $result = $conn->query($query);
    
    if(mysqli_num_rows($result) != 0){
        $row = $result->fetch_array();
        if($row['active'] == 0){
            echo json_encode(array("data"=>array("message"=>"New account will be activated in next 24hrs or contact admin")));
        }
        else{
            echo json_encode(array("data"=>array("id"=>$row['id'],"first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"message"=>0)));
        }
    }
    else{
        $result = $conn->query("select id from vendor where email = '$email'");
        if(mysqli_num_rows($result) == 0){
            echo json_encode(array("data"=>array("message"=>"Email Not registered")));
        }
        else{
            echo json_encode(array("data"=>array("message"=>"Wrong Password")));
        }
    }
?>