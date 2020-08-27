<?php
    require '../connection.php';
    $conn = getConn();
    header("content-type: application/json");
    $data = array();

    $user = $_POST['user'];
    $query = "DELETE from cart where user_id=$user";
    if($conn->query($query) == true){
        array_push($data,array("message"=>"Cart item(s) deleted"));
    }
    else{
        array_push($data,array("message"=>"Cart item(s) delete fail"));
    }

    echo json_encode($data);
?>