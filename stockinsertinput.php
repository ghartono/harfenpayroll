<html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
?>
<body background="bg.jpg">
<head>
<script language='JavaScript' type='text/JavaScript'>
function validate()
{  
if(document.form.itemname.value=='')
	{  alert('Input Required');
		return false;
	}
	else
	{	return true;	}
}
</script>
<table width="100%">
<tr>
<td width="50%"><a href="mainpage.php">Edit Employee Data</a>
<td width="40%"><a href="stockmainpage.php">Edit Stock Data</a>
<td width="40%"><a href="logout.php">Log Out</a>
</head>
</table>
<center>
Welcome to Add Item Page!
<table border="1">
<form action="stockinsert.php" method="POST" name="form" onSubmit="return validate();">
<tr>
	<td>Item Name
	<td><input type="text" name="itemname">
<tr>
	<td>Item Stock
	<td><input type="text" name="itemstock">
<tr>
	<td>Price Per Unit
	<td><input type="text" name="itemprice">
<tr>
	<td>Amount of unit used
	<td><input type="text" name="itemused">

</table>
<input type="submit" value="Add">
</form>
</center>
<?php
}
else
{
?>
<font size="20"> Unauthorized User!</font><br>
Please Log In <a href="login.php">Here</a>
<?php
}
?>

</body>
</html>
