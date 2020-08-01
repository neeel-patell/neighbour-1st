<?php
    session_start();
    if(!isset($_SESSION['logged_in'])){
        header('location: index.php');
    }
    else if($_SESSION['logged_in'] != 1 || $_SESSION['logged_in'] == 0){
        header('location: index.php');
    }
    include_once '../../connection.php';
    $conn = getConn();
?>