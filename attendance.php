<html>
<?php
/***********************************
This page is the mainpage for checking attendance
The user can change attendance list of check new attendance.
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
	<img src="logo.jpg" width="100%"></img>
	<h1>Welcome to Attendance Check Page!</h1>
	What would you like to do?<br>
	<table>
	<tr>
		<td>
			<a href="attendancecheck.php"><img src="add.jpg" height="100px" width="100px"><br>New Attendance</img></a><br>
		</td>
		<td>
			<a href="attendanceedit.php"><img src="file.jpg" height="100px" width="100px"><br>Edit Attendance Data</img></a><br>
		</td>
		<td>
			<a href="attendanceprint.php"><img src="print.jpg" height="100px" width="100px"><br>Print a week data</img></a><br>
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
