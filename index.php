<?php include "cabecalho.php"; ?>
		<script type="text/javascript">

		</script>
		<style>
			strong {color:red;};
		</style>

	</head>
<?php include "boots.php"; ?>

	<br/><br/>
<?php include "conexao.php"; ?>
	<body>

		<div id="main" class="container-fluid">
			<form method="POST" action="logar.php">
					<div align="center">
					<img src="images/logo.jpg" width='600' height='420'>
					</div>
					<div class="col-md-7">
						<div align="right" class="loginform">
				    			<div class="form-input">
								<label for="login">
				      				Login: <input type="text" name="login" id="login" size="15" value="" />
								</label>
			    				</div>
			    				<div class="form-input">
								<label for="password">
			      					Password: <input type="password" name="password" id="password" size="15" value=""  />	
			      					</label>
			    				</div>
			  			</div>
					</div>

					
					<div id="main" class="row">
						<div class="col-md-7">
							<button type="submit" class="btn btn-primary pull-right h2">Login</button>
							<a class='btn btn-secundary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></a>
						</div>
					</div>

			</form>
		 </div>
	<hr />
<?php include "rodape.php"; ?>
