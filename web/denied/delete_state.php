<?php
    require '../../connection.php';
    $conn = getConn();

    $id = $_GET['state'];
    if($conn->query("DELETE FROM state WHERE id=$id") == true){
        header("location: view_state.php?msg=State is deleted successfully");
    }
    else{
        header("location: view_state.php?msg=State has city and area associated");
    }
?>