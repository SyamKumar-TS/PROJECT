

<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	
	$schedule=$_POST["movietime"];
	$moviename=$_POST["moviename"];
	$screen=$_POST["screenname"];


	
	$insertqry="insert into tbl_movietiming(schedule_id,movie_id,screen_id)values('".$schedule."','".$moviename."','".$screen."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Movietiming.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Movietiming.php");
			 			
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
<title>Movie Timing</title>
</head>


<body>
    <?php
	  include("header.php");
	  ?>

<center>
  <h1><u>Add Movie Timing</u></h1></center>


<form id="form1" name="form1" method="post" action="">
    <table  border="1"align="center">
        <tr>
          <td>Movie Schedule</td>
      <td><label for="movietime"></label>
        <select name="movietime" id="movietime">
               <option value="">---select---</option>

        <?php
  					$selQry="select * from tbl_timeschedule";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["schedule_id"];?>"><?php echo $data["schedule_name"];?></option>
        <?php
					}
		?>
      </select></td>
      </tr>

        <tr>
                  <td>Movie Name</td>
      <td><label for="moviename"></label>
        <select name="moviename" id="moviename">
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
        <select name="screenname" id="screenname">
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
      <td colspan="2">  <div align="center">
        <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="button"/>
        <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="button"/>
      </div></td>
    </tr>

  </table>

</body>
</html>    <?php
	  include("footer.php");
	  ?>

