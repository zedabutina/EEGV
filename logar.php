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


				if(isset($_SESSION['login'])){
					echo "<p><b>Você já esta logado como ". $_SESSION["login"] . ". Para realizar um login com usuário diferente faça </p></b>";					pg_close($con);
					echo "<b><a href='logout.php'>logout</a></b>";					
				}


				if($linhas <= 0){
					echo "<script>alert('Usuário e/ou senha incorreta');window.location.href='login.php'</script>";
					pg_close($con);
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

					pg_close($con);
					header("Location:menu.php");
					
				}
	
			?>

