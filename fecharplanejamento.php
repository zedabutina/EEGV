<?php
	include "cabecalho.php"; 
	session_start();
?>
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
			
		}if(isset($_SESSION['login']) && $_SESSION['nivel'] == 'C'){
?>
		<div id="main" class="container-fluid">
		<div id="list" class="row">
	     			
				
				<h3 class="page-header">Fechar Planejamentos</h3>
				<div align="right" class="col-md-11">
					<a href="iniciarPlanejamento.php" class="btn btn-primary pull-right h2">Novo Planejamento</a>
				</div>
				<div class="table-responsive col-md-12">
				<table class="table table-striped" cellspacing="0" cellpadding="0">
					<thead>
						<tr>
							<th>ID</th>
							<th>Ano</th>
							<th>Semetre</th>
							<th>Data de ínico</th>
							<th>Ações</th>
						</tr>
					</thead>
					<tbody>
						<?php
							$sql=sprintf("SELECT * FROM planejamento WHERE situacao='E'");
							$contador = pg_query($con,$sql);
							$dat = date("d/m/Y");
							while($dados = pg_fetch_array($contador)){
								if($dados['semestre']=='1'){
									$semestre="Primeiro";
								}elseif($dados['semestre']=='2'){
									$semestre="Segundo";
								}
								if($dados['situacao']=='E'){
								echo "<tr>";
								echo "<td><b>" . $dados['id'] . "</b></td>";
								echo "<td>" . $dados['ano'] . "</td>";
								echo "<td>" . $semestre . "</td>";
								echo "<td>" . $dados['data_inicio'] . "</td>";

								echo "<form method='POST' action='fecharplanejamento.php'><input type='hidden' name='id' value='". $dados['id'] . "'><input type='hidden' name='data_termino' value='". $dat . "'>";								
								echo "<td><button class='btn btn-success btn-xs' type='submit'><b>Fechar Planejamento</b></button></form>";			
								
								}

								echo "</tr>";
							}
							if($_POST['data_termino']!=''){
								$data_termino=$_POST['data_termino'];
								$id = (int)$_POST['id'];
								$fecha=sprintf("UPDATE planejamento SET data_termino='%s',situacao='F', autor='%s' WHERE id='%s'",$data_termino,$_SESSION['login'],$id);				$res=pg_query($con,$fecha);
								//header('Location: fecharplanejamento.php');
							}
							pg_close($con);
						?>
						
					</tbody>
			
				</table>
					<div align="right" class="col-md-11">
						<?php echo "<tr><a href='iniciarPlanejamento.php'><img src='images/adcionar.png' width='48' height='48'></a></tr>"; ?>
						
					</div>
					<div align="left" class="col-md-1">
						<?php echo "<a href='menu.php' class='btn btn-secundary pull-right h2' ><b>MENU</b></a>"; ?>		</div>
				</div>
				</div>
	     		</div>
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
