<?php
include 'cabecalho.php';
include 'boots.php';
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

				?>
				</select>
                    </div>

                    <div class="col-md-1"></div>
                </div>
				<div class="col-md-9"></div>

					<div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Carregar...</button>
                    </div>

				<br>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
<?php
include 'rodape.php';
?>
