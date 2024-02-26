<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Branch Manager Homepage</title>
</head>

<body>
  <?php
include("../Assets/Connection/Connection.php");
session_start();
?>

    <?php
	  include("header.php");
	  ?>


<p>
</p>
<p>&nbsp; </p>
<h1><center>Welcome <?php echo $_SESSION["BranchManagername"]?></center></h1>
<div align="center"><a href="Myprofile.php">My profile</a><br>
  <a href="Editprofile.php">Edit profile</a><br>
  <a href="Changepassword.php">Change password</a><br>
  <a href="Screen.php">Screen</a><br>
  <a href="Screenseat.php">Screen Seat</a><br>
    <a href="Movieschedule.php">Movie Schedule</a><br>
  <a href="Movietiming.php">Movie Timing</a><br>

</div>


</body>
</html>    <?php
	  include("footer.php");
	  ?>

