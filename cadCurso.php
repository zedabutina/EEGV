<?php
	include "cabecalho.php";
	session_start();
?>
	
	</head>
	<?php include "boots.php"; ?>

	<br/><br/>
	<?php include "conexao.php"; ?>
	<body>
<?php 
		if($_SERVER['REQUEST_METHOD']=="POST"){
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>
			<div id="main" class="container-fluid">
				<h3 class="page-header">Cadastro de Curso</h3>
				<?php
							$numero = (int)$_POST['numero'];
							$nome= htmlspecialchars($_POST['nome']);
							$sigla= $_POST['sigla'];
							$tipo= $_POST['tipo'];
							$coordenador= (int)$_POST['coordenador'];
							$sql=sprintf("SELECT * FROM curso WHERE numero = %s",$numero);
							$valid=pg_query($con,$sql);

								if (pg_num_rows($valid)>0){
									echo "<div align='left' class='col-md-7'>";
									echo "<b>ERRO!Número de curso já cadastrado</b>";
									echo "<button class='btn btn-primary' onClick='window.history.go(-1)'>Voltar</button>";
									echo "'<script>alert('Número de Curso já cadastrado!'); window.history.go(-1);</script>';";
									echo "</div>";
								}elseif(pg_num_rows($valid)==0){
										$sqlvalida = sprintf("INSERT INTO curso VALUES (%s,'%s','%s','%s','%s','%s') ", $numero,$nome,$sigla,$tipo,$coordenador,$_SESSION['login']);	
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
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'A' || $_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			}
			 
			?>
	     		
<?php	 
	include "rodape.php";
?>

