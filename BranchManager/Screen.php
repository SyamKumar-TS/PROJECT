<?php
include("../Assets/Connection/Connection.php");



if(isset($_POST["btn_submit"]))
{
	
	$screenname=$_POST["txtscreenname"];
	$txtcapacity=$_POST["txtcapacity"];
	$Place_id=$_POST["sel_place"];

	$image=$_FILES["file_image"]["name"];
	$path=$_FILES["file_image"]["tmp_name"];
	move_uploaded_file($path,"../Assets/Files/Screen/".$image);

					$selQry1="select * from tbl_screen where screen_name='".$screenname."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("Screen.php");	 			
 		</script>
        <?php
}else{

	
	$insertqry="insert into tbl_screen(screen_name,screen_totalcapacity,place_id,screen_image)values('".$screenname."','".$txtcapacity."','".$Place_id."','".$image."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Screen.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Screen.php");
			 			
 			</script>
           <?php
	}
}
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_screen where screen_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
	?>
    <script>
			alert("Deleted");
			window.location="Screen.php";
	</script>
    <?php
	}
	else
	{
	
			?>
            <script>
			 alert("failed");
			 
			 			
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
<title>Screen</title>
</head>

<body>
    <?php
	  include("header.php");
	  ?>

<center><h1><u>Add Screen</u></h1></center>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table  border="1"align="center">
    <tr>
      <td width="59">Screen Name    </td>
      <td width="452"><label for="txtscreenname"></label>
      <input type="text" name="txtscreenname" id="txtscreenname" required/></td>
    </tr>
    <tr>
      <td>Total Capacity</td>
      <td><label for="txtcapacity"></label>
      <input type="text" name="txtcapacity" id="txtcapacity" required /></td>
    </tr>
        <tr>
      <td>Screen Image</td>
      <td><label for="file_image"></label>
        <input type="file" name="file_image" id="file_image" required/></td>  
    </tr>
        <tr>
      <td>District Name</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onChange="getPlace(this.value)" required>
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
        <select name="sel_place" id="sel_place" required>
       <option value="">---select---</option>
      </select></td>
    </tr>


    <tr>
      <td height="73" colspan="2"><div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="button"/>
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="button" />
      </div></td>
    </tr>
  </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
  <p>&nbsp;</p>
    <table width="321" border="1" align="center">
    <tr>
      <th width="35">SL NO.</th>
      <th width="112">Screen Name</th>
      <th width="95">Capacity</th>
      <th width="95">Screen Image</th>

      <th width="51">Action</th>
    </tr>
      <?php
  $selQry="select * from tbl_screen";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["screen_name"];?></td>
     <td><?php echo $data["screen_totalcapacity"];?></td>
    <td><img src="../Assets/Files/Screen/<?php echo $data["screen_image"]?>" width="50" height="50" /></td>

    <td><a href="Screen.php?did=<?php echo $data["screen_id"];?>">Delete</a></td>
  </tr>
  <?php
  
  }
  ?>
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

</html>    <?php
	  include("footer.php");
	  ?>

