<?php
	include "cabecalho.php";
	session_start();
?>

<?php 
	if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
		echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
		echo "<div class='container' >";
		echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
		echo "</div>"; 
	
	}if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
?>
	</head>
	<body>
<?php 
	include "boots.php"; 
?>
	<br/><br/>
<?php 
	include "conexao.php"; 
?>
	
	<?php
		$curso = (int)$_POST['curso'];
		$disciplina = (int)$_POST['disciplina'];
		$modulo = htmlspecialchars($_POST['modulo']);

		$sql = sprintf("INSERT INTO curso_disciplina VALUES(%s,%s,'%s','%s')",$curso,$disciplina,$modulo,$_SESSION['login']);
		$sqlres = pg_query($con,$sql);
		if(pg_num_rows<=0){
			echo "<script>alert('Grade definida com sucesso!!!'); window.location.href='gradecurricular.php'</script>";
		}elseif(pg_num_rows>0){
			echo "<script>alert('Erro ao definir grade!!!'); window.location.href='gradecurricular.php'</script>";
		}
	?>
			
<?php
	}else{
		echo "<script>alert('Você deve estar logado!'); window.location.href='index.php'</script>";		
	}
	include "rodape.php";
?>
