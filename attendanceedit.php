<html>
<?php
/***********************************
This page shows the week's employee attendance and pick which to edit
Limitation: only edit this week's data
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
	<script language='JavaScript' type='text/JavaScript'>
	function validate()
	{ 
		var empname= document.forms["form"]["empname"].value;
		if(empname=='')
		{
			alert('Input Required');
			return false;
		}
	}
	</script>
	<?php
	//include quick links
	include("table.php");
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
	</script>
	</head>
	<body>
	<!-- This is the output of the page and the input form -->
	<h1>Welcome to Edit Attendance Page!</h1>
	<form onSubmit="return validate();" name="form" action="attendanceedit2.php" method="POST">
	<table>
	<tr>
		<td>
			Type the Name of which Employee's Attendance You want to Edit
		</td>
		<td>
			<input type="text" name="empname">
		</td>
	</tr>
	</table>
	<input type="submit" value="Edit">
	</form>
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
		<th>Total Hours Overnight</th>
	<?php
	//include connection
	include("connect.php");
	$week = date('W');
	$year = date('Y');
	echo "Today is Week <b>$week</b> and Year <b>$year</b>";
	//Show the list of employee's data this week
	$result=mysql_query("SELECT * FROM attendance_tbl WHERE Week = '$week' AND Year = '$year'");
	while($row = mysql_fetch_array($result))
	{
		//fetch all the current week's employee attendance
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
			echo"<td>";
				echo($row["HoursOvernight"]);
			echo"</td>";
		echo"</tr>";
	}

	echo"</table>";
}
else
{
	//include what to output when there is no session
	include("else.php");
}
?>
</body>
