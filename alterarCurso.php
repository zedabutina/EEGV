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
				
				<h3 class="page-header">Cursos</h3>
				<div align="right" class="col-md-11">
					<a href="incluirCurso.php" class="btn btn-primary pull-right h2">Novo Curso</a>
				</div>
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Número</th>
							<th>Nome</th>
							<th>Sigla</th>
							<th>Tipo</th>
							<th>Coordenador</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="select * from curso order by numero";
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){
								echo "<tr>";
								echo "<td><b>" . $dados['numero'] . "</b></td>";
								echo "<td>" . $dados['nome'] . "</td>";
								echo "<td>" . $dados['sigla'] . "</td>";
								echo "<td>" . $dados['tipo'] . "</td>";
								$visualizar=sprintf("SELECT nome FROM professor WHERE matricula = '%s'",$dados['matricula']);
								$sqlvisualizar=pg_fetch_array(pg_query($con,$visualizar));
								echo "<td>" . $sqlvisualizar['nome'] . "</td>";
								echo "<form method='POST' action='editarCurso.php'><input type='hidden' name='edit' value='". $dados['numero'] . "'>";						
								echo "<td class='actions'><button class='btn btn-link btn-xs' type='submit'><img src='images/editar.png' width='24' height='24'></button>";
								echo "</form>";
								echo "<form method='POST' action='excluirCurso.php'><input type='hidden' name='num' value='". $dados['numero'] . "'><input type='hidden' name='id' value='9rj9!@#@!329vjy@#$#%#ngv2'>";								
								echo "<button class='btn btn-link btn-xs' type='submit'><img src='images/excluirCurso.png' width='24' height='24'></button>";			
								echo "</form></td>";
								echo "</tr>";
							}
							pg_close($con);
						?>
						
					</tbody>
			
				</table>
					<div align="right" class="col-md-11">
						<?php echo "<tr><a href='incluirCurso.php'><img src='images/adcionar.png' width='48' height='48'></a></tr>"; ?>
						
					</div>
					<div align="left" class="col-md-1">
						<?php echo "<a href='menu.php' class='btn btn-secundary pull-right h2' ><b>MENU</b></a>"; ?>		</div>
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
