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
			
		}elseif($_SESSION['nivel'] == 'C'){
?>

<br><br>

<?php
include 'conexao.php';
?>

    <script type="text/javascript">
	    function validarDados(){
    	/*	login = document.frmIncluirUsers.login.value;
			senha = document.frmIncluirUsers.senha.value;
			senha_confirma = document.frmIncluirUsers.senha_confirma.value;
			apelido = document.frmIncluirUsers.apelido.value;
			sexo = document.frmIncluirUsers.sexo.value;
			nivel = document.frmIncluirUsers.nivel.value;
			//validaÃƒÂ§ÃƒÂ£o dos campos obrigatÃƒÂ³rios
			 if ($senha == $senha_confirma) {
            $mensagem = "<span class='sucesso'><b>Sucesso</b>: As senhas sÃƒÂ£o iguais: ".$senha."</span>";
			} else {
            $mensagem = "<span class='erro'><b>Erro</b>: As senhas nÃƒÂ£o conferem, digite novamente!</span>";
			}
			*/
				document.frmIncluirUsers.submit();
			}
//		}
	</script>

	<link href="css/alinhar2.css" rel="stylesheet">

	</head>
    	<center><h1><b>Cadastro de Usuário</b></h1></center>
    	<br>

    	<form name="frmIncluirUsers" action="cadUsers.php" method="post">

		<label for="login"><b>Login*:</b> </label>
		<input type="text" name="login" id="login" size="5" maxlength="15"/>
		</label>

		<br>
		<br>

		<label for="senha"><b>Senha*:</b> </label>
		<input type="password" name="senha" id="senha" size="6" maxlength="15"/>
		</label>

    	<br>
    	<br>

		<label for="senha_confirma"><b>Confirmar Senha*:</b> </label>
		<input type="password" name="senha_confirma" id="senha_confirma" size="6" maxlength="15"/>
		</label>

		<br>
		<br>

		<label for="apelido"><b>Nome*:</b> </label>
		<input type="text" name="apelido" id="apelido" size="10" maxlength="100"/>
		</label>

		<br>
		<br>

		<label for="sexo"><b>Sexo*:</b> 
		<input type="radio" name="sexo" id="sexo" size="" value="M"  /> Masculino
		<input type="radio" name="sexo" id="sexo" size="" value="F"  /> Feminino
		</label>

		<br>
		<br>

		<label for="nivel"><b>Nível*:</b> 
		<input type="radio" name="nivel" id="nivel" size="" value="P"  /> Professor
		<input type="radio" name="nivel" id="nivel" size="" value="C"  /> Coordenador
		<input type="radio" name="nivel" id="nivel" size="" value="A"  /> Auxiliador
		</label>
		
		<br>
		<br>

    	<h5> <strong>Todos os campos com * serão de preenchimento obrigatório.</strong></h5>

	<center><button type="button" class="btn btn-info"
				onclick="javascript:validarDados()"> Gravar!
	</center></button>
	<a href="menu.php"> &lt; Voltar</a>

		</form>
	<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>	    
<?php
include 'rodape.php';
?>