<?php
	session_start();
	$link = mysqli_connect("localhost","root","","lms")or die ('MySQL connect failed. ' . mysql_error());

	unset($_SESSION["login"]);
	
	header("location:index1.php?logout=done");
	
?>