<html>
<?php
/***********************************
The user can add or update salary of employee in this week
Limitation: only this week, unable to edit other weeks (prevent on-site hacking)
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
	<?php
	//include quick links
	include("table.php");
	?>
	</head>
	</table>
	<h1>Welcome to Add Salary Page!
	<table>
	<form onSubmit="return validate();" name="form" action="insertinput2.php" method="POST">
	<?php
	$week=Date('W');
	$year=Date('Y');
	//include connection
	include("connect.php");
	?>
	<tr>
		<td>
			Employee Name
		</td>
		<td>
			<?php
			echo "<select name='empid'>";
			$result= mysql_query("Select * from employee_tbl");
			while($row = mysql_fetch_array($result))
			{
				echo"<option value='$row[Employee_ID]'>$row[EmpName]</option>";
			}
			echo "</select>";
			?>
		</td>
	</tr>
	<tr>
		<td>
			Week
		</td>
		<td>
			<?php echo $week; ?>
		</td>
	</tr>
	<tr>
		<td>
			Year
		</td>
		<td>
			<?php echo $year; ?>
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
