<?php
	include "cabecalho.php";
?>
	</head>
	
	<body>
<?php 
	include "boots.php"; 
?>
	</br></br>
<?php 
	include "conexao.php"; 
?>	
	<h3 class="page-header">Cadastro de Curso</h3>
	<form class="form-horizontal" method="POST" action="cadCurso.php" onSubmit="javascript: return valida();" id="form">
		<div class="form-group">
			<label class="col-xs-3 control-label">Username</label>
			<div class="col-xs-5">
				<input type="text" class="form-control" name="username" />
			</div>
		</div>

		<div class="form-group">
			<label class="col-xs-3 control-label">Password</label>
			<div class="col-xs-5">
				<input type="password" class="form-control" name="password" />
			</div>
		</div>

		<div class="form-group">
			<div class="col-xs-9 col-xs-offset-3">
				<button type="submit" class="btn btn-primary">Sign in</button>
			</div>
		</div>
	</form>




<?php	 
	include "rodape.php";
?>
