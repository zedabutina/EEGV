<html>
<?php
   include "cabecalho.php"; 
   session_start();
?>

	</head>
<?php 
	include "boots.php"; 
?>

		<br/><br/>
<?php 
	include "conexao.php"; 
?>

	<body>
		<br>
		<h3 class="page-header">Grade Curricular</h3>
                <div id="main" class="container-fluid">
		<form method="POST" action="cadgrade.php" id="form" name="form" class="form-horizontal" onSubmit="javascript: return valida();">
                            
			<div class="form-group">
				<label for="atual" class="col-xs-1 control-label">Curso:</label>
				<div class="col-xs-3">
					<?php
						$sqlcurso= sprintf("SELECT * FROM curso"); 
						$resultadocurso = pg_query($con,$sqlcurso);							
						echo "<div class='col-xs-10'>";
						echo "<select class='form-control'  name='curso' id='curso' >";
						echo "<option  value=''>Selecione...</option>";
						while($dados = pg_fetch_array($resultadocurso)){
							echo "<option value='	" . $dados['numero'] ."'>" . $dados['nome'] . "</option>";
						}
						echo "</select>";
						echo "</div>";	
					?>
				
				</div>
				<label for="modulo" class="col-xs-1 control-label">Módulo:</label>
				<div class="col-xs-3">				
					<div class='col-xs-10'>
						<select class='form-control'  name='modulo' id='modulo' >
							<option value=''>Selecione...</option>
							<option value='I'>Primeiro</option>
							<option value='II'>Segundo</option>
							<option value='III'>Terceiro</option>
							<option value='IV'>Quarto</option>
							<option value='V'>Quinto</option>
							<option value='VI'>Sexto</option>
							<option value='VII'>Sétimo</option>
							<option value='VIII'>Oitavo</option>
							<option value='IX'>Nono</option>
							<option value='X'>Décimo</option>
						</select>
					</div>	
				</div>
			</div>
			<div class="form-group">
				<label for="disciplina" class="col-xs-1 control-label">Disciplina:</label>
				<div class="col-xs-3">
					<?php
						$sqldisc= sprintf("SELECT * FROM disciplina"); 
						$resultadodisc = pg_query($con,$sqldisc);							
						echo "<div class='col-xs-10'>";
						echo "<select class='form-control'  name='disciplina' id='disciplina' >";
						echo "<option  value=''>Selecione...</option>";
						while($dados1 = pg_fetch_array($resultadodisc)){
							echo "<option value='	" . $dados1['codigo'] ."'>" . $dados1['nome'] . "</option>";
						}
						echo "</select>";
						echo "</div>";	
					?>
				
				</div>
				<div class="col-md-4" align="right">
				<button type="submit" name="btn-add" class="btn btn-primary" value="">Adicionar</button>
				</div>
			</div>	
			
               
                </form>
			
			<div id="list" class="row">
			<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Disciplina</th>
							<th>Módulo</th>
							<th>Carga Horária</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sqlimp="select * from curso_disciplina c INNER JOIN disciplina d ON c.codigo = d.codigo order by numero";
							$contador = pg_query($con,$sqlimp);
							while($dados2 = pg_fetch_array($contador)){
								echo "<tr>";
								echo "<td><b>" . $dados2['nome'] . "</b></td>";
								echo "<td>" . $dados2['modulo'] . "</td>";
								echo "<td>" . $dados2['ch'] . "</td>";
								/*
								$visualizar=sprintf("SELECT nome FROM professor WHERE matricula = '%s'",$dados['matricula']);
								$sqlvisualizar=pg_fetch_array(pg_query($con,$visualizar));
								echo "<td>" . $sqlvisualizar['nome'] . "</td>";
								echo "<form method='POST' action='editarCurso.php'><input type='hidden' name='edit' value='". $dados['numero'] . "'>";						
								echo "<td class='actions'><button class='btn btn-link btn-xs' type='submit'><img src='images/editar.png' width='24' height='24'></button>";
								echo "</form>";
								echo "<form method='POST' action='excluirCurso.php'><input type='hidden' name='num' value='". $dados['numero'] . "'><input type='hidden' name='id' value='9rj9!@#@!329vjy@#$#%#ngv2'>";								
								echo "<button class='btn btn-link btn-xs' type='submit'><img src='images/excluir.png' width='24' height='24'></button>";			
								echo "</form></td>";
								*/
								echo "</tr>";
							}
							pg_close($con);
						?>
						
					</tbody>
			
				</table>
			<script src="js/jquery.min.js"></script>
			<script src="js/bootstrap.min.js"></script>
            </body>

</html>
