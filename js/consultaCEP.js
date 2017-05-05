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
