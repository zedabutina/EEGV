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
            
        }elseif($_SESSION['nivel'] == 'P'){
?>

<br><br>

<?php
include 'conexao.php';
?>
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
        <h3 class="page-header">Consultar Plano de Ensino</h3><br>
        <div class="row">
            <form method="POST" action="consPE2.php" class="form-horizontal">


                <div class="form-group">
                   
                    <div class="col-md-10">
				<b>Disciplina*: &nbsp;&nbsp;&nbsp;&nbsp;</b><select name="codplano" id="codplano">
					<option value=''>--Selecione--</option>
				<?php
					$sqlusuario= sprintf("SELECT d.codigo as disc,d.nome as nomeDisc, p.codigo as prof FROM disciplina d INNER JOIN planoensino p ON p.codigo_disc = d.codigo INNER JOIN professor r ON p.matricula_professor= r.matricula INNER JOIN usuario u ON u.id = r.id WHERE u.login = '%s'",$_SESSION['login']);
					$sqlresultado = pg_query($con,$sqlusuario);	
					while($dados = pg_fetch_array($sqlresultado)){
						echo "<option value='" . $dados['disc'] ."'>" . $dados['nomedisc'] . "&nbsp;&nbsp;-&nbsp;&nbsp;P. de Ens. Nº" . $dados['prof'] . "</option>";	
					}

				?>
				</select>
                    </div>
                    
                </div>
				<div class="col-md-9"></div>

					<div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Visualizar</button>
                    </div>

				<br>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
            <?php 
            }elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'P')){
                echo "<b>Você não tem permissão</b><br>";
                echo "<div class='col-md-7'>";
                echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
                echo "</div>";
            } 
            ?>          
<?php
include 'rodape.php';
?>

