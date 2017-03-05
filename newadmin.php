<html>
<?php
/***********************************
The user can add an employee data here.
Password is for the employee to be able to log in (with his own name as the username)
***********************************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<body background="bg.jpg">
	<head>
	<script language='JavaScript' type='text/JavaScript'>
	function validate()
	{  
		if(document.form.uname.value=='' || document.form.password.value=='' || document.form.password2.value=='')
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
	<?php
	include("table.php");
	?>
	</head>
	</table>
	<h1>Welcome to Add New Admin Page!
	<table>
	<form onSubmit="return validate();" name="form" action="newadmin2.php" method="POST">
	<tr>
		<td>
			Admin username
		</td>
		<td>
		
			<input type="text" name="uname">
		</td>
	</tr>
	<tr>
		<td>
			Password
		</td>
		<td>
			<input type="password" name="password">
		</td>
	</tr>
	<tr>
		<td>
			Confirm Password
		</td>
		<td>
			<input type="password" name="password2">
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
