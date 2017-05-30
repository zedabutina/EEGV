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

				<?php
					$login = $_POST['login'];
					$senha= $_POST['senha'];
					$senha_confirma= $_POST['senha_confirma'];
					$apelido= $_POST['apelido'];
					$sexo= $_POST['sexo'];
					$nivel= $_POST['nivel'];

					$sql=sprintf("SELECT * FROM usuario WHERE login = '%s'", $login);
					$valid=pg_query($con,$sql);
					if (pg_num_rows($valid)>0){
						echo "<b><font color=red>ERRO!!! Usuario jÃƒÂ¡ cadastrado no sistema.</b>";
					}else{
						$sqlvalida = sprintf("INSERT INTO usuario(login, senha, apelido, sexo, nivel) VALUES ('%s',md5('%s'),'%s','%s','%s') ", $login, $senha, $apelido, $sexo, $nivel);
					}
						$result=pg_query($con,$sqlvalida);
						echo "Usuário cadastrado com sucesso";
						echo "<br>Você será redirecionado para a página de listagem de Usuários. Aguarde alguns instantes.";
						header('Refresh: 5; url=alterarUsers.php');
				
	
				?>
			<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>		     		
<?php	 
	include "rodape.php";
?>
