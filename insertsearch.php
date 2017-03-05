<html>
<?php
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<body background="bg.jpg">
	<head>
	<?php
	include("table.php");
	?>
	</head>
	Search for a specific employee
	<form action="search.php" method="POST">
	<table>
	<tr>
		<td>
			Employee Name
		</td>
		<td>
			<input type="text" name="empname">
		</td>
	</tr>
	</table>
	<input type="submit" value="Search">
	</form>

	<table border="1"width=95% height=5%>
	<tr>
		<th>Employee Name</th>
		<th>Salary Per Day</th>
		<th>Overnight Salary</th>
		<th>No. of Days Working</th>
		<th>No. of Days Overnight</th>
		<th>Weekly Salary</th>
		<th>Week</th>
		<th>Year</th>
	</tr>

	<?php
	include("connect.php");
	$result= mysql_query("Select * from project_tbl");
	while($row = mysql_fetch_array($result))
	{
	echo"<tr>";
			echo"<td>";
			echo($row["EmpName"]);
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
			echo($row["DaysOvernight"]);
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
}
else
{
	include("else.php");
}
?>
</body>
</html>
