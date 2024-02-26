
<?php
include("../Assets/Connection/Connection.php");



if(isset($_POST["btn_save"]))
{
	
	$moviename=$_POST["textmoviename"];
	$directorname=$_POST["textdirectorname"];
	$language=$_POST["textlanguage"];

	$actors=$_POST["textarea_actors"];
    $category=$_POST["movie_cat"];

	$image=$_FILES["movie_image"]["name"];
	$path=$_FILES["movie_image"]["tmp_name"];
	//echo $path;
	move_uploaded_file($path,"../Assets/Files/Movie/".$image);

	$selQry1="select * from tbl_movie where movie_name='".$moviename."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("Movie.php");	 			
 		</script>
        <?php
}else{        

	
	$insertqry="insert into tbl_movie(movie_name,movie_director,movie_language,movie_actors,movie_image,category_id)values('".$moviename."','".$directorname."','".$language."','".$actors."','".$image."','".$category."')";
	//echo $insertqry;
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Movie.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Movie.php");
			 			
 			</script>
           <?php
	}
}
}
if(isset($_GET["did"]))
{
	$delQry="delete from tbl_movie where movie_id='".$_GET["did"]."'";
	if($Conn->query($delQry))
	{
	?>
    <script>
			alert("Deleted");
			window.location="Movie.php";
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
</style>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Movie</title>
</head>

<body>
 <?php
	  include("header.php");
	  ?>
                  <center><h1><u>Add Movies</u></h1></center>

<form id="form1" name="form1" method="post" action="" enctype="multipart/form-data">
  <table align="center" border="1">
    <tr>
      <td width="161"><div align="center">Movie Name</div></td>
      <td width="510"><label for="textmoviename"></label>
      <input type="text" name="textmoviename" id="textmoviename" required/></td>
    </tr>
    <tr>
      <td><div align="center">Director Name</div></td>
      <td><label for="textdirectorname"></label>
      <input type="text" name="textdirectorname" id="textdirectorname" required/></td>
    </tr>
        <tr>
      <td><div align="center">Language</div></td>
      <td><label for="textlanguage"></label>
      <input type="text" name="textlanguage" id="textlanguage" required/></td>
    </tr>

    <tr>
      <td><div align="center">Actors</div></td>
      <td><label for="textarea_actors"></label>
      <textarea name="textarea_actors" id="textarea_actors" cols="45" rows="5" required></textarea></td>
    </tr>
              <td width="161"><div align="center">Movie Catogary</div></td>
      <td width="510"><label for="movie_cat"></label>
        <select name="movie_cat" id="movie_cat">
        
        <?php
  					$selQry="select * from tbl_category";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["category_id"];?>"><?php echo $data["category_name"];?></option>
        <?php
					}
		?>
      </select></td>
      </tr>

    <tr>
      <td><div align="center">Movie Image</div></td>
      
      <td><label for="movie_image"></label>
      <input type="file" name="movie_image" id="movie_image" required />        <label for="movie_image"></label></td>

    </tr>
        <tr>
      <td colspan="2" align="center">
        <input type="submit" name="btn_save" id="btn_save" value="Submit"  class="button" />
        <input type="reset" name="btn_cancel" id="btn_cancel" value="Cancel"  class="button"/>
    </tr>

  </table>
    <p>&nbsp;</p>
    <p>&nbsp;</p>
    <table  border="1" align="center">
    <tr>
      <th>SL NO.</th>
      <th>Movie Name</th>
      <th>Director Name</th>
      <th>Actors</th>
      <th>Category</th>
      <th>Movie Image</th>
      <th>Action</th>


    </tr>
      <?php
  $selQry="select * from tbl_movie";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td height="42"><?php echo $i;?></td>
    <td><?php echo $data["movie_name"];?></td>
    <td><?php echo $data["movie_director"];?></td>
    <td><?php echo $data["movie_actors"];?></td>
    <td><?php echo $data["category_id"];?></td>
    <td><img src="../Assets/Files/Movie/<?php echo $data["movie_image"]?>" width="50" height="50" /></td>
    <td><a href="Movie.php?did=<?php echo $data["movie_id"];?>">Delete</a></td>
  </tr>
  <?php
  
  }
  ?>
</table>

  <div align="center"></div>
</form>
</body>
</html> <?php
	  include("footer.php");
	  ?>