<?php
	include "cabecalho.php";
?>
	</head>
	<?php include "boots.php"; ?>

	<br/><br/>
	<?php include "conexao.php"; ?>
	<body>

			<div id="main" class="container-fluid">
				<h3 class="page-header">Cadastro de Curso</h3>
				<?php
							$numero = $_POST['numero'];
							$nome= $_POST['nome'];
							$sigla= $_POST['sigla'];
							$tipo= $_POST['tipo'];
							$coordenador= $_POST['coordenador'];
							$sql=sprintf("SELECT * FROM curso WHERE numero = %s",$numero);
							$valid=pg_query($con,$sql);
							if (pg_num_rows($valid)>0){
								echo "<div align='left' class='col-md-7'>";
								echo "<b>ERRO!Número de curso já cadastrado</b>";
								echo "<button class='btn btn-primary' onClick='window.history.go(-1)'>Voltar</button>";
								echo "</div>";
							}elseif($valid!=''){
								if($coordenador==''){
									$sqlvalida = sprintf("INSERT INTO curso(numero,nome,sigla,tipo) VALUES ('%s','%s','%s','%s') ", $numero,$nome,$sigla,$tipo);
								}else{
									$sqlvalida = sprintf("INSERT INTO curso VALUES ('%s','%s','%s','%s','%s') ", $numero,$nome,$sigla,$tipo,$coordenador);	
								}
								$result=pg_query($con,$sqlvalida);
								echo "<b>Curso cadastrado com sucesso</b>";
							}
	
				?>
			<div id="main" class="row">
				<div class="col-md-7">
					<a href="incluirCurso.php" class="btn btn-primary pull-right h2">Cadastrar novo curso</a>
					<a href="alterarCurso.php" class="btn btn-secundary pull-right h2"><b>Listar Cursos</b></a>
				</div>

	     		</div>
	     		
<?php	 
	include "rodape.php";
?>

