<?php
include('../Connection/Connection.php');
session_start();

if(isset($_GET["action"]))
{

			$uid = $_SESSION["uid"];
			$slot = $_GET["slot"];
			$mid = $_GET["mid"];
	
			
	
	if($_GET["action"]=="insert")
		{
			$ins = "insert into tbl_booking(booking_date,slot_name,user_id,movieschedule_id,booking_amount,type_id)values(curdate(),'".$slot."','".$uid."','".$mid."','".$_GET["rate"]."','".$_GET["type"]."')";
				if($Conn->query($ins))
				{
					
							echo "Inserted";
						
				}
		}	
		if($_GET["action"]=="delete")
		{
			$del = "delete from tbl_booking where slot_name='".$slot."' and user_id='".$uid."' and movieschedule_id='".$mid."'";
				if($Conn->query($del))
				{
					
							echo "Updated";
						
							
				}
			
		}	
	}

?>