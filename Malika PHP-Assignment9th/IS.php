<?php
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
	$connect = mysqli_connect("localhost","root","","lms")or die ('MySQL connect failed. ' . mysql_error());
	
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
			<script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
			<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
			<link rel="stylesheet" href="css/soft.css" />
	</head>
	<body>
		<?php include('navbar.php');?>
		<div class="row">
			<div class="container">
				<div class="col-md-12">
					<h1 class="text-center" style="color:gray; font-weight:bold;padding:20px; font-size:3em;margin-top:10%">IS Books</h1>
					<hr />
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="srch" id="btn">
					<form action="" class="navbar-form" method="post" name="form1">
						<input type="text" class="form-control" name="search" placeholder="Enter Book Name"/>
						<button style="background-color:#6db6b9e6" type="submit" name="submit" class="btn btn-default">
						<span class="glyphicon glyphicon-search"></span></button>
					
						<button style="background-color:#6db6b9e6" type="submit" name="All" class="btn btn-default">All</button>
						
					</form>
					<form action="" class="navbar-form" method="post" name="form1">
						<input type="number"  class="form-control" name="bid" placeholder="Enter Book ID" required=""/>
						<button style="background-color:#6db6b9e6" type="submit" name="submit1" 
						class="btn btn-default">Delete</button>
						
					</form>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row" style="margin-top: 2%;">
				<div class="col-md-12">
					<table class="table table-bordered">
						<tr style="background-color:#6db6b9e6; color:white;">
							<th>Number</th>
							<th>Book Name</th>
							<th>ID</th>
							<th>Author</th>
							<th>Edition</th>
							<th>Print Year</th>
							
						</tr>
						<?php 
			
				$searcherror=NULL;
				if(isset($_POST['submit'])){
				if(empty($_POST['search'])){
				$searcherror="No name";
								
				}else{
					$search=($_POST['search']);
				}
				mysqli_set_charset($connect,"utf8");	
							$queryone="SELECT * FROM list_books where book_name='$search' AND department='IS'";
							//echo $queryone;
							$resultone=mysqli_query($connect,$queryone);
							$count=0;
							
							while($r=mysqli_fetch_row($resultone)){
							$count++;
								echo "<tr>";
										echo "<td>$r[0]</td>";
										echo "<td>$r[1]</td>";
										echo "<td>$r[2]</td>";
										echo "<td>$r[3]</td>";
										echo "<td>$r[4]</td>";
										echo "<td>$r[5]</td>";
										
									echo "</tr>"; 
							}
				
					}else 
						
					if(isset($_POST['All'])){
					
					mysqli_set_charset($connect,"utf8");	
								$queryone="SELECT * FROM list_books WHERE department='IS'";
							//echo $queryone;
							$resultone=mysqli_query($connect,$queryone);
							$count=0;
							
							while($r=mysqli_fetch_row($resultone)){
							$count++;
								echo "<tr>";
										echo "<td>$r[0]</td>";
										echo "<td>$r[1]</td>";
										echo "<td>$r[2]</td>";
										echo "<td>$r[3]</td>";
										echo "<td>$r[4]</td>";
										echo "<td>$r[5]</td>";
										
									echo "</tr>"; 
							}
				
					}		
					
							if(isset($_POST["submit1"])){
				
							mysqli_query($connect,"DELETE FROM list_books WHERE ID ='$_POST[bid]'");
			
							}
							
							
						?>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>