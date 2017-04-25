<!-- viNi++ -->

<?php 
	include "conexao.php"; //conexão com o banco de dados
	include "rodape.php";
	include 'cabecalho.php';
	include 'boots.php';
	session_start();
?>

<?php 


	if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
	}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){


if($_SERVER['REQUEST_METHOD'] == "POST"){ // Esta função permite que seja recebido apenas requisições método POST
	if(!isset($_POST['cod_disc']) && $_POST['nome'] && $_POST['ch'] && $_POST['ementa'] &&  $_POST['objetivo'] && $_POST['bb'] && $_POST['bc']){

		$codigo = $_POST['codigo'];
		$nome = $_POST['nome'];
		$ch = $_POST['ch'];
		$ementa = $_POST['ementa'];
		$objetivo = $_POST['objetivo'];
		$bibliografia_basica = $_POST['bb'];
		$bibliografia_complementar = $_POST['bc'];

		try{
			$query = sprintf("UPDATE disciplina SET codigo='%s', nome='%s', ch='%s', ementa='%s', objetivo='%s', bibliografia_basica='%s',bibliografia_complementar='%s' WHERE codigo='%s';", $codigo,$nome,$ch,$ementa,$objetivo,$bibliografia_basica,$bibliografia_complementar,$codigo);
			$result = pg_query($con,$query);

			if($result){	
				header('Location: alterarDisc.php');
			} else {
				echo '<script>alert("ERRO!")</script>';		
				//header('Location: alterarDisc.php');
			}

		} catch(\Exception $e){
			echo 'test :/';
		}


	} else {
		echo '<script>alert("Favor, prencher todos os dados!")</script>';
	}

}else {
	echo 'Haha malandrão,apenas POST!';
}

}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'A' || $_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 

?>
