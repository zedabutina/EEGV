<?php
include 'cabecalho.php';
include 'boots.php';
include 'conexao.php';
?>
	<div id="list" class="row">
		<div id="main" class="container-fluid">
			<h3 class="page-header">Editar Professor</h3>
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
					</tr>
				</thead>
			<tbody>

				<?php
					$idp=$_POST['edit'];
					$sql="SELECT * FROM professor WHERE matricula = ". $idp;
					$contador = pg_query($con,$sql);
						while($dados = pg_fetch_array($contador)){
							echo "<tr>";
							echo "<form method='POST' action='setProf.php'>";
		      				echo "<td><input type='number' name='matricula' id='matricula' value='". $dados['matricula'] ."' /></td>";
							echo "<input type='hidden' name='ant' id='ant' value='". $dados['matricula'] ."' />";
							echo "<td><input type='text' name='nome' id='nome' size='31' value='". $dados['nome'] ."' /></td>";
							echo "<td><input type='text' name='cep' id='cep' size='10' value='". $dados['cep'] ."' /></td>";
							echo "<td><input type='text' name='logradouro' id='logradouro' size='70' value='". $dados['logradouro'] ."' /></td>";					
							echo "<td><input type='text' name='numero' id='numero' size='4' value='". $dados['numero'] ."' /></td>";
							echo "<td><input type='text' name='complemento' id='complemento' size='50' value='". $dados['complemento'] ."' /></td>";
							echo "<td><input type='text' name='bairro' id='bairro' size='35' value='". $dados['bairro'] ."' /></td>";
							echo "<td><input type='text' name='cidade' id='cidade' size='25' value='". $dados['cidade'] ."' /></td>";
							echo "<td><input type='text' name='uf' id='uf' value='". $dados['uf'] ."' /></td>";
							echo "<td><input type='text' name='id' id='id' value='". $dados['id'] ."' /></td>";
							echo "</tr>";

						}
				?>

			</tbody>

			</table>
				<div class="col-md-7">
					<a href="alterarProf.php" class="btn btn-secundary pull-right h2"><b>Cancelar</b></a>
					<button type="submit" class="btn btn-primary pull-right h2">Salvar</button>
				</div>
				</form>
				</div>
				</div>
	     		</div>
<?php
include 'rodape.php';
?>
