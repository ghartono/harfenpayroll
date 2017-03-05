<html>
<?php
/***********************************
This page is where a printout of the salary for the week is produced
***********************************/
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
	echo"<link rel='stylesheet' type='text/css' href='toprint.css'>";
	?>
	</head>
	<body>

	<?php 
	$week=$_POST["week"];
	$year=$_POST["year"];
	//initiation
	$weeklysalary=0;
	//include connection
	include("connect.php");
	//fetch from attendance_tbl where year and the week is what is inputted
	$result= mysql_query("Select * from attendance_tbl WHERE Week = $week and Year = $year");
	if(mysql_num_rows($result)>0)
	{
		?>
		<br><br>
		<h1><i> Harfen Design </i></h1>
		<h2> Salary List </h2>
		<?php echo"Week: $week Year: $year"; ?>
		<table border="1" width=95% height=5%>
		<tr>
			<th>Employee ID</th>
			<th>Employee Name</th>
			<th>Salary Per Day</th>
			<th>Overnight Salary</th>
			<th>No. of Days Working</th>
			<th>Hours Overnight</th>
			<th>Weekly Salary</th>

		</tr>
		<?php
		//fetch data from database and also output it  including the total employees' salaries for the week
		$result= mysql_query("Select * from project_tbl WHERE Week = $week and Year = $year");
		while($row = mysql_fetch_array($result))
		{
			$result2= mysql_query("Select * from employee_tbl WHERE Employee_ID='$row[Employee_ID]'");
			$row2= mysql_fetch_array($result2);
			//number format is for formatting numbers with comma in every thousand.
			echo"<tr>";
				echo"<td>";
				echo($row["Employee_ID"]);
				echo"</td>";

				echo"<td>";
				echo($row2["EmpName"]);
				echo"</td>";

				echo"<td>";
				echo("Rp.".number_format($row["SalPerDay"]));
				echo"</td>";

				echo"<td>";
				echo("Rp.".number_format($row["OvernightSal"]));
				echo"</td>";

				echo"<td>";
				echo($row["DaysWork"]);
				echo"</td>";

				echo"<td>";
				echo($row["HoursOvernight"]);
				echo"</td>";

				echo"<td>";
				echo("Rp.".number_format($row["WeeklySal"]));
				echo"</td>";

				$weeklysalary=$weeklysalary+$row["WeeklySal"];
				$weeklysalaryoutput=number_format($weeklysalary);
			echo"</tr>";
		}
		echo "<tr>";
			echo "<td colspan='6'>";
				echo "Total Weekly Salary";
			echo "</td>";
			echo "<td>";
				echo "Rp."."$weeklysalaryoutput";
			echo"</td>";
		echo"</tr>";
	}
	else
	{
		//Output when week or year does not exist in database
		echo"<link rel='stylesheet' type='text/css' href='css.css'>";
		include("table.php");
		echo "<h1>Week, Year does not exist!</h1><br>";
		echo "<a href='print.php'>Try print another attendance</a>";
	}
}
else
{
	//include the output when there is no session
	include("else.php");
}	
	
?>
</table>
</body>
</html>
