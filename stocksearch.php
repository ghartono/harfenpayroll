<html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
?>
<body background="bg.jpg">
<head>
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
<form action="stockinsertupdate.php" method="POST">
<table border="1">
<?php
$itemname=$_POST["itemname"];
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
$sql = "SELECT * FROM stock_tbl WHERE ItemName='$itemname'";
$result = mysql_query($sql);
$n=0;
while($row = mysql_fetch_array($result))
{
	echo"<tr>";
	echo"<td>";
	echo"Item Name";
	echo"<td>";
	echo"$row[ItemName]";
	echo"<tr>";
	echo"<td>";
	echo"Item Stock";
	echo"<td>";
	echo"$row[ItemStock]";
	echo"<tr>";
	echo"<td>";
	echo"Price per Unit";
	echo"<td>";
	echo"$row[PricePerUnit]";
	echo"<tr>";
	echo"<td>";
	echo"Number of Items Used";
	echo"<td>";
	echo"$row[ItemUsed]";
	echo"<tr>";
	echo"<td>";
	echo"Number of Items Left";
	echo"<td>";
	echo"$row[ItemLeft]";
	++$n;
	echo"<input type='hidden' value='$itemname' name='itemname'>";
?>
</table>
What would you like to do with this item?<br>
<input type="submit" value="Update/Edit"><br>
Go back to<a href="stockmainpage.php">Main page</a><br>
</form>
<?
}
if(0==$n)
{
echo"Search Not Found! Please try to search again <a href='stockinsertsearch.php'>Here</a>";
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
<br>
</center>
</body>

</html>
