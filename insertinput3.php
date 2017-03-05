<html>
<?php
/*************************
This is where the data is inserted/updated in the database
*************************/
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
	//include quicklinks
	include("table.php");
	?>
	</head>
	</table>
	<?php
	//include connection
	include("connect.php");
	$empid=$_POST["empid"];
	$dailysalary=$_POST["dailysalary"];
	$daysworking=$_POST["daysworking"];
	$hoursovernight=$_POST["hoursovernight"];
	$overnightsalary=$_POST["overnightsalary"];
	$weeklysalary=$dailysalary*$daysworking+$overnightsalary*$hoursovernight;
	$week=Date('W');
	$year=Date('Y');
	//prevent duplication of data. If it exist in database it will just update it.
	$result= "SELECT * FROM project_tbl WHERE Employee_ID='$empid' AND Week='$week' AND Year='$year'";
	$query=mysql_query($result);
	if(mysql_num_rows($query)>0)
	{
		mysql_query("UPDATE project_tbl
		SET DaysWork='$daysworking', SalPerDay='$dailysalary', HoursOvernight='$hoursovernight', OvernightSal='$overnightsalary', 			WeeklySal='$weeklysalary'
		WHERE Employee_ID='$empid' AND Week='$week' AND Year='$year'");
		echo"<h1>Data Updated!</h1>";
		?>
		<a href="salary.php">Back to Salary Page</a>
		<?php	
	}
	else
	{
		mysql_query("Insert INTO project_tbl (Employee_ID, SalPerDay, DaysWork, HoursOvernight, WeeklySal, OvernightSal, Week, Year) VALUES ('$empid', '$dailysalary', '$daysworking', '$hoursovernight', '$weeklysalary', 
		'$overnightsalary','$week','$year')");
		echo"<h1>Salary Data Added!</h1>";
		?>
		<a href="salary.php">Back to Salary Page</a>
		<?php	
	}

}
else
{
	//output when there is no sesion
	include("else.php");
}
?>

</body>
</html>
