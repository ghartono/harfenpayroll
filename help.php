<html>
<?php
session_start();
if(isset($_SESSION["username"]))
{
echo"<link rel='stylesheet' type='text/css' href='css.css'>";
?>
<body background="bg.jpg">
<head>
<table width="100%">
<?php
include("table.php");
?>
</head>
</table>
<body>
<div id="top"><h1> Welcome to Help Page! </h1></div>
<h2>
1. Table of Contents<br>
<a href="#part1">1.1 Getting Started</a><br>
<a href="#part2">1.2  FAQ (Frequently Asked Questions)</a></h2>

<div id="part1"><h2>1.1 Getting Started</h2></div> <a href="#top">Back to Top</a>
<div id="part2"><h2>1.2 Frequently Asked Questions</h2></div> <a href="#top">Back to Top</a> <br>
<?php
}
else
{
	include("else.php");
}
?>r
</body>
</html>

