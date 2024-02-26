
<?php
include("../Assets/Connection/connection.php");

session_start();

$userid=$_SESSION["bid"];

      if(isset($_POST["btn_update"]))
      {
        $branchmanagerid=$_SESSION["bid"];
      $password=$_POST["txt_password"];
    $updateqry="UPDATE tbl_branchmanager SET branchmanager_password = '".$password."' WHERE branchmanager_id = '".$branchmanagerid."'" ;
       
       
 if($Conn->query($updateqry))
  {
    ?>
        <script>
    alert("UPDATED");
    window.location="Changepassword.php";
    </script>
        <?php
  }
  else
  {
    ?>
        <script>
    alert("failed");
    window.location="Changepassword.php";
    </script>
        <?php
  }
   
    
      }



?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
        <style>
.button {
  background-color: #6C3;	
  border-radius: 4px;
  color: green;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  transition-duration: 0.4s;
  cursor: pointer;
}
input[type=text] {
  border: none;
  border-bottom: 2px solid red;
    text-align:center;

} 
input[type=password] {
  border: none;
  border-bottom: 2px solid red;
  text-align:center;
} 
td,tr{
	border: none;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Change Password</title>
</head>

<body>
    <?php
	  include("header.php");
	  ?>
<center><h1><u>Change Password</u></h1></center>


<form id="form1" name="form1" method="post" action="">
  <table align="center"border="1">
    <tr>
      <td width="104">Current Password</td>
      <td width="193"><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" /></td>
    </tr>
        <tr>
      <td width="104">New Password</td>
      <td width="193"><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password" required="required" /></td>
    </tr>
    <tr>
      <td width="104">Confirm Password</td>
      <td width="193"><label for="txt_password"></label>
      <input type="password" name="txt_password" id="txt_password"required="required"  /></td>
    </tr>

    <tr>
      <td height="57" colspan="2"><div align="center">
        <input type="submit" name="btn_update" id="btn_update" value="Update" class="button" />
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="button"/>
      </div></td>
    </tr>
  </table>
  <div align="center"></div>
</form>
</body>
</html>    <?php
	  include("footer.php");
	  ?>

