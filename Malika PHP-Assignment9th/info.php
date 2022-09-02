<?php
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
	$link = mysqli_connect("localhost","root","","lms")or die ('MySQL connect failed. ' . mysql_error());
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/date.css" />
		
	</head>
	<body >
		<body>
		<?php include('navbar.php');?>
		<div class="row">
			<div class="container">
				<div class="col-md-12">
					<h1 class="text-center">Information Of Borrowed Books</h1>
					<hr />
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row" style="margin-top: 2%;">
				<div class="col-md-12">
					<table class="table table-bordered table-hover">
						<tr style="background-color:#6db6b9e6; color:white;">
							<th>Number</th>
							<th>First Name</th>
							<th>F/Name</th>
							<th>S_ID</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Class</th>
							<th>Book Name</th>
							<th>Date</th>
							<th>Deadline</th>
						</tr>
						<?php
							$queryone="SELECT * FROM info ORDER BY Number";
							// echo $queryone;
							$resultone=mysqli_query($link,$queryone);
							while($r=mysqli_fetch_assoc($resultone)){ ?>
							
									<tr>
										<td><?php echo $r["Number"];?></td>
										<td><a href='return.php?id=<?php echo $r["S_ID"]; ?>'><?php echo $r["FirstName"];?></a></td>
										<td><?php echo $r["FatherName"];?></td>
										<td><?php echo $r["S_ID"];?></td>
										<td><?php echo $r["Email"];?></td>
										<td><?php echo $r["phone"];?></td>
										<td><?php echo $r["class"];?></td>
										<td><?php echo $r["BookName"];?></td>
										<td><?php echo $r["Date"];?></td>
										<td><?php echo $r["Deadline"];?></td>
										</td>	
									</tr>
									<?php
								}
							?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>