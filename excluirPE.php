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
            
        }elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] == 'P' || $_SESSION['nivel'] == 'C')){
?>

	<br><br>
	</head>
<?php
	include 'conexao.php';
?>

	<br><br>
	<body>

		<?php
	
			$planoensino = (int)$_POST['coddisc'];
			$sqlex=sprintf("SELECT * FROM planoensino WHERE codigo = '%s'",$planoensino);
			$ressql=pg_query($con,$sqlex);
			$dados = pg_fetch_array($ressql);

			if($dados['situacao']!='A'){
			$log3=sprintf("UPDATE planoensino set autor = '%s' WHERE codigo='%s'",$_SESSION['login'],$planoensino);
			$conlog3=pg_query($con,$log3);

			$del=sprintf("DELETE FROM planoensino WHERE codigo = '%s'",$planoensino);
			$delres=pg_query($con,$del);
			header('Location: meusplanosdeensino.php');
			}else{  
			echo "<script>alert('Curso Aprovado não pode ser excluido!');window.location.href='meusplanosdeensino.php'</script>";
			}

		?>
<?php 
	}elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'P' || $_SESSION['nivel'] != 'C')){
		echo "<b>Você não tem permissão</b><br>";
		echo "<div class='col-md-7'>";
		echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
		echo "</div>";
	} 
?> 	     		
<?php									
	include "rodape.php";
?>

