<?php
	$strConn = "host=localhost dbname=sipedb port=5432 user=sipe password='senac123'";
	$con = pg_connect($strConn);
	if(!$con){
			echo "<p><b>ERRO DE CONEXÃO COM O BANCO DE DADOS<b></p>";
	}else{
		echo "CONEXAO COM SUCESSO";
	}
?>
