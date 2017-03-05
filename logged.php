<html>
<!--
This is the page after the user logs in.
It consists both the successful and fail outputs after trying to log in
-->
<?php
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//get username from previous page (login.php)
$username=$_POST["username"];
//check if there is a username set
if(isset($username))
{
	//include connection page
	include("connect.php");
	//get password from previous page (login.php)
	$password=$_POST["password"];
	$result=mysql_query("SELECT * FROM user_tbl WHERE Username='$username' and Password='$password'");
	//check if the username and password inputted is properly matched and exist in database
	if(mysql_num_rows($result)>0)	 
 	{ 
		//This is the output. It gives link to other parts of the project, which are employee, attendance, salary and change password pages
		echo"<body background='bg.jpg'>";
		echo"Welcome!<br>";
		echo"What are you going to do?<br><br>";
		echo"<a href='employee.php'><img src='employeefile.jpg' height='100px' width='100px'></img><br>Edit Employee Data</a><br>";
		echo"<a href='attendance.php'><img src='attendance.jpg' height='100px' width='100px'></img><br>Check Attendance</a><br>";
		echo"<a href='salary.php'><img src='salary.jpg' height='100px' width='100px'></img><br>Edit Salary Data</a><br>";
		echo"<a href='chpass.php'><img src='password.jpg' height='100px' width='100px'></img><br>Change Password</a>";
		//start session 
		$_SESSION["username"]=$username;
	}
	else 
	{
		//output when the username and/or password is incorrect
		echo"<h1>Invalid username or password!</h1>";
		echo"<img src='denied.jpg'></img>";
	}
}
else
{
	//include page to output when there is no session
	include("else.php");
}
?>
</body>
</html> 
