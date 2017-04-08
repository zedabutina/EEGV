<?php
	$strConn = "host=localhost dbname=sipedb port=5432 user=sipe password='senac123'";
	$con = pg_connect($strConn);
	if(!$con){
			echo "<img src='images/desconectado' width='56' height='56'>";
	}else{
		echo "<img src='images/conectado' width='56' height='56'>";
	}
?>
