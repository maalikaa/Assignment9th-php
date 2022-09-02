<?php
	session_start();
	$con = mysql_connect();
	mysql_select_db();
	
	$id ;
	
	if(isset($_GET["id"])){
		
		$id = $_GET["id"];
	
	$command = "DELETE FROM USERS WHERE id = $id";
	
	$result = mysql_query($command, $con);
	
	if($result)
		header("location: delete.php?delete = done");
	else
		header("location: delete.php?nodelete = true");
	}
?>