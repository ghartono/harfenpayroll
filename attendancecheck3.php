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
		</table>
		<?php
		echo"<center>";
		if(isset($_POST["empname"]))
		{
			$empname=$_POST["empname"];
			$day=date("D");
			$year=date("Y");
			$week=date("W");
			if($day=="Mon")
			{
				mysql_query("Insert INTO attendance_tbl (EmpName, Week, Year, Monday, HoursOvernight) VALUES ('$empname', 					'$week' ,'$year','$monday', '$hoursovernight')");
				echo"<h1>Attendance Checked!</h1>";
				?>
				<a href="attendance.php">Back to Attendance Page</a>
				<?php	
			}
			else
			{
				mysql_query("Insert INTO attendance_tbl (EmpName, Week, Year, Monday, HoursOvernight) VALUES ('$empname', 					'$week' ,'$year','$monday', '$hoursovernight')");
				echo"<h1>Attendance Checked!</h1>";
				?>
				<a href="attendance.php">Back to Attendance Page</a>
				<?php	
			}
	}
	else
	{
		include("else.php");
	}
	?>

	</body>
	</html>
