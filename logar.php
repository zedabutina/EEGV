<?php include "cabecalho.php"; ?>
		<script type="text/javascript">

		</script>
		<style>
			strong {color:red;};
		</style>

	</head>
<?php include "boots.php"; ?>

	<br/><br/>
<?php include "conexao.php"; ?>
	<body>

	<br/>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Login</h3>
			
			<?php
				
				$login = $_POST['login'];
				$password= $_POST['password'];
				$sqlvalida = sprintf("SELECT * FROM usuario WHERE login = '%s' and senha = '%s'",$login,md5($password));
				$resultado = pg_query($con,$sqlvalida);  
				$linhas = pg_num_rows($resultado);
				if($_SESSION['login']){
						echo "<p><b>Você já esta logado como ". $_SESSION["login"] . ". Para realizar um login com usuário diferente faça </p></b>";
						echo "<b><a href='logout.php'>logout</a></b>";					
			
				}elseif($linhas <= 0){
					echo "<p><b>Usuário e/ou senha incorreta!</b></p>";
				}elseif($linhas > 0){
					
					$conapelido = sprintf("SELECT apelido FROM usuario WHERE login = '%s' ", $login);
					$apelido = pg_query($con,$conapelido);
					$apel=pg_fetch_row($apelido);
			

					$connivel = sprintf("SELECT nivel FROM usuario WHERE login = '%s' ", $login);
					$nivel = pg_query($con,$connivel);
					$nv=pg_fetch_row($nivel);
			
					session_start();
					$_SESSION['login']= $login;
					$_SESSION['apelido']= $apel[0];
					$_SESSION['nivel']= $nv[0];


					header("Location:menu.php");
				
				}
	
			?>

