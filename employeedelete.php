<html>
<?php
/*******************************
This page is to delete an employee data
******************************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
	?>
	<!--Validation to confirm deletion-->
	<script language='JavaScript' type='text/JavaScript'>
	function confirmDelete("employeedelete.php") 
	{
		if (confirm("Are you sure you want to delete?")) 
		{
			document.location = "employeedelete.php";
		}
	} 

	</script>
	</head>
	<?php
	//include quick links in tabular form
	include("table.php");
	?>
	<!-- This is to verify that the user wants to delete the inputted employee -->
	<table border="1">
	<form name="form" onSubmit="return confirm('Are you sure you want to delete?')" action="employeedelete2.php" method="POST">
	Input the employee name you want to delete
		<tr>
			<td>
				Employee Name
			</td>
			<td>
				<input type="text" name="empname">
			</td>
		</tr>

	</table>
	<input type="submit" value="Delete">
	</form>
	<!--This table is for header for the data to be shown-->
	<table border="1"width=95% height=5%>
		<tr>
			<th>Employee ID</th>
			<th>Employee Name</th>
			<th>Address</th>
			<th>Contact Number1</th>
			<th>Contact Number2</th>
		</tr>

	<?php
	//include connection
	include("connect.php");
	//This is to fetch all the data in employee_tbl
	$result= mysql_query("Select * from employee_tbl");
	while($row=mysql_fetch_array($result))
	{
	$result= mysql_query("Select * from employee_tbl");
		while($row = mysql_fetch_array($result))
		{
		echo"<tr>";
				echo"<td>";
				echo($row["Employee_ID"]);
				echo"</td>";

				echo"<td>";
				echo($row["EmpName"]);
				echo"</td>";

				echo"<td>";
				echo($row["Address"]);
				echo"</td>";

				echo"<td>";
				echo($row["ContactNumber1"]);
				echo"</td>";

				echo"<td>";
				echo($row["ContactNumber2"]);
				echo"</td>";

		echo"</tr>";
		}
	}
	?>
	</center>
<?php
}
else
{
	//include output when there is no session
	include("else.php");
}
?>
</body>
</html>
