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
	//include quick links in tabular form
	include("table.php");
	?>
	</head>
	<img src="logo.jpg" width="100%"></img>
	<h1>Welcome to Employee Page!</h1>
	What would you like to do?<br>
	<table>
	<tr>
		<td>
			<!-- link to go add employee data -->
			<a href="employeeadd.php"><img src="add.jpg" height="100px" width="100px"><br>Add Employee Data</img></a><br>
		</td>
		<td>
			<!-- link to go delete employee data -->
			<a href="employeedelete.php"><img src="minus.jpg" height="100px" width="100px"><br>Delete Employee Data</img></a><br>
		</td>
		<td>
			<!-- link to view current employee data and edit the data -->
			<a href="employeesearch.php"><img src="file.jpg" height="100px" width="100px"><br>Search and Edit Employee Data</img></a><br>
		</td>
	</tr>
	</table>
	</body>
<?php
}
else
{
	//include what to output when there is no session
	include("else.php");
}
?>
</html>
