<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	$district=$_POST["txtdistrict"];
	$selQry1="select * from tbl_district where district_name='".$district."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("district.php");	 			
 		</script>
        <?php
}else{
	$insertqry="insert into tbl_district(district_name)values('".$district."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("district.php");
		</script>
		<?php
	}
	else
	{
	
			
		?>
        <script>
		alert("failed");
		window.location("district.php");	 			
 		</script>
        <?php
	}	

}
}

if(isset($_GET["cid"]))
{
	$delQry="delete from tbl_district where district_id='".$_GET["cid"]."'";
	if($Conn->query($delQry))
	{
	?>
    <script>
			alert("Deleted");
			window.location="district.php";
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
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>District</title>
</head>

<body>
 <?php
	  include("header.php");
	  ?>
                  <center><h1><u>Add Districts</u></h1></center>

<form id="form1" name="form1" method="post" action="">
  <table align="center">
    <tr>
      <td >District Name</td>
      <td ><label for="txt 1"></label>
      <input type="text" name="txtdistrict" id="txtdistrict" required="required" /></td>
    </tr>
    <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="button"/> 
        <input type="reset" name="btn_cancel" id="btn_cancel" value="cancel" class="button"/>
      </div></td>
    </tr>
  </table>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <table  border="1" align="center">
    <tr>
      <th>SL NO.</th>
      <th>DistrictName</th>
      <th>Action</th>
    </tr>
      <?php
  $selQry="select * from tbl_district";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td height="42"><?php echo $i;?></td>
    <td><?php echo $data["district_name"];?></td>
    <td><a href="district.php?cid=<?php echo $data["district_id"];?>">Delete</a></td>
  </tr>
  <?php
  
  }
  ?>
</table>

  
</form>
</body>
</html> <?php
	  include("footer.php");
	  ?>
