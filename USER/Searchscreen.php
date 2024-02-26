 <?php
include("../Assets/Connection/Connection.php");

session_start();
if(isset($_POST["btn_submit"]))
{
	
	$district=$_POST["sel_district"];
	$place=$_POST["sel_place"];

	
}


if(isset($_GET["did"]))
{
	$_SESSION["scrID"]=$_GET["did"];
	header("location:ViewSeatRate.php");
}
if(isset($_GET["sid"]))
{
	$_SESSION["scrID"]=$_GET["sid"];
	header("location:Moviedisplay.php");
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
<title>Search Screen</title>
</head>

<body>
<p>&nbsp;</p>
    <?php
	  include("header.php");
	  ?>


<form id="form1" name="form1" method="post"  action="">
    <tr >
      <td>District Name</td>
      <td><label for="sel_district"></label>
        <select name="sel_district" id="sel_district" onchange="getPlace(this.value),getSearch()">
       <option value="">---select---</option>
        <?php
        $sel="select * from tbl_district";
		$row1=$Conn->query($sel);	
		while($result=$row1->fetch_assoc())
		{
		?>
        <option value="<?php echo $result["district_id"]?>"><?php echo $result["district_name"]?></option>
        <?php
		}
		?> 
      </select>   
      </td>
    </tr>
    &nbsp;&nbsp;    &nbsp;&nbsp;

    <tr>
      <td>Place Name</td>
      <td><label for="sel_place"></label>
        <select name="sel_place" id="sel_place" onchange="getSearch()">
       <option value="">---select---</option>
      </select>         </td>
    </tr>
    &nbsp;&nbsp;    &nbsp;&nbsp;
    &nbsp;&nbsp;    &nbsp;

<br />
<br />
<div id="search">
<table align="center">
<?php
$sel="select * from tbl_screen s inner join tbl_place p on p.place_id=s.place_id inner join tbl_district d on d.district_id=p.district_id where true";
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

</table>
</div>
</form>
</body>
  </body>
  <script src="../Assets/Jquery/jQuery.js"></script>
  <script>
function getPlace(disd)
{

	$.ajax({
	  url:"../Assets/AjaxPages/AjaxPlace.php?did="+disd,
	  success: function(result){
		  
		$("#sel_place").html(result);
		getSearch();
	  }
	});
}
function getSearch()
{
	var did=document.getElementById("sel_district").value;
	var pid=document.getElementById("sel_place").value;
	$.ajax({
	url: "../Assets/Ajaxpages/AjaxSearchscreen.php?did="+did+"&pid="+pid,
	  success: function(html){
		$("#search").html(html);
                //alert(html);
	  }
	});
}
</script>

</html>    <?php
	  include("footer.php");
	  ?>

