<?php include "cabecalho.php"; session_start(); ?>
	<script>
		function valid(){
			document.getElementById("id").value = 'SDFfdasf3$@!4t34534fSD';
		}
	</script>

	<style>
		div {align:center;};
	</style>
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
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Editar Curso</h3>
			<?php
				$numero = (int)$_POST['numero'];
				$ant = $_POST['ant'];
				$nome = htmlspecialchars($_POST['nome']);
				$sigla = $_POST['sigla'];
				$tipo = $_POST['tipo'];
				$coordenador = $_POST['coordenador'];
				if($numero==$ant){
						$sqlup = sprintf("UPDATE curso SET numero='%s', nome='%s' ,sigla='%s', tipo='%s',matricula='%s' , autor = '%s' WHERE numero='%s'",$numero,$nome,$sigla,$tipo,$coordenador,$_SESSION['login'],$numero);
						$update = pg_query($con,$sqlup); 
						echo "<b>Dados alterados com sucesso!!!</b>";
						echo "<div align='center'>";
						echo "<a href='alterarCurso.php' class='btn btn-primary'>Listar Cursos</a>";
						echo "<button onClick='menu.php' class='btn btn-secondary'>Menu</button>";
						echo "</div>";
						pg_close($con);
				
				}elseif($numero!=$ant){
					$sqlconsulta = sprintf("SELECT * FROM curso WHERE numero='%s'",$numero);
					$consulta = pg_query($con,$sqlconsulta);
					$result = pg_num_rows($consulta);
					if ($result>0){
						$dados=pg_fetch_array($consulta);
						echo "<b>O curso ". $dados['nome'] . " já esta cadastrado com esse número. Deseja exclui-lo, substituir os números ou Cancelar?</b>";
					
						echo "<form method='POST' action='excluirCurso.php'><input type='hidden' name='num' value='". $dados['numero'] . "'><input type='hidden' name='ant' value='". $ant . "'><input type='hidden' name='numero' value='". $numero ."'><input type='hidden' name='nome' value='". $nome ."'><input type='hidden' name='sigla' value='". $sigla ."'><input type='hidden' name='tipo' value='". $tipo . "'><input type='hidden' name='coordenador' value='". $coordenador ."'><input type='hidden' name='ide' value='fff3#@$%#@EGT$%TG'>";
						echo "<div align='center' >";
						echo "<a href='alterarCurso.php' class='btn btn-secundary' onClick='window.history.go(-1)'><b>Cancelar</b></a>";
						echo "<button type='submit' class='btn btn-danger'>Excluir</button>";
						echo "<input type='hidden' name='id' id='id'value=' '";
						echo "<div align='center' class='row'>";
						echo "<button type='submit' class='btn btn-default' onClick='valid()'>Substituir</button>";
						echo "</div>";
						echo "</form>";
						
					
					}else{
						$sqlconsulta = sprintf("INSERT INTO curso VALUES ('%s','%s','%s','%s','%s','%s') ", $numero,$nome,$sigla,$tipo,$coordenador,$_SESSION['login']);
					
						
						$consulta = pg_query($con,$sqlconsulta);
						$exc = sprintf("DELETE FROM curso WHERE numero='%s'",$ant);
						$result = pg_query($con,$exc);
						pg_close($con);
						echo "<b>Dados alterados com sucesso!!!</b>";
						echo "<div align='center'>";
						echo "<a href='alterarCurso.php' class='btn btn-primary'>Listar Cursos</a>";
						echo "<button onClick='menu.php' class='btn btn-secondary'>Menu</button>";
						echo "</div>";
					}
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
