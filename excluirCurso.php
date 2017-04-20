<?php include "cabecalho.php"; ?>
	</head>
<?php include "boots.php"; ?>

	<br/><br/>
<?php include "conexao.php"; ?>
	<body>
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
					$exc = sprintf("DELETE FROM curso WHERE numero='%s'",$num);
					$result = pg_query($con,$exc);
					pg_close($con);
					header('Location: alterarCurso.php');
				}elseif($ant > 0 && $ide='fff3#@$%#@EGT$%TG' && $id==' '){
					$numero = $_POST['numero'];
					$excl = sprintf("DELETE FROM curso WHERE numero='%s'",$numero);
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
					$sub=sprintf("DELETE FROM curso WHERE numero='%s'",$ant);
					$subinsert=pg_query($con,$sub);
					$substituir=sprintf("UPDATE curso SET numero='%s' WHERE numero='%s'",$ant,$numero);
					$substituirResult=pg_query($con,$substituir);
					if ($coordenador == ''){
						$insert = sprintf("INSERT INTO curso(numero,nome,sigla,tipo) VALUES('%s','%s','%s','%s')",$numero,$nome,$sigla,$tipo);
					}elseif($coordenador>0){
						$insert = sprintf("INSERT INTO curso VALUES('%s','%s','%s','%s','%s')",$numero,$nome,$sigla,$tipo,$coordenador);
					}
					$resulInset = pg_query($con,$insert);
					echo "<b>Substituição feita com sucesso</b>";	
					echo "<div align='center' class='row'>";
					echo "<a href='alterarCurso.php' class='btn btn-primary'>Listar Cursos</a>";
					echo "<button onClick='#' class='btn btn-secondary'>Menu</button>";
					echo "</div>";
				}
			?>
		</div>
<?php include "rodape.php"; ?>
