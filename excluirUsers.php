<?php
session_start();
include 'cabecalho.php';
include 'boots.php';

?>

<br><br>

<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}elseif($_SESSION['nivel'] == 'C'){
?>

<br><br>

<?php
include 'conexao.php';
?>
	<body>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Editar Usuário</h3>
			<?php
				$num = $_POST['num'];
				$idp = $_POST['idp'];
				$ant = $_POST['ant'];
				$ide = $_POST['ide'];

				echo $num;
				echo $id;
				echo $ant;
				echo $ide;

				if (empty($num)){
					die("<b>ERRO</b>");
				}elseif($num != '' && $idp== '9rj9!@#@!329vjy@#$#%#ngv2'){
					$exc = sprintf("DELETE FROM usuario WHERE login='%s'",$num);
					$result = pg_query($con,$exc);
					pg_close($con);
					header('Location: alterarUsers.php');
				}elseif($ant > 0 && $ide='fff3#@$%#@EGT$%TG' && $idp==' '){
					$login = $_POST['login'];
					$excl = sprintf("DELETE FROM usuario WHERE login='%s'",$login);
					$exc = sprintf("DELETE FROM usuario WHERE login='%s'",$ant);
					$result = pg_query($con,$exc);
					$resol = pg_query($con,$excl);
					$apelido = $_POST['apelido'];
					$sexo = $_POST['sexo'];
					$nivel = $_POST['nivel'];
					$resultado = pg_query($con,$insert);
					echo "<b>Alteração feita com Sucesso</b>";
					echo "<div align='center' class='row'>";
					echo "<a href='alterarUsers.php' class='btn btn-primary'>Listar Usuários</a>";
					echo "<button onClick='#' class='btn btn-secondary'>Menu</button>";
					echo "</div>";
				}elseif($idp=='SDFfdasf3$@!4t34534fSD'){
					$login = $_POST['login'];
					$apelido = $_POST['apelido'];
					$sexo = $_POST['sexo'];
					$nivel = $_POST['nivel'];
					$sub=sprintf("DELETE FROM usuario WHERE login='%s'",$ant);
					$subinsert=pg_query($con,$sub);
					$substituir=sprintf("UPDATE usuario SET login='%s' WHERE login='%s'",$ant,$login);
					$substituirResult=pg_query($con,$substituir);
				}
					$resulInset = pg_query($con,$insert);
					echo "<b>Substituição feita com sucesso</b>";	
					echo "<div align='center' class='row'>";
					echo "<a href='alterarUsers.php' class='btn btn-primary'>Listar Cursos</a>";
					echo "<button onClick='#' class='btn btn-secondary'>Menu</button>";
					echo "</div>";
				
			?>
		</div>

			<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>	    
<?php include "rodape.php"; ?>
