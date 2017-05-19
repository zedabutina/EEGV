<?php
include 'cabecalho.php';
include 'boots.php';
?>

	<br><br>
	<?php include "conexao.php"; ?>
	<body>

				<?php
					$turno = $_POST['turno'];
					$competencia = $_POST['competencia'];
					$conteudo_programatico = $_POST['conteudo_programatico'];
					$recurso_metodologico = $_POST['recurso_metodologico'];
					$criterio_avaliacao = $_POST['criterio_avaliacao'];
					$instrumento_avaliacao = $_POST['instrumento_avaliacao'];
					$aec = $_POST['aec'];
					$bibliografia_sugerida = $_POST['bibliografia_sugerida'];

//esquece campo date
						if(($bibliografia_sugerida!='') && ($turno!='')){   //ou seja se TUDO ESTIVER PREENCHIDO
							$sqlvalida = sprintf("INSERT INTO planoensino(turno, competencia, conteudo_programatico, recurso_metodologico, criterio_avaliacao, instrumento_avaliacao, aec, bibliografia_sugerida) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s') ", $turno, $competencia, $conteudo_programatico, $recurso_metodologico, $criterio_avaliacao, $instrumento_avaliacao, $aec, $bibliografia_sugerida);
				/*		}else{
							$sqlvalida = sprintf("INSERT INTO professor(matricula, nome, cep, logradouro, numero, complemento, bairro, cidade, uf, id) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') ", $matricula, $nome, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf, $id);
						}  */
						$result=pg_query($con,$sqlvalida);
						echo "Professor cadastrado com sucesso";
						echo "<br>Você será redirecionado para a página de listagem de professores";       
			//			header('Refresh: 5; url=alterarProf.php');
					}

				?>
	     		
<?php									
	include "rodape.php";
?>
