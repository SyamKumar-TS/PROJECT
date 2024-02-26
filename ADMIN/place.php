
<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btnsubmit"]))
{
	$place=$_POST["txtplace"];
	$insertqry="insert into tbl_place(place_name)value('".$place."')";
	$district=$_POST["ddlDistrict"];
		$selQry1="select * from tbl_place where place_name='".$place."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("place.php");	 			
 		</script>
        <?php
}else{

	
	$insertqry="insert into tbl_place(place_name,district_id)values('".$place."','".$district."')";
	
	if($Conn->query($insertqry))
	{
	?>
    <script>
			alert("inserted");
			window.location("place.php");
	</script>
    <?php
	}
	else
	{
	
			?>
            <script>
			 alert("failed");
			 window.location("place.php");
			 			
 			</script>
           <?php
	}
}
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_place where place_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
	?>
    <script>
			alert("Deleted");
			window.location="place.php";
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
<title>Place</title>
</head>

<body>
 <?php
	  include("header.php");
	  ?>
                  <center><h1><u>Add Places</u></h1></center>

<form id="form1" name="form1" method="post" action="">
  <table width="690" border="1" align="center">
    <tr>
          <td width="125">District Name</td>
      <td width="549"><label for="ddlDistrict"></label>
        <select name="ddlDistrict" id="ddlDistrict">
        
        <?php
  					$selQry="select * from tbl_district";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["district_id"];?>"><?php echo $data["district_name"];?></option>
        <?php
					}
		?>
      </select></td>
      </tr>

      <td>place name</td>
      <td><label for="txtplace"></label>
      <input type="text" name="txtplace" id="txtplace" required="required"/></td>
    </tr>
    
    <tr>
      <td height="68" colspan="2"><div align="center">
        <input type="submit" name="btnsubmit" id="btnsubmit" value="Submit"  class="button"/>
        <input type="submit" name="btncancel" id="btncancel" value="cancel"  class="button"/>
      </div></td>
    </tr>
  </table>
    <p>&nbsp;</p>
  <p align="center">&nbsp;</p>
  
  <table width="321" border="1" align="center">
    <tr>
      <th width="35">SL NO.</th>
      <th width="112">DistrictName</th>
      <th width="95">PlaceName</th>
      <th width="51">Action</th>
    </tr>
      <?php
  $selQry="select * from tbl_place p inner join tbl_district d on p.district_id=d.district_id";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["district_name"];?></td>
     <td><?php echo $data["place_name"];?></td>
    <td><a href="Place.php?did=<?php echo $data["place_id"];?>">Delete</a></td>
  </tr>
  <?php
  
  }
  ?>
</table>

  

</form>
</body>
</html>
 <?php
	  include("footer.php");
	  ?>