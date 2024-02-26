<?php
$name="";
$ta=0;
$da=0;
$hra=0;
$lic=0;
$pf=0;
$net=0;
	if(isset($_POST["submit"]))
	{
		$fname=$_POST["txt1"];
		$lname=$_POST["txt2"];
		$gender=$_POST["rd1"];
		$status=$_POST["rd2"];
		if($gender=="male")
		{
			$name="Mr.".$fname."".$lname;
			
		}
		else
		{
			if($status=='single')
			
			{
				$name="Ms.".$fname."".$lname;
				
				}
				$name="Mrs.".$fname."".$lname;
			}
			
		}
		




?>


<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>First name</td>
      <td><label for="txt1"></label>
      <input type="text" name="txt1" id="txt1" /></td>
    </tr>
    <tr>
      <td>Last name</td>
      <td><label for="txt2"></label>
      <input type="text" name="txt2" id="txt2" /></td>
    </tr>
    <tr>
      <td height="37">Gender</td>
      <td><input type="radio" name="radio" id="rd1" value="rd1" />
      <label for="rd1">male
        <input type="radio" name="radio" id="rd2" value="rd2" />
      female</label></td>
    </tr>
    <tr>
      <td>Martial</td>
      <td>  <input type="radio" name="radio" id="rd3" value="rd3" />
        <label for="rd3">single
        <input type="radio" name="radio" id="rd4" value="rd4" />
        married</label></td>
    </tr>
    <tr>
      <td>Department</td>
      <td><p>
        <label for="slt1"></label>
        <label for="slt1">select</label>
        <select name="slt1" id="slt1">
        </select>
      </p></td>
    </tr>
    <tr>
      <td>Basic salary</td>
      <td><label for="txt3"></label>
      <input type="text" name="txt3" id="txt3" /></td>
    </tr>
    <tr>
      <td colspan="2"><input type="submit" name="btn1" id="btn1" value="Submit" />
      <input type="submit" name="btn2" id="btn2" value="cancel" /></td>
    </tr>
    <tr>
      <td>Gender</td>
      <td colspan="2"><?php echo $gender;?></td>
    </tr>
    <tr>
      <td>Martial</td>
      <td colspan"2"><?php echo $status;?></td>
    </tr>
    <tr>
      <td>department</td>
      <td colspan="2">nbsp; </td>
    </tr>
    <tr>
      <td>TA</td>
      <td> <?php  echo $ta; ?> </td>
    </tr>
    <tr>
      <td>DA</td>
      <td><?PHP echo $da;?></td>
    </tr>
    <tr>
      <td>HRA</td>
      <td><?php echo $hra;?></td>
    </tr>
    <tr>
      <td>LIC</td>
      <td><?PHP echo $lic ;?></td>
    </tr>
    <tr>
      <td>P.F</td>
      <td><?php echo $pf;?></td>
    </tr>
    <tr>
      <td>name</td>
      <td><?php echo $namw; ?></td>
    </tr>
  </table>
</form>
