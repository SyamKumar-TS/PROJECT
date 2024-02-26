






<?php
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btn_save"]))
	{
		$Name=$_POST["txt_uname"];
		$Password=$_POST["txt_pass"];
		$Contact=$_POST["txt_con"];
		$Email=$_POST["txt_mail"];
		$Address=$_POST["txtarea_add"];
		$Place_id=$_POST["sel_place"];
		
		$photo=$_FILES["file_photo"]["name"];
		$path=$_FILES["file_photo"]["tmp_name"];
		move_uploaded_file($path,"../Assets/Files/User/".$photo);
		
		$proof=$_FILES["file_proof"]["name"];
		$path=$_FILES["file_proof"]["tmp_name"];
		move_uploaded_file($path,"../Assets/Files/User/".$proof);

	$selQry1="select * from tbl_branchmanager where branchmanager_email='".$Email."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("BranchManager.php");	 			
 		</script>
        <?php
}else{        

		
		$IntQry="insert into tbl_branchmanager(branchmanager_name,branchmanager_contact,branchmanager_email,branchmanager_password,branchmanager_address,place_id,branchmanager_photo,branchmanager_proof)values('".$Name."','".$Contact."','".$Email."','".$Password."','".$Address."','".$Place_id."','".$photo."','".$proof."')";
		echo $IntQry;
		if($Conn->query($IntQry))
		{
			 ?>
             <script>
			 alert("data Inserted");
			 window.location("BranchManager.php");
			 </script>
             <?php
		}
		else
		{
			?>
            <script>
			alert("Data Insertion Failed");
			window.location("BranchManager.php");
			</script>
            <?php
			
		}
	}
	}
    
		if(isset($_GET["did"]))
		{
        $delQry="delete from tbl_user where User_id='".$_GET["did"]."'";
        if($Conn->query($delQry))
        {
	       ?>
           <script>
		   alert("record deleted");
		   window.location("BranchManager.php");
		   </script>
           <?php
		}
		else
		{
			 ?>
             <script>
			 alert("record delete failed");
			 window.location("BranchManager.php");
			 </script>
             <?php
		}
		}
		?>
              <?php
	  include("header.php");
	  ?>

                <html>
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
        </head>
        <body>
<center><h1><u>Add Brachmanagers</u></h1></center>




             <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table  border="1" align="center" width="37%" height="20%" style="margin:auto">
    <tr>
      <td width="106">Name</td>
      <td width="562"><label for="txt_uname"></label>
      <input type="text" name="txt_uname" id="txt_uname" required onChange="nameval(this)" autocomplete="off" />
              <div id="name"></div>
</td>
    </tr>
    
    <tr>
      <td>DistrictName</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)" required="required">
       <option value="">---select---</option>
        <?php
        $sel="select * from tbl_district";
		$row1=$Conn->query($sel);	
		while($result=$row1->fetch_assoc())
		{
		?>
        <option value="<?php echo $result["district_id"]?>"><?php echo $result["district_name"]?></option>
        <?php
		}
		?> 
      </select></td>
    </tr>
    <tr>
      <td>Place Name</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place">
       <option value="">---select---</option>
      </select></td>
    </tr>
    <tr>
      <td>Contact no.</td>
      <td><label for="txt_con"></label>
      <input type="contact" name="txt_con" id="txt_con" required autocomplete="off"  onchange="checknum(this)" />
          <div id="contact"></div> </td>
    </tr>
        <tr>
      <td>Proof</td>
      <td><label for="file_proof"></label>
        <input type="file" name="file_proof" id="file_proof" required/>      <label for="txt_photo"></label></td>  
    </tr>
            <tr>
      <td>Photo</td>
      <td><label for="file_photo"></label>
        <input type="file" name="file_photo" id="file_photo" required/>        <label for="txt_photo"></label></td>
    </tr>


    <tr>
      <td>Email</td>
      <td><label for="txt_mail"></label>
      <input type="email" name="txt_mail" id="txt_mail" onChange="emailval(this)" required autocomplete="off"/></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><label for="txtarea_add"></label>
      <textarea name="txtarea_add" id="txtarea_add" cols="45" rows="5" required autocomplete="off" onChange=""></textarea></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass"  required autocomplete="off"  onchange="chkpwd(this)"/></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Submit"  class="button"/>
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel"  class="button"/>
    </tr>
  </table>
</form>
  </body>
  <script src="../Assets/Jquery/jQuery.js"></script>
  <script>
function getPlace(did)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+did,
	  success: function(result){
		  
		$("#sel_place").html(result);
	  }
	});
}
</script>
  </html>  <?php
	 include("footer.php");
	  ?>