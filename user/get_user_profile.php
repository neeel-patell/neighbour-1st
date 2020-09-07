<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];

    $query = "select first_name,last_name,mobile,email from consumer where id=$login";
    $result = $conn->query($query);

    if(mysqli_num_rows($result) != 0){
        $row = $result->fetch_array();
        $image = base64_encode(file_get_contents("../images/profile/consumer/".$login.".jpg"));
        array_push($data,array("message"=>"Data found","first_name"=>$row['first_name'],"last_name"=>$row['last_name'],"email"=>$row['email'],"mobile"=>$row['mobile'],"image"=>$image));
    }
    else{
        array_push($data,array("message"=>"No user found"));
    }
    
    echo json_encode(array("data"=>$data));
?>