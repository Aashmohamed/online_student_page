<?php

require "connection.php";

require "SMTP.php";
require "Exception.php";
require "PHPMailer.php";

use PHPMailer\PHPMailer\PHPMailer;

if(isset($_GET["e"])){
   $email = $_GET["e"];

   if(empty($email)){
       echo "Pleace enter an valid Email";
   }else{

    $rs = Database::search("SELECT * FROM `user` WHERE `email` = '".$email."'");
        if($rs->num_rows == 1){

            $code = mt_rand(10000,99999);
            Database::iud("UPDATE `user`SET `verificaticode` = '".$code."' WHERE `email` = '".$email."'");

            $mail = new PHPMailer;
            $mail->IsSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'aashmohamed24@gmail.com'; 
            $mail->Password = '0775604003'; 
            $mail->SMTPSecure = 'ssl';
            $mail->Port = 465;
            $mail->setFrom('aashmohamed24@gmail.com', 'online_student_management_system'); 
            $mail->addReplyTo('aashmohamed24@gmail.com', 'online_student_management_system'); 
            $mail->addAddress($email); 
            $mail->isHTML(true);
            $mail->Subject = 'online_student_management_system Forgot Password Verification Code'; 
            $bodyContent = '<h1 style = "colour : green;"> Your Verification code is : '.$code.'</h1>'; 
            $mail->Body    = $bodyContent;

            if (!$mail->send()) {
                echo 'Verification code sending failed';
            } else {
                echo 'Success';
            }
            

        }else{
            echo "Email address not found";
        }
   }

}else{
    echo "Please enter Your Email adderss";
}

?>