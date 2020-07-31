<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $mobile = $_POST['mobile'];
    $gender = $_POST['gender'];
    $date_of_birth = str_replace("/","-",$_POST['date_of_birth']);
    $date_of_birth = date('Y-m-d',strtotime($date_of_birth));

    $query = "UPDATE consumer set
              first_name='$first_name', last_name='$last_name', mobile=$mobile, gender=$gender, dob='$date_of_birth'
              where id=$login";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Data updated"));
    }
    else{
        array_push($data,array("message"=>"Mobile is already Associated with other Account"));
    }

    echo json_encode(array("data"=>$data));
?>