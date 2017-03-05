<html>
<?php
/***********************************
This page is where the user can alter/edit the current data
***********************************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
if(isset($_SESSION["username"]))
{
?>
	<head>
	<!--validation for presence check and type check for numbers which are contact number and employee id-->
	<script language='JavaScript' type='text/JavaScript'>
	function validate()
	{ 
		var empid= document.forms["form"]["empid"].value;
		var empname= document.forms["form"]["empname"].value;
		var address= document.forms["form"]["address"].value;
		var cnumber= document.forms["form"]["cnumber"].value;
		var cnumber2= document.forms["form"]["cnumber2"].value;
		
		if(empid=='' || empname=='' || address=='' || cnumber=='' || cnumber2=='' )
		{
			alert('Input Required');
			return false;
		}
		if(isNaN(empid))
		{
			alert('Employee ID need to be a number!');
			return false;
		}
		if(isNaN(cnumber))
		{
			alert('Contact Number 1 need to be a number!');
			return false;
		}
		if(isNaN(cnumber2))
		{
			alert('Contact Number 2 need to be a number!');
			return false;
		}
	}
	</script>
	<?php
	//include quick links in tabular form
	include("table.php");
	?>
	<!--This is the output of the page and input form consisting of all fields required for the addition of new employee data-->
	</head>
	<form name='form' onSubmit="return validate();" action='employeeupdate.php' method='POST'>
	<table border="1">
	<?php
	$empname=$_POST["empname"];
	//include connection
	include("connect.php");
	$sql="SELECT * FROM employee_tbl WHERE EmpName='$empname'";
	$result=mysql_query($sql);
	//This is to check if the inputted employee name exist in database
	if(mysql_num_rows($result)>0)
	{
		//This is to fetch all the data on the employee
		while($row = mysql_fetch_array($result))
		{
			$cnumber=substr("$row[ContactNumber1]",3);
			$cnumber2=substr("$row[ContactNumber2]",3);
			echo"<tr>";
				echo"<td>";
					echo"Employee ID";
				echo"</td>";
				echo"<td>";
					echo"<input type='text' name='empid' value='$row[Employee_ID]' maxlength='4'></input>";
				echo"</td>";
			echo"<tr>";
				echo"<td>";
					echo"Employee Name";
				echo"</td>";
				echo"<td>";
					echo"<input type='text' name='empname' value='$row[EmpName]'></input>";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Address";
				echo"</td>";
				echo"<td>";
					echo"<input type='text' name='address' value='$row[Address]'></input>";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Contact Number1";
				echo"</td>";
				echo"<td>";
					//+62 is the area number in indonesia
					echo"+62 - <input type='text' name='cnumber' value='$cnumber'></input>";
				echo"</td>";
			echo"</tr>";
			echo"<tr>";
				echo"<td>";
					echo"Contact Number2";
				echo"</td>";
				echo"<td>";
					echo"+62 - <input type='text' name='cnumber2' value='$cnumber2'></input>";
				echo"</td>";
			echo"</tr>";
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
		//Output when the inputted employee name doesn't exist
		echo "<h1>Employee Name does not exist!<br></h1>";
		echo "<a href='employeesearch.php'>Try Searching again</a>";
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
