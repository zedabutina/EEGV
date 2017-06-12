<?php include "cabecalho.php";
		session_start(); ?>
	</head>
<?php include "boots.php"; ?>

	<br/><br/>
<?php include "conexao.php"; ?>
	<body>
<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C' && $_SERVER['REQUEST_METHOD'] == "POST"){
?>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Editar Curso</h3>
			<?php
				$num = $_POST['num'];
				$id = $_POST['id'];
				$ant = $_POST['ant'];
				$ide = $_POST['ide'];	
				if (empty($num)){
					die("<b>ERRO</b>");
				}elseif($num > 0 && $id== '9rj9!@#@!329vjy@#$#%#ngv2'){
					$log3=sprintf("UPDATE curso set autor = '%s' WHERE numero='%s'",$_SESSION['login'],$num);
					$conlog3=pg_query($con,$log3);
					$exc = sprintf("DELETE FROM curso WHERE numero='%s'",$num);
					$result = pg_query($con,$exc);
					pg_close($con);
					header('Location: alterarCurso.php');
				}elseif($ant > 0 && $ide='fff3#@$%#@EGT$%TG' && $id==' '){
					$numero = $_POST['numero'];
					$log1=sprintf("UPDATE curso set autor = '%s' WHERE numero='%s'",$_SESSION['login'],$numero);
					$conlog1=pg_query($con,$log1);
					$excl = sprintf("DELETE FROM curso WHERE numero='%s'",$numero);
					$log2=sprintf("UPDATE curso set autor = '%s' WHERE numero='%s'",$_SESSION['login'],$ant);
					$conlog2=pg_query($con,$log2);
					$exc = sprintf("DELETE FROM curso WHERE numero='%s'",$ant);
					$result = pg_query($con,$exc);
					$resol = pg_query($con,$excl);
					$nome = $_POST['nome'];
					$sigla = $_POST['sigla'];
					$tipo = $_POST['tipo'];
					$coordenador = $_POST['coordenador'];
					if ($coordenador == ''){
						$insert = sprintf("INSERT INTO curso(numero,nome,sigla,tipo) VALUES('%s','%s','%s','%s')",$numero,$nome,$sigla,$tipo);
					}elseif($coordenador>0){
						$insert = sprintf("INSERT INTO curso VALUES('%s','%s','%s','%s','%s')",$numero,$nome,$sigla,$tipo,$coordenador);
					}
					$resultado = pg_query($con,$insert);
					echo "<b>Alteração feita com Sucesso</b>";
					echo "<div align='center' class='row'>";
					echo "<a href='alterarCurso.php' class='btn btn-primary'>Listar Cursos</a>";
					echo "<button onClick='#' class='btn btn-secondary'>Menu</button>";
					echo "</div>";
				}elseif($id=='SDFfdasf3$@!4t34534fSD'){
					$numero = $_POST['numero'];
					$nome = $_POST['nome'];
					$sigla = $_POST['sigla'];
					$tipo = $_POST['tipo'];
					$coordenador = $_POST['coordenador'];
					$log=sprintf("UPDATE curso set autor = '%s' WHERE numero='%s'",$_SESSION['login'],$ant);
					$conlog=pg_query($con,$log);
					$sub=sprintf("DELETE FROM curso WHERE numero='%s'",$ant);
					$subinsert=pg_query($con,$sub);
					$substituir=sprintf("UPDATE curso SET numero='%s' , autor = '%s' WHERE numero='%s'",$ant,$_SESSION['login'],$numero);
					$substituirResult=pg_query($con,$substituir);
					$insert = sprintf("INSERT INTO curso VALUES('%s','%s','%s','%s','%s','%s')",$numero,$nome,$sigla,$tipo,$coordenador,$_SESSION['login']);
					
					$resulInset = pg_query($con,$insert);
					echo "<b>Substituição feita com sucesso</b>";	
					echo "<div align='center' class='row'>";
					echo "<a href='alterarCurso.php' class='btn btn-primary'>Listar Cursos</a>";
					echo "<button onClick='#' class='btn btn-secondary'>Menu</button>";
					echo "</div>";
				}
			?>
		</div>
<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'A' || $_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>
<?php include "rodape.php"; ?>
