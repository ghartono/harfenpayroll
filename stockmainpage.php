<html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
?>
<head>
<table width="100%">
<tr>
<td width="50%"><a href="mainpage.php">Edit Employee Data</a>
<td width="40%"><a href="stockmainpage.php">Edit Stock Data</a>
<td width="40%"><a href="logout.php">Log Out</a>
</head>
</table>
<body background="bg.jpg">
<img src="logo.jpg" width="100%"></img>
<center>
<h1>Welcome to Stock Data Page!</h1>
What would you like to do?<br>
<a href="stockinsertinput.php">Add New Item</a><br>
<a href="stockinsertdelete.php">Delete Item</a><br>
<a href="stockinsertsearch.php">Search and Update Item Stock</a><br>
<a href='chpass.php'>Change Password</a>
</center>
</body>
<?php
}
else
{
?>
<body bgcolor="white">
<font size="20"> Unauthorized User!</font><br>
Please Log In <a href="login.php">Here</a>
</body>
<?php
}
?>
</html>
