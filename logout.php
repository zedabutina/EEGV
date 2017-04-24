<?php
	session_start();
	
	if(isset($_SESSION['login']) && isset($_SESSION['nivel'])){
	session_destroy();
	header ('Location: pagina_inicial.php');
	}
?>
