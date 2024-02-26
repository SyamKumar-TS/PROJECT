<?php
include("../Assets/Connection/Connection.php");

if(isset($_GET["rid"]))
{
	$delete="update tbl_user set user_status='2' where user_id='".$_GET["rid"]."'";
	if($Conn->query($delete))
	{
		?>
        <script>
		alert("accept");
		window.location("UserList.php");
		</script>
        <?php
	}
	else
	{
		?>
        <script>
		alert("decline");
		window.location("UserList.php");
		</script>
        <?php
	}
}
?>
    <?php
	  include("header.php");
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
<title>Userlist</title>
</head>

<body>

   


            <center><h1><u>User accepted list</u></h1></center>


<table width="500" border="1">
<tr>
<td>ID</td>
<td>NAME</td>
<td>GENDER</td>
<td>CONTACT</td>
<td>EMAIL</td>
<td>DISTRICT</td>
<td>PLACE</td>
<td>USERNAME</td>
<td>ADDRESS</td>
<td>PHOTO</td>
<td>PROOF</td>
<td>ACCEPT</td>
<td>REJECT</td>
</tr>
<?php
$selQry="select * from tbl_user u INNER JOIN tbl_place p ON p.place_id=u.place_id INNER JOIN tbl_district d ON d.district_id=p.district_id where u.user_status='1'";
$row=$Conn->query($selQry);
$i=0;
while($data=$row->fetch_assoc())
{
	$i++;
	?>
<tr>
   <td><?php echo $i?></td>
   <td><?php echo $data["user_name"]?></td> 
   <td><?php echo $data["user_gender"]?></td> 
    <td><?php echo $data["user_contact"]?></td> 
    <td><?php echo $data["user_email"]?></td> 
    <td><?php echo $data["district_name"]?></td> 
    <td><?php echo $data["place_name"]?></td> 
    <td><?php echo $data["user_username"]?></td>  
    <td><?php echo $data["user_address"]?></td>
    <td><img src="../Assets/Files/User/<?php echo $data["user_photo"]?>" width="50" height="50" /></td>
    <td><img src="../Assets/Files/User/<?php echo $data["user_proof"]?>" width="50" height="50" /></td>


     
  
    <td><a href ="UserListAccepted.php?rid=<?php echo $data["user_id"]?>">reject</a></td>
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
