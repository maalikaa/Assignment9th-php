<?php 
	session_start();
	if(isset($_SESSION['login'])){
		
	}
	else{
		header("location:index1.php");
	}
?>
<!DOCTYPE html>
<html>
	<head>
		<title></title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="stylesheet" href="bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/add.css" />
		
	</head>
	
<?php 
if (isset($_POST['sendemail'])) {
	if(mail($_POST['email'], $_POST['subject'], $_POST['body'])){
		echo "email Sent";
	}else{
		echo "not Sent";
	}
}
?>		
		<div class="container">
			<div class="row" id="f">
				<div class="col-md-7">
					<div class="modal-body" id="dd">
						<h2 class="send-notification"></h2>
						<h1 class="text-center">Email Form</h1>
						<hr />
						<form id="myform" action="" role="form" >
							<div class="form-group">
								<label for="bb">Name</label>
								<input type="text" class="form-control" id="name" placeholder="Enter the name" />
							</div>
							<div class="form-group">
								<label for="bb">email to</label>
								<input type="text" class="form-control" id="email" placeholder="Enter the email"  />
							</div>
							<div class="form-group">
								<label for="a">subject</label>
								<input type="text" class="form-control" id="subject" placeholder="Enter the subject"/>
							</div>
							<div class="form-group">
								<label for="e">body</label>
								<input type="text" class="form-control" id="body" placeholder="Enter the body"/>
							</div>
							<div>
								<button  type="button" value="Add" name="sendemail" onclick="mail()" class="btn" 
								style="margin-left:82%; color:black; padding:5px 30px;">send</button>
								
							</div>
						</form>	
					</div>	
				</div>
			</div>
		</div>
		<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
	function mail() {
		var name=$("#name");
		var email=$("#email");
		var subject=$("#subject");
		var body=$("#body");
			$.ajax({
				url:'sendemail.php',
				method:'POST',
				dataType:'json',
				data:{
					name:name.val(),
					email:email.val(),
					subject:subject.val(),
					body:body.val()
				},success:function(response) {
					$('#myform').reset();
					$('.send-notification').text("message sent Successfully.");
				}
			});
	}
</script>
