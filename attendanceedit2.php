<html>
<?php
/***********************************
This page shows the attendance of selected employee from attendanceedit.php
***********************************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
	?>
	<head>
	<form name='form' action='attendanceedit3.php' method='POST' onSubmit="return validate();">
	<?php
	//Function for input form
		
	function attendance($n,$a)
	{
		if($n==1)
		{
			echo"<b> Present &nbsp &nbsp &nbsp</b>";
			echo"<input type='radio' value='1' name='$a'>Present</input>";
			echo"<input type='radio' value='0' name='$a'>Absent</input>";
		}
		else
		{
			echo"<b> Absent &nbsp &nbsp &nbsp</b>";
			echo"<input type='radio' value='1' name='$a'>Present</input>";
			echo"<input type='radio' value='0' name='$a'>Absent</input>";
		}
	}
	function validate()
	{
	}
	//include quick links
	include("table.php");
	?>
	</head>
	<table>
	<?php
	//include connection
	include("connect.php");
	$week = date('W');
	$year = date('Y');
	$empname = $_POST["empname"];

	$result2 = mysql_query("Select * from employee_tbl WHERE EmpName='$empname'");
	$row2= mysql_fetch_array($result2);
	$result=mysql_query("SELECT * FROM attendance_tbl WHERE Week = '$week' AND Year = '$year' AND Employee_ID='$row2[Employee_ID]'");
	$row= mysql_fetch_array($result);
	if(mysql_num_rows($result2)>0)
	{
			echo "Today is <b> Week $week</b> and <b>Year $year</b><br>";
	echo "<font size ='5'>The previous attendance is told</b></font>";
		//The input form for editing attendance for the week
		echo"<tr>";
			echo"<td>";
				echo"Employee ID";
			echo"<td>";
				echo($row["Employee_ID"]);
				echo"<input type='hidden' name='empid' value='$row2[Employee_ID]'></input>";
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Employee Name";
			echo"</td>";
			echo"<td>";
				echo($row2["EmpName"]);
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Monday";
			echo"</td>";
			echo"<td>";
				attendance($row["Monday"],"Monday");
			echo"</td>";
			echo"</tr>";	
		echo"<tr>";
			echo"<td>";
				echo"Tuesday";
				echo"</td>";
			echo"<td>";
				attendance($row["Tuesday"],"Tuesday");
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Wednesday";
			echo"</td>";
			echo"<td>";
				attendance($row["Wednesday"],"Wednesday");
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Thursday";
			echo"</td>";
			echo"<td>";
				attendance($row["Thursday"],"Thursday");
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Friday";
			echo"</td>";
			echo"<td>";
				attendance($row["Friday"],"Friday");
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Saturday";
			echo"</td>";
			echo"<td>";
				attendance($row["Saturday"],"Saturday");
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Sunday";
			echo"</td>";
			echo"<td>";
				attendance($row["Sunday"],"Sunday");
			echo"</td>";
		echo"</tr>";
		echo"<tr>";
			echo"<td>";
				echo"Total Overnight Hours";
			echo"</td>";
			echo"<td>";
				echo"<input type='text' name='hoursovernight' value='$row[HoursOvernight]'";
			echo"</td>";
		echo"<tr>";
		echo"</table>";
		echo "<input type='Submit' Value='Update'></input>";
		echo"</form>";
	}
	else
	{
		//Output when the inputted employee name doesn't exist
		echo "<h1>Employee Name does not exist!<br></h1>";
		echo "<a href='attendanceedit.php'>Try Searching again</a>";
	}
}
else
{
	//include what to output when there is no session
	include("else.php");
}
?>
</body>
