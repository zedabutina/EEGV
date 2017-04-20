<!-- viNi++ -->

<?php 
	  include "conexao.php";
?>

<?php

	if($_SERVER['REQUEST_METHOD'] == "POST"){
		
		if(isset($_POST['cod_disc'])){
			$cod_disc = $_POST['cod_disc'];
			$query_del = sprintf("DELETE FROM disciplina WHERE codigo='%s'",$cod_disc);
			$result = pg_query($con,$query_del);

			if($result){
				header('Location: alterarDisc.php');
			} else {
				header('Location: alterarDisc.php');
			}

		} else {
			echo 'Favor, prencher os dados!';
		}

	} else {
		echo 'HAHA MALANDRAO, POST!';
	}


?>
