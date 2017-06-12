<?php
	include "cabecalho.php"; 
	session_start();
?>
	<!--<script>
	var nome;
	do {
		nome = prompt ("Qual é o seu nome?");
	} while (nome == null || nome == "");
		alert ("Seu nome é "+nome);
	</script>-->
	</head>
	<?php include "boots.php"; ?>

	<br/><br/>
	<?php include "conexao.php"; ?>
	<body>
<?php 
		if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
			echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
			echo "<div class='container' >";
			echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
			echo "</div>"; 
			
		}if($_SESSION['nivel'] == 'P' || $_SESSION['nivel'] == 'C'){
?>
		<div id="main" class="container-fluid">
		<div id="list" class="row">
	     			
				
				<h3 class="page-header">Pendentes de Aprovação</h3>
				<div align="right" class="col-md-11">
					<a href="criarPE.php" class="btn btn-primary pull-right h2">Novo plano de Ensino</a>
				</div>
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>Código</th>
							<th>Disciplina</th>
							<th>Ano/Semetre</th>
							<th>Módulo/Turno</th>
							<th>Período</th>
							
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$coordenador=htmlspecialchars($_SESSION['login']);
							$coordenadorR=sprintf("SELECT * FROM usuario u INNER JOIN professor p ON p.id = u.id WHERE u.login = '%s'",$coordenador);						$sqlco= pg_query($con,$coordenadorR);
							$dados2=pg_fetch_array($sqlco);
							$cood= $dados2['matricula'];


							$sql=sprintf("SELECT p.codigo as coddisc,d.nome as nomeDisc,o.ano as anoplan, o.semestre as semestreplan, modulo, turno, data_inicio, data_termino, p.situacao as situacaoplan,d.codigo as codigods  FROM disciplina d INNER JOIN curso_disciplina cd ON cd.codigo = d.codigo INNER JOIN planoensino p ON p.codigo_disc = d.codigo INNER JOIN planejamento o ON o.id=p.id INNER JOIN professor r ON p.matricula_professor= r.matricula INNER JOIN usuario u ON u.id = r.id WHERE p.situacao = 'C'");	$data =  date("d/m/Y"); 
							$contador = pg_query($con,$sql);
							while($dados = pg_fetch_array($contador)){
								echo "<tr>";
								echo "<td><b>" . $dados['coddisc'] . "</b></td>";
								echo "<td>" . $dados['nomedisc'] . "</td>";
								echo "<td>" . $dados['anoplan'] . "/" .$dados['semestreplan'] . "</td>";
								echo "<td>" . $dados['modulo'] . "/" .$dados['turno'] . "</td>";
								echo "<td>" . $dados['data_inicio'] . "/" . $dados['data_termino'] . "</td>";
								
								echo "<form method='POST' action='reprova.php'><input type='hidden' name='coddisc' value='". $dados['coddisc'] . "'><input type='hidden' name='matricula_coordenador' value='". $cood . "'>";								
								echo "<td><button class='btn btn-link btn-xs' type='submit'><img src='images/invalido.png' width='24' height='24'></button></form><form method='POST' action='aprova.php'><input type='hidden' name='codigoplan' value='". $dados['coddisc'] . "'><input type='hidden' name='data_aprovacao' value='". $data . "'><input type='hidden' name='matricula_coordenador' value='". $cood . "'><button class='btn btn-link btn-xs' type='submit'><img src='images/valido.png' width='24' height='24'></button></form><form method='POST' action='consultarPE.php'><input type='hidden' name='coddisc' value='". $dados['coddisc'] . "'><button class='btn btn-link btn-xs' type='submit'><img src='images/lupa.png' width='24' height='24'></button></form></td>";			
								
								
								echo "</tr>";
							}
							
							pg_close($con);
						?>
						
					</tbody>
			
				</table>
					<div align="right" class="col-md-11">
						<?php echo "<tr><a href='criarPE.php'><img src='images/adcionar.png' width='48' height='48'></a></tr>"; ?>
						
					</div>
					<div align="left" class="col-md-1">
						<?php echo "<a href='menu.php' class='btn btn-secundary pull-right h2' ><b>MENU</b></a>"; ?>		</div>
				</div>
				</div>
	     		</div>
			<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] == 'A')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>
<?php	 
	include "rodape.php";
?>
