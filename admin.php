<html>
<?php
/***********************************
This page is the mainpage for admin account management.
***********************************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<head>
	<?php
	include("table.php");
	?>
	</head>
	<body background="bg.jpg">
	<img src="logo.jpg" width="100%"></img>
	<h1>Welcome to Admin Page!</h1>
	What would you like to do?<br>
	<table>
	<tr>
		<td>
			<a href="newadmin.php"><img src="add.jpg" height="100px" width="100px"><br>Add New Admin</img></a><br>
		</td>
		<td>
			<a href="insertdelete.php"><img src="minus.jpg" height="100px" width="100px"><br>Delete Admin Data</img></a><br>
		</td>
		<td>
			<a href="chpass.php"><img src="password.jpg" height="100px" width="100px"><br>Change Password</img></a><br>
		</td>
	</tr>
	</table>
	</body>
<?php
}
else
{
	include("else.php");
}
?>
</html>
