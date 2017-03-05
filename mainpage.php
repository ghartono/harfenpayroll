<html>
<?php
/***********************************
This page is the mainpage for employee data.
The user can edit, input, delete and search employee datas from this page.
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
	<h1>Welcome to Employee Page!</h1>
	What would you like to do?<br>
	<table>
	<tr>
		<td>
			<a href="insertinput.php"><img src="add.jpg" height="100px" width="100px"><br>Add/Edit Employee Data</img></a><br>
		</td>
		<td>
			<a href="insertdelete.php"><img src="minus.jpg" height="100px" width="100px"><br>Delete Employee Data</img></a><br>
		</td>
		<td>
			<a href="print.php"><img src="print.jpg" height="100px" width="100px"><br>Print a week data</img></a><br>
		</td>
		<td>
			<a href="printcheque.php"><img src="print.jpg" height="100px" width="100px"><br>Print Cheque for Employee</img></a><br>
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
