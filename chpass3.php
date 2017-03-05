<html>
<?php
/********************
Output and update to database after changing password
*********************/
//include css
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
//command to start session
session_start();
//check if there is a session
	if(isset($_SESSION["username"]))
	{
		//include quick links
		include("table.php");
		//include connection
		include("connect.php");
		$username=$_POST["username"];
		$password=$_POST["password"];
		$npassword=$_POST["npassword"];
		$npassword2=$_POST["npassword2"];
		$result=mysql_query("SELECT * FROM user_tbl WHERE Username='$username'");
		//change to database. If password is not what in the database, password remain unchanged
		$row=mysql_fetch_array($result);
		if(mysql_num_rows($result)>0)
		{ 
			if ($npassword==$npassword2)
			{
				if ($password==$row['Password']) 
				{
					mysql_query("UPDATE user_tbl SET Password = '$npassword' WHERE Username = '$username'");
					echo"<h1>Password Changed!</h1><br>";
					echo"<a href='employee.php'>Go to mainpage</a><br>";
				}
				else 
				{ 
					echo"<h1>Wrong Password!</h1>";
					echo"<a href='chpass.php'>Retry</a>";
				}
			}
			else
			{
				echo "<h1>New Password and Confirm Password is different!</h1>";
				echo"<a href='chpass.php'>Retry</a>";
			}	
		}
		else
		{
			echo"<h1>Non-existing Username!</h1>";
			echo"<a href='chpass.php'>Retry</a>";
		}
		echo"</center>";
		echo"</body>";
	}
else
{
	//include what to output when there is no session
	include("else.php");
}
?>
</html>
