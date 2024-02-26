<?php
include('../Assets/Connection/Connection.php');
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <script src='https://kit.fontawesome.com/a076d05399.js'></script>
        <script src="../Assets/Jquery/jQuery.js" type="text/javascript"></script> 

    </head>
    
    
    <body align='center'>
       
       
      <i class='fas fa-chair' style='font-size:50px;color:red; padding: 20px;'></i>Booked Seat 
      <i class='fas fa-chair' style='font-size:50px;color:black;padding: 20px;'></i>Available Seat
      <i class='fas fa-chair' style='font-size:50px;color:green;padding: 20px;'></i>Selected Seat
      
      
      
       
      <br><br><br>
        


     <form method="post">  
      <br><br><br>
     <div id="dataT">
     
     <?php 
	 $j=0;
	 $l=0;
	 
	 $k="A";
	 
	 
		for($i=1;$i<=150;$i++)
		{
			$j++;
			if($i==1)
			{
				echo "<br>Platinum<br>";
				$m="Platinum";
				$rate = "200";
				$type = "3";
			}
			else if($i==51)
			{
				echo "<br>Gold<br>";
				$m="Gold";
				$rate = "150";
				$type = "2";
			}
			else if($i==101)
			{
				echo "<br>Silver<br>";
				$m="Silver";
				$rate = "100";
				$type = "1";
			}
			?>
            <i id="<?php echo $k."-".$j."-".$m; ?>" class='fas fa-chair' 
           
            <?php 
			
				$selQry = "select * from tbl_booking where movieschedule_id='".$_GET["mid"]."' and slot_name='".$k."-".$j."-".$m."'";
				$reslut = $Conn->query($selQry);
				if($row = $reslut->fetch_assoc())
				{
					if($row["booking_status"]==0 && $row["user_id"]==$_SESSION["uid"])
					{
						?>
                        	 onClick="deleteSlot(this.id)" style='font-size:50px;color:green;padding: 20px;'
                        <?php
					}
					else if($row["booking_status"]==1)
					{
						?>
                        	 style='font-size:50px;color:red;padding: 20px;'
                        <?php
					}
				}
				else
				{
					?>
                        	onClick="insert(this.id,<?php echo $rate; ?>,<?php echo $type; ?>)" style='font-size:50px;color:black;padding: 20px;'
                        <?php
				}
				
				
			?>
            
           
            
            
            ></i> 
            <?php
			
			if($j==10)
			{
				$k++;
				$j=0;
				echo "<br>";
			}
		}
	
	 ?>
       </div>
       <br>
       <a style="color:white;background-color: green;text-decoration: none;padding: 5px;border-radius: 5px;" href="Payment.php" >Pay Now</a>
     </form>
    </body>
     <script>
     	function insert(slot,rate,type)
		{
			 $.ajax({
                   url: "../Assets/AjaxPages/AjaxSlot.php?action=insert&slot="+slot+"&rate="+rate+"&type="+type+"&mid="+<?php echo $_GET["mid"] ?>,
                   success: function(result) {
				   location. reload() 
            }});
		}
		function deleteSlot(slot)
		{
			
			 $.ajax({
                   url: "../Assets/AjaxPages/AjaxSlot.php?action=delete&slot="+slot+"&mid="+<?php echo $_GET["mid"] ?>,
                   success: function(result) {
                   	location. reload() 
            }});
		}
		
     </script>
</html>    
