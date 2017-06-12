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

    <script>
							function valida(){
								var login = $("#login").val();
								var senha = $("#senha").val();
								var senha_confirma = $("#senha_confirma").val();
								var apelido = $("#apelido").val();
								
							
								if(login==''){
									alert("Digite um Login");
									document.getElementById('login').focus();
									return false;
								}
								if(senha==''){
									alert("Digite uma Senha");
									document.getElementById('senha').focus();
									return false;
								}
								if(senha_confirma==''){
									alert("Digite a mesma Novamente");
									document.getElementById('senha_confirma').focus();
									return false;
								}
								if(apelido==''){
									alert("Digite um apelido");
									document.getElementById('apelido').focus();
									return false;
								}
								
								if (senha!=senha_confirma){
									alert("Senhas não conferem.Digite novamente!");
									document.getElementById('senha_confirma').focus();
									return false;
								}
								if((frmIncluirUsers.sexo[0].checked == false)&&(frmIncluirUsers.sexo[1].checked == false)){
									alert("Escolha um sexo");
									document.getElementById('sexo').focus();
									return false;
								}
								if((frmIncluirUsers.nivel[0].checked == false)&&(frmIncluirUsers.nivel[1].checked == false)&&(frmIncluirUsers.nivel[2].checked == false)){
									alert("Escolha um nível");
									document.getElementById('nivel').focus();
									return false;
								}
								return true;
							}
						</script>

	<link href="css/alinhar2.css" rel="stylesheet">

	</head>
    	<center><h1><b>Cadastro de Usuário</b></h1></center>
    	<br>

    	<form name="frmIncluirUsers" action="cadUsers.php" method="post" onSubmit="javascript: return valida();">

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

	<center><button type="submit" class="btn btn-info"> Gravar!</center></button>
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
