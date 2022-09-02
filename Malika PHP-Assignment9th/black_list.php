<?php
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
	
	$link = mysqli_connect("localhost","root","","lms")or die ('MySQL connect failed. ' . mysql_error());
	
	
	$sql ="SELECT * from info ";
	$res= mysqli_query($link,$sql);
	
	while($r=mysqli_fetch_assoc($res)){
	
		$today = date("Y-m-d");
		$date=$r['Deadline'];
		$newdate=strtotime("+3 days");
		//echo date($date,$newdate);
	
	
		if($newdate > $date){
		
			$d = date("Y-m-d");
			mysqli_query($link,"UPDATE info SET black_list = 'black' WHERE Deadline < '$today' AND Return_book = 'No'") or die("just fun");
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
			<link rel="stylesheet" href="css/date.css" />

	</head>
	<body>
		<?php include('navbar.php');
			
		?>
		<div class="row">
			<div class="container">
				<div class="col-md-12">
					<h1 class="text-center">Black List</h1>
					<hr />
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr style="background-color:#6db6b9e6; color:white;">
							<th>Number</th>
							<th>First Name</th>
							<th>F/Name</th>
							<th>S_ID</th>
							<th>Email</th>
							<th>Phone</th>
							<th>Class</th>
							<th>Book Name</th>
							<th>Issue</th>
						</tr>
						<?php
							$queryone="SELECT * FROM info WHERE black_list='black' AND Date_expired='Expired'";
							// echo $queryone;
							$resultone=mysqli_query($link,$queryone);
							while($r=mysqli_fetch_assoc($resultone)){  ?>
							
									<tr>
										<td><?php echo $r["Number"];?></td>
										<td><?php echo $r["FirstName"];?></a></td>
										<td><?php echo $r["FatherName"];?></td>
										<td><?php echo $r["S_ID"];?></td>
										<td><?php echo $r["Email"];?></td>
										<td><?php echo $r["phone"];?></td>
										<td><?php echo $r["class"];?></td>
										<td><?php echo $r["BookName"];?></td>
										<td><?php echo $r["black_list"];?></td>
	
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