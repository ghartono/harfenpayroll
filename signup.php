<html>
<?php
/***********************************
This is the first page.
Before the user can do anything he need to log in first.
***********************************/
?>
<head>
<script language='JavaScript' type='text/JavaScript'>
//This is a Javascript function to check whether Username or Password is correctly input
function validate()
{  
	if(document.form.username.value=='' || document.form.password.value=='')
	{  	
		alert('Username/Password Required');
		return false;
	}
	else
	{	
		return true;
	}

}
</script>
<?
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
?>
</head>
<center>
Registration Page
<table>
<form name="form" action="signedup.php" method="POST" onSubmit="return validate();">
<tr>
	<td>
		Username
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
		Confirm Password
	</td>
	<td>
		<input type="password" name="confirmpassword">
	</td>
<tr>
	<td>
		Confirm Password
	</td>
	<td>
		<input type="password" name="confirmpassword">
	</td>
<tr>
	<td>
		Confirm Password
	</td>
	<td>
		<input type="password" name="confirmpassword">
	</td>
</table>
<input type="submit" value="submit"><br>
</form>
</center>
</body>
</html>
