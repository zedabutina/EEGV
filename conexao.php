<?php
	$strConn = "host=localhost dbname=login port=5432 user=postgres password='root'";
	$con = pg_connect($strConn);
	if(!$con){
			echo "<p><b>ERRO DE CONEXÃO COM O BANCO DE DADOS<b></p>";
	}else{
		echo "CONEXAO COM SUCESSO";
	}
?>
