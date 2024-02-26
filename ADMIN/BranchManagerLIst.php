


<?php
include("../Assets/Connection/Connection.php");
?>
     
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Userlist</title>
</head>

<body>

    <?php
	  include("header.php");
	  ?>

<center><h1><u>Brachmanager List</u></h1></center>

<table width="500" border="1">
<tr>
<td>ID</td>
<td>NAME</td>
<td>CONTACT</td>
<td>EMAIL</td>
<td>DISTRICT</td>
<td>PLACE</td>
<td>ADDRESS</td>
<td>PHOTO</td>
<td>PROOF</td>
</tr>
<?php
$selQry="select * from tbl_branchmanager u INNER JOIN tbl_place p ON p.place_id=u.place_id INNER JOIN tbl_district d ON d.district_id=p.district_id ";
$row=$Conn->query($selQry);
$i=0;
while($data=$row->fetch_assoc())
{
	$i++;
	?>
<tr>
   <td><?php echo $i?></td>
   <td><?php echo $data["branchmanager_name"]?></td> 
    <td><?php echo $data["branchmanager_contact"]?></td> 
    <td><?php echo $data["branchmanager_email"]?></td> 
    <td><?php echo $data["branchmanager_name"]?></td> 
    <td><?php echo $data["place_name"]?></td> 
    <td><?php echo $data["branchmanager_address"]?></td>
    <td><img src="../Assets/Files/User/<?php echo $data["branchmanager_proof"]?>" width="50" height="50" /></td>
    <td><img src="../Assets/Files/User/<?php echo $data["branchmanager_photo"]?>" width="50" height="50" /></td>


     
</tr>
<?php
}
?>
</table>
</body>
</html>   

      

      <?php
	  include("footer.php");
	  ?>

