<html>
<head>
<!-- This page is to delete salary data by inputting the employee name and state the year and week of the data -->
<!--Css for page-->
<link rel='stylesheet' type='text/css' href='css.css'>

<script language='JavaScript' type='text/JavaScript'>
function confirmDelete("delete.php") 
{
	if (confirm("Are you sure you want to delete")) 
	{
		document.location = "delete.php";
	}
} 
  
</script>
</head>
<?php
//include quick links
include("table.php");
//start session
session_start();
//check if session is up
if(isset($_SESSION["username"]))
{
	?>
	<body background="bg.jpg">
	<table border="1">
	<form name="form" onSubmit="return confirm('Are you sure you want to delete?')" action="insertdelete2.php" method="POST">
	Input the employee name you want to delete
		<tr>
			<td>
				Employee Name
			</td>
			<td>
				<input type="text" name="empname">
			</td>
		</tr>
	<tr>
			<td>
				Week
			</td>
			<td>
				<input type="text" name="week">
			</td>
		</tr>
		<tr>
			<td>
				Year
			</td>
			<td>
				<input type="text" name="year">
			</td>
		</tr>

	</table>
	<input type="submit" value="Delete">
	</form>
	<table id="searchResults" name="searchResults" border="1"width=95% height=5%>
		<tr>
			<th>Employee ID</th>
			<th>Employee Name</th>
			<th>Salary Per Day</th>
			<th>Overnight Salary</th>
			<th>No. of Days Working</th>
			<th>Total Hours Overnight</th>
			<th>Weekly Salary</th>
			<th>Week</th>
			<th>Year</th>
		</tr>

	<?php
	//include connection
	include("connect.php");

	$result= mysql_query("Select * from project_tbl");
	while($row=mysql_fetch_array($result))
	{
		$result2=mysql_query("Select * from employee_tbl WHERE Employee_ID=$row[Employee_ID]");
		$row2=mysql_fetch_array($result2);
		echo"<tr>";
				echo"<td>";
				echo($row["Employee_ID"]);
				echo"</td>";
			
				echo"<td>";
				echo($row2["EmpName"]);
				echo"</td>";

				echo"<td>";
				echo($row["SalPerDay"]);
				echo"</td>";

				echo"<td>";
				echo($row["OvernightSal"]);
				echo"</td>";

				echo"<td>";
				echo($row["DaysWork"]);
				echo"</td>";

				echo"<td>";
				echo($row["HoursOvernight"]);
				echo"</td>";

				echo"<td>";
				echo($row["WeeklySal"]);
				echo"</td>";
	
				echo"<td>";
				echo($row["Week"]);
				echo"</td>";

				echo"<td>";
				echo($row["Year"]);
				echo"</td>";
		echo"</tr>";
	}

	?>
	</center>
	<?php
}
else
{
	//include what to output when not in session
	include("else.php");
}
?>
</body>
</html>
