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
								echo "<b>ERRO!Número de curso ja cadastrado</b>";
							}else{
								if($coordenador==''){
									$sqlvalida = sprintf("INSERT INTO curso(numero,nome,sigla,tipo) VALUES ('%s','%s','%s','%s') ", $numero,$nome,$sigla,$tipo);
								}else{
									$sqlvalida = sprintf("INSERT INTO curso VALUES ('%s','%s','%s','%s','%s') ", $numero,$nome,$sigla,$tipo,$coordenador);	
								}
								$result=pg_query($con,$sqlvalida);
								echo "Curso cadastrado com sucesso";
							}
	
				?>
	     		
<?php	 
	include "rodape.php";
?>

