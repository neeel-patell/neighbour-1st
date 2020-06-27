<?php
    include '../../connection.php';
    $conn = getConn();

    $state = strtoupper($_POST['state']);

    $query = "INSERT into state(`name`) VALUES('$state')";
    if($conn->query($query)){
        header('location: add_state.php?msg=State Added');
    }
    else{
        header('location: add_state.php?msg=State Exist');
    }
?>