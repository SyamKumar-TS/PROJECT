<?php
session_start();

include("../Assets/Connection/Connection.php");
if(isset($_POST["btn_login"]))
{
	$email=$_POST["txt_email"];
	$password=$_POST["txt_password"];
	
	$selU="select * from tbl_user where user_email='".$email."' and user_password='".$password."' and user_status='1'";
	$rowU=$Conn->query($selU);
	
		$selAdmin="select * from tbl_admin where admin_email='".$email."' and admin_password='".$password."'";
	$rowAdmin=$Conn->query($selAdmin);

			$selBranchManager="select * from tbl_branchmanager where branchmanager_email='".$email."' and branchmanager_password='".$password."'";
	$rowBranchManager=$Conn->query($selBranchManager);

	if($dataU=$rowU->fetch_assoc())
	{
		$_SESSION["uid"]=$dataU["user_id"];
		$_SESSION["uname"]=$dataU["user_name"];
		header("Location:../User/Homepage.php");
	}
	elseif($dataAdmin=$rowAdmin->fetch_assoc())
	{
		$_SESSION["Adminid"]=$dataAdmin["admin_id"];
		$_SESSION["Adminname"]=$dataAdmin["admin_name"];
		header("Location:../Admin/Homepage.php");
	}
		elseif($dataBranchManager=$rowBranchManager->fetch_assoc())
	{
		$_SESSION["bid"]=$dataBranchManager["branchmanager_id"];
		$_SESSION["BranchManagername"]=$dataBranchManager["branchmanager_name"];
		header("Location:../BranchManager/Homepage.php");
	}else

	?>

			<script>
					alert("Invalid Login");
					window.location="Login.php";
			</script>
<?php

}
?>
<?php

include("header.php");
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
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>

<body>


<form id="form1" name="form1" method="post" action="">
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table  border="1" align="center" width="37%" height="20%" style="margin:auto">
    <tr>
      <td height="51"><label for="txt_email"></label>
        <div align="center">
          <input type="email" name="txt_email" id="txt_email" placeholder="email" required="required"/>
      </div></td>
    </tr>
    <tr>
      <td height="75"><label for="txt_password"></label>
        <div align="center">
          <input type="password" name="txt_password" id="txt_password" placeholder="password" required/>              

      </div></td>
    </tr>
    <tr>
      <td height="39"><div align="center">
        <input type="submit" name="btn_login" id="btn_login" value="Login" class="button"/>
      </div></td>
    </tr>
    <tr>
      <td height="29" align="center"><a href="Newuser.php">NewUser</a></td>
    </tr>
     <tr>
      <td height="29" align="center"><a href="Recovery.php">Forgot Password</a></td>
    </tr>
  </table>
</form>
<br /><br /><br />
</body>
</html><?php

include("footer.php");
?>
<script src="../Assets/Jquery/jQuery.js"></script>
<script >

//password validation
var myInput = document.getElementById("txt_password");
var letter = document.getElementById("letter");
var capital = document.getElementById("capital");
var number = document.getElementById("number");
var length = document.getElementById("length");

// When the user clicks on the password field, show the message box
myInput.onfocus = function() {
  document.getElementById("message").style.display = "block";
}

// When the user clicks outside of the password field, hide the message box
myInput.onblur = function() {
  document.getElementById("message").style.display = "none";
}

// When the user starts to type something inside the password field
myInput.onkeyup = function() {
  // Validate lowercase letters
  var lowerCaseLetters = /[a-z]/g;
  if(myInput.value.match(lowerCaseLetters)) {  
    letter.classList.remove("invalid");
    letter.classList.add("valid");
  } else {
    letter.classList.remove("valid");
    letter.classList.add("invalid");
  }
  
  // Validate capital letters
  var upperCaseLetters = /[A-Z]/g;
  if(myInput.value.match(upperCaseLetters)) {  
    capital.classList.remove("invalid");
    capital.classList.add("valid");
  } else {
    capital.classList.remove("valid");
    capital.classList.add("invalid");
  }

  // Validate numbers
  var numbers = /[0-9]/g;
  if(myInput.value.match(numbers)) {  
    number.classList.remove("invalid");
    number.classList.add("valid");
  } else {
    number.classList.remove("valid");
    number.classList.add("invalid");
  }
  
  // Validate length
  if(myInput.value.length >= 8) {
    length.classList.remove("invalid");
    length.classList.add("valid");
  } else {
    length.classList.remove("valid");
    length.classList.add("invalid");
  }
}

</script>>