<html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
?>
<body background="bg.jpg">
<head>
<table width="100%">
<?php
include("table.php");
?>
</head>
</table>
<?php
echo"<center>";
if(isset($_POST["empname"]))
{
?>
<table border="1">
<?php
$empname=$_POST["empname"];
$dailysalary=$_POST["dailysalary"];
$dayswork=$_POST["dayswork"];
$daysovernight=$_POST["daysovernight"];
$overnightsalary=$_POST["overnightsalary"];
$week=$_POST["week"];
$year=$_POST["year"];
$weeklysalary=$dailysalary*$dayswork+$overnightsalary*$daysovernight;
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
mysql_query("UPDATE project_tbl 
SET EmpName='$empname', SalPerDay='$dailysalary', DaysWork='$dayswork', DaysOvernight='$daysovernight', WeeklySal='$weeklysalary', OvernightSal='$overnightsalary', Week='$week', Year='$year'
WHERE EmpName='$empname'");
echo"<h1>Data Updated!</h1>";
mysql_select_db("gioDB",$con);
$sql="SELECT * FROM project_tbl WHERE EmpName='$empname'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
{
echo"<tr>";
	echo"<td width=50%>Employee Name";
	echo"<td>$row[EmpName]";
echo"<tr>";
	echo"<td>Current Daily Salary";
	echo"<td>$row[SalPerDay]";
echo"<tr>";
	echo"<td>Current Overnight Salary";
	echo"<td>$row[OvernightSal]";
echo"<tr>";
	echo"<td>Number of Days Working This Week";
	echo"<td>$row[DaysWork]";
echo"<tr>";
	echo"<td>Number of Days Working Overnight This Week";
	echo"<td>$row[DaysOvernight]";
echo"<tr>";
	echo"<td>Current Weekly Salary";
	echo"<td>$row[WeeklySal]";
echo"<tr>";
	echo"<td>Week";
	echo"<td>$row[Week]";
echo"<tr>";
	echo"<td>Year";
	echo"<td>$row[Year]";
?>
</table>
<br>
Back to <a href="salary.php">Salary page</a>
</center>
</body>
<?php
}
}
else
{
echo"Item Name Not Inputted!";
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
</table>
</center>
</body>
</html>
