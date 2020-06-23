<?php
    session_start();
    $url = "localhost/neighbour-1st/login.php";
    $fields = array(
        "email"=>$_POST['email'],
        "password"=>$_POST['pass']
    );
    $postvars = http_build_query($fields);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, count($fields));
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postvars);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array("Content-Type: application/x-www-form-urlencoded"));
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($ch);
    curl_close($ch);
    $result = json_decode($result);
    if(isset($result->data)){
        if($result->data->user_type == 0){
            $_SESSION['login'] = $result->data->id;
            $_SESSION['user_type'] = $result->data->user_type;
            header("location: dashboard.php");
        }
        else{
            header("location: index.php?msg=You are Not Admin");
        }
    }
    else{
        header("location: index.php?msg=".print_r($result->error->message,true));
    }
?>