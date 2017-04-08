<?php
	include "cabecalho.php";
?>
	</head>
	<?php include "boots.php"; ?>

	<br/><br/>
	<?php include "conexao.php"; ?>
	<body>
		<div id="list" class="row">
	     			
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
							$sql="select * from curso";
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){
								echo "<tr>";
								echo "<td><b>" . $dados['numero'] . "</b></td>";
								echo "<td>" . $dados['nome'] . "</td>";
								echo "<td>" . $dados['sigla'] . "</td>";
								echo "<td>" . $dados['tipo'] . "</td>";
								echo "<td>" . $dados['matricula'] . "</td>";
								echo "<form method='POST' action='editarCurso.php'><input type='hidden' name='edit' value='". $dados['numero'] . "'>";							
								echo "<td><button class='btn btn-warning btn-xs' type='submit'>Editar</button>";
								echo "</form>";								
								echo "<a class='btn btn-danger btn-xs' href='#' data-toggle='modal' data-target='#delete-modal'>Excluir</a></td>";
								echo "</tr>";
							}
						?>
						
					</tbody>
						
				</table>

				</div>
	     		</div>
<?php	 
	include "rodape.php";
?>
