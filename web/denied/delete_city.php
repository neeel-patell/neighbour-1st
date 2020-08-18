<?php
    require '../../connection.php';
    $conn = getConn();

    $id = $_GET['city'];
    if($conn->query("DELETE FROM city WHERE id=$id") == true){
        header("location: view_city.php?msg=City is deleted successfully");
    }
    else{
        header("location: view_city.php?msg=City has area associated");
    }
?>