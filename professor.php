<!DOCTYPE html>
<!--Emanuel Gomes!-->
<html lang="pt-br">
	<head>



	<script src="bootstrap/js/jquery.min.js"></script>
	<script src="bootstrap/js/bootstrap.min.js"></script>


    	<script type="text/javascript">
	    	function validarDados(){

    			login = document.frmIncluirProf.login.value;
				senha = document.frmIncluirProf.senha.value;
				nome = document.frmIncluirProf.nome.value;
				email = document.frmIncluirProf.email.value;
				cidade = document.frmIncluirProf.cidade.value;
				categoria = document.frmIncluirProf.categoria.value;

				//validação dos campos obrigatórios
				if (login == "" || senha == "" || nome == "" || email == "" || cidade == "" || categoria == ""){
            		window.alert("Verifique se os campos estão todos preenchidos.");

				}else{
					document.frmIncluirProf.submit();
				}
			}
		</script>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Sistema Acadêmico</title>

		<link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
		<link href="bootstrap/css/style.css" rel="stylesheet">
	</head>
	<body>

		<nav class="navbar navbar-inverse navbar-fixed-top">
		 <div class="container-fluid">
   		  <div class="navbar-header">
    	  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
    	 <span class="sr-only">Toggle navigation</span>
 	    <span class="icon-bar"></span>
  	   <span class="icon-bar"></span>
  	   <span class="icon-bar"></span>
 	   </button>
 	   <a class="navbar-brand" href="pagina_inicial.php"># Sistema Acadêmico</a>
 	  </div>
 	  <div id="navbar" class="navbar-collapse collapse">
 	   <ul class="nav navbar-nav navbar-right">
 	    <li><a href="logout.php">Logout</a></li>
 	    <li><a href="login.html">Login</a></li>
 	   </ul>
 	  </div>
	  </div>
 	</nav>

	<body>
		<br><br><br><br>
    	<center><h1><b>Cadastro de professor</b></h1></center>
    	<br>

    	<form name="frmIncluirProf" action="cadProf.php" method="get">

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
		<input type="text" name="logradouro" id="logradouro" size="70 " maxlength="100"/>

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

	<b>UF*: </b><select name="uf" id="uf"></h1>
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

	<b>ID*: </b><select name="uf" id="uf"></h1>
				<option value=''>--Selecione--</option>
			</select>
		<br>
		<br>

    	<h5> <strong>Todos os campos com * são de preenchimento obrigatório.</strong></h5>

	<center><button type="button" class="btn btn-info"
				onclick="javascript:validarDados()"> Gravar!
	</center></button>
	<a href="pagina_inicial.php"> &lt; Voltar</a>

		</form>
	<hr>
	</body>
	<script>
		$("#splash").hide();
		function buscarDadosCEP(){
			var url = "//viacep.com.br/ws/"+$("#cep").val() +"/json/";
			$("#splash").show();			
			$.get(url, preencherDados)
				.fail(msgErro)
				.always(esconder);
		}

		function esconder(){
			$("#splash").hide();
		}

		function msgErro(){
			alert("Erro ao buscar o CEP");
			
		}

		function preencherDados(dados){
			$("#logradouro").val(dados.logradouro);
			$("#bairro").val(dados.bairro);
			$("#cidade").val(dados.localidade);
			$("#uf").val(dados.uf);
		}

	</script>
</html>
<!--Emanuel Gomes!-->
