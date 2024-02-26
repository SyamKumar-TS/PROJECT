<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	
	$screenname=$_POST["ddlscreen"];
	$tickettype=$_POST["ddlttype"];
	$tickettypecount=$_POST["txttickettypecount"];


	
	$insertqry="insert into tbl_screenseat(screen_id,tickettype_id,tickettype_count)values('".$screenname."','".$tickettype."','".$tickettypecount."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Screenseat.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Screenseat.php");
			 			
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
td,tr{
	border: none;
}
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Screen Seat</title>
</head>

<body>
    <?php
	  include("header.php");
	  ?>

<center><h1><u>Add ticket count</u></h1></center>
<form id="form1" name="form1" method="post" action="">
    <table width="689" border="1"align="center">
        <tr>
          <td>Screen Name</td>
      <td><label for="ddlscreen"></label>
        <select name="ddlscreen" id="ddlscreen">
               <option value="">---select---</option>

        <?php
  					$selQry="select * from tbl_screen";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["screen_id"];?>"><?php echo $data["screen_name"];?></option>
        <?php
					}
		?>
      </select></td>
      </tr>

        <tr>
                  <td>Ticket Type</td>
      <td><label for="ddlttype"></label>
        <select name="ddlttype" id="ddlttype">
               <option value="">---select---</option>

        <?php
  					$selQry="select * from tbl_tickettype";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["tickettype_id"];?>"><?php echo $data["tickettype_name"];?></option>
        <?php
					}
		?>
      </select></td>

    </tr>       
     <tr>
      <td width="123" height="56"><div align="center">Count</div></td>
      <td width="550"><label for="txttickettypecount"></label>
      <input type="text" name="txttickettypecount" id="txttickettypecount" /></td>
    </tr>


    <tr>
      <td colspan="2">  <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="button"/>
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="button"/>
      </div></td>
    </tr>

  </table>

  <p>&nbsp;</p>
</form>
<p>&nbsp;</p>
</body>
</html>    <?php
	  include("footer.php");
	  ?>

