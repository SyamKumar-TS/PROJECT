<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>User Homepage</title>
</head>

<body>
<p>


  <?php
include("../Assets/Connection/Connection.php");
session_start();
?>
<?php
	  include("header.php");
	  ?>
</p>
<p>&nbsp; </p>
<h1><center>Welcome <?php echo $_SESSION["uname"]?></center></h1>
<center><h2><i>Book movie tickets for your favourite movie from your home, office or while travelling.</i></h2></center>
   
</div>


</body>
</html>    <?php
	  include("footer.php");
	  ?>

