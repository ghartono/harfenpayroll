<html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
?>
<body background="bg.jpg">
<head>
<link rel='stylesheet' type='text/css' href='css.css'>
<script language='JavaScript' type='text/JavaScript'>
function validate()
{  
if(document.form.empname.value=='' || document.form.dailysalary.value=='' || document.form.dayswork.value 			=='' || document.form.daysovernight.value=='' || document.form.overnightsalary.value =='' || 			document.form.week.value=='' || document.form.year.value=='' ||document.form.weeklysalary.value=='')
	{  alert('Input Required');
		return false;
	}
	else
	{	return true;	}
}
</script>
<?php
include("table.php");
?>
</head>
<?php
if(isset($_POST["empname"]))
{
?>
<form name='form' onSubmit="return validate();" action='update.php' method='POST'>
<table border="1">
Tutorial: Edit Directly (shows current data)
<?php
$empname=$_POST["empname"];
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
$sql="SELECT * FROM project_tbl WHERE EmpName='$empname'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
{
echo"<tr>";
	echo"<td>Employee Name";
	echo"<td><input type='text' name='empname' value='$row[EmpName]'>";
echo"<tr>";
	echo"<td>Current Daily Salary";
	echo"<td><input type='text' name='dailysalary' value='$row[SalPerDay]'>";
echo"<tr>";
	echo"<td>Current Overnight Salary";
	echo"<td><input type='text' name='overnightsalary' value='$row[OvernightSal]'>";
echo"<tr>";
	echo"<td>Number of Days Working This Week";
	echo"<td>";
			echo"<select name='dayswork'>
				<option value='$row[DaysWork]'>$row[DaysWork]</option>";
				for($dayswork=0;$dayswork<8;$dayswork++)
				{
					echo"<option value='$dayswork'>$dayswork</option>";
				}
			
			echo"</select>";
echo"<tr>
	<td>Number of Days Working Overnight This Week
	<td>
			<select name='daysovernight'>
				<option value='$row[DaysOvernight]'>$row[DaysOvernight]</option>";
				for($daysovernight=0;$daysovernight<8;$daysovernight++)
				{
					echo"<option value='$daysovernight'>$daysovernight</option>";
				}
			echo"</select>
		</td>";
echo"<tr>";
	echo"<td>Current Weekly Salary";
	echo"<td>$row[WeeklySal]";
echo"<tr>
		<td>
			Week
		</td>
		<td>
			<select name='week'>
				<option value='$row[Week]'>$row[Week]</option>";
				for($week=0;$week<53;$week++)
				{
					echo"<option value='$week'>$week</option>";
				}
			echo"</select>
		</td>
	</tr>
	<tr>
		<td>
			Year
		</td>
		<td>
			<select name='year'>
			<option value='$row[Year]'>$row[Year]</option>";
				for($year=(date("Y")-10);$year<(date("Y")+10);$year++)
				{
					echo"<option value='$year'>$year</option>";
				}
			echo"</select>
		</td>
	</tr>";
?>
</table>
<input type="submit" value="Update">
</form>
</center>
<?php
}
}
else
{
echo"Employee Name Not Inputted!";
}
}
else
{
?>
<font size="20"> Unauthorized User!</font><br>
Please Log In <a href="login.php">Here</a>
<?php
}
?>
</body>
</html>
