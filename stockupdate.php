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
<table border="1">
<?php
$itemname=$_POST["itemname"];
$itemstock=$_POST["itemstock"];
$itemprice=$_POST["itemprice"];
$itemused=$_POST["itemused"];
$itemleft=$itemstock-$itemused;
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
mysql_query("UPDATE stock_tbl 
SET ItemName='$itemname', ItemStock='$itemstock', PricePerUnit='$itemprice', ItemUsed='$itemused', ItemLeft='$itemleft'
WHERE ItemName='$itemname'");
echo"<h1>Data Updated!</h1>";
mysql_select_db("gioDB",$con);
$sql="SELECT * FROM stock_tbl WHERE ItemName='$itemname'";
$result=mysql_query($sql);
while($row = mysql_fetch_array($result))
{
echo"<tr>";
	echo"<td>Name of Item";
	echo"<td>$row[ItemName]";
echo"<tr>";
	echo"<td>New Item Stock";
	echo"<td>$row[ItemStock]";
echo"<tr>";
	echo"<td>New Price per Unit";
	echo"<td>$row[PricePerUnit]";
echo"<tr>";
	echo"<td>New Number of Item Used";
	echo"<td>$row[ItemUsed]";
echo"<tr>";
	echo"<td>New Number of Items Left";
	echo"<td>$row[ItemLeft]";
?>
</table>
<br>
Back to <a href="stockmainpage.php">Main page</a>
</center>
</body>
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
</html>
