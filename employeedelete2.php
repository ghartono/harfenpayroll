<html>
<?php
/*******************************
This page is to show the result of the deletion and
the process of the deletion
******************************/
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
	</table>
	<?php
	$empname=$_POST["empname"];
	include("connect.php");
	//Check if employee name exist in database. If it is not it will output so.
	$result= "SELECT EmpName FROM employee_tbl WHERE EmpName='$empname'";
	$query=mysql_query($result);
	if(mysql_num_rows($query)>0)
	{
		//mysql process to delete data
		mysql_query("DELETE FROM employee_tbl WHERE EmpName='$empname'");
		//Output when data is deleted
		echo"<h1>Employee data removed.</h1>";
		?>
		<br>
		<a href="employee.php">Back to Employee page</a><br>
		<a href="employeedelete.php">Delete more</a>
		<?php
	}
	else
	{
		//Output when employee name doesn't exist in the table
		echo "<h1>Employee Name does not exist!</h1><br>";
		echo "<a href='employeedelete.php'>Retry deletion of employee</a>";
	}
}
else
{
	//include output when there is no session
	include("else.php");
}
?>
</center>
</body>
</html>
