<?php
	include("../Assets/Connection/Connection.php");
	if(isset($_POST["btn_save"]))
	{
		$Name=$_POST["txt_uname"];
		$Password=$_POST["txt_pass"];
		$gender=$_POST["radio"];
		$Contact=$_POST["txt_con"];
		$Email=$_POST["txt_mail"];
		$Address=$_POST["txtarea_add"];
		$Place_id=$_POST["sel_place"];
		$Username=$_POST["txt_username"];
		
		$photo=$_FILES["file_photo"]["name"];
		$path=$_FILES["file_photo"]["tmp_name"];
		move_uploaded_file($path,"../Assets/Files/User/".$photo);
		
		$proof=$_FILES["file_proof"]["name"];
		$path=$_FILES["file_proof"]["tmp_name"];
		move_uploaded_file($path,"../Assets/Files/User/".$proof);


			$selQry1="select * from tbl_user where user_email='".$Email."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("NewUser.php");	 			
 		</script>
        <?php
}else{        

		$IntQry="insert into tbl_user(user_name,user_gender,user_contact,user_email,user_password,user_address,user_username,place_id,user_photo,user_proof)
	values('".$Name."','".$gender."','".$Contact."','".$Email."','".$Password."','".$Address."','".$Username."','".$Place_id."','".$photo."','".$proof."')";
		if($Conn->query($IntQry))
		{
			 ?>
             <script>
			 alert("data Inserted");
			 window.location("NewUser.php");
			 </script>
             <?php
		}
		else
		{
			?>
            <script>
			alert("Data Insertion Failed");
			window.location("NewUser.php");
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
		   window.location("NewUser.php");
		   </script>
           <?php
		}
		else
		{
			 ?>
             <script>
			 alert("record delete failed");
			 window.location("Newuser.php");
			 </script>
             <?php
		}
		}
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


<?php

include("header.php");
?>
             <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
    <table  border="1" align="center" width="37%" height="20%" style="margin:auto">

    <tr>
      <td width="106">Name</td>
      <td width="419"><label for="txt_uname"></label>
      <input type="text" name="txt_uname" id="txt_uname"  required="required" onChange="nameval(this)" autocomplete="off" /></td>
              <div id="name"></div>

    </tr>
    <tr>
      <td>Gender</td>
      <td><input type="radio" name="radio" id="rdo_male" value="male"  checked="checked" />
      <label for="txt_male">Male 
        <input type="radio" name="radio" id="rdo_female" value="female" />
      Female</label></td>
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
        <select name="sel_place" id="sel_place" >
       <option value="">---select---</option>
      </select></td>
    </tr>
    <tr>
      <td>Contact No.</td>
      <td><label for="txt_con"></label>
      <input type="contact" name="txt_con" id="txt_con" required autocomplete="off"  onchange="checknum(this)" />
          <div id="contact"></div></td>
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
      <td>Username</td>
      <td><label for="txt_username"></label>
      <input type="text" name="txt_username" id="txt_username" /></td>
    </tr>
    <tr>
      <td>Password</td>
      <td><label for="txt_pass"></label>
      <input type="password" name="txt_pass" id="txt_pass" required autocomplete="off"  onchange="chkpwd(this)" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Submit" class="button" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel" class="button" />
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
function checknum(elem)
{
	var numericExpression = /^[0-9]{10,10}$/;
	if(elem.value.match(numericExpression))
	{
		document.getElementById("contact").innerHTML = "";
		return true;
	}
	else
	{
		document.getElementById("contact").innerHTML = "<span style='color: red;'>invalid</span>";
		elem.focus();
		return false;
	}
}



function emailval(elem)
{
	var emailexp=/^[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("content").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("content").innerHTML ="<span style='color: red;'>Check Email Address Entered</span>";;
		elem.focus();
		return false;
	}
}
function nameval(elem)
{
	var emailexp=/^([A-Za-z ]*)$/;
	if(elem.value.match(emailexp))
	{
		document.getElementById("name").innerHTML = "";
		return true;
	}
	else
	{
		
		document.getElementById("name").innerHTML = "<span style='color: red;'>Alphabets Are Allowed</span>";
		elem.focus();
		return false;
	}
}
function chkpwd(txtrp, txtp)
{
	if((txtrp.value)!=(txtp.value))
	{
		document.getElementById("pass").innerHTML = "<span style='color: red;'>Passwords Mismatch</span>";
	}
}

function myFunction() {
  var x = document.getElementById("myInput");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}


</script>
  </html>
  <br /><br /><br />
<?php

include("footer.php");
?>