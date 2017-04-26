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
				
				<h3 class="page-header">Usuários</h3>
				<div align="right" class="col-md-11">
					<a href="formUsers.php" class="btn btn-primary pull-right h2">Novo Usuário</a>
				</div>
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Login</th>
							<th>Apelido</th>
							<th>Sexo</th>
							<th>Nível</th>
							<th>Ações</th>

						</tr>
					</thead>
					<tbody>
						<?php
							$sql="SELECT * FROM usuario order by apelido";
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){
								echo "<tr>";
								echo "<td><b>" . $dados['login'] . "</b></td>";
								echo "<td>" . $dados['apelido'] . "</td>";
								echo "<td>" . $dados['sexo'] . "</td>";
								echo "<td>" . $dados['nivel'] . "</td>";
								echo "<form method='POST' action='editarUsers.php'><input type='hidden' name='edit' value='". $dados['login'] . "'>";							
								echo "<td><button class='btn btn-warning btn-xs' type='submit'>Editar</button>";
								echo "</form>";
								echo "<form method='POST' action='excluirUsers.php'><input type='hidden' name='num' value='". $dados['login'] . "'><input type='hidden' name='idp' value='9rj9!@#@!329vjy@#$#%#ngv2'>";								
								echo "<button class='btn btn-danger btn-xs' type='submit'>Excluir</button>";			
								echo "</form></td>";
								echo "</tr>";
							}
							pg_close($con);
						?>
						
					</tbody>
			
				</table>
					<div align="right" class="col-md-11">
						<?php echo "<tr><a href='formUsers.php'><img src='images/adcionar.png' width='48' height='48'></a></tr>"; ?>
						
					</div>
					<div align="left" class="col-md-1">
						<?php echo "<a href='alterarUsers.php' class='btn btn-secundary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></a>"; ?>		</div>
				</div>
				</div>
	     		</div>
<?php	 
	include "rodape.php";
?>
