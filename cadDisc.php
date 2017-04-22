<!-- viNi -->

<?php 
	include "conexao.php"; //conexão com o banco de dados
	include "rodape.php";
	include 'cabecalho.php';
	include 'boots.php';
?>

<div id="main" class="container-fluid">
				<h3 class="page-header">Cadastro de Disciplina</h3>

<?php 

if($_SERVER['REQUEST_METHOD'] == "POST"){ // Esta função permite que seja recebido apenas requisições método POST
	if(!isset($_POST['codigodisc']) && $_POST['nome'] && $_POST['ch'] && $_POST['ementa'] &&  $_POST['objetivo'] && $_POST['bb'] && $_POST['bc'])// Esta função valida todos os dados
	{
		$codigo = $_POST['codigo'];
		$nome = $_POST['nome'];
		$ch = $_POST['ch'];
		$ementa = $_POST['ementa'];
		$objetivo = $_POST['objetivo'];
		$bibliografia_basica = $_POST['bb'];
		$bibliografia_complementar = $_POST['bc'];
				
					$sql=sprintf("SELECT * FROM disciplina WHERE codigo = %s", $codigo);
					$valid=pg_query($con,$sql);
					if (pg_num_rows($valid)>0){
						echo "<b><font color=red>ERRO!!! Disciplina já cadastrada no sistema.</b>";
						header('Refresh: 3; url=alterarDisc.php');
					}else{
						if($codigo==''){
							$sqlvalida = sprintf("INSERT INTO disciplina(codigo, nome, ch, ementa, objetivo, bibliografia_basica, bibliografia_complementar) VALUES ('%s','%s','%s','%s','%s','%s','%s') ", $codigo, $nome, $ch, $ementa, $objetivo, $bibliografia_basica, $bibliografia_complementar);
						}else{
							$sqlvalida = sprintf("INSERT INTO disciplina(codigo, nome, ch, ementa, objetivo, bibliografia_basica, bibliografia_complementar) VALUES ('%s','%s','%s','%s','%s','%s','%s') ", $codigo, $nome, $ch, $ementa, $objetivo, $bibliografia_basica, $bibliografia_complementar);
						}
						$result=pg_query($con,$sqlvalida);{
						echo "Disciplina cadastrada com sucesso";
						echo "<br>Você será redirecionado para a página de listagem de disciplinas";
						header('Refresh: 5; url=alterarDisc.php');

				}
			}
		}
		
 } else {
	echo 'Haha malandrão! apenas POST!';
}

?>
