<?php
	include "cabecalho.php";
?>

	</head>

	<body>

		</br></br>
<?php
	include "boots.php";
	include "conexao.php";
	
	if(isset($_SESSION['login']) && isset($_SESSION['nivel'])){
?>		
		<div id="main" class="container-fluid">
			<h3 class="page-header">Iniciar Planejamento</h3>
			<?php
				$login=$_SESSION['login'];
				$apelido=$_SESSION['apelido'];
				$nivel=$_SESSION['nivel'];
				$dataatual = date('Y');
				$sql=sprintf("SELECT * FROM usuario WHERE login='%s' and apelido='%s' and nivel='%s'",$login,$apelido,$nivel);
				$result=pg_query($con,$sql);
				if(pg_num_rows($result)==0){
					echo "<script>alert('Você deve estar logado!'); window.location.href='index.php'</script>";
				}if(pg_num_rows($result)>0){
					?>
						<form method="POST" action="validaPlanejamento.php" id="form" name="form" class="form-horizontal" onSubmit="javascript: return valida();">		<input type='hidden' name='dataAtual' id='dataAtual' value="<?php echo $dataatual;?>">
							<input type='hidden' name='situacao' value='E'>	
							<div class="form-group">
								<label for="ano" class="col-xs-5 control-label">Ano:</label>
								<div class="col-xs-2">
					      				<input min="1" type="number" name="ano" id="ano" class="form-control"  placeHolder="Digite o Ano"/>
								</div>
							</div>	
							<div class="form-group">
							<label for="semestre" class="col-xs-5 control-label">
		      						Semestre: 
							</label>
							<div class='radio-inline'>
							<label for="primeiro" class="col-xs-5 control-label">
		      						<input type="radio" name="semestre" id="primeiro"  value="1"/> Primeiro						</label>
							</div>
							<div class='radio-inline'>
							<label for="segundo" class="col-xs-5 control-label">
								<input type="radio" name="semestre" id="segundo"  value="2"  /> Segundo
							</label>
							</div>	
		      					
		    				</div>

							<div class="form-group">
								<label for="nova" class="col-xs-5 control-label">Data de ínicio:</label>
								<div class="col-xs-3">
					      				<input type="date" name="dtinicio" id="dtinicio" class="form-control"  placeHolder="DD/MM/YYY"/>
								</div>
							</div>
							
							<div class="form-group">
								<label for="atual" class="col-xs-5 control-label">Cursos:</label>
								<div class="col-xs-3">
					      				<?php
								$visualizar=sprintf("SELECT numero,nome FROM curso  order by nome");
								$sqlvisualizar=pg_query($con,$visualizar);
								echo "<select multiple size='4' name='curso[]	' id='curso'>";
								while($dadosc = pg_fetch_array($sqlvisualizar)){
										
										echo "<option value='" . $dadosc['numero'] ."'>" . $dadosc['nome'] . "</option>";
									}
								echo "</select>";
								echo "</td>";
								echo "</tr>";
									?>
								</br>
								<b>Manteha pressionada a tecla Ctrl para selecionar mais de um curso.</b>
								</div>
							</div>

							<div class="col-md-7">
								<a href="menu.php" class="btn btn-secundary pull-right h2"><b>Menu</b></a>
								<button type="submit" class="btn btn-primary pull-right h2">Gravar</button>
							</div>
						</form>


						<script>
							function valida(){
								var ano = $("#ano").val();
								
								var dtinicio = $("#dtinicio").val();
								var dtfinal = $("#dtfinal").val();
								var curso = $("#curso").val();								
								var dataAtual = $("#dataAtual").val();
								if(ano == ''){
									alert("Digite o ano");
									document.getElementById('ano').focus();
									return false;
								}
								if(ano < dataAtual){
									alert("Ano deve ser maior que o atual");
									document.getElementById('ano').focus();
									return false;
								}
								if((form.semestre[0].checked == false)&&(form.semestre[1].checked == false)){
									alert("Selecione um semestre");
									form.semestre[0].focus();
									return false;
								}
								if(dtinicio==''){
									alert("Digite a data inicial");
									document.getElementById('dtinicio').focus();
									return false;
								}
								/*if (dtfinal==''){
									alert("Digite a data final");
									document.getElementById('dtfinal').focus();
									return false;
								}*/
								if (curso==''){
									alert("Selecione um curso");
									document.getElementById('curso').focus();
									return false;
								}
								return true;
							}
						</script>
					<?php
				}
			?>
			</div>
			
<?php
	}else{
		echo "<script>alert('Você deve estar logado!'); window.location.href='index.php'</script>";		
	}
	include "rodape.php";
?>

