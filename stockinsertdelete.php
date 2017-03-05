<html>
<head>
<script language='JavaScript' type='text/JavaScript'>
<script>
function confirmDelete("delete.php") 
{
  if (confirm("Are you sure you want to delete")) 
  {
    document.location = "delete.php";
  }
}
</script>
</script>
<table width="100%">
<tr>
<td width="50%"><a href="mainpage.php">Edit Employee Data</a>
<td width="40%"><a href="stockmainpage.php">Edit Stock Data</a>
<td width="40%"><a href="logout.php">Log Out</a>
</table>
</head>
<?php
session_start();
if(isset($_SESSION["username"]))
{
?>
<body background="bg.jpg">
<center>
<table border="1">
<form name="form" onSubmit="return confirm('Are you sure you want to delete?')" action="stockdelete.php" method="POST">
Item Delete Page
<tr>
	<td>Item Name
	<td><input type="text" name="itemname">
</table>
<input type="submit" value="Delete">
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
