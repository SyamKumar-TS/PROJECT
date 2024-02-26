<?php
session_start();
include("../Connection/Connection.php");
?>
<table align="center" cellpadding="60">
    <tr>
    <?php
      $sel="select * from tbl_screen s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id where true";
	  
	  if($_GET["pid"]!=null)
	  {
		  $sel.=" and p.place_id='".$_GET["pid"]."'";
	  }
	  if($_GET["did"]!=null)
	  {
		  $sel.=" and d.district_id='".$_GET["did"]."'";
	  }
	  $row=$Conn->query($sel);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		$i++;		  
	
	  ?>
      <td><p style="border:1px solid black;padding:10px;">
     <img src="../Assets/Files/Screen/<?php echo $data["screen_image"]?>" height="150px" width="150px"; /><br />
      <?php echo $data["screen_name"]; ?> <br />
      <?php echo $data["screen_totalcapacity"]; ?> <br />
      <?php echo $data["district_name"]; ?> <br />
      <?php echo $data["place_name"]; ?> <br />
            <a href="Searchscreen.php?did=<?php echo $data["screen_id"];?>">View Seat Details</a><br/>
                        <a href="Moviedisplay.php?sid=<?php echo $data["screen_id"];?>">Movies</a>


       </p>
      </td>
      <?php
	  
	  if($i==4)
	  {
		  ?>

		  </tr>
		  <tr>
           <?php
		   $i=0;
	  }}
	  
	  ?>
    </tr>
   
  </table>