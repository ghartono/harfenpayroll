<html>
<body>
<?php
session_start();
if(isset($_SESSION["username"]))
{
?>
<iframe src="logged.php" height="70%" width="70%">
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
</body>
</html> 
