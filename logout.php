<html>
<!-- page for logout. terminate session -->
<body bgcolor="black">
<center>
<?php
session_start();
session_destroy();
?>
<font size="20" color="white">
Logged Out. See you soon!
</font>
</center>
</body>
</html>
