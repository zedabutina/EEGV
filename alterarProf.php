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
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>

<br><br>

<?php
include 'conexao.php';
?>
	<body>
		<div id="list" class="row">
	     			<div id="main" class="container-fluid">
				
				<h3 class="page-header">Professores</h3>
				<div align="right" class="col-md-11">
					<a href="formProf.php" class="btn btn-primary pull-right h2">Novo Professor</a>
				</div>
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
						<th>Matrícula</th>
						<th>Nome</th>
						<th>CEP</th>
						<th>Logradouro</th>
						<th>Número</th>
						<th>Complemento</th>
						<th>Bairro</th>
						<th>Cidade</th>
						<th>UF</th>
						<th>Usuário</th>
						<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="SELECT * FROM professor order by matricula";
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){
								echo "<tr>";
								echo "<td><b>" . $dados['matricula'] . "</b></td>";
								echo "<td>" . $dados['nome'] . "</td>";
								echo "<td>" . $dados['cep'] . "</td>";
								echo "<td>" . $dados['logradouro'] . "</td>";
								echo "<td>" . $dados['numero'] . "</td>";
								echo "<td>" . $dados['complemento'] . "</td>";
								echo "<td>" . $dados['bairro'] . "</td>";
								echo "<td>" . $dados['cidade'] . "</td>";
								echo "<td>" . $dados['uf'] . "</td>";
								$visualizar=sprintf("SELECT apelido FROM usuario WHERE id = '%s'",$dados['id']);
								$sqlvisualizar=pg_fetch_array(pg_query($con,$visualizar));
								echo "<td>" . $sqlvisualizar['apelido'] . "</td>";

								echo "<form method='POST' action='editarProf.php'>
								<input type='hidden' name='edit' value='". $dados['matricula'] . "'>";
						//		echo "<td><button class='btn btn-warning btn-xs' type='submit'>Editar</button>";
								echo "<td class='actions'><button class='btn btn-link btn-xs' type='submit'><img src='images/editar.png' width='24' height='24'></button>";
								echo "</form>";
								$sqlconsulta = sprintf("SELECT c.nome FROM curso c INNER JOIN professor p ON p.matricula = c.matricula WHERE p.matricula = '%s'",$dados['matricula']);
								$consulta = pg_query($con,$sqlconsulta);
								$result = pg_num_rows($consulta);
								if ($result==0){
									echo "<form method='POST' action='excluirProf.php'>
									<input type='hidden' name='num' value='". $dados['matricula'] . "'>
									<input type='hidden' name='idp' value='9rj9!@#@!329vjy@#$#%#ngv2'>";
						//			echo "<button class='btn btn-danger btn-xs' type='submit'>Excluir</button>";
									echo "<button class='btn btn-link btn-xs' type='submit'><img src='images/excluir.png' width='24' height='24'></button>";
									echo "</form>";
								}
								echo "</tr>";

							}
							pg_close($con);
						?>
						
					</tbody>
			
				</table>
					<div align="right" class="col-md-11">
						<?php echo "<tr><a href='formProf.php'><img src='images/adcionar.png' width='48' height='48'></a></tr>"; ?>
						
					</div>
					<div align="left" class="col-md-1">
						<?php echo "<a href='menu.php' class='btn btn-secundary pull-right h2'><b>Voltar</b></a>"; ?>
					</div>
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

