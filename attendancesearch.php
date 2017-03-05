<html>
<?php
/***********************************
This page is to edit attendance data
Limitation: only edit this week's data
***********************************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
	?>
	<body>
	<head>
	<script language='JavaScript' type='text/JavaScript'>
	//Validation for week and year inputs
	function validate()
	{  
		if(document.form.week.value=='' || document.form.year.value=='')
		{  
			alert('Week and Year need to be selected');
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
	//include quick links
	include("table.php");
	?>
	<!-- this is the input form to print which need to specify which year and week -->
	<h1>Welcome to the Printing Page!</h1>
	<table>
	<form onSubmit="return validate();" name="form" action="attendanceprint2.php" method="POST">
	<tr>
		<td>
			In which Week and in what Year are you going to print?
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
	</tr>
	</table>
	<input type="submit" value="Print">
<?php
}
else
{
	//include what to output when there is no session
	include("else.php");
}
?>
</body>
