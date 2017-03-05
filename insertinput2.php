<html>
<?php
/***********************************
The user adds the salary to be given here
He can either edit or add new salary of an employee that he had taken attendance of
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
		var dailysalary= document.forms["form"]["dailysalary"].value;
		var overnightsalary= document.forms["form"]["overnightsalary"].value;
		
		if(dailysalary=='' || overnightsalary=='')
		{
			alert('Input Required');
			return false;
		}
		if(isNaN(dailysalary))
		{
			alert('Daily Salary need to be a number!');
			return false;
		}
		if(isNaN(overnightsalary))
		{
			alert('Overnight Salary need to be a number!');
			return false;
		}
	}
	</script>
	<?php
	//include quick links
	include("table.php");
	?>
	</head>
	</table>
	<table>
	<form onSubmit="return validate();" name="form" action="insertinput3.php" method="POST">
	<?php
	//include connection
	include("connect.php");
	$empid=$_POST["empid"];
	$week=date('W');
	$year=date('Y');
	$result= mysql_query("Select * from employee_tbl WHERE Employee_ID='$empid'");
	$row=mysql_fetch_array($result);
	$result2= mysql_query("Select * from attendance_tbl WHERE Employee_ID='$empid' AND Week='$week' AND Year='$year'");
	$row2=mysql_fetch_array($result2);
	//calculate total number of days working
	$daysworking= $row2["Monday"] + $row2["Tuesday"] + $row2["Wednesday"] + $row2["Thursday"] + $row2["Friday"] + $row2["Saturday"] + $row2["Sunday"];
	$hoursovernight=$row2["HoursOvernight"];
	$empname=$row["EmpName"];
	echo "Week is $week and Year is $year";
	?>
	<tr>
		<td>
			Employee ID
		</td>
		<td>
			<?php echo $empid; 
			echo "<input type='hidden' value='$empid' name='empid'></input>"; ?>
		</td>
	</tr>
	<tr>
		<td>
			Employee Name
		</td>
		<td>
			<?php echo $empname; ?>
		</td>
	</tr>
	<tr>
		<td>
			Number of days working
		</td>
		<td>
			<?php echo $daysworking; 
			echo "<input type='hidden' value='$daysworking' name='daysworking'></input>"; ?>
		</td>
	</tr>
	<tr>
		<td>
			Hours Working Overnight
		</td>
		<td>
			<?php echo $hoursovernight; 
			echo "<input type='hidden' value='$hoursovernight' name='hoursovernight'></input>"; ?>
		</td>
	</tr>
	<tr>
		<td>
			Daily Salary
		</td>
		<td>
			Rp.
			<input type="text" name="dailysalary">
		</td>
	</tr>
	<tr>
		<td>
			Overnight Salary
		</td>
		<td>
			Rp.
			<input type="text" name="overnightsalary">
		</td>
	</tr>
	</table>
	<input type="submit" value="Add">
	</form>
	</center>
	<?php
}
else
{
	include("else.php");
}
?>

</body>
</html>
