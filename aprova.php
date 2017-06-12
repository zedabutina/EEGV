<?php
	include "cabecalho.php"; 
	session_start();
?>
	</head>
<?php 
	include "boots.php"; 
?>
	<br/><br/>
<?php 
	include "conexao.php"; 
?>
	<body>
<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}elseif(isset($_SESSION['login']) && $_SESSION['nivel'] == 'C' && $_SERVER['REQUEST_METHOD'] == "POST"){
?>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Pendentes de Aprovação</h3>
				
			<?php	
				$codigo=(int)$_POST['codigoplan'];
				$data_aprovacao = $_POST['data_aprovacao'];
				$matricula_coordenador = $_POST['matricula_coordenador'] ;
				$sql=sprintf("UPDATE planoensino SET matricula_coordenador='%s',situacao='D', autor='%s' WHERE codigo='%s'",$matricula_coordenador,$_SESSION['login'],$codigo);
				$contador = pg_query($con,$sql);
				header('Location: pendentes.php');
			?>			
	     	</div>
<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'P')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
?>
<?php	 
	include "rodape.php";
?>
