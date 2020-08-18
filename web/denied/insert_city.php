<?php
    include '../../connection.php';
    $conn = getConn();

    $state = $_POST['state'];
    $city = strtoupper($_POST['city']);

    $query = "INSERT into city(state_id,`name`) VALUES($state,'$city')";
    if($conn->query($query)){
        header('location: add_city.php?msg=City added successfully');
    }
    else{
        header('location: add_city.php?msg=Something went wrong');
    }
?>