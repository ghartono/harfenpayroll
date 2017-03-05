<html>
<?php
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
	<?php
	include("table.php");
	?>
	</head>
	</table>
	<?php
	echo"<center>";
	if(isset($_POST["uname"]))
	{
		$username=$_POST["uname"];
		$password=$_POST["password"];
		$password2=$_POST["password2"];
		include("connect.php");
		if($password==$password2)
		{
			mysql_query("Insert INTO user_tbl (Username, Password) VALUES ('$username','$password')");
			echo"<h1>New Admin Added!</h1>";
			?>
			<a href="mainpage.php">Back to Mainpage</a>
			<?php
		}
		else
		{
			echo "Password mismatch. try again <a href='newadmin.php'>here</a>";
		}
	
	}
	else
	{
		echo"Username Name Not Inputted!";
	}
}
else
{
	include("else.php");
}
?>

</body>
</html>
