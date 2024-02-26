<?php
	$Servername="localhost";
	$Username="root";
	$Password="";
	$DB="db_movieticketbooking";
	$Conn=mysqli_connect($Servername,$Username,$Password,$DB);
	if(!$Conn)
	{
		die("Connection failed!!!!");
	}
?>
	