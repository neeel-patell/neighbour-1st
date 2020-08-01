<?php
    session_start();
    $email = $_POST['email'];
    $password = $_POST['pass'];

    if($email == "admin@lampros.ml" && $password == "Unpr#d!ct@bl#"){
        $_SESSION['logged_in'] = 1;
        header('location: dashboard.php');
    }
    else{
        header('location: index.php');
    }
?>