<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $login = $_POST['user'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];

    $query = "UPDATE consumer set
              first_name='$first_name', last_name='$last_name'
              where id=$login";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"Data updated"));
    }
    else{
        array_push($data,array("message"=>"Profile data is not updated"));
    }

    echo json_encode(array("data"=>$data));
?>