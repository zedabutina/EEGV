<!-- viNi++ -->

<?php 
include "conexao.php"; //conexão com o banco de dados
?>

<?php 

if(!$con){
	header("location: #");
}

if($_SERVER['REQUEST_METHOD'] == "POST"){ // Esta função permite que seja recebido apenas requisições método POST
	if(!isset($_POST['codigodisc']) && $_POST['nome'] && $_POST['ch'] && $_POST['ementa'] &&  $_POST['objetivo'] && $_POST['bb'] && $_POST['bc'])// Esta função valida todos os dados
	{
		$codigo = $_POST['codigo'];
		$nome = $_POST['nome'];
		$ch = $_POST['ch'];
		$ementa = $_POST['ementa'];
		$objetivo = $_POST['objetivo'];
		$bibliografia_basica = $_POST['bb'];
		$bibliografia_complementar = $_POST['bc'];

		try{
			$query = "INSERT INTO disciplina (codigo, nome, ch, ementa, objetivo, bibliografia_basica, bibliografia_complementar) VALUES ('".$codigo."', '".$nome."', '".$ch."', '".$ementa."', '".$objetivo."', '".$bibliografia_basica."', '".$bibliografia_complementar."');";
			$result = pg_query($con,$query);

			if($result){
				echo '<script>alert("Dados cadastrados com sucesso!")</script>';
				header('Location: formDisc.php');
			} else {
				echo '<script>alert("Erro ao cadastrar!")</script>';		
				header('Location: formDisc.php');

			}

		} catch(\Exception $e){
			echo 'test :/';
		}


	} else {
		echo '<script>alert("Favor, prencher todos os dados!")</script>';
	}

}else {
	echo 'Haha malandrão!';
}

?>
