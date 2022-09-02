<?php
	session_start();
	$link = mysqli_connect("localhost","root","","lms")or die ('MySQL connect failed. ' . mysql_error());
	
		$sql ="SELECT * from info ";
		$res= mysqli_query($link,$sql);
		while($row=mysqli_fetch_assoc($res)){
	
			$d= date('Y-m-d');
			$dates=$row['Deadline'];
			if($d > $dates){

				$d = date("Y-m-d");
				mysqli_query($link,"UPDATE info SET Date_expired = 'Expired' WHERE Deadline < '$d' AND Return_book = 'No'") or die("just fun");
				
			}
									
			if(isset($_POST['submit1'])){
				if(empty($_POST['id'])){
					$id=null;
				}else{
					$id=$_POST['id'];
				}
				mysqli_query($link,"UPDATE info SET Date_expired = 'Returned', Return_book='Yes' WHERE S_ID ='$id' ") or die("just fun");
				
			}
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Online Examination System</title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
			<script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
			<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="css/date.css" />
		
	</head>
	<body>
		<?php include('navbar.php');?>
		<div class="row">
			<div class="container">
				<div class="col-md-12">
					<h1 class="text-center">Date Expired List</h1>
					<hr />
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<form action="" class="navbar-form" method="post" name="form1">
					<input type="text" class="form-control" name="id" placeholder="Enter ID" required=""/>
					<button style="background-color:#6db6b9e6" type="submi1t" name="submit1" 
					 class="btn btn-default">Submit</button>
						
				</form>
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
							<th>Date</th>
							<th>Deadline</th>
							<th>Date_expired</th>
							<th>send Email</th>
						</tr>
						<?php
							$queryone="SELECT * FROM info WHERE Date_expired='Expired' OR Date_expired='Returned' ORDER BY Number";
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
										<td><?php echo $r["Date"];?></td>
										<td><?php echo $r["Deadline"];?></td>
										<td><?php echo $r["Date_expired"];?></td>
										<td align="center" style="vertical-align:middle !important;">
											<a class="btn btn-success" href="email.php">
												Email 
											</a>
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