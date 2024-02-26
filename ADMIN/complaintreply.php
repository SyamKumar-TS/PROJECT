<?php

include("../Assets/Connection/connection.php");

session_start();





if(isset($_POST["btn_submit"]))
{
		$msg=$_POST["txtreply"];
		
		$upQry="update tbl_complaint set complaint_reply='".$msg."',complaint_replydate=curdate(),complaint_status='1' where  complaint_id='".$_SESSION["CID"]."'";
		echo $upQry;
		if($Conn->query($upQry))
		{
			header("location:NewComplaint.php");
?>
		
    <?php
	   }
	   else
	   {
    ?>
		
         
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
<title>Complaint Reply</title>
</head>

<body>

 <?php
	  include("header.php");
	  ?>
            <center><h1><u>Reply to complaints</u></h1></center>

<form id="form1" name="form1" method="post" action="">
  <table >
    <tr>
      <td>Reply Message</td>
      <td><label for="txt_dist"></label>
      <textarea name="txtreply" id="txtreply" ></textarea></td>
    </tr>
    <tr>
      <td colspan="2" align="center"><input type="submit" name="btn_submit" id="btn_submit" value="Submit"  class="button"/>
      <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel"  class="button" /></td>
    </tr>
  </table>
  </form>
 </body>
</html> <?php
	  include("footer.php");
	  ?>