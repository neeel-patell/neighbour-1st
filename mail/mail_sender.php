<?php
    
    require "PHPMailerAutoload.php";
    function sendMail($receiver,$subject,$body){
        $mail = new PHPMailer;
        $mail->isSMTP();
        $mail->Host = "smtp.gmail.com";
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Username = "neighbor1stapp@gmail.com";
        $mail->Password = "Unpr#d!ct@bl#";
        $mail->setFrom("neighbor1stapp@gmail.com", "Neighbor 1st - The App");
        $mail->addReplyTo("neighbor1stapp@gmail.com");
        $mail->isHTML(true);
        $mail->addAddress($receiver);
        $mail->Subject = $subject;
        $mail->Body = $body;
        if(!$mail -> Send()){
            return false;
        }
        else{
            return true;
        }
    }
?>