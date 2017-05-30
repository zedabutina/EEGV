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
            
        }if($_SESSION['nivel'] == 'P' || $_SESSION['nivel'] == 'C'){
?>

<br><br>

<?php
include 'conexao.php';
?>

<br><br>
	<body>

				<?php
					$turno = $_POST['turno'];   // fazer validacao: if $turno e $bibl. tiver vazio, então da o insert dele na linha 30...  se não.... ir fazendo todas possibilidades...
					$competencia = $_POST['competencia'];
					$conteudo_programatico = $_POST['conteudo_programatico'];
					$recurso_metodologico = $_POST['recurso_metodologico'];
					$criterio_avaliacao = $_POST['criterio_avaliacao'];
					$instrumento_avaliacao = $_POST['instrumento_avaliacao'];
					$aec = $_POST['aec'];
					$bibliografia_sugerida = $_POST['bibliografia_sugerida'];
					$situacao = $_POST['situacao'];
					$obs_devolucao = $_POST['obs_devolucao'];
					$id = $_POST['id'];
					$codigo_disc = $_POST['codigo_disc'];
					$matricula_professor = $_POST['matricula_professor'];
					$matricula_coordenador = $_POST['matricula_coordenador'];

//esquece campo date
						if(($bibliografia_sugerida!='') && ($turno!='')){   //ou seja se TUDO ESTIVER PREENCHIDO
							$sqlvalida = sprintf("INSERT INTO planoensino(turno, competencia, conteudo_programatico, recurso_metodologico, criterio_avaliacao, instrumento_avaliacao, aec, bibliografia_sugerida, situacao, obs_devolucao, id, codigo_disc, matricula_professor, matricula_coordenador) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') ", $turno, $competencia, $conteudo_programatico, $recurso_metodologico, $criterio_avaliacao, $instrumento_avaliacao, $aec, $bibliografia_sugerida, $situacao, $obs_devolucao, $id, $codigo_disc, $matricula_professor, $matricula_coordenador);
			/*			}elseif(($bibliografia_sugerida=='') && ($turno=='')){ //tudo menos bib. sugerida AND turno
							$sqlvalida = sprintf("INSERT INTO planoensino(competencia, conteudo_programatico, recurso_metodologico, criterio_avaliacao, instrumento_avaliacao, aec, situacao, obs_devolucao, id, codigo_disc, matricula_professor, matricula_coordenador) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s','%s') ", $competencia, $conteudo_programatico, $recurso_metodologico, $criterio_avaliacao, $instrumento_avaliacao, $aec, $situacao, $obs_devolucao, $id, $codigo_disc, $matricula_professor, $matricula_coordenador);
						}        */
						$result=pg_query($con,$sqlvalida);
						echo "Professor cadastrado com sucesso";
						echo "<br>Você será redirecionado para a página de consulta de plano de ensino.";
						header('Refresh: 5; url=consPE.php');
					}

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
