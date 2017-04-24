<?php
	include "cabecalho.php";
	session_start();
?>
		<script type="text/javascript">
			function valida(){
				if(document.getElementById('numero').value == ''){
					alert("Digite o número do curso");
					document.getElementById('curso').focus();
					return false;
				}
				if(document.getElementById('nome').value == ''){
					alert("Digite o nome do curso");
					document.getElementById('nome').focus();
					return false;
				}
				if(document.getElementById('sigla').value == ''){
					alert("Digite a sigla do curso");
					document.getElementById('sigla').focus();
					return false;
				}
				if(document.getElementById('tipo').value == ''){
					alert("Digite qual o tipo de curso");
					document.getElementById('tipo').focus();
					return false;
				}
				if(document.getElementById('numero').value <= 0){
					alert("O número do curso deve ser um inteiro maior que zero");
					document.getElementById('curso').focus();
					return false;
				}
			}
		</script>
		<style>
			strong {color:red;};
		</style>

	</head>
	<?php include "boots.php"; ?>

	<br/><br/>
<?php include "conexao.php"; ?>
	<body>

		<br/>
		
<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>
		<form method="POST" action="cadCurso.php" onSubmit="javascript: return valida();">
			<div id="main" class="container-fluid">
				<h3 class="page-header">Cadastro de Curso</h3>
				<div class="col-md-7">
					<div align="left" class="loginform">
						<div class="form-input">
							<label for="numero">
			      				Número<strong>*</strong>: <input type="number" name="numero" id="numero" size="" value="" />
							</label>
		    				</div>
						<br/>
			    			<div class="form-input">
							<label for="nome">
			      				Nome<strong>*</strong>: <input type="text" name="nome" id="nome" size="40" value="" />
							</label>
		    				</div>
						<br>
		    				<div class="form-input">
							<label for="sigla">
		      					Sigla<strong>*</strong>: <input type="text" name="sigla" id="sigla" size="5" value=""  />	
		      					</label>
		    				</div>
						<br>
						<div class="form-input">
							<label for="tipo">
		      					Tipo<strong>*</strong>: <input type="radio" name="tipo" id="tipo" size="" value="T"  /> Tecnologo
								<input type="radio" name="tipo" id="tipo" size="" value="B"  /> Bacharel
								<input type="radio" name="tipo" id="tipo" size="" value="L"  /> Licenciatura	
		      					</label>
		    				</div>
						<br>
						<div class="selectpicker">
							<label for="coordenador">
		      						Coordenador do Curso: 
								<?php
									$sqlcoordenador= sprintf("SELECT matricula,nome FROM professor p INNER JOIN usuario u on u.id=p.id  WHERE u.nivel = 'C' order by nome"); 
									$sqlresultado = pg_query($con,$sqlcoordenador);							
								
									echo "<select class='selectpicker' name='coordenador'>";
									echo "<option selected='selected'>Selecione...</option>";
									while($dados = pg_fetch_array($sqlresultado)){
										echo "<option value='" . $dados['matricula'] ."'>" . $dados['nome'] . "</option>";
									}
									echo "</select>";	
								?>
	
		      					</label>
		    				</div>
						<br>
						
		  			</div>
						<b> Todos os campos com asterisco(*) deveram ser preenchidos</b>
					<hr/>
				</div>

			</div>	
				<div id="main" class="row">
					<div class="col-md-1">
						<button class="btn btn-link" onClick='window.history.go(-1)'><b>Voltar</b></button>
					</div>
					<div class="col-md-7">
						<a href="menu.php" class="btn btn-secundary pull-right h2"><b>Menu</b></a>
						<button type="submit" class="btn btn-primary pull-right h2">Salvar</button>
					</div>

		     		</div>
	 	</form>
	     		<hr />
	     		
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
	<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'A' || $_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>
	</body>
</html>
