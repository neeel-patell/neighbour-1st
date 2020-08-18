<?php
    require '../../connection.php';
    $conn = getConn();
    $city = array();

    $city = $_GET['city'];

    $query = "UPDATE `city` set active = 0 where id = $city;";
    $query .= "UPDATE `area` SET active = 0 where city_id = $city;";
    
    if($conn->multi_query($query)){
        header("location: view_city.php?msg=Selected City and it's related areas are disabled for delivery");
    }
    else{
        header("location: view_city.php?msg=Something went wrong ...");
    }
?>