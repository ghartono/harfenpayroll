<html>
<?php
/***********************************
This page shows the result of the employee the user added in the previous pages.
***********************************/
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
	<?php
	echo"<center>";
	$empname=$_POST["empname"];
	if(isset($_POST["empname"]))
	{
		$dailysalary=$_POST["dailysalary"];
		$dayswork=$_POST["dayswork"];
		$daysovernight=$_POST["daysovernight"];
		$overnightsalary=$_POST["overnightsalary"];
		$weeklysalary=$dailysalary*$dayswork+$overnightsalary*$daysovernight;
		include("connect.php");
		mysql_query("UPDATE project_tbl 
		SET SalPerDay='$dailysalary', DaysWork='$dayswork', DaysOvernight='$daysovernight', WeeklySal='$weeklysalary',
		OvernightSal='$overnightsalary'
		WHERE EmpName='$empname'");
		echo"<h1>Data Added!</h1>";
		?>
		<br>
		<a href="mainpage.php">Back to Mainpage</a>
		</center>
		<?php
	}
	else
	{
		echo"Employee Name Not Inputted!";
	}
}
else
{
	include("else.php");
}
?>
</body>
</html>
