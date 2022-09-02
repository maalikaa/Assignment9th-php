<?php	
	session_start();
	$con= mysqli_connect("localhost", "root", "","lms");

	
	
	if(isset($_POST['sub'])){
		if(empty($_POST['user'])){
			$user=null;
		}else{
			$user=($_POST['user']);
		}
		if(empty($_POST['pass'])){
			$pass=null;
		}else{
			$pass=($_POST['pass']);
		}
			$query="SELECT * FROM login WHERE username='$user' AND password='$pass'";
			$result=mysqli_query($con,$query);
			$r=mysqli_fetch_row($result);
			if(($user==$r[1]) && ($pass==$r[2])){
				$_SESSION['login'] = $user;
				header("location:  home.php");
				//echo $query;
			}
			else{
				header("location:index1.php?login=failed");
				//echo $query;
			}	
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/index.css" />
	</head>
	<body>
		<h1 class="text-center">Library</h1>
		<hr />
		<div class="container">
			<div class="row" id="f">
				<div class="col-md-7">
					<?php if(isset($_GET["login"])) { ?>
						<div class="alert alert-danger alert-dismissable">
							<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
							Incorrect Username or Password!
						</div>
						<?php } ?>
								<?php if(isset($_GET["logout"])) { ?>
						<div class="alert alert-success	alert-dismissable">
							<button class="close" area-hidden="true" data-dismiss="alert">&times;</button>
							You Are Successfully Logged Out!
						</div>
						<?php } ?>
					<img src="images/6.jpg" alt="" />
					<div class="modal-body">
						<form action="" role="form" method="post" id="d">

							<div class="form-group">
								<label for="b" id="b">UserName</label>
								<input type="text" class="form-control" name="user" placeholder="Enter username" id="b"/>
							</div>
							<div class="form-group">
								<label for="i" id="i">Password</label>
								<input type="password" class="form-control" name="pass" placeholder="Enter password" id="i"/>
							</div>
							<div class="form-group" id="log">
								<input type="submit"  name="sub" value="login" class="btn-login" id="s" />
							</div>
						</form>

					</div>
				</div>
			</div>
		</div>
	
	</body>
</html>