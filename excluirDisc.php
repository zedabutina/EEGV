<!-- viNi++ -->
<?php include "boots.php"; ?>

<?php include "cabecalho.php";
		session_start(); ?>
	</head>

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

<?php

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		if(isset($_POST['cod_disc'])){
			$cod_disc = (int)$_POST['cod_disc'];
			$log=sprintf("UPDATE disciplina set autor = '%s' WHERE codigo='%s'",$_SESSION['login'],$cod_disc);
			$conlog=pg_query($con,$log);
			$query_del = sprintf("DELETE FROM disciplina WHERE codigo='%s'",$cod_disc);
			$result = pg_query($con,$query_del);

			if($result){
				header('Location: alterarDisc.php');
			} else {
				header('Location: alterarDisc.php');
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
