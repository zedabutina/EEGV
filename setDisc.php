

<?php include "boots.php"; ?>

<?php include "cabecalho.php"; session_start(); ?>

<?php include "conexao.php"; ?>

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
	if(!isset($_POST['cod_disc']) && $_POST['nome'] && $_POST['ch'] && $_POST['ementa'] &&  $_POST['objetivo'] && $_POST['bb'] && $_POST['bc']){

		$codigo = (int)$_POST['codigo'];
		$nome = htmlspecialchars($_POST['nome']);
		$ch = (int)$_POST['ch'];
		$ementa = htmlspecialchars($_POST['ementa']);
		$objetivo = htmlspecialchars($_POST['objetivo']);
		$bibliografia_basica = htmlspecialchars($_POST['bb']);
		$bibliografia_complementar = htmlspecialchars($_POST['bc']);

		try{
			$query = sprintf("UPDATE disciplina SET codigo='%s', nome='%s', ch='%s', ementa='%s', objetivo='%s', bibliografia_basica='%s',bibliografia_complementar='%s' , autor= '%s' WHERE codigo='%s';", $codigo,$nome,$ch,$ementa,$objetivo,$bibliografia_basica,$bibliografia_complementar,$_SESSION['login'],$codigo);
			$result = pg_query($con,$query);
			
			if($result){	
				header('Location: alterarDisc.php');
			} else {
				echo '<script>alert("ERRO!")</script>';		
				header('Location: alterarDisc.php');
			}
			pg_close($con);

		} catch(\Exception $e){
			echo 'test :/';
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

