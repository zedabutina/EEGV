<!-- viNi++ -->

<?php include "boots.php"; ?>

<?php include "cabecalho.php";
		session_start(); ?>
	</head>

<?php include "conexao.php"; ?>
	<body>

	</head>

	<br/>
	
	<body>
		<div id="list" class="row">
	     			<div id="main" class="container-fluid">
				
				<h3 class="page-header">Disciplinas</h3>

				<script>
					function confirmar(codigo){ 
					if (window.confirm ("Deseja realmente excluir? ")){

						var data = {'cod_disc' : codigo};

						$.ajax({
				    		url: 'excluirDisc.php',
				    		type: "POST",
				    		data: data,
				    		dataType : 'text',
				    		success: function(data) {window.location.reload(); $("#msgSuccess").show();},
				    		error: function(jqXHR, textStatus, ex) {alert('Erro ao deletar!'); $("#msgErro").show();}
							});

					}	else { 
						return False; 
					} 
				}
				</script>

				<?php

					if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
						echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
						echo "<div class='container' >";
						echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
						echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){

			?>

				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Código</th>
							<th>Nome</th>
							<th>Carga Horária</th>
							<th>Ementa</th>
							<th>Objetivo</th>
							<th>Bibliografia Básica</th>
							<th>Bibliografia Complementar</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql="select * from disciplina order by codigo";
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){

								echo "<tr>";
								echo "<td><b>" . $dados['codigo'] 	. "</b></td>";
								echo "<td>"    . $dados['nome']  	. "</td>";
								echo "<td>"    . $dados['ch'] 		. "</td>";
								echo "<td>"    . $dados['ementa'] 	. "</td>";
								echo "<td>"    . $dados['objetivo'] . "</td>";
								echo "<td>"    . $dados['bibliografia_basica'] 		  . "</td>";
								echo "<td>"    . $dados['bibliografia_complementar']  . "</td>";

								//echo "<td><a href='/editarDisc.php?codigo=" . $dados['codigo'] . "' class='btn btn-warning btn-xs'>editar</a>";
								echo "<form method='POST' action='editarDisc.php'><input type='hidden' width='0' name='cod_disc' value='".$dados['codigo']."'>";
								echo "<input type='hidden' name='cod_disc' value='"	. $dados['codigo'] . "'><input type='hidden' name='codigo'>";		
								echo "<td><button class='btn btn-warning btn-xs' type='submit'>Editar</button>";
								echo "</form>";
								echo "<button class='btn btn-danger btn-xs' onClick='confirmar(" . $dados['codigo'] . ")' type='submit'>Excluir</button>";			
								echo "</tr>";

								
							}
							pg_close($con);
						?>
						
					</tbody>
			
				</table>

				<div class="alert alert-success" id="msgSuccess" style="display:none" role="alert">
  								Disciplina excluida com sucesso! .
				</div>

				<div class="alert alert-success" id="discEditSuccess" style="display:none" role="alert">
  								Editado com sucesso! .
				</div>

				<div class="alert alert-danger" id="msgErro" style="display:none" role="alert">
  					Erro ao excluir disciplina.
				</div>

					<div align="right" class="col-md-11">
						<?php echo "<a href='formDisc.php' class='btn btn-primary'>Cadastrar disciplina</a>"; ?>
						
					</div>
					<div align="left" class="col-md-1">
						<?php echo "<a href='alterarDisc.php' class='btn btn-primary' onClick='window.history.go(-1)'>Voltar</a>"; ?></div>
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

