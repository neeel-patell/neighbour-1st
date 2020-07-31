<?php
    require '../connection.php';
    header('content-type: application/json');
    $conn = getConn();
    $data = array();

    $product = $_POST['product'];
    $query = "SELECT `description`,user_id from product_review where product_id=$product";
    $result = $conn->query($query);

    while($row = $result->fetch_array()){
        $user = $conn->query("SELECT first_name,last_name from `consumer` where id=".$row['user_id']);
        $user = $user->fetch_array();
        array_push($data,array("name"=>$user['first_name']." ".$user['last_name'],"description"=>$row['description']));
    }

    echo json_encode(array("data"=>$data));
?>