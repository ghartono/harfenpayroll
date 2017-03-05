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
		$dailysalary=$_POST["dailysalary"];
		$dayswork=$_POST["dayswork"];
		$daysovernight=$_POST["daysovernight"];
		$overnightsalary=$_POST["overnightsalary"];
		$weeklysalary=$dailysalary*$dayswork+$overnightsalary*$daysovernight;
		$empname=$_POST["empname"];
		$week=$_POST["week"];
		$year=$_POST["year"];
		include("connect.php");
		mysql_query("Insert INTO project_tbl (EmpName, SalPerDay, DaysWork, DaysOvernight, WeeklySal, 				OvernightSal, Week, Year) VALUES ('$empname','$dailysalary', '$dayswork', '$daysovernight', 			'$weeklysalary','$overnightsalary','$week','$year')");
		echo"<h1>Employee Data Added!</h1>";
		echo"<b>$empname</b> 's salary this week is <b>$weeklysalary</b><br>";
		?>
		<a href="salary.php">Back to Salary Page</a>
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
