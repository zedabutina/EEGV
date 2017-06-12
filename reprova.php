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
				echo $codigo=(int)$_POST['coddisc'];
				$matricula_coordenador = $_POST['matricula_coordenador'] ;
				$sql=sprintf("UPDATE planoensino SET data_aprovacao='%s',matricula_coordenador='%s',situacao='A', autor='%s' WHERE codigo='%s'",$data_aprovacao,$matricula_coordenador,$_SESSION['login'],$codigo);
				$contador = pg_query($con,$sql);
				echo "<form method='POST' action='reprova.php' class='form-horizontal'>";
				echo "<input type='hidden' name='codigo' value='".$codigo."'>";
				echo "<input type='hidden' name='matricula_coordenador' value='".$matricula_coordenador."'>";
				echo "<div class='col-md-2'>";
				echo "<b>Motivo da devolução:</b><textarea name='obs_devolucao' id='obs_devolucao' cols='83' rows='5' placeholder='Digite aqui o motivo da devolução'/></textarea>";
				echo "</div>";
				echo "<div class='col-md-7'>";
				echo "<button type='submit' class='btn btn-danger pull-right h2' onClick=''><b>Devolver</b></button>";
				echo "<button class='btn btn-secundary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
				echo "</form>";
				
				if($_POST['obs_devolucao']!=''){
					$obs_devolucao = htmlspecialchars($_POST['obs_devolucao']);
					$cdplano = $_POST['codigo'];
					$matricula= $_POST['matricula_coordenador'];
					$obs_devolucao = $_POST['obs_devolucao'];
					$sqld=sprintf("UPDATE planoensino SET matricula_coordenador='%s',situacao='D', autor='%s', obs_devolucao='%s' WHERE codigo='%s'",$matricula,$_SESSION['login'],$obs_devolucao,$cdplano);		
					$resuld=pg_query($con,$sqld);
					//header('Location: pendentes.php');				
				}
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
