<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
use PHPMailer\PHPMailer\PHPMailer;
define("OTP", mt_rand(100000, 999999));
//require_once 'db.php';
require_once 'PHPMailer/PHPMailer.php';
require_once 'PHPMailer/SMTP.php';
require_once 'PHPMailer/Exception.php';
$mail = new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = true;
$mail->Username = "shastrishraddha1001@gmail.com"; //Mail will be sent from this email
$mail->Password = "Jungle@mogli10";
$mail->Port = 465;
$mail->SMTPSecure = "ssl";
//Email settings
$mail->isHTML(true);
$mail->setFrom($_POST['email'], $_POST['name']);

$mail->addAddress($_POST["email"]);    //Mail will be sent to this email
$mail->Subject = "OTP verification";
$mail->Body = "Registration successful. Welcome " . $_POST['name'] . "Your otp is " . OTP;
if ($mail->send()) {
//    insertValuesToDatabase($_POST["email"], $_POST["username"], $_POST["password"]);
    echo OTP;
} else {
    echo -1;
}
