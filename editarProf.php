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

				<?php
					$idp=$_POST['edit'];
					$sql="SELECT * FROM professor WHERE matricula = ". $idp;
					$contador = pg_query($con,$sql);
						while($dados = pg_fetch_array($contador)){
							echo "<form method='POST' action='setProf.php'>";
							$sqlconsulta = sprintf("SELECT c.nome FROM curso c INNER JOIN professor p ON p.matricula = c.matricula WHERE p.matricula = '%s'",$dados['matricula']);
							$consulta = pg_query($con,$sqlconsulta);
							$result = pg_num_rows($consulta);
							echo "<b>Preencha os campos e selecione salvar para efetuar as alterações.</b>";
							echo "<th>Matrícula</th>";
							echo "<th>Professor</th>";
							echo "<th>CEP</th>";
							echo "<th>Logradouro</th>";
							echo "<tr>";

							if($result==0){
			      				echo "<td><input type='number' name='matricula' id='matricula' style='width: 5em;' value='". $dados['matricula'] ."' /></td>";

							}elseif($result>0){
			      				echo "<td><input type='number' name='matricula' id='matricula' style='width: 5em;' value='". $dados['matricula'] ."' disabled/></td>";
								echo "<input type='hidden' name='matricula' id='matricula' value='". $dados['matricula'] ."' />";
							}

							echo "<input type='hidden' name='ant' id='ant' value='". $dados['matricula'] ."' />";
							echo "<td><input type='text' name='nome' id='nome' size='31' value='". $dados['nome'] ."' /></td>";
							echo "<td><input type='text' name='cep' id='cep' size='10' maxlength='9' onBlur='buscarDadosCEP()' value='". $dados['cep'] ."' /><label id='splash'>Aguarde...</label></td>";
							echo "<td><input type='text' name='logradouro' id='logradouro' size='35' value='". $dados['logradouro'] ."' /></td>";

							echo "<tr>";
							echo "<th>Número</th>";
							echo "<th>Complemento</th>";
							echo "<th>Bairro</th>";
							echo "<th></th>";
							echo "<tr>";

							echo "<td><input type='text' name='numero' id='numero' size='7' value='". $dados['numero'] ."' /></td>";
							echo "<td><input type='text' name='complemento' id='complemento' size='31' value='". $dados['complemento'] ."' /></td>";
							echo "<td><input type='text' name='bairro' id='bairro' size='25' value='". $dados['bairro'] ."' /></td>";
							echo "<th></th>";

							echo "<tr>";
							echo "<th>Cidade</th>";
							echo "<th>Estado</th>";
							echo "<th>Usuário</th>";
							echo "<th></th>";
							echo "<tr>";

							echo "<td><input type='text' name='cidade2' id='cidade2' size='20' value='". $dados['cidade'] ."' disabled/></td>";
							echo "<input type='hidden' name='cidade' id='cidade' value='". $dados['cidade'] ."' />";
							echo "<td><input type='text' name='uf2' id='uf2' size='2' maxlength='2' value='". $dados['uf'] ."' disabled/></td>";
							echo "<input type='hidden' name='uf' id='uf' maxlength='2' value='". $dados['uf'] ."' />";
							echo "<td>";

							$view=sprintf("SELECT id, apelido FROM usuario WHERE id='%s'",$dados['id']);
							$sqlview=pg_query($con,$view);
							$viewsql=pg_fetch_array($sqlview);
							$dadosselect = $dados['id'];
							$dadosselect2 = $viewsql['apelido'];
								$visualizar=sprintf("SELECT id, apelido FROM usuario WHERE nivel IN ('P', 'C') ORDER BY apelido");
								$sqlvisualizar=pg_query($con,$visualizar);
								echo "<select name='id' id='id'>";
								while($dadosc = pg_fetch_array($sqlvisualizar)){
									if($dadosc['id'] == $dadosselect){
										echo "<option selected value='" . $dadosselect . "'>" . $dadosselect2 . "</option>";
									}else{
										echo "<option value='" . $dadosc['id'] . "'>" . $dadosc['apelido'] . "</option>";
									}
								}

								echo "</select>";
							echo "</td>";
							echo "<th></th>";
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
		<script src="js/consultaCEP.js"></script>
				</div>
				</div>
	     		</div>
<?php
include 'rodape.php';
?>
