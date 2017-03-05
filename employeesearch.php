<html>
<?php
/********************************
This Page is the input page for editing the employee data
********************************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<body background="bg.jpg">
	<head>
	<script language='JavaScript' type='text/JavaScript'>
	function validate()
	{ 
		var empname= document.forms["form"]["empname"].value;
		if(empname=='')
		{
			alert('Input Required');
			return false;
		}
	}
	</script>
	<?php
	//include quick links in tabular form
	include("table.php");
	?>
	</head>
	<!-- This is the input form and list of all employee -->
	Type the name of the employee you would like to edit
	<form onSubmit="return validate();" name="form" action="employeesearch2.php" method="POST">
	<table>
	<tr>
		<td>
			Employee Name
		</td>
		<td>
			<input type="text" name="empname">
		</td>
	</tr>
	</table>
	<input type="submit" value="Edit">
	</form>

	<table border="1"width=95% height=5%>
	<tr>
		<th>Employee ID</th>
		<th>Employee Name</th>
		<th>Address</th>
		<th>Contact Number1</th>
		<th>Contact Number2</th>

	</tr>

	<?php
	//include connection
	include("connect.php");
	//fetch all the employee list
	$result= mysql_query("Select * from employee_tbl");
	while($row = mysql_fetch_array($result))
	{
	echo"<tr>";
			echo"<td>";
			echo($row["Employee_ID"]);
			echo"</td>";

			echo"<td>";
			echo($row["EmpName"]);
			echo"</td>";

			echo"<td>";
			echo($row["Address"]);
			echo"</td>";

			echo"<td>";
			echo($row["ContactNumber1"]);
			echo"</td>";
			
			echo"<td>";
			echo($row["ContactNumber2"]);
			echo"</td>";


	echo"</tr>";
	}
}
else
{
	//include output when there is no session
	include("else.php");
}
?>
</body>
</html>
