<?php
    require '../../connection.php';
    $conn = getConn();
    $city = array();

    $state = $_GET['state'];

    $query = "UPDATE `state` set active = 0 where id = $state;";

    $city_query = $conn->query("select id from city where state_id= $state");
    while($row = $city_query->fetch_array()){
        array_push($city,$row['id']);
    }
    $city = implode(",",$city);
    
    $query .= "UPDATE city set active = 0 where state_id = $state;";
    $query .= "UPDATE `area` SET active = 0 where city_id IN($city);";
    if($conn->multi_query($query)){
        header("location: view_state.php?msg=Selected state and it's related cities and areas are disabled for delivery");
    }
    else{
        header("location: view_state.php?msg=Something went wrong ...");
    }
?>