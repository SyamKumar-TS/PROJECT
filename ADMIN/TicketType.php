
<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	
	$tickettype=$_POST["txttickettype"];
	$ticketrate=$_POST["txttickettyperate"];

			$selQry1="select * from tbl_tickettype where tickettype_name='".$tickettype."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("TicketType.php");	 			
 		</script>
        <?php
}else{

	$insertqry="insert into tbl_tickettype(tickettype_name,tickettype_rate)values('".$tickettype."','".$ticketrate."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Tickettype.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Tickettype.php");
			 			
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
<title>Ticket Type</title>
</head>

<body>
 <?php
	  include("header.php");
	  ?>
                  <center><h1><u>Ticket Types</u></h1></center>

<form id="form1" name="form1" method="post" action="">
  
  <form id="form1" name="form1" method="post" action="">
  <table width="669" border="1"align="center">
    <tr>
      <td width="122" height="56">Ticket Type</td>
      <td width="531"><label for="txttickettype"></label>
      <input type="text" name="txttickettype" id="txttickettype" /></td>
    </tr>
        <tr>
      <td width="122" height="56">Ticket Rate</td>
      <td width="531"><label for="txttickettyperate"></label>
      <input type="text" name="txttickettyperate" id="txttickettyperate" /></td>
    </tr>

    <tr>
      <td colspan="2">  <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit"  class="button"/>
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel"  class="button"/>
      </div></td>
    </tr>

  </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table  border="1" align="center">
    <tr>
      <th>SI No</th>
      <th>Ticket Type</th>
      <th>Ticket Rate</th>

    </tr>
          <?php
  $selQry="select * from tbl_tickettype";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["tickettype_name"];?></td>
        <td><?php echo $data["tickettype_rate"];?></td>


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