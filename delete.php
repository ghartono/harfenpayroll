<html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
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
?>
<?php
$empname=$_POST["empname"];
$con=mysql_connect("localhost","root","");
mysql_select_db("gioDB",$con);
mysql_query("DELETE FROM project_tbl
WHERE EmpName='$empname'");
echo"<h1>Employee data removed.</h1>";
?>
<br>
<a href="salary.php">Back to Salary page</a><br>
<a href="insertdelete.php">Delete more</a>
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
</center>
</body>
</html>
