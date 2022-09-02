<?php
	session_start();
	$link = mysqli_connect("localhost","root","","lms")or die ('MySQL connect failed. ' . mysql_error());
	if(isset($_POST['check'])){	
		$sql ="SELECT * from info WHERE Date_expired='Expired'";
		$res= mysqli_query($link,$sql);
		// print_r($res);exit();
	while($row=mysqli_fetch_assoc($res)){
		$d= date("Y-m-d");
		// echo $d;
		$dates=$row['Deadline'];
		
		if($d > $dates){
			//echo "done";
			// $d= date("Y-m-d");
			
			mysqli_query($link,"UPDATE info SET Date_expired = 'Expired' WHERE Deadline < '$d' AND Return_book = 'No'") or die("just fu");
	
	}else{
		
	}
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
		<nav class="navbar navbar-fixed-top" id="n">
			<div class="container-fluid">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynav">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>				
				</button>
				<div class="collapse navbar-collapse" id="mynav">
					<ul class="nav navbar-nav" id="u">
						<li class="" id="i"><a href="home.php">HOME</a></li>
						<li class="" id="i"><a href="Add_Book.php">Add Book</a></li>
						<li class="" id="i"><a href="info.php">Information</a></li>
						<li class="" id="i"><a href="return.php">Return Books</a></li>
						<li class="dropdown"id="i">
							<a href="" class="dropdown-toggle" data-toggle="dropdown" id="b">Books<span class="caret"></span></a>
							<ul class="dropdown-menu" id="uu">
								<li><a href="softwear.php">Software Engineering</a></li>
								<li><a href="IS.php">IS</a></li>
								<li class="active"><a href="#">Network</a></li>
							</ul>
						</li>
						<li class="active" id="i"><a href="#">Date_Expired_List</a></li>
						<li class="" id="i"><a href="black_list.php">Black_List</a></li>
						</ul>
				</div>
			</div>
		</nav>
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
				<button style="background-color:#6db6b9e6; margin-left:1.5%;" type="submit" name="submit" class="btn btn-default">Show</button>
				<form method="post">
					<button style="background-color:#6db6b9e6; margin-left:1.5%;" type="submit" name="check" class="btn btn-default">Show</button>
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
							$queryone="SELECT * FROM info WHERE Date_expired='Expired' ORDER BY Number";
							// echo $queryone;
							$resultone=mysqli_query($link,$queryone);
							while($r=mysqli_fetch_assoc($resultone)){  ?>
							
									<tr>
										<td><?php echo $r["Number"];?></td>
										<td><a href='return.php?id=<?php echo $r["S_ID"]; ?>'><?php echo $r["FirstName"];?></a></td>
										<td><?php echo $r["FatherName"];?></td>
										<td><?php echo $r["Email"];?></td>
										<td><?php echo $r["phone"];?></td>
										<td><?php echo $r["class"];?></td>
										<td><?php echo $r["BookName"];?></td>
										<td><?php echo $r["Date"];?></td>
										<td><?php echo $r["Deadline"];?></td>
										<td><?php echo $r["Date_expired"];?></td>
											
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