<?php 
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
	
	$connect = mysqli_connect("localhost","root","","lms");
	
	//include("session.php");
		$bookerr=null;
		$iderr=null;
		$authorerr=null;
		$editionerr=null;
		$yearerr=null;
		$departmenterr=null;
		$flag=false;
	if(isset($_POST['add'])){

		
		if(empty($_POST['bookname'])){
			$bookerr="Missing BookName";
			$flag=false;

		}else{

			$bookname=($_POST['bookname']);
			$flag = true;
			if(!preg_match("/^[a-zA-Z-' ]*$/",$bookname)){
				$bookerr="Only letters and white space allowed";
		}
		
		}

		}
		if(empty($_POST['id'])){
			$iderr="Missing ID";
			$flag=false;
		}
		else{
			$id=($_POST['id']);
			$flag = true;
		}
		if(empty($_POST['author'])){
			$authorerr="Missing Author Name";
			$flag=false;
		}else{
			$author=($_POST['author']);
			$flag = true;
			if(!preg_match("/^[a-zA-Z-' ]*$/",$author)){
			$authorerr="Only letters and white space allowed";
		}
		
		}
		if(empty($_POST['edition'])){
			$editionerr="Missing Edition";
			$flag=false;
		}else{
			$edition=($_POST['edition']);
		}
		if(empty($_POST['year'])){
			$yearerr="Missing print year";
			$flag=false;
		}else{
			$year=($_POST['year']);
		}
		if(empty($_POST['department'])){
			$departmenterr="Missing Department Name";
			$flag=false;
		}else{
			$department=($_POST['department']);
			$flag = true;
			if(!preg_match("/^[a-zA-Z-' ]*$/",$department)){
				$department="Only letters and white space allowed";
		}
		
		}
		if($flag==true){	
				
				$query= "INSERT INTO list_books
				VALUES(NULL,'$bookname','$id','$author','$edition','$year','$department')";
				mysqli_set_charset($connect,"utf8");
				$result=mysqli_query($connect,$query);
				
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
		<link rel="stylesheet" href="css/add.css" />
		
	</head>
	<body id="body">
		<?php include('navbar.php');?>
		
		<div class="container">
			<div class="row" id="f">
				<div class="col-md-7">
					<div class="modal-body" id="dd">
						<h1 class="text-center">Add Books</h1>
						<hr />
						<form action="" role="form" method="post">
							<div class="form-group">
								<label for="bb">
									<?php
									if(!empty($bookerr)){
										echo "<span class='error'>$bookerr</span>";
									}else{
										echo "BookName <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="text" class="form-control" name="bookname" placeholder="Enter book name" id="bb" value="<?php if(!empty($bookname)){echo $bookname;} ?>" />
								<?php
									if(isset($error_msg['bookname'])){
										echo "<div class='error'>". $error_msg['bookname'] . "</div>";
									}
								?>
							</div>
							<div class="form-group">
								<label for="ii">
									<?php
									if(!empty($iderr)){
										echo "<span class='error'>$iderr</span>";
									}else{
										echo "ID <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="number" class="form-control" name="id" placeholder="Enter book id" id="ii"value="<?php if(!empty($id)){echo $id;} ?>"/>
							
							</div>
							<div class="form-group">
								<label for="a">
									<?php
									if(!empty($authorerr)){
										echo "<span class='error'>$authorerr</span>";
									}else{
										echo "Author <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="text" class="form-control" name="author" placeholder="Enter author name" id="a"value="<?php if(!empty($author)){echo $author;} ?>"/>
							</div>
							<div class="form-group">
								<label for="e">
									<?php
									if(!empty($editionerr)){
										echo "<span class='error'>$editionerr</span>";
									}else{
										echo "Edition <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="number" class="form-control" name="edition" placeholder="Enter the edition" id="e"value="<?php if(!empty($edition)){echo $edition;} ?>"/>
							</div>
							<div class="form-group">
								<label for="p">
									<?php
									if(!empty($yearerr)){
										echo "<span class='error'>$yearerr</span>";
									}else{
										echo "Print Year <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="number" class="form-control" name="year" placeholder="Enter year of book" id="p"value="<?php if(!empty($year)){echo $year;} ?>"/>
							</div>
							<div class="form-group">
								<label for="d">
									<?php
									if(!empty($departmenterr)){
										echo "<span class='error'>$departmenterr</span>";
									}else{
										echo "Department <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="text" class="form-control" name="department" placeholder="Enter department" id="d"value="<?php if(!empty($department)){echo $department;} ?>"/>
							</div>
							<div>
								<button  type="submit" value="Add" name="add" class="btn" 
								style="margin-left:82%; color:black; padding:5px 30px;">Add</button>
								
							</div>
						</form>	
					</div>	
				</div>
			</div>
		</div>
	</body>
</html>