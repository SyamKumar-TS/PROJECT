
<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	
	$moviename=$_POST["moviename"];
	$screen=$_POST["screenname"];
	$fromdate=$_POST["from_date"];

	
	$insertqry="insert into tbl_movieschedule(movie_id,screen_id,movieschedule_fromdate,schedule_id)values('".$moviename."','".$screen."','".$fromdate."','".$_POST["sch"]."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Movieschedule.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Movieschedule.php");
			 			
 			</script>
           <?php
	}

}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_movieschedule where movie_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
	?>
    <script>
			alert("Deleted");
			window.location="Movieschedule.php";
	</script>
    <?php
	}
	else
	{
	
			?>
            <script>
			 alert("failed");
			 
			 			
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
<title>Movie Schedule</title>
    <?php
	  include("header.php");
	  ?>

</head>

<body>

<center>
  <h1><u>Schedule Movie</u></h1></center>

<form id="form1" name="form1" method="post" action="">
    <table  border="1"align="center">
        

        <tr>
                  <td>Movie Name</td>
      <td><label for="moviename"></label>
        <select name="moviename" id="moviename" required>
               <option value="">---select---</option>

        <?php
  					$selQry="select * from tbl_movie";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["movie_id"];?>"><?php echo $data["movie_name"];?></option>
        <?php
					}
		?>
      </select></td>

    </tr>    
            <tr>
                  <td>Screen Name</td>
      <td><label for="screenname"></label>
        <select name="screenname" id="screenname" required>
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
                  <td>Schedule</td>
      <td><label for="sch"></label>
        <select name="sch" id="sch" required>
               <option value="">---select---</option>

        <?php
  					$selQry="select * from tbl_timeschedule";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["schedule_id "];?>"><?php echo $data["schedule_name"];?></option>
        <?php
					}
		?>
      </select></td>

    </tr>
    
   <tr>
      <td width="161"><div align="center">From</div></td>
      <td width="510"><label for="from_date"></label>
      <input type="date" name="from_date" id="from_date" required/></td>
    </tr>


    <tr>
      <td colspan="2">  <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="button"/>
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="button" />
      </div></td>
    </tr>

  </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
      <table width="321" border="1" align="center">
    <tr>
      <th width="35">SL NO.</th>
      <th width="112">Screen</th>
      <th width="95">Movie</th>
      <th width="95">From date</th>

      
      <th width="51">Action</th>
    </tr>
      <?php
  $selQry="select * from tbl_movieschedule p inner join tbl_movie d on p.movie_id=d.movie_id inner join tbl_screen a on p.screen_id=a.screen_id where p.movieschedule_status='1'";
 // echo $selQry;
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["screen_name"];?></td>

    <td><?php echo $data["movie_name"];?></td>
     <td><?php echo $data["movieschedule_fromdate"];?></td>
    <td><a href="Movieschedule.php?did=<?php echo $data["movie_id"];?>">Remove</a></td>
  </tr>
  <?php
  
  }
  ?>
</table>

  


</body>
</html>    <?php
	  include("footer.php");
	  ?>

