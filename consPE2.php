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
            <form method="POST" action="#" class="form-horizontal">
                <div class="form-group"> 
                    <div class="col-md-1"></div> 
						<?php
							$codigoP = $_POST['codigo'];
				//			echo $codigoP;
							$sql=sprintf("SELECT * FROM disciplina WHERE codigo = '%s'", $codigoP);
							$contador = pg_query($con,$sql);
							$result = pg_num_rows($contador);
							if($result==0){
								echo "<br><br><b><p align='right'>A disciplina selecionada não consta no sistema.</b><br>";
								die("<b><font color='red'>ERRO!</p></font></b>");
							}
							while($dados = pg_fetch_array($contador)){
						?>
                    <label class="col-md-1 control-label" for="campo1">Código:</label>
                    <div class="col-md-3">
						<?php
							echo "<input type='number' name='codigo' id='codigo' class='form-control' placeholder='" . $dados['codigo'] . "' disabled>"
						?>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo2">Disciplina:</label>
                    <div class="col-md-3">
						<?php
							echo "<input type='nome' name='nome' id='nome' class='form-control' placeholder='" . $dados['nome'] . "' disabled>"
						?>
                    </div>

                    <div class="col-md-1"></div> 
       <!--         </div> 

                <div class="form-group">    -->
                    <div class="col-md-0"></div> 

                    <label class="col-md-1 control-label" for="campo3">Carga Horária:</label>
                    <div class="col-md-1">
						<?php
							echo "<input type='ch' name='ch' id='ch' class='form-control' placeholder='" . $dados['ch'] . "' disabled>"
						?>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo4">Ementa:</label>
                    <div class="col-md-1">
						<?php
							echo "<textarea name='ementa' id='ementa' cols='80' rows='5' placeholder='" . $dados['ementa'] . "' disabled></textarea>"
						?>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo5">Objetivo:</label>
                    <div class="col-md-9">
						<?php
							echo "<textarea name='objetivo' id='objetivo' cols='80' rows='5' placeholder='" . $dados['objetivo'] . "' disabled></textarea>"
						?>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo6">Bibliografia Básica:</label>
                    <div class="col-md-9">
						<?php
							echo "<textarea name='bibliografia_basica' id='bibliografia_basica' cols='80' rows='5' placeholder='" . $dados['bibliografia_basica'] . "' disabled></textarea>"
						?>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div>

                    <label class="col-md-1 control-label" for="campo7">Bibliografia Complementar:</label>
                    <div class="col-md-9">
						<?php
							echo "<textarea name='bibliografia_complementar' id='bibliografia_complementar' cols='80' rows='5' placeholder='" . $dados['bibliografia_complementar'] . "' disabled></textarea>"
						?>
                    </div>
			<?php
				}
			?>

                <br><br><br><br><br><br><br>

                    <div class="col-md-1"></div> 
                </div>             

                <hr/>

                <div class="form-group"> 
                    <div class="col-md-9"></div> 

                    <div class="col-md-1">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                    <div class="col-md-0">
                        <a href="menu.php" class="btn btn-default">Menu</a>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <br/>
                <br/>

            </form>
        </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
<?php
include 'rodape.php';
?>
