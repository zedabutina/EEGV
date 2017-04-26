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
				<h3 class="page-header">Editar Usuário</h3>
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
	
					
						<?php
							$idp=$_POST['edit'];
							$sql=sprintf("SELECT * FROM usuario WHERE login = '%s' ",$idp);
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){
								echo "<tr>";
								echo "<form method='POST' action='setUsers.php'>";
                            	echo "<tr>";
								echo "<th>Login</th>";
								echo "<th></th>";
								echo "</tr>";                                                    
			      				echo "<td><input type='text' name='login' id='login' value='". $dados['login'] ."' /></td>";
								echo "<input type='hidden' name='ant' id='ant' value='". $dados['id'] ."' />";
                            	echo "<tr>";
								echo "<th>Apelido</th>";
								echo "<th></th>";
								echo "</tr>";                              
								echo "<td><input type='text' name='apelido' id='apelido' size='10' value='". $dados['apelido'] ."' /></td>";
								echo "</tr>";
								echo "<tr>";
								echo "<th>Sexo</th>";
                            	echo "<th></th>";
								echo "</tr>";                             
								if($dados['sexo'] == 'M'){
									echo "<td><input type='radio' name='sexo' id='sexo' value='M' checked/> Masculino";
									echo "<input type='radio' name='sexo' id='sexo' value='F'/> Feminino</td>";
								}elseif($dados['sexo']=='F'){
									echo "<td><input type='radio' name='sexo' id='sexo' value='M' /> Masculino";
									echo "<input type='radio' name='sexo' id='sexo' value='F' checked/> Feminino</td>";
								}
								echo "<tr>";
								echo "<th>Nível</th>";
                            	echo "<th></th>";
								echo "</tr>";                              
								if($dados['nivel'] == 'P'){
									echo "<td><input type='radio' name='nivel' id='nivel' value='P' checked/> Professor";
									echo "<input type='radio' name='nivel' id='nivel' value='C' /> Coordenador";
									echo "<input type='radio' name='nivel' id='nivel' value='A' /> Auxiliador</td>";
								}elseif($dados['nivel']=='C'){
									echo "<td><input type='radio' name='nivel' id='nivel' value='P'/> Professor";
									echo "<input type='radio' name='nivel' id='nivel' value='C' checked/> Coordenador";
									echo "<input type='radio' name='nivel' id='nivel' value='A' /> Auxiliador</td>";
								}elseif($dados['nivel']=='A'){
									echo "<td><input type='radio' name='nivel' id='nivel' value='P'/> Professor";
									echo "<input type='radio' name='nivel' id='nivel' value='C'/> Coordenador";
									echo "<input type='radio' name='nivel' id='nivel' value='A' checked/> Auxiliador</td>";
								}
								echo "</tr>";
								
							}
						?>
					
						
				</table>
					<div class="col-md-7">
						<a href="alterarUsers.php" class="btn btn-secundary pull-right h2"><b>Cancelar</b></a>
						<button type="submit" class="btn btn-primary pull-right h2">Salvar</button>
					</div>
					</form>
				</div>
				</div>
	     		</div>
<?php	 
	include "rodape.php";
?>