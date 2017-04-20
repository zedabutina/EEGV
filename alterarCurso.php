<?php
	include "cabecalho.php";
?>
	</head>
	<?php include "boots.php"; ?>

	<br/><br/>
	<?php include "conexao.php"; ?>
	<body>
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
								echo "<td><button class='btn btn-warning btn-xs' type='submit'>Editar</button>";
								echo "</form>";
								echo "<form method='POST' action='excluirCurso.php'><input type='hidden' name='num' value='". $dados['numero'] . "'><input type='hidden' name='id' value='9rj9!@#@!329vjy@#$#%#ngv2'>";								
								echo "<button class='btn btn-danger btn-xs' type='submit'>Excluir</button>";			
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
						<?php echo "<a href='alterarCurso.php' class='btn btn-secundary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></a>"; ?>		</div>
				</div>
				</div>
	     		</div>
<?php	 
	include "rodape.php";
?>
