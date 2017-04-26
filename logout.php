<?php
	session_start();
	
	if(isset($_SESSION['login']) && isset($_SESSION['nivel'])){
	session_destroy();
	header ('Location: login.php');
	}else{
		
		echo "'<script>alert('Você deve estar logado para isso!');window.location.href='login.php'</script>';"; 
	}
?>
