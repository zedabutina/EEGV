<?php include "cabecalho.php"; ?>
	</head>
<?php include "boots.php"; ?>
	<br/><br/>
<?php include "conexao.php"; ?>
	<body>
		<div id="main" class="container-fluid">
			<h3 class="page-header">Editar Professor</h3>
			<?php
				$matricula = $_POST['num'];
				$idp = $_POST['idp'];
				$ant = $_POST['ant'];
				$ide = $_POST['ide'];
				echo $matricula;
				echo $idp;
				echo $ide;

				if (empty($matricula)){
					echo "<br><br><br>";
					die("<b><font color=" . red . ">ERRO!</font></b>");
				}elseif($matricula > 0 && $idp== '9rj9!@#@!329vjy@#$#%#ngv2'){
					$exc = sprintf("DELETE FROM professor WHERE matricula='%s'",$matricula);
					$result = pg_query($con,$exc);
					pg_close($con);
					header('Location: alterarProf.php');
				}elseif($ant != $matricula && $ide='fff3#@$%#@EGT$%TG' && $idp==' '){
					$matricula = $_POST['matricula'];
					$excl = sprintf("DELETE FROM professor WHERE matricula='%s'",$matricula);
					$exc = sprintf("DELETE FROM professor WHERE matricula='%s'",$ant);
					$result = pg_query($con,$exc);
					$resol = pg_query($con,$excl);
					$nome = $_POST['nome'];
					$cep = $_POST['cep'];
					$logradouro = $_POST['logradouro'];
					$numero = $_POST['numero'];
					$complemento = $_POST['complemento'];
					$bairro = $_POST['bairro'];
					$cidade = $_POST['cidade'];
					$uf = $_POST['uf'];
					$id = $_POST['id'];
					if ($complemento == ' '){
						$insert = sprintf("INSERT INTO professor(matricula,nome,cep,logradouro,numero,bairro,cidade,uf,id) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s')",$matricula,$nome,$cep,$logradouro,$numero,$bairro,$cidade,$uf,$id);
					}elseif($complemento != ' '){
						$insert = sprintf("INSERT INTO professor VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$matricula,$nome,$cep,$logradouro,$numero,$complemento,$bairro,$cidade,$uf,$id);
					}
					$resultado = pg_query($con,$insert);
					echo "<b>Alteração efetuada com Sucesso</b>";
					echo "<div align='center' class='row'>";
					echo "<a href='alterarProf.php' class='btn btn-primary'>Listar Cursos</a>";
					echo "<button onClick='#' class='btn btn-secondary'>Menu</button>";
					echo "</div>";
	//				header('Refresh: 3; url=alterarProf.php');
				}elseif($idp=='SDFfdasf3$@!4t34534fSD'){
					$matricula = $_POST['matricula'];
					$nome = $_POST['nome'];
					$cep = $_POST['cep'];
					$logradouro = $_POST['logradouro'];
					$numero = $_POST['numero'];
					$complemento = $_POST['complemento'];
					$bairro = $_POST['bairro'];
					$cidade = $_POST['cidade'];
					$uf = $_POST['uf'];
					$id = $_POST['id'];
					$sub=sprintf("DELETE FROM professor WHERE matricula='%s'",$ant);
					$subinsert=pg_query($con,$sub);
					$substituir=sprintf("UPDATE professor SET matricula='%s' WHERE matricula='%s'",$ant,$matricula);
					$substituirResult=pg_query($con,$substituir);
					if ($complemento == ' '){
						$insert = sprintf("INSERT INTO professor(matricula,nome,cep,logradouro,numero,bairro,cidade,uf,id) VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s')",$matricula,$nome,$cep,$logradouro,$numero,$bairro,$cidade,$uf,$id);
					}elseif($complemento != ' '){
						$insert = sprintf("INSERT INTO professor VALUES('%s','%s','%s','%s','%s','%s','%s','%s','%s','%s')",$matricula,$nome,$cep,$logradouro,$numero,$complemento,$bairro,$cidade,$uf,$id);
					}
					$resulInset = pg_query($con,$insert);
					echo "<b>Troca efetuada com sucesso</b>";
					echo "<div align='center' class='row'>";
					echo "<a href='alterarProf.php' class='btn btn-primary'>Listar Cursos</a>";
					echo "<button onClick='#' class='btn btn-secondary'>Menu</button>";
					echo "</div>";
	//				header('Refresh: 3; url=alterarProf.php');
				}
			?>
		</div>
<?php include "rodape.php"; ?>
