<html>
<?php
/***********************
This page is where the input for changing password is.
The user will need to re-enter his username and password.
**********************/
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
	include("table.php");
	?>
<script language='JavaScript' type='text/JavaScript'>
function validate()
{  
if(document.form.username.value=='' || document.form.password.value=='' || document.form.npassword.value=='' || document.form.npassword2.value=='')
	{  alert('Input Required');
		return false;
	}
	else
	{	return true;	}
}
</script>
</head>
<body background="bg.jpg">
<center>
<img src="logo.jpg" width="100%"></img>
Welcome to Change Password Page
<table border="1">
<form name="form" action="chpass2.php" method="POST" onSubmit="return validate();">
<tr>
	<td>
		Confirm Username
	</td>
	<td>
		<input type="text" name="username">
	</td>
</tr>
<tr>
	<td>
		Password
	</td>	
	<td>
		<input type="password" name="password">
	</td>
<tr>
	<td>
		New Password
	</td>
	<td>
		<input type="password" name="npassword">
	</td>
</tr>
<tr>
	<td>
		Confirm Password
	</td>
	<td>
		<input type="password" name="npassword2">
	</td>
</tr>
</table>
<input type="submit" value="submit">
</form>
</center>
</body>
<?php
}
else
{
	include("else.php");
}
?>
</html>
