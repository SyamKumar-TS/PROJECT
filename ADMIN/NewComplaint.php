
<?php
include("../Assets/Connection/Connection.php");
?>

<?php

session_start();
if(isset($_GET["compID"]))
{
	
		$_SESSION["CID"]=$_GET["compID"];
		header("location:complaintreply.php");
}





?>
 <?php
	  include("header.php");
	  ?>

<body>

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
</head>>




<center><i><h1><b><u>List of Complaints</u></b></h1></i></center>
<form id="form1" name="form1" method="post" action="">

<table align="center">

<tr>
<th>ID</th>
<th>User Name</th>
<th>Complaint Type</th>
<th>Title</th>
<th>Complaint Details</th>
<th>Date</th>
      <th >Action</th>

</tr>
<?php
	$selQry="select * from tbl_complaint c inner join tbl_user u on c.user_id=u.user_id inner join tbl_complainttype j on c.complainttype_id=j.complainttype_id where c.complaint_status='0'";
$row=$Conn->query($selQry);
$i=0;
while($data=$row->fetch_assoc())
{
	$i++;
	?>
<tr>
   <td><?php echo $i?></td>
      <td><?php echo $data["user_name"]?></td> 

   <td><?php echo $data["complainttype_name"]?></td> 
    <td><?php echo $data["complaint_title"]?></td> 
    <td><?php echo $data["complaint_details"]?></td> 
      <td><?php echo $data["complaint_date"] ;?></td>
    
      <td><a href="NewComplaint.php?compID=<?php echo $data["complaint_id"];?>">Reply</a></td> 


     
</tr>
<?php
}
?>
  </table>
  </center>
</form>
<p>&nbsp;</p>
</body> <?php
	  include("footer.php");
	  ?>






