<html>
<body>
<head>
<script language='JavaScript' type='text/JavaScript'>
function validate()
	{  
		if(document.form.week.value=='' || document.form.year.value=='')
		{  
			alert('Input Required');
			return false;
		}
		else
		{	
			return true;
		}
	}
</script>
</head>
<?php
include("table.php");
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<h1>Welcome to the Attendance Page!</h1>
	<table>
	<form onSubmit="return validate();" name="form" action="attendancecheck2.php" method="POST">
	<tr>
		<td>
			In which Week and in what Year are you going to check attendance of?
		</td>
		<td>
			Week <select name="week">
				<option value="">Week</option>
				<?php
				for($week=1;$week<53;$week++)
				{
					echo"<option value='$week'>$week</option>";
				}
				?>
			</select>
			Year <select name="year">
			<option value="">Year</option>
				<?php
				for($year=(date("Y")-10);$year<(date("Y")+10);$year++)
				{
					echo"<option value='$year'>$year</option>";
				}
				?>
			</select>
		</td>
	</table>
<input type="submit" value="Choose">
<?php
}
else
{
	include("else.php");
}
?>
</body>
