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
            
        }elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] == 'P' || $_SESSION['nivel'] == 'C')){
?>

<br><br>
</head>
<?php
include 'conexao.php';
?>

<br><br>
	<body>

				<?php
					
					 $turno = htmlspecialchars($_POST['turno']);  
					 $competencia = htmlspecialchars($_POST['competencia']);
					 $conteudo_programatico = htmlspecialchars($_POST['conteudo_programatico']);
					 $recurso_metodologico = htmlspecialchars($_POST['recurso_metodologico']);
					 $criterio_avaliacao = htmlspecialchars($_POST['criterio_avaliacao']);
					 $instrumento_avaliacao = htmlspecialchars($_POST['instrumento_avaliacao']);
					 $aec = htmlspecialchars($_POST['aec']);
					 $bibliografia_sugerida = htmlspecialchars($_POST['bibliografia_sugerida']);
					 $situacao = htmlspecialchars($_POST['situacao']);
					// $obs_devolucao = htmlspecialchars($_POST['obs_devolucao']);
					 $id = (int)$_POST['id'];
					 $codigo_disc = (int)$_POST['codigo_disc'];
					 $matricula_professor = (int)$_POST['matricula_professor'];
					//echo $matricula_coordenador = (int)$_POST['matricula_coordenador'];
					
					

						if(($turno!='') && ($competencia!='') && ($conteudo_programatico!='') && ($recurso_metodologico!='') && ($criterio_avaliacao!='') && ($instrumento_avaliacao!='') && ($aec!='') && ($bibliografia_sugerida!='') && ($id!='') && ($codigo_disc!='') && ($matricula_professor!='')  && ($situacao=='C')){  
							 
							 $sqlvalida = sprintf("INSERT INTO planoensino(turno, competencia, conteudo_programatico, recurso_metodologico, criterio_avaliacao, instrumento_avaliacao, aec, bibliografia_sugerida, situacao,id, codigo_disc, matricula_professor,autor) VALUES ('%s','%s','%s','%s','%s','%s','%s','%s','%s',%s,%s,%s,'%s')", $turno, $competencia, $conteudo_programatico, $recurso_metodologico, $criterio_avaliacao, $instrumento_avaliacao, $aec, $bibliografia_sugerida, $situacao, $id, $codigo_disc, $matricula_professor,$_SESSION['login']);
						
						}elseif($situacao='E'){
							$sqlvalida = sprintf("INSERT INTO planoensino(turno, competencia, conteudo_programatico, recurso_metodologico, criterio_avaliacao, instrumento_avaliacao, aec, bibliografia_sugerida, situacao,id, codigo_disc, matricula_professor,autor) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s',%s,%s,%s,'%s') ", $turno, $competencia, $conteudo_programatico, $recurso_metodologico, $criterio_avaliacao, $instrumento_avaliacao, $aec, $bibliografia_sugerida, $situacao, $id, $codigo_disc, $matricula_professor,$_SESSION['login']);											
						}
						
						$result=pg_query($con,$sqlvalida);
						echo "Plano de ensino cadastrado com sucesso";
						echo "<br>Você será redirecionado para a página de consulta de plano de ensino.";
						header('Refresh: 5; url=meusplanosdeensino.php');
						

						

				?>
    <?php 
            }elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'P' || $_SESSION['nivel'] != 'C')){
                echo "<b>Você não tem permissão</b><br>";
                echo "<div class='col-md-7'>";
                echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
                echo "</div>";
            } 
            ?> 	     		
<?php									
	include "rodape.php";
?>

