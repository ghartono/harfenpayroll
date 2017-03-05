<html>
<!--
This is the first page.
Before the user can do anything he need to log in first.\
-->
<head>
<script language='JavaScript' type='text/JavaScript'>
//Validation to check for presence of fields username and password
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
<?php
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
?>
</head>
<center>
<img src="logo.jpg" width="100%"></img>
<!-- 
These fields are to log in to the system. It has validation when submitting. The next page is logged.php
-->
Welcome! Please Log In.
<table>
<form name="form" action="logged.php" method="POST" onSubmit="return validate();">
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
</table>
<input type="submit" value="Login"><br>
</form>
</center>
</body>
</html>
