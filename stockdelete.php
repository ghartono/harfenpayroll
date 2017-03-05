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
?>
<?php
$itemname=$_POST["itemname"];
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
mysql_query("DELETE FROM stock_tbl
WHERE ItemName='$itemname'");
echo"Item removed.";
?>
<br>
<a href="stockmainpage.php">Back to Mainpage</a><br>
<a href="stockinsertdelete.php">Delete more</a>
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
</center>
</body>
</html>
