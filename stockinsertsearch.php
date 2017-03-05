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
<center>
<table border="1">
Search for a specific item
<form action="stocksearch.php" method="POST">
<tr>
	<td>Name of Item
	<td><input type="text" name="itemname">
</table>

<input type="submit" value="Search">
</form>
<table border="1"width=95% height=5%>
<tr>
<th>Item Name
<th>No. of Item in Stock
<th>Price Per Unit
<th>No. of Item Used
<th>No. of Item Left
</tr>

<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("GioDB",$con);

$result= mysql_query("Select * from stock_tbl");
while($row = mysql_fetch_array($result))
{
echo"<tr>";
			echo"<td>";
			echo($row["ItemName"]);
			echo"</td>";

			echo"<td>";
			echo($row["ItemStock"]);
			echo"</td>";

			echo"<td>";
			echo($row["PricePerUnit"]);
			echo"</td>";

			echo"<td>";
			echo($row["ItemUsed"]);
			echo"</td>";

			echo"<td>";
			echo($row["ItemLeft"]);
			echo"</td>";
			
echo"</tr>";
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
</center>
</body>
</html>
