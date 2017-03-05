<?php
$q=$_GET["q"];

include("connect.php)";


$sql="SELECT * FROM user WHERE id = '".$q."'";

$result = mysql_query($sql);
?>

<table border="1"width=95% height=5%>
	<tr>
		<th>Employee Name</th>
		<th>Salary Per Day</th>
		<th>Overnight Salary</th>
		<th>No. of Days Working</th>
		<th>No. of Days Overnight</th>
		<th>Weekly Salary</th>
		<th>Week</th>
		<th>Year</th>
	</tr>
<?php
$result= mysql_query("Select * from project_tbl");
while($row=mysql_fetch_array($result))
{
$result= mysql_query("Select * from project_tbl");
	while($row = mysql_fetch_array($result))
	{
	echo"<tr>";
			echo"<td>";
			echo($row["EmpName"]);
			echo"</td>";

			echo"<td>";
			echo($row["SalPerDay"]);
			echo"</td>";

			echo"<td>";
			echo($row["OvernightSal"]);
			echo"</td>";

			echo"<td>";
			echo($row["DaysWork"]);
			echo"</td>";

			echo"<td>";
			echo($row["DaysOvernight"]);
			echo"</td>";

			echo"<td>";
			echo($row["WeeklySal"]);
			echo"</td>";
	
			echo"<td>";
			echo($row["Week"]);
			echo"</td>";

			echo"<td>";
			echo($row["Year"]);
			echo"</td>";
	echo"</tr>";
	}
}
?>
echo "</table>";

mysql_close($con);
?> 
