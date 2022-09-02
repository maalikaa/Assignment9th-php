<?php
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
	$connect = mysqli_connect("localhost","root","","lms");
	$date=null;
	$id=null;
	$flag=true;
	if(isset($_GET['id'])){
		$id=$_GET['id'];
		}
		else{
		echo "<script>No Account Found</script>";	
	}
	if(isset($_POST['submit'])){
		if(empty($_POST['id'])){
			$id_error="Missing id";
			$flag=false;
		}else{
			$id=($_POST['id']);
		}
		
		if(empty($_POST['date'])){
			$date_error="Missing date";
			$flag=false;
		}else{
			$date=($_POST['date']);
		}
		
		if($flag==true){	
				
				$query= "INSERT INTO returnbook VALUES('NULL','$id','$date')";
				//$query1=" UPDATE info SET Return_book ='Yes' WHERE S_ID='$id'";
				
				mysqli_set_charset($connect,"utf8");
				$result=mysqli_query($connect,$query);
				//$result1=mysqli_query($connect,$query1);
				
				echo "<script>alert('DONE!')</script>";
			}else{
				echo "<script>alert('ok!')</script>";
			}	
		} 	
		if(isset($_POST['ok'])){
			echo "done";
		
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
		<link rel="stylesheet" href="css/info.css" />
		<style type="text/css">
			hr{
				margin-left: 35%;
				width: 30%;
			}
			
		</style>
	</head>
	<body >
		<body>
					<nav class="navbar navbar-inverse navbar-fixed-top" id="n">
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
								<li><a href="software.php">Software Engineering</a></li>
								<li><a href="IS.php">IS</a></li>
								<li><a href="network.php">Network</a></li>
							</ul>
						</li>
						<li class="" id="i"><a href="date_expired.php">Date_Expired_List</a></li>
						<li class="" id="i"><a href="black_list.php">Black_List</a></li>
						<li class="" id="i"><a href="borrow.php" id="u">Borrow Book</a></li>
						<li class="" id="i"><a href="#" data-toggle="modal" data-target="#mymodal" class="glyphicon glyphicon-book" id="u"> Return_Book</a></li>
						</ul>
						<div>
							<ul class="nav navbar-nav navbar-right">
							<li class="" id="i"><a href="logout.php">Logout</a></li>
							</ul>
						</div>
				</div>
			</div>
		</nav>
			<div class="modal fade" role="dialog" id="mymodal">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4><span class="glyphicon glyphicon-books"></span></h4>
						</div>
						<div class="modal-body">
							<form action="" role="form" method="post">
								<div class="form-group">
									<label for="">S_ID</label>
									<input type="number" class="form-control" name="id" />
								</div>
								<div class="form-group">
									<label for="">R_Date</label>
									<input type="date" class="form-control" name="date"/>
								</div>
								<button type="submit" class="btn btn-success" name="submit"><span class="glyphicon glyphicon-plus"></span> Submit</button>
							</form>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="container">
					<div class="col-md-12">
						<h1 class="text-center" style="margin-top: 10%;">Return Books</h1>
						<hr />
					<?php
						$c =0;
					?>
					</div>
				</div>
			</div>
			<div class="container">
			<div class="row" style="margin-top: 2%;">
				<div class="col-md-8" style="margin-left: 16%">
					<table class="table table-bordered table-hover">
						<tr style="background-color:#6db6b9e6; color:white;">
							<th>Number</th>
							
							<th>Return Date</th>

						</tr>
						<?php
						if(isset($_GET['id'])){
								$id=$_GET['id'];
							}
							else{
								echo "<script>No Account Found</script>";	
							}
						mysqli_set_charset($connect,"utf8");	
							$queryone="SELECT * FROM returnbook where S_ID='$id'";
							
						$resultone=mysqli_query($connect,$queryone);
							
							$count=1;
							while($r=mysqli_fetch_row($resultone)){
							
								
						echo "<tr>";
						echo "<td>$count</td>";
										
						echo "<td>$r[2]</td>";
						echo "</tr>";
						$count++;
								}
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>