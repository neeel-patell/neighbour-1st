<?php 
    require 'connection.php';
    require 'mail/mail_sender.php';
    header('content-type: application/json');
    $data = array();
    $conn = getConn();
    if(!isset($_POST['email'])){
        $data = array("message"=>"Email is not set in post");
    }
    else{
        $email = $_POST['email'];
        $query = "select id from login where email = '$email'";
        $result = $conn->query($query);
        if(mysqli_num_rows($result) == 0){
            $otp = rand(100000,999999);
            $body = "Your One time Password for registration is <font color='blue' size='5'><u>$otp</u></font> which is valid for next 30 Minutes, enter it to complete your varification and to get successful registration... !";
            if(sendMail($email,"OTP Varification for Registration",$body))
                $data = array("message"=>$otp);
            else
                $data = array("message"=>"Please enter valid email");
        }
        else{
            $data = array("message"=>"Email already Registered");
        }
    }
    echo json_encode($data);
?>