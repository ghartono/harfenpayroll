<html>
<?php
/***********************************
This page conists of data for the user to add employee data.
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
	<!--validation for presence check and type check for numbers which are contact number and employee id-->
	<script language='JavaScript' type='text/JavaScript'>
	function validate()
	{ 
		var empid= document.forms["form"]["empid"].value;
		var empname= document.forms["form"]["empname"].value;
		var address= document.forms["form"]["address"].value;
		var cnumber= document.forms["form"]["cnumber"].value;
		var cnumber2= document.forms["form"]["cnumber2"].value;
		
		if(empid=='' || empname=='' || address=='' || cnumber=='' || cnumber2=='' )
		{
			alert('Input Required');
			return false;
		}
		if(isNaN(empid))
		{
			alert('Employee ID need to be a number!');
			return false;
		}
		if(isNaN(cnumber))
		{
			alert('Contact Number 1 need to be a number!');
			return false;
		}
		if(isNaN(cnumber2))
		{
			alert('Contact Number 2 need to be a number!');
			return false;
		}
	}
	</script>
	<?php
	//include quick links in tabular form
	include("table.php");
	?>
	<!--This is the output of the page and input form consisting of all fields required for the addition of new employee data-->
	</head>
	</table>
	<h1>Welcome to Add Employee Page!
	<table>
	<form onSubmit="return validate();" name="form" action="employeeadd2.php" method="POST">
	<tr>
		<td>
			Employee ID
		</td>
		<td>
			<input type="text" name="empid" size="20" maxlength="4">
		</td>
	</tr>
	<tr>
		<td>
			Employee Name 
		</td>
		<td>
			<input type="text" name="empname" size="20">
		</td>
	</tr>
	<tr>
		<td>
			Address
		</td>
		<td>
			<input type="text" name="address" size="50">
		</td>
	</tr>
	<tr>
		<td>
			Contact Number 1
		</td>
		<td>
			<!-- +62 is the area number (employees are only in indonesia)-->
			+62 - 
			<input type="text" name="cnumber" size="15">
		</td>
	</tr>
	<tr>
		<td>
			Contact Number 2
		</td>
		<td>
			<!-- +62 is the area number (employees are only in indonesia)-->
			+62 - 
			<input type="text" name="cnumber2" size="15">
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
	//include the output when there is no session
	include("else.php");
}
?>

</body>
</html>
