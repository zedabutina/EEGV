<?php
	include "cabecalho.php";
	session_start();
?>
	</head>
	<?php include "boots.php"; ?>

	<br/><br/>
	<?php include "conexao.php"; ?>
	<body>
<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>
		<div id="list" class="row">
	     			<div id="main" class="container-fluid">
				<h3 class="page-header">Editar Curso</h3>
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					

						<?php
							$id=$_POST['edit'];
							$sql="select * from curso where numero = ". $id;
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){
								echo "<form method='POST' action='setCurso.php'>";
								echo "<tr>";
								echo "<th>Número</th>";
								echo "<th></th>";
								echo "</tr>";
			      					echo "<td><input type='number' name='numero' id='numero' value='". $dados['numero'] ."' /></td>";
								echo "</tr>";
								echo "<input type='hidden' name='ant' id='ant' value='". $dados['numero'] ."' />";
								echo "<tr>";
								echo "<th>Nome</th>";
								echo "<th>Sigla</th>";
								echo "</tr>";
								echo "<td><input type='text' name='nome' id='nome' size='40' value='". $dados['nome'] ."' /></td>";
								echo "<td><input type='text' name='sigla' id='sigla' size='5' value='". $dados['sigla'] ."' /></td>";
								echo "</tr>";
								echo "<tr>";
								echo "<th>Tipo</th>";
								echo "<th>Coordenador</th>";
								echo "</tr>";									
								if($dados['tipo'] == 'T'){
									echo "<td><input type='radio' name='tipo' id='tipo' value='T' checked/> Tecnologo";
									echo "<input type='radio' name='tipo' id='tipo' value='B'/> Bacharel";
									echo "<input type='radio' name='tipo' id='tipo'  value='L'/> Licenciatura</td>";
								}elseif($dados['tipo']=='B'){
									echo "<td><input type='radio' name='tipo' id='tipo' value='T' /> Tecnologo";
									echo "<input type='radio' name='tipo' id='tipo' value='B' checked/> Bacharel";
									echo "<input type='radio' name='tipo' id='tipo'  value='L'/> Licenciatura</td>";
								}elseif($dados['tipo']=='L'){
									echo "<td><input type='radio' name='tipo' id='tipo' value='T'/> Tecnologo";
									echo "<input type='radio' name='tipo' id='tipo' value='B'/> Bacharel";
									echo "<input type='radio' name='tipo' id='tipo'  value='L' checked/> Licenciatura</td>";
								}
								$visualizar=sprintf("SELECT matricula,nome FROM professor p INNER JOIN usuario u on u.id=p.id  WHERE u.nivel = 'C' order by nome");
								$sqlvisualizar=pg_query($con,$visualizar);
								$view=sprintf("SELECT matricula,nome FROM professor WHERE matricula='%s'",$dados['matricula']);
								$sqlview=pg_query($con,$view);
								$viewsql=pg_fetch_array($sqlview);
								echo "<td><select class='selectpicker' name='coordenador'>";					
								echo "<option selected='selected' value='" . $viewsql['matricula'] . "'>" . $viewsql['nome'] . "</option>";
								while($dadosc = pg_fetch_array($sqlvisualizar)){
										echo "<option value='" . $dadosc['matricula'] ."'>" . $dadosc['nome'] . "</option>";
									}
								echo "</select>";
								echo "</td>";
								echo "</tr>";
								
							}
						?>
						
					
						
				</table>
					<div class="col-md-7">
						<a href="alterarCurso.php" class="btn btn-secundary pull-right h2"><b>Cancelar</b></a>
						<button type="submit" class="btn btn-primary pull-right h2">Salvar</button>
					</div>
					</form>
				</div>
				</div>
	     		</div>
<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'A' || $_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>
<?php	 
	include "rodape.php";
?>
