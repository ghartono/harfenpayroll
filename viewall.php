<?php
$con = mysql_connect("localhost","root","");
mysql_select_db(StudentDB",$con);
$result = mysql_query("Select * from StudnetTBL");
while($row = mysql_fetch_array($result))
{
echo("ID".$row["ID"].<br>);
echo("ID".$row["Name"].<br>);
echo("<a href='Delete.php?ID=$row[ID]'>DELETE</a>");
echo("<br><br>");
}
mysql_close();
?>
