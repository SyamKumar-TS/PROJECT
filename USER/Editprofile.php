<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<?php
	include("../Assets/Connection/Connection.php");
	session_start();
	if(isset($_POST["btn_update"]))
	{
		
		$Contact=$_POST["txt_con"];
		$Email=$_POST["txt_mail"];
		$Address=$_POST["txtarea_add"];
		$UpQry="update  tbl_user set  user_contact='".$Contact."',user_email='".$Email."',user_address='".$Address."'where user_id='".$_SESSION["uid"]."'";
		//echo $UpQry;
		
		if($Conn->query($UpQry))
		{
			header("Location:Myprofile.php");
		}
	}
	$selQry="select*from tbl_user where user_id='".$_SESSION["uid"]."'";
	$row=$Conn->query($selQry);
     $data=$row->fetch_assoc();

	
    
?>
    <?php
	  include("header.php");
	  ?>
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

</head>
<body>
<center><h1><u>Edit Profile</u></h1></center>

      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table  border="1"align="center">
    <tr>
      <td width="166">Contact</td>
            <td width="508"><label for="txt_con"></label>
	  <input type="text" name="txt_con" id="txt_con" value="<?php echo $data["user_contact"] ?>"/></td>

    </tr>
    


    <tr>
      <td>Change Email</td>
      <td><label for="txt_mail"></label>
	  <input type="text" name="txt_mail" id="txt_mail" value="<?php echo $data["user_email"] ?>"/></td>
    </tr>
    <tr>
      <td>Address</td>
            <td><label for="txtarea_add"></label>
	  <input type="text" name="txtarea_add" id="txtarea_add" value="<?php echo $data["user_address"] ?>"/></td>

    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="btn_update" id="btn_update" value="Update" class="button">
      </div></td>
    </tr>
  </table>
</form>
</body>>
  </html>    <?php
	  include("footer.php");
	  ?>

