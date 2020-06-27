<?php
    require '../../connection.php';
    $conn = getConn();
    $city = array();

    $state = $_GET['state'];

    $query = "UPDATE `state` set active = 1 where id = $state;
              UPDATE city set active = 1 where state_id = $state;";

    $city_query = $conn->query("select id from city where state_id= $state");
    while($row = $city_query->fetch_array()){
        array_push($city,$row['id']);
    }
    $city = implode(",",$city);

    $query .= "UPDATE `area` SET active = 1 where city_id IN($city);";
    if($conn->multi_query($query)){
        header("location: view_state.php?msg=Selected state and it's related cities and areas are enabled for delivery");
    }
    else{
        header("location: view_state.php?msg=Something went wrong ...");
    }
?>