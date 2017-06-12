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
			
		}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>

<br><br>

<?php
include 'conexao.php';
?>
		<script>
				function valida(){
				var matricula = $("#matricula").val();
				var nome = $("#nome").val();
				var cep = $("#cep").val();
				var logradouro = $("#logradouro").val();
				var numero = $("#numero").val();
				var bairro = $("#bairro").val();
				var cidade = $("#cidade").val();
				var uf = $("#uf").val();
				
				if(matricula == ''){
					alert("Digite a matricula");
					document.getElementById('matricula').focus();
					return false;
				}
				if(nome == ''){
					alert("Digite o nome");
					document.getElementById('nome').focus();
					return false;
				}
				if(cep == ''){
					alert("Digite o cep");
					document.getElementById('cep').focus();
					return false;
				}
				if(logradouro == ''){
					alert("Digite o logradouro");
					document.getElementById('logradouro').focus();
					return false;
				}
				if(numero == ''){
					alert("Digite o número");
					document.getElementById('numero').focus();
					return false;
				}
				if(bairro == ''){
					alert("Digite o bairro");
					document.getElementById('bairro').focus();
					return false;
				}
				if(cidade == ''){
					alert("Digite o cep");
					document.getElementById('cep').focus();
					return false;
				}
				if(uf == ''){
					alert("Digite o cep");
					document.getElementById('cep').focus();
					return false;
				}
				if(document.getElementById('id').selectedIndex == false || document.getElementById('id').value == "Selecione..."){
					alert("Você deve selecionar um usuário");
					document.getElementById('id').focus();
					return false;
				}
				
				return true;
			}


		</script>
    
	<link href="css/alinhar.css" rel="stylesheet">
	</head>
    	<center><h1><b>Cadastro de professor</b></h1></center>
    	<br>

    	<form name="frmIncluirProf" action="cadProf.php" method="post" onSubmit="javascript: return valida();">

		<label for="matricula"><b>Matrícula*:</b> </label>
		<input type="number" name="matricula" id="matricula" size="31" maxlength="15"/>

		<br>
		<br>

		<label for="nome"><b>Nome*:</b> </label>
		<input type="text" name="nome" id="nome" size="31" maxlength="60"/>

    	<br>
    	<br>

        <b><label> CEP*:</b>
		<input type="text" name="cep" id="cep" size="10" maxlength="9" onBlur="buscarDadosCEP()" /></label>
		<label id="splash">Aguarde...</label>

		<br>
		<br>

		<label for="logradouro"><b>Logradouro*:</b> </label>
		<input type="text" name="logradouro" id="logradouro" size="50 " maxlength="100"/>

		<br>
		<br>

		<label for="numero"><b>Número*:</b> </label>
		<input type="text" name="numero" id="numero" size="4" maxlength="15"/>

		<br>
		<br>

		<label for="complemento"><b>Complemento:</b> </label>
		<input type="text" name="complemento" id="complemento" size="50" maxlength="100"/>

		<br>
		<br>

		<label for="bairro"><b>Bairro*:</b> </label>
		<input type="text" name="bairro" id="bairro" size="35" maxlength="40"/>

		<br>
		<br>

		<label for="cidade"><b>Cidade*:</b> </label>
		<input type="text" name="cidade2" id="cidade2" size="20" maxlength="35" disabled/>
		<input type="hidden" name="cidade" id="cidade" maxlength="35"/>

		<br>
		<br>

		<label for="uf"><b>UF*:</b> </label>
		<input type="text" name="uf2" id="uf2" size="2" maxlength="2" disabled/>
		<input type="hidden" name="uf" id="uf" />

		<br>
		<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Usuário*: </b><select name="id" id="id">
		<option value=''>--Selecione--</option>
			<?php
				$sqlusuario= sprintf("SELECT id, apelido FROM usuario WHERE nivel IN ('P', 'C') ORDER BY apelido"); 
				$sqlresultado = pg_query($con,$sqlusuario);
				while($dados = pg_fetch_array($sqlresultado)){
					echo "<option value='" . $dados['id'] ."'>" . $dados['apelido'] . "</option>";
				}
				pg_close($con);
			?>
	</select>

		<br>

	<center><button type="submit" class="btn btn-info"
				> Gravar!
	</center></button>
	<a href="menu.php"> &lt; Voltar</a>

		</form>
		<script src="js/consultaCEP.js"></script>
	<?php 
			}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'A' || $_SESSION['nivel'] != 'C')){
				echo "<b>Você não tem permissão</b><br>";
				echo "<div class='col-md-7'>";
				echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
				echo "</div>";
			} 
			?>	
<?php
include 'rodape.php';
?>
