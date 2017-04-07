<?php 

if(!$con){
	header("location:#");
}

$codigo = $_POST['codigodisc'];
$nome = $_POST['nomedisc'];
$ch = $_POST['ch'];
$ementa = $_POST['ementa'];
$objetivo = $_POST['objetivo'];
$bibliografia_basica = $_POST['bibliografia_basica'];
$bibliografia_complementar = $_POST['bibliografia_complementar'];


$insertsql = "INSERT INTO disciplina (codigodisc, nomedisc, ch, ementa, objetivo, $bibliografia_basica, bibliografia_complementar ) VALUES ('".$codigo."', '".$nome."', '".$ch."', '".$ementa."', '".$objetivo."', '".$bibliografia_basica."' '".$bibliografia_complementar."');";

?>


// only save ! terminando o HTML.
