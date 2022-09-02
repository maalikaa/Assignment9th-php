<?php
	session_start();
	$con= mysqli_connect("localhost", "root", "","lms");

	if(isset($_POST["username"])){
		$username = $_POST["username"];
		$password = $_POST["password"];

		$command = "SELECT * FROM login WHERE UserName= '$username' AND Password = '$password'";
	$result = mysqli_query($command,$con);
	$row = mysqli_num_rows($result);
	if($row == 1)
		header("location: home.php");
	else
		echo "<span style='color:red;'> Incorrect username or password!</span>";
	}
?>
<html>
	<body>
		<form action="" method="post">
			UserName<input type="text" name="username"/> <br />
			Password<input type="password" name="password"/> <br />
			<input type="submit" value="login" /> <br />
		</form>
	</body>
</html>