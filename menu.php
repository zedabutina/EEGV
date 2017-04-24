<?php include "cabecalho.php";session_start();?>
	<script type="text/javascript">
		
		function mostrarCurso() {
		    var x = document.getElementById('curso');
		    if (x.style.display === 'none') {
			x.style.display = 'block';
		    } else {
			x.style.display = 'none';
		    }
		}
		function mostrarDisciplina() {
		    var x = document.getElementById('disciplina');
		    if (x.style.display === 'none') {
			x.style.display = 'block';
		    } else {
			x.style.display = 'none';
		    }
		}
		function mostrarProfessor() {
		    var x = document.getElementById('professor');
		    if (x.style.display === 'none') {
			x.style.display = 'block';
		    } else {
			x.style.display = 'none';
		    }
		}
		function mostrarUsuario() {
		    var x = document.getElementById('usuario');
		    if (x.style.display === 'none') {
			x.style.display = 'block';
		    } else {
			x.style.display = 'none';
		    }
		}
	</script>
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
				<h3 class="page-header"> Bem Vindo <?php echo $_SESSION['apelido']; ?> </h3>
				<hr>
				<div id="main" class="container-fluid" align="center">
					<?php 

						if($_SESSION['nivel'] == 'C' || $_SESSION['nivel'] == 'A'){
					?>
						<label for="curso" onClick="javascript: mostrarCurso();"><h3 class="page-header" >Cursos</h3></label>
						<div style="display:none" id="curso" name="curso">
							<a href="incluirCurso.php"><img src='images/add.png' width='128' height='128'></a>
							<a href="alterarCurso.php"><img src='images/editar.png' width='128' height='128'></a>
						</div></br>
				
						<label for="disciplina" onClick="javascript: mostrarDisciplina();"><h3 class="page-header">Disciplinas</h3></label>
							<div style="display:none" id="disciplina" name="disciplina">
								<a href="incluirCurso.php"><img src='images/add.png' width='128' height='128'></a>
								<a href="alterarCurso.php"><img src='images/editar.png' width='128' height='128'></a>
							</div></br>
						<label for="professor" onClick="javascript: mostrarProfessor();"><h3 class="page-header">Professores</h3></label>
							<div style="display:none" id="professor" name="professor">
								<a href="incluirCurso.php"><img src='images/add.png' width='128' height='128'></a>
								<a href="alterarCurso.php"><img src='images/editar.png' width='128' height='128'></a>
							</div></br>
					<?php 
						}
					?>
					<?php 
						if($_SESSION['nivel'] == 'C'){
					?>
					<label for="usuario" onClick="javascript: mostrarUsuario();"><h3 class="page-header">Usuários</h3></label>
						<div style="display:none" id="usuario" name="usuario">
							<a href="incluirCurso.php"><img src='images/add.png' width='128' height='128'></a>
							<a href="alterarCurso.php"><img src='images/editar.png' width='128' height='128'></a>
						</div></br>
					<?php 
						}
					?>	
				
				</div>
			<?php
			}
			?>
<?php include "rodape.php";?>
