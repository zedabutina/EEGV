<?php
	include "cabecalho.php";
	session_start();
?>

<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>
		<script type="text/javascript">
			
				$(document).ready(function(){
				$("#numero").blur(function(){
				var numero = $("#numero").val();
			
			$.ajax({  
	 	 		
	 	 		   url: "/EEGV/validaCurso.php", 
				   dataType: 'html',
				   data: {numero:numero},
				   type: "POST", 
				   
				    beforeSend: function ()   { 
				    	$('#carregando').show();
				    },
				    success: function(data){
				    	$('#carregando').hide();
						$("#resBusca").html(data);
						

				    },
					error: function(data){
						$('#carregando').html(data);
					}

						  	
			        
				});
	 	 	});
	 	});

			


			function valida(){
				var numero = $("#numero").val();
				
				if(numero == ''){
					alert("Digite o número do curso");
					document.getElementById('numero').focus();
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
				if((form.tipo[0].checked == false)&&(form.tipo[1].checked == false)&&(form.tipo[2].checked == false)){
					alert('Informe o Tipo do Usuário.');
    					form.tipo[0].focus();
    					return false;
				}
				if(document.getElementById('coordenador').selectedIndex == false || document.getElementById('coordenador').value == "Selecione..."){
					alert("Defina o coordenador do Curso!");
					document.getElementById('coordenador').focus();
					return false;
				}
				return true;
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
		
	
		<h3 class="page-header">Cadastro de Curso</h3>
		<form method="POST" action="cadCurso.php" onSubmit="javascript: return valida();" id="form" name="form" class="form-horizontal">
			<div id="main" class="container-fluid">
				
				
						<div class="form-group">
							<label for="numero" class="col-xs-1 control-label">Número<strong>*</strong>:</label>
							<div class="col-xs-2">
				      				<input min="1" type="number" name="numero" id="numero" size="" class="form-control"  placeHolder="Digite o número do curso" data-error="Você deve inserir um número!" required/>
								<div id="carregando" style="display:none;">Carregando...</div>
								<div id="resBusca"></div>
							</div>
							
							
		    				</div>
						<br/>
			    			<div class="form-group">
							<label for="nome" class="col-xs-1 control-label">Nome<strong>*</strong>:</label> 
							<div class="col-xs-5">
							<input type="text" name="nome" id="nome" size="" value="" class="form-control" 	 data-error="Você deve inserir um número!" required placeHolder="Digite o nome do curso"/>
							</div>
							
		    				</div>
						<br>
		    				<div class="form-group">
							<label for="sigla" class="col-xs-1 control-label">Sigla<strong>*</strong>:</label>
							<div class="col-xs-1">
 							<input type="text" name="sigla" id="sigla" size="" value="" class="form-control"  required placeHolder="Sigla"/>
							</div>	
		      					
		    				</div>
						<br>
						<div class="form-group">
							<label for="tipo" class="col-xs-1 control-label">
		      						Tipo<strong>*</strong>: 
							</label>
							<div class='radio-inline'>
							<label for="tecnologo">
		      						<input type="radio" name="tipo" id="tipo"  value="T"/> Tecnologo						</label>
							</div>
							<div class='radio-inline'>
							<label for="bacharel">
								<input type="radio" name="tipo" id="tipo"  value="B"  /> Bacharel
							</label>
							</div>
							<div class='radio-inline'>
							<label for="licenciatura">
								<input type="radio" name="tipo" id="tipo"  value="L"  /> Licenciatura
							</label>
							</div>	
		      					
		    				</div>
					
						<br>
						<div class="form-group">
							<label for="coordenador" class="col-xs-1 control-label">
		      						Coordenador do Curso<strong>*</strong>: </label>
								<?php
									$sqlcoordenador= sprintf("SELECT matricula,nome FROM professor p INNER JOIN usuario u on u.id=p.id  WHERE u.nivel = 'C' order by nome"); 
									$sqlresultado = pg_query($con,$sqlcoordenador);							
									echo "<div class='col-xs-2'>";
									echo "<select class='form-control'  name='coordenador' id='coordenador' >";
									echo "<option  value=''>Selecione...</option>";
									while($dados = pg_fetch_array($sqlresultado)){
										echo "<option value='	" . $dados['matricula'] ."'>" . $dados['nome'] . "</option>";
									}
									echo "</select>";
									echo "</div>";	
								?>
	
		      					
		    				</div>
						<br>
						
		  			
						<b> Todos os campos com asterisco(*) deveram ser preenchidos</b>
					<hr/>
				

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
