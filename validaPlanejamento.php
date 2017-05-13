</br>
<?php
	session_start();
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['ano']) && isset($_POST['semestre'])){
		if(isset($_SESSION['login']) && isset($_SESSION['nivel'])){
		
			$login = $_SESSION['login'];
			$ano = $_POST['ano'];
			$semestre = $_POST['semestre'];
			$dtinicio = $_POST['dtinicio'];
			$dtfinal = $_POST['dtfinal'];
			$cursos = $_POST['curso'];
			$situacao = $_POST['situacao'];
			$contador = count($cursos);
			
			include "conexao.php";
			
			$sqlinsert=sprintf("INSERT INTO planejamento(ano,semestre,data_inicio,data_termino,situacao) VALUES (%s,%s,'%s','%s','%s')",$ano,$semestre,$dtinicio,$dtfinal,$situacao);

			$insere=pg_query($con,$sqlinsert);

			$sqlid=sprintf("SELECT MAX(id) FROM planejamento");
			$sqlin=pg_query($con,$sqlid);
			$result=pg_fetch_array($sqlin);
			$id= $result['max'];
			for($i=0;$i<$contador;$i++){
				
				$sqlinsere=sprintf("INSERT INTO planejamento_curso VALUES(%s,%s)",$cursos[$i],$id);
				$sqlcurso= pg_query($con,$sqlinsere);
			}
			echo "<script>alert('Planejamento iniciado com sucesso!!!'); window.location.href='iniciarPlanejamento.php'</script>";
			pg_close($con);
			
		}else{
			echo "<script>alert('Você deve estar logado!');window.location.href='login.php'</script>";
		}
	}
?>
		






