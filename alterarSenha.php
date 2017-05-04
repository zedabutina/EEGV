<?php
	include "cabecalho.php";
?>
	</head>

	<body>

		</br></br>
<?php
	include "boots.php";
	include "conexao.php";
?>		
		<div id="main" class="container-fluid">
			<h3 class="page-header">Alterar senha</h3>
			<?php
				$login=$_SESSION['login'];
				$apelido=$_SESSION['apelido'];
				$nivel=$_SESSION['nivel'];
				
				$sql=sprintf("SELECT * FROM usuario WHERE login='%s' and apelido='%s' and nivel='%s'",$login,$apelido,$nivel);
				$result=pg_query($con,$sql);
				if(pg_num_rows($result)==0){
					echo "<script>alert('Você deve estar logado!'); window.location.href='login.php'</script>";
				}if(pg_num_rows($result)>0){
					?>
						<form method="POST" action="#" onSubmit="javascript: return valida();" id="form" name="form" class="form-horizontal">
							<div class="form-group">
								<label for="atual" class="col-xs-5 control-label">Senha Atual:</label>
								<div class="col-xs-3">
					      				<input min="1" type="password" name="atual" id="atual" class="form-control"  placeHolder="Digite a senha atual"/>
								</div>
							</div>
							<div class="form-group">
								<label for="senha" class="col-xs-5 control-label">Nova Senha:</label>
								<div class="col-xs-3">
					      				<input min="1" type="password" name="senha" id="senha" class="form-control"  placeHolder="Digite a nova senha "/>
								</div>
							</div>	
							<div class="form-group">
								<label for="nova" class="col-xs-5 control-label">Confirme a Nova Senha:</label>
								<div class="col-xs-3">
					      				<input min="1" type="password" name="nova" id="nova" class="form-control"  placeHolder="Digite a nova senha Novamente"/>
								</div>
							</div>


							<div class="col-md-7">
								<a href="menu.php" class="btn btn-secundary pull-right h2"><b>Menu</b></a>
								<button type="submit" class="btn btn-primary pull-right h2">Salvar</button>
							</div>
						</form>


						<script>
							function valida(){
								var atual = $("#atual").val();
								var senha = $("#senha").val();
								var nova = $("#nova").val();
							
								if(atual==''){
									alert("Digite a Senha Atual!");
									document.getElementById('atual').focus();
									return false;
								}
								if(senha==''){
									alert("Digite a Nova Senha!");
									document.getElementById('senha').focus();
									return false;
								}
								if(nova==''){
									alert("Digite a Nova Senha Novamente!");
									document.getElementById('nova').focus();
									return false;
								}
								if (senha!=nova){
									alert("Nova senha não confere.Digite novamente!");
									document.getElementById('atual').focus();
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
	include "rodape.php";
?>

