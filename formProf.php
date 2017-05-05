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
		<input type="text" name="cidade" id="cidade" size="25" maxlength="35"/>

		<br>
		<br>

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>UF*: </b><select name="uf" id="uf"><h1>
				<option value=''>--Selecione--</option>
				<optgroup label="Norte">
					<option value='AC'>Acre</option>
					<option value='AP'>Amapá</option>
					<option value='AM'>Amazonas</option>
					<option value='RO'>Rondônia</option>
					<option value='RR'>Roraima</option>
					<option value='PA'>Pará</option>
					<option value='TO'>Tocantins</option>
				</optgroup>
				<optgroup label="Nordeste">
					<option value='AL'>Alagoas</option>
					<option value='BA'>Bahia</option>
					<option value='CE'>Ceará</option>
					<option value='MA'>Maranhão</option>
					<option value='PB'>Paraíba</option>
					<option value='PE'>Pernambuco</option>
					<option value='PI'>Piauí</option>
					<option value='RN'>Rio Grande do Norte</option>
					<option value='SE'>Sergipe</option>
				</optgroup>
				<optgroup label="Centro-oeste">
					<option value='DF'>Distrito Federal</option>
					<option value='GO'>Goiás</option>
					<option value='MT'>Mato Grosso</option>
					<option value='MS'>Mato Grosso do Sul</option>
				</optgroup>
				<optgroup label="Sul">
					<option value='RS'>Rio Grande do Sul</option>
					<option value='PR'>Paraná</option>
					<option value='SC'>Santa Catarina</option>
				</optgroup>
				<optgroup label="Sudeste">
					<option value='ES'>Espírito Santo</option>
					<option value='MG'>Minas Gerais</option>
					<option value='RJ'>Rio de Janeiro</option>
					<option value='SP'>São Paulo</option>
				</optgroup>

		</select>

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
	</select></h1>

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
