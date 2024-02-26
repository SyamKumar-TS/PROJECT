<?php
$_largest=0;
$_smallest=0;
	if(isset($_POST["bt1"]))
		
		$_num1=$_POST["txt1"];
		$_num2=$_POST["txt2"];
		$_num3=$_POST["txt3"];
		
			if($_num1>$_num2)
				{
					$_largest=$_num1;
					
				}
			else
			   {
					$_largest=$_num2;   
			   }
		
				if($_largest>$_num3)
					{
						
						$_largest=$_largest;
					}
					else
						{
							$_largest=$_num3;
							
						}
						if($_num1<$_num2)
						{
							$_smallest=$_num1;
						}
						 else
						 	{
								$_smallest=$_num2;
						    }	
							
							if($_smallest<$_num3)
							{
								$_smallest=$_smallest;
							}
								else
									{
										$_smallest=$_num3;
									}
							
							
							
							
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
      <td>NUMBER-1</td>
      <td><label for="txt1"></label>
      <input type="text" name="txt1" id="txt1" /></td>
    </tr>
    <tr>
      <td>NUMBER-2</td>
      <td><label for="txt2"></label>
      <input type="text" name="txt2" id="txt2" /></td>
    </tr>
    <tr>
      <td>NUMBER-3</td>
      <td><label for="txt3"></label>
      <input type="text" name="txt3" id="txt3" /></td>
    </tr>
    <tr>
      <td colspan="2"><div align="center">
        <input type="submit" name="bt1" id="bt1" value="find" />
      </div></td>
    </tr>
    <tr>
      <td>largest number</td>
      <td><?php echo $_largest;?></td>
    </tr>
    <tr>
      <td>smallest number</td>
      <td><?php echo $_smallest;?> </td>
    </tr>
  </table>
</form>
</body>
</html>