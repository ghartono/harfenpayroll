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
$itemname=$_POST["itemname"];
$itemstock=$_POST["itemstock"];
$itemprice=$_POST["itemprice"];
$itemused=$_POST["itemused"];
$itemleft=$itemstock-$itemused;
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
mysql_query("Insert INTO stock_tbl (ItemName, ItemStock, PricePerUnit, ItemUsed, ItemLeft) VALUES ('$itemname','$itemstock','$itemprice','$itemused','$itemleft')");
echo"New Item Added!<br>Item Left is $itemleft";
?>

<br>
<a href="stockmainpage.php">Back to Mainpage</a>

<?php
}
else
{
echo"Item Name Not Inputted!";
}
echo"</center>";
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
