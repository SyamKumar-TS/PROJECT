<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	$show=$_POST["txt_showname"];
	$time=$_POST["txt_time"];
				$selQry1="select * from tbl_timeschedule where schedule_name='".$show."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("Timeschedule.php");	 			
 		</script>
        <?php
}else{


	$insertqry="insert into tbl_timeschedule(schedule_fromtime,schedule_name)values('".$time."','".$show."')";

	if($Conn->query($insertqry))
	{
	?>
    <script>
			alert("inserted");
			window.location("Timeschedule.php");
	</script>
    <?php
	}
	else
	{
	
			?>
            <script>
			 alert("failed");
			 window.location("Timeschedule.php");
			 			
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
<title>Time Schedule</title>
</head>

<body>
 <?php
	  include("header.php");
	  ?>
                  <center><h1><u>Schedule</u></h1></center>

<form id="form1" name="form1" method="post" action="">
  <table align="center"border="1">
    <tr>
      <td>Show</td>
      <td><label for="txt_showname"></label>
      <input type="text" name="txt_showname" id="txt_categoryname" /></td>
    </tr>
        <tr>
      <td>Time</td>
      <td><label for="txt_time"></label>
      <input type="time" name="txt_time" id="txt_time" /></td>
    </tr>

    <tr>
      <td colspan="2">
      <input type="submit" name="btn_cancel" id="btn_cancel" value="cancel"  class="button" />
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit"  class="button"></td>
    </tr>
  </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table  border="1" align="center">
    <tr>
      <th>SL NO.</th>
      <th>Show</th>
      <th>Time</th>

    </tr>
      <?php
  $selQry="select * from tbl_timeschedule";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td height="42"><?php echo $i;?></td>
    <td><?php echo $data["schedule_name"];?></td>
    <td><?php echo $data["schedule_fromtime"];?></td>

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