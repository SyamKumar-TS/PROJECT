<?php 
$_res=0;
	if(isset($_POST["bt1"]))
		$_num1=$_POST["txt1"];
		$_num2=$_POST["txt2"];
		$_res=$_num1+$_num2;








?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="200" border="1">
    <tr>
      <td>ENTER NO.1</td>
      <td><label for="txt1"></label>
      <input type="text" name="txt1" id="txt1" /></td>
    </tr>
    <tr>
      <td>ENTER NO.2</td>
      <td><label for="txt2"></label>
      <input type="text" name="txt2" id="txt2" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="bt1" id="bt1" value="+" />
        <input type="submit" name="bt2" id="bt2" value="-" />
        <input type="submit" name="bt3" id="bt3" value="*" />
        <input type="submit" name="bt4" id="bt4" value="/" />
      </div></td>
    </tr>
    <tr>
      <td>RESULT</td>
      <td><?php echo $_res;?></td>
    </tr>
  </table>
</form>
</body>
</html>