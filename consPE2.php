<?php
session_start();
include 'cabecalho.php';
include 'boots.php';

?>

<br><br>

<?php 
        if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
            echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
            echo "<div class='container' >";
            echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
            echo "</div>"; 
            
        }elseif($_SESSION['nivel'] == 'P'){
?>

<br><br>

<?php
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
		<h3 class="page-header">Consultar Plano de Ensino</h3><br>
		<div class="row">
			<form method="POST" action="#" class="form-horizontal">
				<div class="form-group">
					<div class="col-md-1"></div>
						<?php
							$codigoP = $_POST['codplano'];
							$sqlconsulta = sprintf("SELECT p.codigo, p.codigo_disc FROM planoensino p INNER JOIN disciplina d ON d.codigo = p.codigo_disc WHERE p.codigo = '%s'", $codigoP);
							$consulta = pg_query($con,$sqlconsulta);
							$result = pg_num_rows($consulta);
							$dados = pg_fetch_array($consulta);
							$codigoD = $dados['codigo_disc'];
							if($result==0){						// validação se foi cadastrado um plano de ensino para a disciplina.
								echo "<br><br><b><p align='right'>Não há plano de ensino cadastrado para a disciplina selecionada.</p></b><br>";
								include 'rodape.php';
								die("<b><font color='red'><p align='right'>ERRO!</p></font></b>");
							}
							$sql=sprintf("SELECT * FROM disciplina WHERE codigo = '%s'", $codigoD);
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
		<form method="POST" action="gerarpdf.php" class="form-horizontal" id="consPEform">
				<div class="form-group">
					<div class="col-md-1"></div>
						<?php
							//$codigoP = $_POST['codigo'];
				       echo "<input type='hidden' name='codigoPrint' id='codigoPrint' value='" . $codigoP . "' />";
							$sql=sprintf("SELECT p.codigo FROM planoensino p INNER JOIN disciplina d ON d.codigo = p.codigo_disc WHERE p.codigo = '%s'", $codigoP);


				//			echo $codigoP;
							$sql=sprintf("SELECT * FROM planoensino WHERE codigo = '%s'", $codigoP);
							$contador = pg_query($con,$sql);
							$result = pg_num_rows($contador);
							while($dados = pg_fetch_array($contador)){
						?>
					<label class="col-md-1 control-label" for="campo8">Turno:</label>
					<div class="col-md-1">
						<?php
							if($dados['turno'] == 'M'){
								echo "<textarea name='codigo' id='codigo' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='5' rows='1' placeholder='Matutino' disabled/></textarea>";
							}elseif($dados['turno'] == 'V'){
								echo "<textarea name='codigo' id='codigo' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='5' rows='1' placeholder='Vespertino' disabled/></textarea>";
							}elseif($dados['turno'] == 'N'){
								echo "<textarea name='codigo' id='codigo' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='5' rows='1' placeholder='Noturno' disabled/></textarea>";
							}
						?>
				 	</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo9">Competência:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='competencia' id='competencia' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['competencia'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo10">Conteúdo Programático:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='conteudo_programatico' id='conteudo_programatico' readonly='yes' style='background-color:transparent; border:none; resize:;' cols='115' rows='5' placeholder='" . $dados['conteudo_programatico'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo11">Recurso Metodológico:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='recurso_metodologico' id='recurso_metodologico' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['recurso_metodologico'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo12">Critério de Avaliação:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='criterio_avaliacao' id='criterio_avaliacao' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['criterio_avaliacao'] . "' disabled/></textarea>";
						?>
					</div>

				<div class="col-md-1"></div>

			</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo13">Instrumento de Avaliação:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='instrumento_avaliacao' id='instrumento_avaliacao' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['instrumento_avaliacao'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo14">AEC:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='aec' id='aec' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['aec'] . "' disabled/></textarea>";
						?>
					</div>

					<div class="col-md-1"></div>
				</div>

				<div class="form-group">
					<div class="col-md-1"></div>

					<label class="col-md-1 control-label" for="campo15">Bibliografia Sugerida:</label>
					<div class="col-md-1">
						<?php
							echo "<textarea name='bibliografia_sugerida' id='bibliografia_sugerida' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='115' rows='5' placeholder='" . $dados['bibliografia_sugerida'] . "' disabled/></textarea>";
						?>
					</div>
				</div>
			</div>
					<div align="right" class="col-md-12">
						<?php echo "<button type='submit'><img src='images/printer.png'  width='48' height='48'/></button>"

						?>
						
					</div>
			<?php
							}
			?>

					<div class="col-md-1"></div>
				</div>

				<hr>

				<div class="form-group">
					<div class="col-md-7"></div>

					<div class="col-md-0">
						<a href="#" class="btn btn-success">Salvar e Finalizar Plano de Ensino</a>
						&nbsp;&nbsp;
						<a href="#" class="btn btn-primary">Salvar</a>
						&nbsp;&nbsp;
						<a href="menu.php" class="btn btn-default">Cancelar</a>

					<div class="col-md-1"></div>
				</div>

			</form>
		</div>
	</div>

	<script src="js/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>

            <?php 
            }elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'P')){
                echo "<b>Você não tem permissão</b><br>";
                echo "<div class='col-md-7'>";
                echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
                echo "</div>";
            } 
            ?>    
<?php
include 'rodape.php';
?>

