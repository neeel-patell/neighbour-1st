<?php
    include '../connection.php';
    include '../mail/mail_sender.php';
    $conn = getConn();
    header('content-type: application/json');
    $data = array();

    $email = $_POST['email'];
    $result = $conn->query("select id from vendor where email='$email'");

    if(mysqli_num_rows($result) == 0){
        array_push($data,array("message"=>"Email not Registered"));
    }
    else{
        $otp = rand(100000,999999);
        $body = "Please enter One Time Password to Proceed to change the Password your One Time Password is <font size='2' color='blue'><u>$otp</u></font>, use it to change Password";
        sendMail($email,"OTP for Create new Password",$body);
        array_push($data,array("message"=>"Success","otp"=>$otp));
    }
    
    echo json_encode(array("data"=>$data));
?>