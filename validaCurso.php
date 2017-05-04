<?php
	if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['numero'])){
		$strConn = "host=localhost dbname=sipedb port=5432 user=sipe password='senac123'";
		$con = pg_connect($strConn);
		$numero = $_POST['numero'];
		if($numero!=''){
			$sql=sprintf("SELECT * FROM curso WHERE numero = %s",$numero);
			$valid=pg_query($con,$sql);
			if (pg_num_rows($valid)==0){
				echo "<img src='images/valido.png' width='24' height='24'></img>";
			}elseif($valid>0){
				echo "<img src='images/invalido.png' width='24' height='24'></img>";
			}
		}
	}
?>
		






