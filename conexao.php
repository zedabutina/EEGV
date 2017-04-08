<?php
	$strConn = "host=127.0.0.1 dbname=sipedb user=sipe password='senac123'";
	$con = pg_connect($strConn);
	if(!$con){
		echo "<img src='images/desconectado' width='56' height='56'>";
		die();
	}else{
		echo "<img src='images/conectado' width='56' height='56'>";
	}
?>
