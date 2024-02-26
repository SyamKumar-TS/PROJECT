 <?php
include("../Connection/Connection.php");
?>
	<option value=""> ----select----</option>
    <?php
		$sel="select*from tbl_place where district_id='".$_GET["did"]."'";
		$row1=$Conn->query($sel);
	    while($data=$row1->fetch_assoc())	
											        {
		?><option value="<?php echo $data["place_id"];?>"><?php echo $data["place_name"];?></option>
        <?php
										}?>
											                                                                                 