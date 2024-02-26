<?php
include("../Assets/Connection/Connection.php");



?>









<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Search Screen</title>
</head>

<body>
<p>&nbsp;</p>
    <?php
	 include("header.php");
	  ?>



<table align="center">
<?php
 $sel="select * from tbl_movieschedule ms inner join tbl_timeschedule ts on ts.schedule_id=ms.schedule_id inner join tbl_movie m on ms.movie_id=m.movie_id inner join tbl_category c on m.category_id=c.category_id inner join tbl_screen s on ms.screen_id=s.screen_id where ms.screen_id='".$_GET["sid"]."'";
$row=$Conn->query($sel);
	  $i=0;
	  while($data=$row->fetch_assoc())
	  {
		$i++;		  
	
	  ?>
      
  		      <td><p style="border:1px solid black;padding:10px;" align='center'>
      <img src="../Assets/Files/Movie/<?php echo $data["movie_image"]?>" height="150px" width="150px"; /><br />
     <?php echo  $data["movie_name"]; ?> <br />
     	Actors:<?php echo $data["movie_actors"]; ?> <br />
     	Director:<?php echo $data["movie_director"]; ?> <br />
		 Time:<?php echo $data["schedule_name"]; ?> <br />
      Genre:<?php echo $data["category_name"]; ?> <br />
       Screen Capacity:<?php echo $data["screen_totalcapacity"]; ?> <br />
       <a style='color:red;' href="ViewSeat.php?mid=<?php echo $data["movieschedule_id"]; ?>" >View Seats</a><br />



       </p>
      </td>
      <?php
	  
	  if($i==3)
	  {
		  ?>

		  </tr>	
		  <tr>
           <?php
		   $i=0;
	  }}
	  
	  ?>

</table>
</body>
</html>    <?php
	  include("footer.php");
	  ?>

