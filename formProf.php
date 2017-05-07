<?php
include 'cabecalho.php';
include 'boots.php';
?>
<br><br>
<?php
include 'conexao.php';
?>
    <script type="text/javascript">
	    function validarDados(){

    	/*	matricula = document.frmIncluirProf.matricula.value;
			nome = document.frmIncluirProf.nome.value;
			cep = document.frmIncluirProf.cep.value;
			logradouro = document.frmIncluirProf.logradouro.value;
			numero = document.frmIncluirProf.numero.value;
			bairro = document.frmIncluirProf.bairro.value;
			cidade = document.frmIncluirProf.cidade.value;
			uf = document.frmIncluirProf.uf.value;
			id = document.frmIncluirProf.id.value;

			//validação dos campos obrigatórios
			if (matricula == "" || nome == "" || cep == "" || logradouro == "" || numero == "" || bairro == "" || cidade == "" || uf == "" || id == ""){
            	window.alert("Verifique se os campos estão todos preenchidos.");

			}else{*/
				document.frmIncluirProf.submit();
			}
//		}
	</script>
	<link href="css/alinhar.css" rel="stylesheet">
	</head>
    	<center><h1><b>Cadastro de professor</b></h1></center>
    	<br>

    	<form name="frmIncluirProf" action="cadProf.php" method="post">

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
			?>
	</select>

		<br>

	<center><button type="button" class="btn btn-info"
				onclick="javascript:validarDados()"> Gravar!
	</center></button>
	<a href="menu.php"> &lt; Voltar</a>

		</form>
		<script src="js/consultaCEP.js"></script>
<?php
include 'rodape.php';
?>
