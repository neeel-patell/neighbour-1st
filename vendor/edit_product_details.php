<?php
    header('content-type: application/json');
    require '../connection.php';
    $conn = getConn();
    $data = array();

    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $weight = $_POST['weight'];
    $id = $_POST['product'];

    $query = "UPDATE product SET
              name='$name',price='$price',description='$description',weight=$weight
              WHERE id=$id";

    if($conn->query($query) == true){
        array_push($data,array("message"=>"updated"));
    }
    else{
        array_push($data,array("message"=>"not updated"));
    }
    echo json_encode(array("data"=>$data));
?>