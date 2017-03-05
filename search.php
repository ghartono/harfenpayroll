<html>
<?php
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<head>
	<?php include("table.php"); ?>
	<link rel='stylesheet' type='text/css' href='css.css'>
	</head>
	<?php
	echo"<center>";
	if(isset($_POST["empname"]))
	{
	?>
		<form action="insertupdate.php" method="POST">
		<table>
		<?php
		$empname=$_POST["empname"];
		include("connect.php");
		$sql = "SELECT * FROM project_tbl WHERE EmpName='$empname'";
		$result = mysql_query($sql);
		$n=0;
		while($row = mysql_fetch_array($result))
  		{
			echo"<tr>";
				echo"<td width=50%>";
					echo"Employee Name";
				echo"</td>";
				echo"<td>";
					echo"$row[EmpName]";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Salary per Day";
				echo"</td>";
				echo"<td width>";
					echo"$row[SalPerDay]";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Number of Days Working";
				echo"</td>";
				echo"<td>";
					echo"$row[DaysWork]";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Number of Days Work Overnight";
				echo"</td>";
				echo"<td>";
					echo"$row[DaysOvernight]";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Weekly Salary";
				echo"</td>";
				echo"<td>";
					echo"$row[WeeklySal]";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Week";
				echo"</td>";
				echo"<td>";
					echo"$row[Week]";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Year";
				echo"</td>";
				echo"<td>";
					echo"$row[Year]";
				echo"</td>";
			echo"</tr>";
			++$n;
echo"<input type='hidden' value='$empname' name='empname'>";
?>
</table>
<br>
What would you like to do with this employee?<br>
<input type="submit" value="Update/Edit">
</form>
<?php
}
if(0==$n)
{
echo"Search Not Found! Please try to search again <a href='insertsearch.php'>Here</a>";
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
</center>
</body>

</html>
