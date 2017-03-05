<html>
<!--
This page is for taking attendance for the employees on a specific day
Limitation: cannot be validated, it needs to have data from the database
for the submitting of data.
-->
<body>
<?php
//include quick links in tabular form
include("table.php");
//include connection
include("connect.php");
//include css
echo "<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<h1>Welcome to the Check Attendance Page!</h1>
	<table>
	<form onSubmit="return validate();" name="form" action="attendancecheck2.php" method="POST">

	<tr>
		<td colspan="2">
			<?php
			$date=date("Y-m-d");
			$day=date("D");
			$year=date("Y");
			$week=date("W");
			echo "<font size='5'>Today is $date, Day $day, Week $week of $year</font>";
			echo "<input type='hidden' value='$year' name='year'></input>";
			echo "<input type='hidden' value='$day' name='day'></input>";
			echo "<input type='hidden' value='$week' name='week'></input>";
			?>
		</td>
	</tr>
		<?php
		//input form for checking attendance
		$result= mysql_query("Select * from employee_tbl");
		while($row = mysql_fetch_array($result))
		{
			echo"<tr>";
				echo"<td>";
					$empid = "empid_".$row["Employee_ID"];
					echo"<input name='$empid' type='hidden' value='$row[Employee_ID]'></input>$row[EmpName]";
				echo"</td>";
				echo"<td>";
					$attendance = "attendance_".$row["EmpName"];
					echo"<input type='radio' value='1' name='$attendance'>Present</input>";
					echo"<input type='radio' value='0' name='$attendance'>Absent</input>";
					echo"&nbsp &nbsp &nbsp Overnight Hours: ";
					$overnight = "overnight_".$row["EmpName"];
					echo"<input type='text' name='overnight_$row[EmpName]'></input>";
					echo"</select>";
				echo"</td>";
			echo"</tr>";

		}
		?>
	</tr>
	</table>
<input type="submit" value="Enter">
</form>
<?php
}
else
{
	//include what to output when there is no session
	include("else.php");
}
?>
</body>
