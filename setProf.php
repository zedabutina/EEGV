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
				$matricula = (int)$_POST['matricula'];
				$ant = (int)$_POST['ant'];
				$nome = htmlspecialchars($_POST['nome']);
				$cep = htmlspecialchars($_POST['cep']);
				$logradouro = htmlspecialchars($_POST['logradouro']);
				$numero = htmlspecialchars($_POST['numero']);
				$complemento = htmlspecialchars($_POST['complemento']);
				$bairro = htmlspecialchars($_POST['bairro']);
				$cidade = $_POST['cidade'];
				$uf = $_POST['uf'];
				$id = (int)$_POST['id'];
				if($matricula==$ant){
					if($complemento==' '){
						$sqlup = sprintf("UPDATE professor SET matricula='%s', nome='%s', cep='%s', logradouro='%s', numero='%s', bairro='%s', cidade='%s', uf='%s', id='%s' , autor = '%s' WHERE matricula='%s'",$matricula,$nome,$cep,$logradouro,$numero,$bairro,$cidade,$uf,$id,$_SESSION['login'],$ant);

					}elseif($complemento!=' '){
						$sqlup = sprintf("UPDATE professor SET matricula='%s', nome='%s', cep='%s', logradouro='%s', numero='%s', complemento='%s',bairro='%s', cidade='%s', uf='%s', id='%s', autor = '%s' WHERE matricula='%s'",$matricula,$nome,$cep,$logradouro,$numero,$complemento,$bairro,$cidade,$uf,$id,$_SESSION['login'],$ant);
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
						echo "<b>O professor ". $dados['nome'] . " já está cadastrado com essa matrícula. Verifique a disponibilidade de outra matrícula.</b>";
			/*			echo "<form method='POST' action='excluirProf.php'>
						<input type='hidden' name='num' value='". $matricula . "'>
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
						echo "<a href='alterarProf.php' class='btn btn-secundary' onClick='window.history.go(-1)'><b>Cancelar</b></a>";			*/
						echo "<br><br><a href='alterarProf.php' class='btn btn-primary'><b>Listar professores</b></a>";
/*						echo "<button type='submit' class='btn btn-danger'>Excluir</button>";
						echo "</div>";
						echo "<input type='hidden' name='idp' id='idp'value=' '";
						echo "<div align='center'>";
						echo "<button type='submit' class='btn btn-default' onClick='valid()'>Trocar Mátriculas</button>";
						echo "</div>";
						echo "</form>";
*/
					}else{
						$dados=pg_fetch_array($consulta);
						$sqlconsulta = sprintf("SELECT c.nome FROM curso c INNER JOIN professor p ON p.matricula = c.matricula WHERE p.matricula = '%s'",$matricula);
						$consulta = pg_query($con,$sqlconsulta);
						$result = pg_num_rows($consulta);

						if ($result>0){
							echo "<b>Esse professor já está vinculado à um curso, portanto, não pode ser excluído!</b>";
							echo "<div align='center' class='row'>";
						echo "<a href='alterarProf.php' class='btn btn-primary'>Listar Professores</a>";
						echo "<a href='menu.php' class='btn btn-default'>Menu</a>";
							echo "</div>";
						}elseif($result==0){
							if ($complemento == ' '){
								$sqlup = sprintf("UPDATE professor SET matricula='%s', nome='%s', cep='%s', logradouro='%s', numero='%s', bairro='%s', cidade='%s', uf='%s', id='%s' , autor='%s' WHERE matricula='%s'",$matricula,$nome,$cep,$logradouro,$numero,$bairro,$cidade,$uf,$id,$_SESSION['login'],$ant);
							}elseif($complemento != ' '){
								$sqlup = sprintf("UPDATE professor SET matricula='%s', nome='%s', cep='%s', logradouro='%s', numero='%s', complemento='%s',bairro='%s', cidade='%s', uf='%s', id='%s' , autor='%s' WHERE matricula='%s'",$matricula,$nome,$cep,$logradouro,$numero,$complemento,$bairro,$cidade,$uf,$id,$_SESSION['login'],$ant);
							}
						
						$update = pg_query($con,$sqlup); 
						pg_close($con);

						echo "<b>Dados alterados com sucesso!!!</b>";
		//				echo "<div align='center'>";
		//				echo "<a href='alterarProf.php' class='btn btn-primary'>Listar Professores</a>";
		//				echo "<a href='menu.php' class='btn btn-default'>Menu</a>";
		//				echo "</div>";
						header('Refresh: 3; url=alterarProf.php');
					}
				}
			?>
		</div>
		<?php
				}
			?>
		</div>
<?php include "rodape.php"; ?>

