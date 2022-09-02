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

	$mail = new PHPMailer;
	$mail->isSMTP();
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->SMTPAuth = true;
	$mail->Port = 587;
	$mail->Username = 'dordanaakbari@gamil.com';
	$mail->Password = 'dordanaakbarif5.';
	$mail->isHTML(true);
	$mail->setFrom($email);
	$mail->addAddress('dordanaakbari@gamil.com');
	$mail->Subject=$subject;
	$mail->Body = $body;
	//send the message, check for errors
	if ($mail->send()) {
	    $status="success";
	    $response="email is sent";
	} else {
	    $status="failed";
	    $response="email failed";
	}
	exit(json_encode(array("status"=>$status,"response"=>$response)));
}



?>