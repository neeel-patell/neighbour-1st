<?php
    header('content-type: application/json');
    require_once '../connection.php';
    $conn = getConn();

    $email = $_POST['email'];
    $password = hash("sha256",$_POST['password']);
    
    if(is_numeric($email))
        $query = "select active from consumer where mobile = '$email' and password = '$password'";
    else
        $query = "select active from consumer where email = '$email' and password = '$password'";
    $result = $conn->query($query);
    
    if(mysqli_num_rows($result) != 0){
        $row = $result->fetch_array();
        if($row['active'] == 0){
            echo json_encode(array("data"=>array("change"=>1)));
        }
        else{
            echo json_encode(array("data"=>array("change"=>0)));
        }
    }
    else{
        echo json_encode(array("data"=>array("change"=>1)));
    }
?>