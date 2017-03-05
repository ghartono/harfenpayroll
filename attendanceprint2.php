<html>
<?php
/***********************************
This page is where a printout of the attendance is produced
It can output when the intended week and year is not existing in database
***********************************/
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<head>
	<?php
	//Change all the 1 and 0 in database to 'Present' or 'Absent'
	echo"<link rel='stylesheet' type='text/css' href='toprint.css'>";
	function attendance($n)
	{
		if($n==1)
		{
			echo "Present";
		}
		else
		{
			echo "Absent";
		}
	}
	?>
	</head>
	<body>
	</tr>
	<?php
	$week=$_POST["week"];
	$year=$_POST["year"];
	//include connection
	include("connect.php");
	//fetch from attendance_tbl where year and the week is what is inputted
	$result= mysql_query("Select * from attendance_tbl WHERE Week = $week and Year = $year");
	if(mysql_num_rows($result)>0)
	{
		//output when week and year exists in database
		?>
		<br><br>
		<h1><i> Harfen Design </i></h1>
		<?php
		echo"<h2>Attendance List</h2>";
		echo"Week: $week Year: $year";
		?>
		<br>
		<table border="1" width=100% height=5%>
		<tr>
		<th>ID</th>
		<th>Employee Name</th>
		<th>Monday</th>
		<th>Tuesday</th>
		<th>Wednesday</th>
		<th>Thursday</th>
		<th>Friday</th>
		<th>Saturday</th>
		<th>Sunday</th>
		<?php
		//fetch from employee_tbl where the ID is what is from the attendance_tbl
		while($row = mysql_fetch_array($result))
		{
			$result2 = mysql_query("Select * from employee_tbl WHERE Employee_ID = '$row[Employee_ID]'");
			$row2= mysql_fetch_array($result2);
			//Check if the week and year exist in database
			echo"<tr>";
				echo"<td>";
					echo($row["Employee_ID"]);
				echo"</td>";
				echo"<td>";
					echo($row2["EmpName"]);
				echo"</td>";
				echo"<td>";
					echo(attendance($row["Monday"]));
				echo"</td>";
				echo"<td>";
					echo(attendance($row["Tuesday"]));
				echo"</td>";
				echo"<td>";
					echo(attendance($row["Wednesday"]));
				echo"</td>";
				echo"<td>";
					echo(attendance($row["Thursday"]));
				echo"</td>";
				echo"<td>";
					echo(attendance($row["Friday"]));
				echo"</td>";
				echo"<td>";
					echo(attendance($row["Saturday"]));
				echo"</td>";
				echo"<td>";
					echo(attendance($row["Sunday"]));
				echo"</td>";
			echo"</tr>";
		}
	}
	else
	{
		//Output when week or year does not exist in database
		echo"<link rel='stylesheet' type='text/css' href='css.css'>";
		include("table.php");
		echo "<h1>Week, Year does not exist!</h1><br>";
		echo "<a href='attendanceprint.php'>Try print another attendance</a>";
	}
	echo"</table>";
}
else
{
	//include the output when there is no session
	include("else.php");
}
?>
</body>
