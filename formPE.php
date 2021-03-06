<?php
include 'cabecalho.php';
include 'boots.php';
include 'conexao.php';
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema Acadêmico</title>
		<script src="js/jquery.js"></script>
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<link href="css/style.css" rel="stylesheet">

	</head>
	<body>

	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
</head>

<body>

	<br>

	<div class="container-fluid">
		<h3 class="page-header">Criar Plano de Ensino</h3><br>
		<div class="row">
			<form method="POST" action="#" class="form-horizontal">
				<div class="form-group">
					<div class="col-md-1"></div>
						<?php
							$codigoP = (int)$_POST['codigo'];
		//					$sqlconsulta = sprintf("SELECT p.codigo FROM planoensino p INNER JOIN disciplina d ON d.codigo = p.codigo_disc WHERE d.codigo = '%s'", $codigoP);
		//					$consulta = pg_query($con,$sqlconsulta);
			//				$result = pg_num_rows($consulta);

							$sql=sprintf("SELECT * FROM disciplina WHERE codigo = '%s'", $codigoP);
							$contador = pg_query($con,$sql);
							$result = pg_num_rows($contador);
							if($result==0){						// validação se foi usado o select da página consPE.php
								echo "<br><br><b><p align='right'>A disciplina selecionada não consta no sistema.</p></b><br>";
								include 'rodape.php';
								die("<b><font color='red'><p align='right'>ERRO!</p></font></b>");
							}
							while($dados = pg_fetch_array($contador)){
						?>
					<label class="col-md-1 control-label" for="campo1">Código:</label>
					<div class="col-md-2">
						<?php
							echo "<textarea name='codigo' id='codigo' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='5' rows='1' placeholder='" . $dados['codigo'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo2">Disciplina:</label>
					<div class="col-md-3">
						<?php
							echo "<textarea name='nome' id='nome' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['nome'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
       <!--         </div>

				<div class="form-group">-->
					<div class="col-md-0"></div>

					<label class="col-md-2 control-label" for="campo3">Carga Horária:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='ch' id='ch' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='5' rows='1' placeholder='" . $dados['ch'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo4">Ementa:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='ementa' id='ementa' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['ementa'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

			<div class="form-group">
				<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo5">Objetivo:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='objetivo' id='objetivo' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['objetivo'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo6">Bibliografia Básica:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='bibliografia_basica' id='bibliografia_basica' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['bibliografia_basica'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo7">Bibliografia Complementar:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='bibliografia_complementar' id='bibliografia_complementar' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['bibliografia_complementar'] . "' disabled/></textarea>";
						?>
					</div>
			<?php
				}
			?>

			<br>

					<div class="col-md-1"></div>
				</div>

			</form>
		</div>
	</div>

	<hr>
<!--	-----------------------------------------------------------------------------------------------------------------		-->
	<div class="container-fluid">
  <!--      <h3 class="page-header">Consultar Plano de Ensino</h3><br>-->
	<div class="row">
		<form method="POST" action="cadPE.php" class="form-horizontal" onSubmit="javascript: return valida();" name='form'>
				<div class="form-group">
					<div class="col-md-1"></div>
						
					<label class="col-md-1 control-label" for="turno">Turno:</label>
					<div class="col-md-5">
					
						<?php
							echo "
							<div class='radio-inline'>
								<label for='turno' class='col-xs-1 control-label'>
									<input type='radio' name='turno' id='turno' value='M' /> Matutino
								</label>
							</div>

							<div class='radio-inline'>
								<label for='turno' class='col-xs-1 control-label'>
									<input type='radio' name='turno' id='turno' value='V' /> Vespertino
								</label>
							</div>

							<div class='radio-inline'>
								<label for='turno' class='col-xs-1 control-label'>
									<input type='radio' name='turno' id='turno' value='N' /> Noturno
								</label>
							</div>";
						?>
				 	</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo9">Competência:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='competencia' id='competencia' cols='83' rows='5' placeholder='Digite aqui as competências' ></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo10">Conteúdo Programático:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='conteudo_programatico' id='conteudo_programatico' cols='83' rows='5' placeholder='Digite aqui o conteúdo programático'></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo11">Recurso Metodológico:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='recurso_metodologico' id='recurso_metodologico' cols='83' rows='5' placeholder='Digite aqui os recursos metodológicos' ></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo12">Critério de Avaliação:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='criterio_avaliacao' id='criterio_avaliacao' cols='83' rows='5' placeholder='Digite aqui os critérios de avaliação' ></textarea>";
						?>
					</div>

				<div class="col-md-1"></div>

			</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo13">Instrumento de Avaliação:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='instrumento_avaliacao' id='instrumento_avaliacao' cols='83' rows='5' placeholder='Digite aqui os instrumentos de avaliação' ></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo14">AEC:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='aec' id='aec' cols='83' rows='5' placeholder='Digite aqui a Atividade Extra Complementar' ></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo15">Bibliografia Sugerida:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='bibliografia_sugerida' id='bibliografia_sugerida' cols='83' rows='5' placeholder='Digite aqui a Bibliografia Sugerida' ></textarea>";
						?>
					</div>
				</div>
			</div>

			<?php 
					$login = htmlspecialchars($_SESSION['login']);
					$conecta = sprintf("SELECT * FROM professor p INNER JOIN usuario u ON u.id = p.id WHERE u.login = '%s'",$login);
					$resultado = pg_query($con,$conecta);
					$dados = pg_fetch_array($resultado);

					
					$plan = sprintf("SELECT * FROM planejamento p INNER JOIN planejamento_curso o ON p.id = o.id INNER JOIN curso c ON c.numero = o.numero INNER JOIN curso_disciplina a ON a.numero = c.numero INNER JOIN disciplina d ON d.codigo = a.codigo WHERE d.codigo = '%s'",$codigoP);
					$resultado22 = pg_query($con,$plan);
					$dados22 = pg_fetch_array($resultado22);


			?>

					<div class="col-md-1"></div>
				</div>

				<hr>

				<div class="form-group">
					
					<div class="col-md-0" align='right'>
							<input type="hidden" name="matricula_professor" id="matricula_professor" value="<?php echo $dados['matricula'];?>" />					<input type="hidden" name="codigo_disc" id="codigo_disc" value="<?php echo $codigoP;?>" />
							<input type="hidden" name="id" id="id" value="<?php echo $dados22['id'];?>" />
							<input type="hidden" name="situacao" id="situacao" value='' />
						&nbsp;&nbsp;
							<button type="submit" class="btn btn-primary" onClick='valid()'>Salvar </button>
							<button type="submit" class="btn btn-success" onClick='vali()'>Salvar e Concluir plano de ensino</button>

						&nbsp;&nbsp;
						<a href="menu.php" class="btn btn-default" ><b>Cancelar</b></a>

					<div class="col-md-1"></div>
				</div>
			

			</form>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
	<script>
		function valid(){
			document.getElementById("situacao").value = 'E';
		}
		function vali(){
			document.getElementById("situacao").value = 'C';
		}
	
		function valida(){
				var situacao = $("#situacao").val();
				
				if(situacao != 'E' && (form.turno[0].checked == false) && (form.turno[1].checked == false) && (form.turno[2].checked == false)){
					alert("Escolha um turno");
					document.getElementById('turno').focus();
					return false;
				}
				if(situacao != 'E' && (document.getElementById("competencia").value == '')){
					alert("Digite a competência");
					document.getElementById('competencia').focus();
					return false;
				}
				if(situacao != 'E' && (document.getElementById("conteudo_programatico").value == '')){
					alert("Digite o conteudo programático");
					document.getElementById('conteudo_programatico').focus();
					return false;
				}
				if(situacao != 'E' && (document.getElementById("recurso_metodologico").value == '')){
					alert("Digite o recurso metodológico");
					document.getElementById('recurso_metodologico').focus();
					return false;
				}
				if(situacao != 'E' && (document.getElementById("criterio_avaliacao").value == '')){
					alert("Digite o criterio de avaliacao");
					document.getElementById('criterio_avaliacao').focus();
					return false;
				}
				if(situacao != 'E' && (document.getElementById("instrumento_avaliacao").value == '')){
					alert("Digite o instrumento de avaliação");
					document.getElementById('instrumento_avaliacao').focus();
					return false;
				}
				if(situacao != 'E' && (document.getElementById("aec").value == '')){
					alert("Digite a AEC");
					document.getElementById('aec').focus();
					return false;
				}
				if(situacao != 'E' && (document.getElementById("bibliografia_sugerida").value == '')){
					alert("Digite a bibliografia sugerida");
					document.getElementById('bibliografia_sugerida').focus();
					return false;
				}
				
				return true;
			}
	</script>
<?php
include 'rodape.php';
?>

