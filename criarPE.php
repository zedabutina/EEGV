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
            
        }if($_SESSION['nivel'] == 'P' || $_SESSION['nivel'] == 'C'){
?>

<br><br>

<?php
include 'conexao.php';
?>

<br><br>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema Acadêmico</title>
        <script src="js/jquery.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">


    </head>
    <body>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <br>

    <div class="container-fluid">
        <h3 class="page-header">Criar Plano de Ensino</h3><br>
        <div class="row">
            <form method="POST" action="formPE.php" class="form-horizontal" onSubmit="javascript: return valida();">


                <div class="form-group">
                    <div class="col-md-1"></div>
                    <div class="col-md-3">
				<b>Disciplina*: &nbsp;&nbsp;&nbsp;&nbsp;</b><select name="codigo" id="codigo">
					<option value=''>--Selecione--</option>
				<?php
					$sqlusuario= sprintf("SELECT codigo, nome FROM disciplina ORDER BY nome"); 
					$sqlresultado = pg_query($con,$sqlusuario);
					while($dados = pg_fetch_array($sqlresultado)){
						echo "<option value='" . $dados['codigo'] ."'>" . $dados['nome'] . "</option>";
					}
					pg_close($con);
				?>
				</select>
                    </div>

                    <div class="col-md-1"></div>
                </div>
				<div class="col-md-9"></div>

					<div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Criar</button>
                    </div>

				<br>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
	<script>
		function valida(){
			if(document.getElementById('codigo').selectedIndex == false || document.getElementById('codigo').value == "--Selecione--"){
							alert("Defina uma disciplina");
							document.getElementById('codigo').focus();
							return false;
			}
		}
	</script>
    <?php 
            }elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'P' || $_SESSION['nivel'] != 'C')){
                echo "<b>Você não tem permissão</b><br>";
                echo "<div class='col-md-7'>";
                echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
                echo "</div>";
            } 
            ?> 
<?php
include 'rodape.php';
?>

