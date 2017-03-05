<html>
<?php
/***********************************
This page is where the process of changing employee data takes place
It also shows that the data is already altered.
Limitation of the code: Checking for an existing ID or Employee name is not doable.
However this limitation does not come out often as changing ID or Employee name is rare.
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
	<table width="100%">
	<?php
	//include quick links in tabular form
	include("table.php");
	?>
	</head>
	</table>
	<table border="1">
	<?php
	$empid=$_POST["empid"];
	$empname=$_POST["empname"];
	$address=$_POST["address"];
	$cnumber="+62".$_POST["cnumber"];
	$cnumber2="+62".$_POST["cnumber2"];
	//include connection
	include("connect.php");
	//mysql Update the database with the input
	mysql_query("UPDATE employee_tbl
	SET Employee_ID='$empid', EmpName='$empname', Address='$address', ContactNumber1='$cnumber', ContactNumber2='$cnumber2' WHERE EmpName='$empname'");
	echo"<h1>Data Updated!</h1>";
	echo"<a href='employee.php'>Back to Employee Page </a><br></br>";
	echo"<a href='employeesearch.php'>Edit more employee data</a>";
}
else
{
	//include output when there is no session
	include("else.php");
}
?>
</table>
</center>
</body>
</html>
