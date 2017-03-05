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
<?php
echo"<center>";
if(isset($_POST["itemname"]))
{
?>
<form name='form' action='stockupdate.php' method='POST' onSubmit="return validate();">
<table border="1">
Tutorial: Edit Directly (shows current data)
<?php
$itemname=$_POST["itemname"];
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
$sql="SELECT * FROM stock_tbl WHERE ItemName='$itemname'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
{
echo"<tr>";
	echo"<td>Name of Item";
	echo"<td><input type='text' name='itemname' value='$row[ItemName]'>";
echo"<tr>";
	echo"<td>Current Stock of Item";
	echo"<td><input type='text' name='itemstock' value='$row[ItemStock]'>";
echo"<tr>";
	echo"<td>Current Price per Unit";
	echo"<td><input type='text' name='itemprice' value='$row[PricePerUnit]'>";
echo"<tr>";
	echo"<td>Current Number of Item Used";
	echo"<td><input type='text' name='itemused' value='$row[ItemUsed]'>";
echo"<tr>";
	echo"<td>Current Number of Item Left";
	echo"<td>$row[ItemLeft]";
echo"<input type='hidden' name='itemleft' value='$row[ItemLeft]'>";
?>
</table>
<input type="submit" value="Update">
</form>
</center>
<?php
}
}
else
{
echo"Item Name Not Inputted!";
}
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
