<?php 
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
	
	$connect = mysqli_connect("localhost","root","","lms");
	
	$firsterr=null;
	$fathererr=null;
	$iderr=null;
	$emailerr=null;
	$phoneerr=null;
	$classerr=null;
	$bookerr=null;
	$dateerr=null;
	$deaderr=null;
	
	$flag=true;
	if(isset($_POST['submit'])){
		if(empty($_POST['firstname'])){
			$firsterr="Missing FirstName";
			$flag=false;
		}else{
			$first=($_POST['firstname']);
			$flag=true;
			$cfirst=strlen($first);
			if($cfirst<3){
			$firsterr="you can write more than 3 letters";
			}else{
			if(!preg_match("/^[a-zA-Z-' ]*$/",$first)){
				$firsterr="Only letters and white space allowed";
		}
		}}
		if(empty($_POST['father'])){
			$fathererr="Missing FatherName";
			$flag=false;
		}else{
			$father=($_POST['father']);
			$flag=true;
			$cfather=strlen($father);
			if($cfather<3){
			$fathererr="you can write more than 3 letters";
			}else{
			if(!preg_match("/^[a-zA-Z-' ]*$/",$father)){
				$fathererr="Only letters and white space allowed";
		}
		}}
		if(empty($_POST['id'])){
			$iderr="Missing ID";
			$flag=false;
		}else{
			$id=($_POST['id']);
		}
		if(empty($_POST['email'])){
			$emailerr="Missing Email Address";
			$flag=false;
		}else{
			$email=$_POST['email'];
			$flag=true;
			if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
				$emailerr="Ivalid Email";
			}
		}
			if(empty($_POST['phone'])){
			$phonerr="Missing Phone Number";
			$flag=false;
		}else{
			$phone=$_POST['phone'];
			
			$cphone=strlen($phone);
			
			
			if($cphone!=9){
				$phonerr="Invalid phone number";
				$flag=false;
			}else{
				$phone=$_POST['phone'];
				$flag=true;
			}
		}
		if(empty($_POST['class'])){
			$classerr="Missing Class";
			$flag=false;
		}else{
			$class=($_POST['class']);
		}
		if(empty($_POST['book'])){
			$bookerr="Missing Book";
			$flag=false;
		}else{
			$book=($_POST['book']);
			if(!preg_match("/^[a-zA-Z-' ]*$/",$book)){
				$fathererr="Only letters and white space allowed";
		}

		}
		if(empty($_POST['date'])){
			$dateerr="Missing Date";
			$flag=false;
		}else{
			$date=($_POST['date']);
		}
		if(empty($_POST['dead'])){
			$deaderr="Missing Deadline";
			$flag=false;
		}else{
			$dead=($_POST['dead']);
		}
		if($flag==true){	
				
				$query= "INSERT INTO info(Number,FirstName,FatherName,S_ID,Email,phone,class,BookName,Date,Deadline)
				VALUES(NULL,'$first','$father','$id','$email','$phone','$class','$book','$date','$dead')";
				mysqli_set_charset($connect,"utf8");
				$result=mysqli_query($connect,$query);
				//echo $query;
				
			}}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<script type="text/javascript" src="bootstrap/dist/js/jquery.min.js"></script>
		<script type="text/javascript" src="bootstrap/dist/js/bootstrap.min.js"></script>
		<link rel="stylesheet" href="css/b.css" />
		
	</head>
	
	<body>
		<?php include('navbar.php');?>
					<div class="modal-body" id="register">
						<h4> assign borrow book</h4>
						<hr />
						<form action="" role="form" method="post" id="f">
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($firsterr)){
										echo "<span class='error'>$firsterr</span>";
									}else{
										echo "FirstName <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="text" class="form-control" name="firstname" value="<?php if(!empty($first)){echo $first;} ?>"/>
									<?php
									if(isset($error_msg['firstname'])){
										echo "<div class='error'>". $error_msg['firstname'] . "</div>";
									}
								?>
							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($fathererr)){
										echo "<span class='error'>$fathererr</span>";
									}else{
										echo "FatherName <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="text" class="form-control" name="father" value="<?php if(!empty($father)){echo $father;} ?>"/>
								<?php
									if(isset($error_msg['father'])){
										echo "<div class='error'>". $error_msg['father'] . "</div>";
									}
								?>

							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($iderr)){
										echo "<span class='error'>$iderr</span>";
									}else{
										echo "ID <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="number" class="form-control" name="id"value="<?php if(!empty($id)){echo $id;} ?>"/>
							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($emailerr)){
										echo "<span class='error'>$emailerr</span>";
									}else{
										echo "Email <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="email" class="form-control" name="email" value="<?php if(!empty($email)){echo $email;} ?>"/>
							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($phonerr)){
										echo "<span class='error'>$phonerr</span>";
									}else{
										echo "Phone <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="number" class="form-control" name="phone" value="<?php if(!empty($phone)){echo $phone;} ?>"/>
							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($classerr)){
										echo "<span class='error'>$classerr</span>";
									}else{
										echo "Class <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="number" class="form-control" name="class" value="<?php if(!empty($class)){echo $class;} ?>"/>
							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($bookerr)){
										echo "<span class='error'>$bookerr</span>";
									}else{
										echo "Book <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="text" class="form-control" name="book" value="<?php if(!empty($book)){echo $book;} ?>"/>
								<?php
									if(isset($error_msg['book'])){
										echo "<div class='error'>". $error_msg['book'] . "</div>";
									}
								?>
							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($dateerr)){
										echo "<span class='error'>$dateerr</span>";
									}else{
										echo "Date <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="date" class="form-control" name="date" value="<?php if(!empty($date)){echo $date;} ?>"/>
							</div>
							<div class="form-group">
								<label for="">
									<?php
									if(!empty($deaderr)){
										echo "<span class='error'>$deaderr</span>";
									}else{
										echo "Deadline <span class='error'>*</span>";
									}
									?>
								</label>
								<input type="date" class="form-control" name="dead" value="<?php if(!empty($dead)){echo $dead;} ?>"/>
							</div>
							<button type="submit" class="btn btn-danger" name="submit"><span class="glyphicon glyphicon-plus"></span> Submit</button>
						</form>
					</div>
				</div>
			</div>
		</div>

	</body>	
</html>
