<?php
session_start();
			include("../Assets/Connection/Connection.php");

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
</head>

<body>
    <?php
	  include("header.php");
	  ?>

<center><i><h1><b><u>Reply Of Complaints</u></b></h1></i></center>

<form id="form1" name="form1" method="post" action="">
 <center> <table width="703" height="302" border="1">
    <tr>
  
       <th width="45" scope="col">Sl No</th>
       <th width="163" scope="col">Complaint Type</th>
       <th width="163" scope="col">Complaint Title</th>
       <th width="219" scope="col">Complaint </th>
       <th width="219" scope="col">Complaint Reply</th>
     
    </tr>
     <?php
	$selectQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_complainttype j on c.complainttype_id=j.complainttype_id where c.user_id='".$_SESSION["uid"]."'";
	//echo $selectQry;
	$row=$Conn->query($selectQry);
	$i=0;
	while($data=$row->fetch_assoc())
	{
	$i++;
	?>
    <tr>
      <td><?php echo $i; ?></td>
      <td><?php echo $data["complainttype_name"]; ?></td>
      <td><?php echo $data["complaint_title"]; ?></td>
      <td><?php echo $data["complaint_details"]; ?></td>
      <td><?php echo $data["complaint_reply"] ;?></td>
      </tr>
    <?php
	}
	?>
  </table>
  </center>
</form>
<p>&nbsp;</p>
</body>
</html>    <?php
	  include("footer.php");
	  ?>

