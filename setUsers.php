<?php include "cabecalho.php";?>
	<script>
		function valid(){
			document.getElementById("idp").value = 'SDFfdasf3$@!4t34534fSD';
		}
	</script>
	</head>
<?php include "boots.php"; ?>

	<br/><br/>
<?php include "conexao.php"; ?>
	<body>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Editar Usuário</h3>
			<?php
				$login = $_POST['login'];
				$ant = $_POST['ant'];
				$apelido = $_POST['apelido'];
				$sexo = $_POST['sexo'];
				$nivel = $_POST['nivel'];
				$sqlup = sprintf("UPDATE usuario SET login='%s', apelido='%s', sexo='%s', nivel='%s' WHERE id='%s'",$login,$apelido,$sexo,$nivel,$ant);
						$update = pg_query($con,$sqlup); 
						echo "<b>Dados alterados com sucesso!!!</b>";
						echo "<b>Você será redireciodado a página de listagem de Usuários novamente. Aguarde alguns instantes.</b>";
						header('Refresh: 3; url=alterarUsers.php');
						pg_close($con);
					
			?>
		</div>
<?php include "rodape.php"; ?>
