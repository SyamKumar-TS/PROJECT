

<?php
include("../Assets/Connection/Connection.php");
session_start();


if(isset($_POST["btn_send"]))
{
	
	$complainttype=$_POST["complainttype"];
	$title=$_POST["complainttitle"];
	$complaint=$_POST["complaint"];
    $complaintdate=$_POST["date"];


	
	$insertqry="insert into tbl_complaint(complainttype_id,complaint_title,complaint_details,user_id,complaint_date)values('".$complainttype."','".$title."','".$complaint."','".$_SESSION["uid"]."','".$complaintdate."')";
	if($Conn->query($insertqry))
	{
		?>
		<script>
				alert("inserted");
				window.location("Postcomplaint.php");
		</script>
		<?php
	}
	else
	{
		?>
            <script>
			 alert("failed");
			 window.location("Postcomplaint.php");
			 			
 			</script>
           <?php
	}

}
?>
<?php
	  include("header.php");
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
<title>Post Complaint</title>
</head>

<body>
<center><h1><u>Register Your Complaints</u></h1></center>
<center><h4><i>Our patients are our number one priority. Our doctors  are committed towards serving you well.<br /> We will ensure that your visit, treatment process and follow-up are seamless with no hassles to you. </br>We take your feedback and suggestions seriously, please reach out to us.</i></h4></center>
 <br />   <br>



<form id="form1" name="form1" method="post" action="">
  <p align="center">Complaint Type:    
    <label for="complainttype"></label>
    <select name="complainttype" id="complainttype">
    
        <?php
  					$selQry="select * from tbl_complainttype";
  					$row=$Conn->query($selQry);
  					while($data=$row->fetch_assoc())
  					{
        ?>
        		<option value="<?php echo $data["complainttype_id"];?>"><?php echo $data["complainttype_name"];?></option>
        <?php
					}
		?>

    </select>
  </p>
  <p align="center">Complaint Date:  		
    <label for="date"></label>
    <input type="date" name="date" id="date" />
  </p>
    <p align="center">Title:  		
    <label for="complainttitle"></label>
    <input type="text" name="complainttitle" id="complainttitle" />
  </p>

  <p align="center">Complaint: 
    <label for="complaint"></label>
    <textarea name="complaint" id="complaint" cols="45" rows="5"></textarea>
  </p>
  <p align="center">
    <input type="submit" name="btn_cancel" id="btn_cancel" value="Cancel" class="button"/>
    <input type="submit" name="btn_send" id="btn_send" value="Submit" class="button"/>
  </p>
  <p align="center">&nbsp;</p>
  <p>&nbsp;</p>
</form>
</body>
</html>    <?php
	  include("footer.php");
	  ?>

