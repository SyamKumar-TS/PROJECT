        <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
        <html xmlns="http://www.w3.org/1999/xhtml">
        <head>

<?php
session_start();
include("../Assets/Connection/Connection.php");
$selQry="select * from tbl_branchmanager u inner join tbl_place p on p.place_id=u.place_id inner join tbl_district d on d.district_id=p.district_id where branchmanager_id='".$_SESSION["bid"]."'";
$row=$Conn->query($selQry);
$data=$row->fetch_assoc();

?>


    <?php
	  include("header.php");
	  ?>

<body>
<center><h1><u>My profile</u></h1></center>

      <form action="" method="post" enctype="multipart/form-data" name="form1" id="form1">
  <table width="691" border="1"align="center">
    <tr>
      <td width="106">Name</td>
      <td width="569"><?php echo $data["branchmanager_name"]?></td>
      
    </tr>
    <tr>
      <td>DistrictName</td>
      <td><?php echo $data["district_name"] ?></td>
    </tr>
    <tr>
      <td>Place Name</td>
      <td><?php echo $data["place_name"] ?></td>
    </tr>
    <tr>
      <td>Contact no.</td>
      <td><?php echo $data["branchmanager_contact"] ?></td>
    </tr>
        <tr>
      <td height="125">Proof</td>
      <td><img src="../Assets/Files/User/<?php echo $data["branchmanager_proof"] ?>"width="120" height="120"/></td>  
    </tr>
            <tr>
      <td>Photo</td>
           <td><img src="../Assets/Files/User/<?php echo $data["branchmanager_photo"] ?>"width="120" height="120"/></td>  

    </tr>


    <tr>
      <td>Email</td>
      <td><?php echo $data["branchmanager_email"] ?></td>
    </tr>
    <tr>
      <td>Address</td>
      <td><?php echo $data["branchmanager_address"] ?></td>
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
  </html>    <?php
	  include("footer.php");
	  ?>

