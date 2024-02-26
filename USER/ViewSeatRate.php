

<?php
include("../Assets/Connection/Connection.php");

?>
	













<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Seat Details</title>
</head>

<body>

    <?php
	session_start();
	  include("header.php");
	  ?>


  <table width="321" border="1" align="center">
    <tr>
      <th width="35">SL NO.</th>
      <th width="112">TicketType</th>
      <th width="95">Rate</th>
      <th width="51">Count</th>
    </tr>
      <?php

  $selQry="select * from tbl_screenseat ss inner join tbl_tickettype tt on ss.tickettype_id=tt.tickettype_id where 
  ss.screen_id='".$_SESSION["scrID"]."'";
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
      <td><?php echo $data["tickettype_count"];?></td>
    
  </tr>
  <?php
  
  }
  ?>
</table>

  

</form>
</body>
</html>    <?php
	  include("footer.php");
	  ?>


