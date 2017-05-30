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
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>

<br><br>

<?php
include 'conexao.php';
?>

	<body>

			<div id="main" class="container-fluid">
				<h3 class="page-header">Cadastro de Professor</h3>
				<?php
					$matricula = $_POST['matricula'];
					$nome= $_POST['nome'];
					$cep= $_POST['cep'];
					$logradouro= $_POST['logradouro'];
					$numero= $_POST['numero'];
					$complemento= $_POST['complemento'];
					$bairro= $_POST['bairro'];
					$cidade= $_POST['cidade'];
					$uf= $_POST['uf'];
					$id= $_POST['id'];

					$sql=sprintf("SELECT * FROM professor WHERE matricula = %s", $matricula);
					$valid=pg_query($con,$sql);
					if (pg_num_rows($valid)>0){
						echo "<b><font color=red>ERRO!!! Professor já cadastrado no sistema.</b>";
						header('Refresh: 3; url=alterarProf.php');
					}else{
						if($complemento==''){
							$sqlvalida = sprintf("INSERT INTO professor(matricula, nome, cep, logradouro, numero, bairro, cidade, uf, id) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s') ", $matricula, $nome, $cep, $logradouro, $numero, $bairro, $cidade, $uf, $id);
						}else{
							$sqlvalida = sprintf("INSERT INTO professor(matricula, nome, cep, logradouro, numero, complemento, bairro, cidade, uf, id) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') ", $matricula, $nome, $cep, $logradouro, $numero, $complemento, $bairro, $cidade, $uf, $id);
						}
						$result=pg_query($con,$sqlvalida);
						echo "Professor cadastrado com sucesso";
						echo "<br>Você será redirecionado para a página de listagem de professores";
						header('Refresh: 5; url=alterarProf.php');
					}
	
				?>
	     		
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
