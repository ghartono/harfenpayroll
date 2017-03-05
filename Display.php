<html>
<head>
<img src="banner2.jpg" width=100% height=25%>
<style type="text/css">

body {
background: white;
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size: 11px;
line-height: 18px;
color: black;
}
td
{
font-size: 12px;
}
</style>
</head>
<body background="grey.jpg">

<h1><center>Piling</center></h1>
<center>
<table border="1"width=95% height=5%>
<tr>
<th>Crane Type</th>
<th>Serial Number</th>
<th>Brand</th>
<th>Type</th>
<th>Code Number</th>
<th>Client</th>
<th>Location</th>
<th>Operator</th>
<th>Status</th>
</tr>

<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("Project",$con);

$result= mysql_query("Select * from Piling");
$a="12";
while($row = mysql_fetch_array($result))
{
echo"<tr>";
			echo"<td>";
			echo($row["Crane_Type"]);
			echo"</td>";

			echo"<td>";
			echo($row["Number"]);
			echo"</td>";

			echo"<td>";
			echo($row["Brand"]);
			echo"</td>";

			echo"<td>";
			echo($row["Type"]);
			echo"</td>";

			echo"<td>";
			echo($row["Code_Number"]);
			echo"</td>";

			echo"<td>";
			echo($row["Client"]);
			echo"</td>";

			echo"<td>";
			echo($row["Location"]);
			echo"</td>";

			echo"<td>";
			echo($row["Operator"]);
			echo"</td>";
			echo"<td>";
			echo($row["Status"]);
			
echo"</tr>";
}
?>
<table>
<tr>
<th>
</th>
</tr>
</table>
<h1><center>Rental</center></h1>
<center>
<table border="1" width=95% height=5%>
<tr>
<th>Crane Type</th>
<th>Serial Number</th>
<th>Brand</th>
<th>Type</th>
<th>Code Number</th>
<th>Client</th>
<th>Location</th>
<th>Operator</th>
<th>Status</th>
</tr>

<?php
$con=mysql_connect("localhost","root","");
mysql_select_db("Project",$con);

$result= mysql_query("Select * from Rental");
$a="12";
while($row = mysql_fetch_array($result))
{
echo"<tr>";
			echo"<td>";
			echo($row["Crane_Type"]);
			echo"</td>";

			echo"<td>";
			echo($row["Number"]);
			echo"</td>";

			echo"<td>";
			echo($row["Brand"]);
			echo"</td>";

			echo"<td>";
			echo($row["Type"]);
			echo"</td>";

			echo"<td>";
			echo($row["Code_Number"]);
			echo"</td>";

			echo"<td>";
			echo($row["Client"]);
			echo"</td>";

			echo"<td>";
			echo($row["Location"]);
			echo"</td>";

			echo"<td>";
			echo($row["Operator"]);
			echo"</td>";
			echo"<td>";
			echo($row["Status"]);
			echo"</td>";
echo"</tr>";
}
?>
</center>
<table = "1" width=95% height=10%>
<tr>	

</tr>
</table>
<center><a href=signup.php><img src=print.jpg></a></center>
</body>
</html>
