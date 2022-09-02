<?php 
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
	$connect = mysqli_connect("localhost","root","","lms");
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/home.css" />
	</head>
	
	<body>
<?php include('navbar.php');?>
		
		<div class="row">
			<div class="col-md-12">
				<img src="images/3.jpg" style="height:715px;"id="ax"/>
				<div id="m">
					<h1 class="text-center" style="font-size: 3.5em; font-family:cooper;">Welcome To Library</h1>
				</div>
			</div>
		</div>
		<div>
			
		</div>
	</body>	
</html>
