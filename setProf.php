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
			<h3 class="page-header">Editar Professor</h3>
			<?php
				$matricula = $_POST['matricula'];
				$ant = $_POST['ant'];
				$nome = $_POST['nome'];
				$cep = $_POST['cep'];
				$logradouro = $_POST['logradouro'];
				$numero = $_POST['numero'];
				$complemento = $_POST['complemento'];
				$bairro = $_POST['bairro'];
				$cidade = $_POST['cidade'];
				$uf = $_POST['uf'];
				$id = $_POST['id'];
				if($matricula==$ant){
					if($complemento==' '){
						$sqlup = sprintf("UPDATE professor SET matricula='%s', nome='%s', cep='%s', logradouro='%s', numero='%s', bairro='%s', cidade='%s', uf='%s', id='%s' WHERE matricula='%s'",$matricula,$nome,$cep,$logradouro,$numero,$bairro,$cidade,$uf,$id,$matricula);
					}elseif($complemento!=' '){
						$sqlup = sprintf("UPDATE professor SET matricula='%s', nome='%s', cep='%s', logradouro='%s', numero='%s', complemento='%s',bairro='%s', cidade='%s', uf='%s', id='%s' WHERE matricula='%s'",$matricula,$nome,$cep,$logradouro,$numero,$complemento,$bairro,$cidade,$uf,$id,$matricula);
					}
						$update = pg_query($con,$sqlup); 
						echo "<b>Dados alterados com sucesso!!!</b>";
						header('Refresh: 3; url=alterarProf.php');
						pg_close($con);
				
				}elseif($matricula!=$ant){
					$sqlconsulta = sprintf("SELECT * FROM professor WHERE matricula='%s'",$matricula);
					$consulta = pg_query($con,$sqlconsulta);
					$result = pg_num_rows($consulta);
					if ($result>0){
						$dados=pg_fetch_array($consulta);
						echo "<b>O professor ". $dados['nome'] . " já esta cadastrado com essa matrícula. Deseja excluí-lo, trocar as mátriculas ou Cancelar?</b>";
					
						echo "<form method='POST' action='excluirProf.php'>
						<input type='hidden' name='num' value='". $dados['matricula'] . "'>
						<input type='hidden' name='ant' value='". $ant . "'>
						<input type='hidden' name='matricula' value='". $matricula ."'>
						<input type='hidden' name='nome' value='". $nome ."'>
						<input type='hidden' name='cep' value='". $cep ."'>
						<input type='hidden' name='logradouro' value='". $logradouro ."'>
						<input type='hidden' name='numero' value='". $numero . "'>
						<input type='hidden' name='complemento' value='". $complemento ."'>
						<input type='hidden' name='bairro' value='". $bairro ."'>
						<input type='hidden' name='cidade' value='". $cidade ."'>
						<input type='hidden' name='uf' value='". $uf ."'>
						<input type='hidden' name='id' value='". $id ."'>
						<input type='hidden' name='ide' value='fff3#@$%#@EGT$%TG'>";

						echo "<div align='center' >";
						echo "<a href='alterarProf.php' class='btn btn-secundary' onClick='window.history.go(-1)'><b>Cancelar</b></a>";
						echo "<button type='submit' class='btn btn-danger'>Excluir</button>";
						echo "</div>";
						echo "<input type='hidden' name='idp' id='idp'value=' '";
						echo "<div align='center'>";
						echo "<button type='submit' class='btn btn-default' onClick='valid()'>Trocar Mátriculas</button>";
						echo "</div>";
						echo "</form>";

					}
				}
			?>
		</div>
<?php include "rodape.php"; ?>
