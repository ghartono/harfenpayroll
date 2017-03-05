<html>
<?php
/*******************************
This is page where the attendance is updated/added
Limitation of the code: The user will need to start on monday for the attendance taking to create a new record
Then on tuesday to sunday, the user only be able to update a record for attendance.
This system is intended to be used everyday, to check attendance, and later on to calculate the salary (number of days working)
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
	$week=$_POST["week"];
	$year=$_POST["year"];
	$day=$_POST["day"];
	//If the day is monday, it will create a new attendance
	if($day=="Mon")
	{
		$result= mysql_query("Select * from employee_tbl");
		while($row = mysql_fetch_array($result))
		{
			$empid=$_POST["empid_$row[Employee_ID]"];
			$attendance=$_POST["attendance_$row[EmpName]"];
			$hoursovernight=$_POST["overnight_$row[EmpName]"];
			mysql_query("Insert INTO attendance_tbl (Employee_ID, Week, Year, Monday, HoursOvernight) VALUES ('$empid', 
			'$week' ,'$year','$attendance', '$hoursovernight')");
		}
		echo"<h1>Attendance Data Added!</h1>";
		?>
		<a href="attendance.php">Back to Attendance Page</a>
		<?php	
	}
	//If the day is other than monday (tuesday to sunday), it will update an existing attendance (of the specified week and year). The user will need to have created a record on monday
	else
	{
		//change the system's current 'Day' to word form
		if($day=="Tue"){$day="Tuesday";}
		if($day=="Wed"){$day="Wednesday";}
		if($day=="Thu"){$day="Thursday";}
		if($day=="Fri"){$day="Friday";}
		if($day=="Sat"){$day="Saturday";}
		if($day=="Sun"){$day="Sunday";}
		$result= mysql_query("Select * from employee_tbl");
		while($row = mysql_fetch_array($result))
		{
			$empid=$_POST["empid_$row[Employee_ID]"];
			$attendance=$_POST["attendance_$row[EmpName]"];
			$hoursovernight=$_POST["overnight_$row[EmpName]"];
			
			mysql_query("UPDATE attendance_tbl SET $day='$attendance', HoursOvernight=HoursOvernight+$hoursovernight WHERE Employee_ID='$empid' AND Week='$week' AND Year='$year'");
		}
		echo"<h1>Attendance Data Updated!</h1>";
		?>
		<a href="attendance.php">Back to Attendance Page</a>
		<?php	
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
