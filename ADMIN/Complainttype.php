<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	
	$complainttype=$_POST["txtcomplainttype"];
					$selQry1="select * from tbl_complainttype where complainttype_name='".$complainttype."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("Complainttype.php");	 			
 		</script>
        <?php
}else{

	$insertqry="insert into tbl_complainttype(complainttype_name)values('".$complainttype."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Complainttype.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Complainttype.php");
			 			
 			</script>
           <?php
	}
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
<title>Complaint Type</title>
</head>

<body>
 <?php
	 include("header.php");
	  ?>
                  <center><h1><u>Type of complaints</u></h1></center>

<form id="form1" name="form1" method="post" action="">
  <table width="662" border="1"align="center">
    <tr>
      <td width="494">        <div align="center">
<label for="txtcomplainttype"></label>
      <input type="text" name="txtcomplainttype" id="txtcomplainttype"  placeholder="Complaint Type" />        </td><div >
</td>
    </tr>
    <tr>
      <td colspan="2">  <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit"  class="button"/>
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel"  class="button"/>
      </div></td>
    </tr>

  </table>
    <div align="center"></div>
    <div align="center"></div>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table width="663" border="1"align="center">
    <tr>
      <th width="43">SL NO.</th>
      <th width="604">COMPLAINT TYPE</th>
    </tr>
      <?php
  $selQry="select * from tbl_complainttype";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td height="74"><?php echo $i;?></td>
    <td><?php echo $data["complainttype_name"];?></td>
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