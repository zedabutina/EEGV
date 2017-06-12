<html>
<?php
	include 'cabecalho.php';
	include 'boots.php';
	include 'conexao.php';
?>
<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'P' || $_SESSION['nivel'] == 'C'){
?>
	</head>
	<body>
		<br><br>
		<div id="main" class="container-fluid">
		<h3 class="page-header">Visualizar Plano de Ensino</h3><br>
			
	
		<?php
			$codigoP = (int)$_POST['coddisc'];

			$sql=sprintf("SELECT * FROM planoensino WHERE codigo = '%s'", $codigoP);
			$contador = pg_query($con,$sql);
			$result = pg_num_rows($contador);
			
			while($dados = pg_fetch_array($contador)){
				if($dados['turno']== 'M'){
					$turno= 'Matutino';
				}elseif($dados['turno']== 'V'){
					$turno= 'Vespertino';
				}elseif($dados['turno']== 'N'){
					$turno = 'Noturno';
				}
		?>
				<table>
					<tr><td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="turno">Turno:</label>
						<div class="col-xs-2"">
							<?php
								echo "<textarea name='turno' id='turno' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='5' rows='1' placeholder='" .  $turno . "' disabled/></textarea>";
							?>
						</div>
					</div>
					</td>
				
					<td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="competencia">Competência:</label>
						<div class="col-xs-2">
							<?php
								echo "<textarea name='competencia' id='competencia' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['competencia'] . "' disabled/></textarea>";
							?>
						</div>

					</div>
					</td></tr>
					<tr>
					<td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="competencia">Conteúdo Programático:</label>
						<div class="col-xs-2">
							<?php
								echo "<textarea name='conteudo_programatico' id='conteudo_programatico' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['conteudo_programatico'] . "' disabled/></textarea>";
							?>
						</div>

					</div>
					</td></tr>
					<tr>
					<td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="competencia">Recurso Metodológico:</label>
						<div class="col-xs-2">
							<?php
								echo "<textarea name='recurso_metodologico' id='recurso_metodologico' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['recurso_metodologico'] . "' disabled/></textarea>";
							?>
						</div>

					</div>
					</td>
					<td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="criterio_avaliacao">Critério de Avaliação:</label>
						<div class="col-xs-2">
							<?php
								echo "<textarea name='criterio_avaliacao' id='criterio_avaliacao' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['criterio_avaliacao'] . "' disabled/></textarea>";
							?>
						</div>

					</div>
					</td></tr>
					<tr>
					<td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="competencia">Instrumento de Avaliação:</label>
						<div class="col-xs-2">
							<?php
								echo "<textarea name='instrumento_avaliacao' id='instrumento_avaliacao' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['instrumento_avaliacao'] . "' disabled/></textarea>";
							?>
						</div>

					</div>
					</td>
					<td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="aec">AEC:</label>
						<div class="col-xs-2">
							<?php
								echo "<textarea name='aec' id='instrumento_avaliacao' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['aec'] . "' disabled/></textarea>";
							?>
						</div>

					</div>
					</td></tr>
					<tr>
					<td>
					<div class="form-group">
						<label class="col-md-4 control-label" for="competencia">Bibliografia Sugerida:</label>
						<div class="col-xs-2">
							<?php
								echo "<textarea name='bibliografia_sugerida' id='bibliografia_sugerida' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['bibliografia_sugerida'] . "' disabled/></textarea>";
							?>
						</div>

					</div>
					</td>
					<?php
					if ($dados['obs_devolucao']!=''){
					echo "<td>";
					echo "<div class='form-group'>";
					echo "<label class='col-md-4 control-label' for='obs_devolucao'><b style='color:red;'>Motivo da devolução:</label>";
					echo "<div class='col-xs-2'>";
							
								echo "<textarea name='obs_devolucao' id='obs_devolucao' readonly='yes' style='background-color:transparent; border:none; resize:none;' cols='30' rows='1' placeholder='" . $dados['obs_devolucao'] . "' disabled/></textarea>";
							
					echo "</div>";

					echo "</div>";
					echo "</td>";
					}
					?>
					</tr>
					<?php } ?>

			</table>
				<div class="col-md-7">
					<button class='btn btn-secondary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>
					<a class='btn btn-primary pull-right h2' href='menu.php'><b>MENU</b></a>
				</div>
	<hr>
<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] == 'A')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>
<?php
	include 'rodape.php';
?>

