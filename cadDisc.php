<!-- viNi++ -->

<?php include "boots.php"; ?>

<?php include "cabecalho.php";
        session_start(); ?>
    </head>

<?php include "conexao.php"; ?>
    <body>

<div id="main" class="container-fluid">
				<h3 class="page-header">Cadastro de Disciplina</h3>

<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>

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
						echo "<b><div class='alert alert-danger'>ERRO! Disciplina já cadastrada no sistema.</b>";
						echo "<br><br>";
						echo "<a href='formDisc.php' style='text-decoration: none;' onclick='window.history.go(-1); return false;'>voltar</a>";
					}else{
						if($codigo==''){
							$sqlvalida = sprintf("INSERT INTO disciplina(codigo, nome, ch, ementa, objetivo, bibliografia_basica, bibliografia_complementar) VALUES ('%s','%s','%s','%s','%s','%s','%s') ", $codigo, $nome, $ch, $ementa, $objetivo, $bibliografia_basica, $bibliografia_complementar);
						}else{
							$sqlvalida = sprintf("INSERT INTO disciplina(codigo, nome, ch, ementa, objetivo, bibliografia_basica, bibliografia_complementar) VALUES ('%s','%s','%s','%s','%s','%s','%s') ", $codigo, $nome, $ch, $ementa, $objetivo, $bibliografia_basica, $bibliografia_complementar);
						}
						$result=pg_query($con,$sqlvalida);{
						echo " <div class='alert alert-success'> Disciplina cadastrada com sucesso!";
						echo "<br>Você será redirecionado para a página de listagem de disciplinas";
						header('Refresh: 5; url=editarDisc.php');
					}
				}
			}
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
