<?php include "cabecalho.php";session_start();?>
	</head>
<?php include "boots.php"; ?>

	<br/><br/>
<?php include "conexao.php"; ?>
	<body>
		<?php
			if($_SESSION['login'] == '' && $_SESSION['nivel'] == ''){
				echo "<b>Você deve estar logado</b>";
				header('Location: login.php');
			}elseif($_SESSION['login'] != '' && $_SESSION['nivel'] != ''){ 
		?>
				
				
				<div id="main" class="container-fluid" align="center">
					<?php 

						if($_SESSION['nivel'] == 'P'){
					?>
						<h2>
							       Bem Vindo <small><?php echo $_SESSION['apelido']; ?></small></h1>
					<table >
						<tr>
							<td style="padding: 20px;">
								<div>
									<a href="addPlano.php"><img src='images/addPlano.png' width='128' height='128'><br><div style="text-align:center;">Criar Plano de Ensino</span></a>
								</div>
							</td>
							<td style="padding: 20px;">
								<div>
									<a href="consultarMeusPlanosDeEnsino.php"><img src='images/verPlano.jpg' width='128' height='128'><br><div style="text-align:center;">Consultar Meus planos de ensino</div></a>
								</div>
							</td>
							<td style="padding: 20px;">
								<div>
									<a href="alterarSenha.php"><img src='images/senha.gif' width='128' height='128'><br><div style="text-align:center;">Alterar Senha</div></a>
								</div>
							</td>
						</tr>
					</table>		
					<?php 
						}
						if($_SESSION['nivel'] == 'C' || $_SESSION['nivel'] == 'A'){
					?>
					<div class="container">
					      <div class="row">
						  <div class="span12">
						      <div class="page-header">
							  <h2>
							       Bem Vindo <small><?php echo $_SESSION['apelido']; ?></small></h1>
							      <div class="tabbable">
								  <ul class="nav nav-tabs">
								      <li class="active"><a href="#tab1" data-toggle="tab">Cursos</a></li>
								      <li><a href="#tab2" data-toggle="tab">Disciplinas</a></li>
									<li><a href="#tab3" data-toggle="tab">Professores</a></li>
									<?php 
										if($_SESSION['nivel'] == 'C'){
									?>
									<li><a href="#tab4" data-toggle="tab">Usuários</a></li>
									<li><a href="#tab5" data-toggle="tab">Planejamentos</a></li>
									<li><a href="#tab6" data-toggle="tab">Planos de Ensino</a></li>
									<?php }?>
									<li><a href="#tab7" data-toggle="tab">Grades Curriculares</a></li>
									<li><a href="#tab8" data-toggle="tab">Conta</a></li>
								  </ul>
								  <div class="tab-content">
								      <div class="tab-pane active" id="tab1">
									<table><tr><td style="padding: 20px;">
									<a href="incluirCurso.php"><img src='images/add.png' width='128' height='128'><div style="text-align:center;">Cadastrar Curso</div></a></td>
									<td style="padding: 20px;"><a href="alterarCurso.php"><img src='images/editar.png' width='128' height='128'><div style="text-align:center;">Editar Cursos</div></a></td></tr>			
									</table>
								      </div>
								      <div class="tab-pane" id="tab2">
									  <table><tr><td style="padding: 20px;">
									<a href="formDisc.php"><img src='images/addDisc.png' width='128' height='128'><div style="text-align:center;">Cadastrar Disciplina</div></a></td>
									<td style="padding: 20px;"><a href="alterDisc.php"><img src='images/editar.png' width='128' height='128'><div style="text-align:center;">Editar Disciplinas</div></a></td></tr>			
									</table>
								      </div>
									<div class="tab-pane active" id="tab3">
									  <table><tr><td style="padding: 20px;">
									<a href="formProf.php"><img src='images/addProf.png' width='128' height='128'><div style="text-align:center;">Cadastrar Professor</div></a></td>
									<td style="padding: 20px;"><a href="alterarProf.php"><img src='images/editar.png' width='128' height='128'><div style="text-align:center;">Editar Professores</div></a></td></tr>			
									</table>
								      </div>
									<?php 
										if($_SESSION['nivel'] == 'C'){
									?>
									<div class="tab-pane active" id="tab4">
									  <table><tr><td style="padding: 20px;">
									<a href="formUsers.php"><img src='images/criarUsuario.jpg' width='128' height='128'><div style="text-align:center;">Cadastrar Usuário</div></a></td>
									<td style="padding: 20px;"><a href="alterarUsers.php"><img src='images/editar.png' width='128' height='128'><div style="text-align:center;">Editar Usuários</div></a></td></tr>			
									</table>
								      </div>
									<div class="tab-pane active" id="tab5">
									  <table><tr><td style="padding: 20px;">
									<a href="formUsers.php"><img src='images/iniciarPlanejamento.png' width='128' height='128'><div style="text-align:center;">Iniciar Planejamento</div></a></td>
									<td style="padding: 20px;"><a href="alterarUsers.php"><img src='images/fecharPlanejamento.png' width='128' height='128'><div style="text-align:center;">Fechar Planejamento</div></a></td></tr>			
									</table>
								      </div>
									<div class="tab-pane active" id="tab6">
									  <table><tr><td style="padding: 20px;">
									<a href="formUsers.php"><img src='images/pendente.png' width='128' height='128'><div style="text-align:center;">Pendentes de Aprovação</div></a></td>
									<td style="padding: 20px;"><a href="alterarUsers.php"><img src='images/parecer.jpeg' width='128' height='128'><div style="text-align:center;">Emitir Parecer</div></a></td></tr>			
									</table>
								      </div>
									<?php } ?>
									<div class="tab-pane active" id="tab7">
									  <table><tr><td style="padding: 20px;">
									<a href="formProf.php"><img src='images/definirGrade.png' width='128' height='128'><div style="text-align:center;">Definir Grade</div></a></td>
									</tr>			
									</table>
								      </div>
									<div class="tab-pane active" id="tab8">
									<table><tr><td style="padding: 20px;">
									<a href="alterarSenha.php"><img src='images/senha.gif' width='128' height='128'><div style="text-align:center;">Alterar Senha</div></a></td>
									</tr>			
									</table>
								      </div>
								  </div>
							      </div>
						      </div>
						  </div>
						
					
					
					
							
					<?php 
						}
					?>
					
				
				</div>
			<?php
			}
			?>
<?php include "rodape.php";?>
