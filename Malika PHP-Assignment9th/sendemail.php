<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
if (isset($_POST['name']) && isset($_POST['email'])) {
	$name=$_POST['name'];
	$email=$_POST['email'];
	$subject=$_POST['subject'];
	$body=$_POST['body'];

	require_once "PHPMailer/PHPMailer.php";
	require_once "PHPMailer/SMTP.php";
	require_once "PHPMailer/Exception.php";

	 $mail = new PHPMailer();
           $mail->IsSMTP();  // telling the class to use SMTP
           $mail->SMTPDebug = 2;
           $mail->Mailer = "smtp";
           $mail->Host = "smtp.gmail.com";
           $mail->Port = 587;
           $mail->SMTPAuth = true; // turn on SMTP authentication
           $mail->Username = "dordanaakbari@gmail.com"; // SMTP username
           $mail->Password = "dordanaakbarif5."; // SMTP password
           // $Mail->Priority = 1;
           $mail->AddAddress($email);
           $mail->SetFrom("dordanaakbari@gmail.com");
           // $mail->AddReplyTo($visitor_email,$name);
           $mail->Subject  = $subject;
           $mail->Body     = $body;
           // $mail->WordWrap = 50;
           if(!$mail->Send()) {
           echo 'Message was not sent.';
           echo 'Mailer error: ' . $mail->ErrorInfo;
           } else {
           echo 'Message has been sent.';
           }
}



?>