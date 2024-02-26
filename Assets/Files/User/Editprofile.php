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
	$selQry="select*from tbl_u where user_id='".$_SESSION["uid"]."'";
	$row=$Conn->query($selQry);
     $data=$row->fetch_assoc();

	
    
?>
      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="434" border="1">
    <tr>
      <td>Contact</td>
            <td><label for="txt_con"></label>
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
        <input type="submit" name="btn_update" id="btn_update" value="Update">
      </div></td>
    </tr>
  </table>
</form>

  </html>