<?php
include 'cabecalho.php';
include 'boots.php';
?>

	<br><br>
	<?php include "conexao.php"; ?>
	<body>

				<?php
					$login = $_POST['login'];
					$senha= $_POST['senha'];
					$senha_confirma= $_POST['senha_confirma'];
					$apelido= $_POST['apelido'];
					$sexo= $_POST['sexo'];
					$nivel= $_POST['nivel'];

					$sql=sprintf("SELECT * FROM usuario WHERE login = '%s'", $login);
					$valid=pg_query($con,$sql);
					if (pg_num_rows($valid)>0){
						echo "<b><font color=red>ERRO!!! Usuario jÃƒÂ¡ cadastrado no sistema.</b>";
					}else{
						$sqlvalida = sprintf("INSERT INTO usuario(login, senha, apelido, sexo, nivel) VALUES ('%s',md5('%s'),'%s','%s','%s') ", $login, $senha, $apelido, $sexo, $nivel);
					}
						$result=pg_query($con,$sqlvalida);
						echo "Usuário cadastrado com sucesso";
						echo "<br>Você será redirecionado para a página de listagem de Usuários. Aguarde alguns instantes.";
						header('Refresh: 5; url=alterarUsers.php');
				
	
				?>
	     		
<?php	 
	include "rodape.php";
?>
