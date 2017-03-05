<html>
<?php
/*******************************
This is the page where the code to delete the intended deletion from database is processed 
*******************************/
//include connection
include("connect.php");
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
	echo"<center>";
	?>
	<?php
	$empname=$_POST["empname"];
	$week=$_POST["week"];
	$year=$_POST["year"];
	//include connection
	include("connect.php");
	$result=mysql_query("Select * from employee_tbl WHERE EmpName='$empname'");
	$row=mysql_fetch_array($result);
	$empid=$row["Employee_ID"];
	if(mysql_num_rows($result)>0)
	{
		mysql_query("DELETE FROM project_tbl
		WHERE Employee_ID='$empid' AND Week='$week' AND Year='$year'");
		echo"<h1>Salary data removed.</h1>";
		?>
		<br>
		<a href="salary.php">Back to Salary page</a><br>
		<a href="insertdelete.php">Delete more</a>
		<?php
	}
	else
	{
		//Output when employee name doesn't exist in the table
		echo "<h1>Employee Name does not exist!</h1><br>";
		echo "<a href='insertdelete.php'>Retry deletion of salary data</a>";
	}
}
else
{
	//include what to output when not in session
	include("else.php");
}
?>
</body>
</html>
