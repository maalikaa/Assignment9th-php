<?php
	session_start();
	$con = mysql_connect();
	mysql_select_db();
	
	$command = "SELECT FROM users ORDER BY DESC";
	
	$result = mysql_query($command,$con);
	
	$names = mysql_fetch_assoc($result);
	
	
?>
<html>
	<body>
		<h1>Current Users</h1>
		
	<?php
		
		if(isset($_GET["delete"]))
			echo "<span style = 'color: green;'> Selected user has been deleted!</span>";
		
		if(isset($_GET["nodelete"]))
			echo "<span style = 'color: red;'> Selected user has not been deleted!</span>";
	?>
		<table>
			<tr>
				<th>ID</th>
				<th>FirstName</th>
				<th>LastName</th>
				<th>Username</th>
				<th>Delete</th>
			</tr>
	<?php
		do{
		echo "<tr>";
		echo "<td>" . $names["id"] . "</td>";
		echo "<td>" . $names["FirstName"] . "</td>";
		echo "<td>" . $names["LastName"] . "</td>";
		echo "<td>" . $names["Username"] . "</td>";
		echo "<td><img src=''/></td>";
		echo "</tr>";
	}
	while($names = mysql_fetch_assoc($result));
	?>
		</table>
	</body>
</html>