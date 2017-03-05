<html>
<?php
/*************************************
After inputting the required data, this is the output page and 
where the adding to the database is processed
*************************************/
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
	$empid=$_POST["empid"];
	$empname=$_POST["empname"];
	$address=$_POST["address"];
	$cnumber="+62".$_POST["cnumber"];
	$cnumber2="+62".$_POST["cnumber2"];
	//include connection for mysql
	include("connect.php");
	//Check if employee name already exists in database.
	$result= "SELECT EmpName FROM employee_tbl WHERE EmpName='$empname'";
	$query=mysql_query($result);
	if(mysql_num_rows($query)>0)
	{
		echo "<h1>Employee Name is existing!</h1><br>";
		echo "<a href='employeeadd.php'>Retry adding new employee</a>";
	}
	else
	{
		//Check further if employee ID already exists in database.
		$result2= "SELECT Employee_ID FROM employee_tbl WHERE Employee_ID='$empid'";
		$query2=mysql_query($result2);
		if(mysql_num_rows($query2)>0)
		{
			echo "<h1>Employee ID has already been taken!</h1><br>";
			echo "<a href='employeeadd.php'>Retry adding new employee</a>";
		}
		else
		{
			//Insert the data inputted into the database
			mysql_query("Insert INTO employee_tbl (Employee_ID, EmpName, Address, ContactNumber1, ContactNumber2) VALUES ('$empid', '$empname', 			'$address' ,'$cnumber','$cnumber2')");
			echo"<h1>Employee Data Added!</h1>";
			?>
			<!-- Go back to employee main page -->
			<a href="employee.php">Back to Employee Page</a>
			<?php
		}	
	}
}
else
{
	//include output when there is no session
	include("else.php");
}
?>

</body>
</html>
