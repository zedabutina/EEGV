<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['atual']) && isset($_POST['nova'])){
		if(isset($_SESSION['login']) && isset($_SESSION['nivel'])){
		
			$login = $_SESSION['login'];
			$atual = $_POST['atual'];
			$nova = $_POST['nova'];
			include "conexao.php";
			$sql=sprintf("SELECT * FROM usuario WHERE login = '%s' and senha = '%s'",$login,md5($atual));
			$valid=pg_query($con,$sql);
			if (pg_num_rows($valid)==0){
				echo "<script>alert('Senha Atual incorreta');window.location.href='alterarSenha.php'</script>";
			}elseif(pg_num_rows($valid)>0){
				$sqlin=sprintf("UPDATE usuario SET senha='%s' WHERE login = '%s'",md5($nova),$login);
				$result=pg_query($con,$sqlin);
				echo "<script>alert('Senha alterada com Sucesso!');window.location.href='menu.php'</script>";
			}
			
		}else{
			echo "<script>alert('Você deve estar logado!');window.location.href='login.php'</script>";
		}
	}
?>
		






