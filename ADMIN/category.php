	
<?php
include("../Assets/Connection/Connection.php");


if(isset($_POST["btn_submit"]))
{
	$category=$_POST["txt_categoryname"];
	$selQry1="select * from tbl_category where category_name='".$category."'";
	$row1=$Conn->query($selQry1);
if($data1=$row1->fetch_assoc())
{
	?>
        <script>
		alert("already exist");
		window.location("category.php");	 			
 		</script>
        <?php
}else{        
	$insertqry="insert into tbl_category(category_name)values('".$category."')";

	if($Conn->query($insertqry))
	{
	?>
    <script>
			alert("inserted");
			window.location("category.php");
	</script>
    <?php
	}
	else
	{
	
			?>
            <script>
			 alert("failed");
			 window.location("category.php");
			 			
 			</script>
           <?php
	}
}
}
if(isset($_GET["cid"]))
{
	$delQry="delete from tbl_category where category_id='".$_GET["cid"]."'";
	echo $delQry;
	if($Conn->query($delQry))
	{
	?>
    <script>
			alert("Deleted");
			window.location="category.php";
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

 <?php
	  include("header.php");
	  ?>




 
<!DOCTYPE html PUBL IC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
<title>Category</title>
</head>

<body>
 
      <center><h1><u>Add Category</u></h1></center>

<form id="form1" name="form1" method="post" action="">
  <table align="center" border="1">
    <tr>
      <td>Movie Category</td>
      <td><label for="txt_categoryname"></label>
      <input type="text" name="txt_categoryname" id="txt_categoryname" required autocomplete="off" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
     
      <input type="submit" name="btn_submit" id="btn_submit" value="Submit" class="button">
      
       <input type="reset" name="btn_cancel" id="btn_cancel" value="Canel" class="button" />
     </div> </td>
      
    </tr>
  </table>
  <p>&nbsp;</p>
  <table  border="1" align="center">
    <tr>
      <th>SI No</th>
      <th>Movie Category</th>
      <th>Actoin</th>
    </tr>
          <?php
  $selQry="select * from tbl_category";
  $row=$Conn->query($selQry);
  $i=0;
  while($data=$row->fetch_assoc())
  {
  
  $i++;
  ?>
  <tr>
    <td><?php echo $i;?></td>
    <td><?php echo $data["category_name"];?></td>
        <td><a href="category.php?cid=<?php echo $data["category_id"];?>">Delete</a></td>

  </tr>
  <?php
  
  }
  ?>
</table>


</form>
</body>
</html> <?php
	  include("footer.php");
	  ?>