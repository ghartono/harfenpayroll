<html>
<?php
/*******************************
This is where the data is updated to the database
*******************************/
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
	//include quick links in tabular form
	include("table.php");
	?>
	</head>
	</table>
	<?php
	$week=date('W');
	$year=date('Y');
	$empid=$_POST["empid"];
	$monday=$_POST["Monday"];
	$tuesday=$_POST["Tuesday"];
	$wednesday=$_POST["Wednesday"];
	$thursday=$_POST["Thursday"];
	$friday=$_POST["Friday"];
	$saturday=$_POST["Saturday"];
	$sunday=$_POST["Sunday"];
	$hoursovernight=$_POST["hoursovernight"];
	//include connection
	include("connect.php");
	//mysql Update the database with the input, and output success message
	mysql_query("UPDATE attendance_tbl
	SET Monday='$monday',Tuesday='$tuesday',Wednesday='$wednesday',Thursday='$thursday',Friday='$friday',Saturday='$saturday',Sunday='$sunday',HoursOvernight='$hoursovernight'
	WHERE Employee_ID='$empid' AND Week='$week' AND Year='$year'");
	echo"<h1>Data Updated!</h1>";
	echo"<a href='attendanceedit.php'>Edit More Data</a><br><br>";
	echo"<a href='attendance.php'>Back to Attendance Page</a>";
}
else
{
	//include what to output when not in session
	include("else.php");
}
?>

</body>
</html>
