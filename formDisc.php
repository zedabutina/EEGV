<!-- viNi++ -->

<?php
        include 'boots.php';
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sistema Acadêmico</title>
        <script src="js/jquery.js"></script>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">

        <script type="text/javascript">
            function valida(){
                if(document.getElementById('codigo').value == ''){
                    alert("Digite o código da disciplina");
                    document.getElementById('codigo').focus();
                    return false;
                }
                if(document.getElementById('nome').value == ''){
                    alert("Digite o nome da disciplina");
                    document.getElementById('nome').focus();
                    return false;
                }
                if(document.getElementById('ch').value == ''){
                    alert("Digite a carga horária");
                    document.getElementById('ch').focus();
                    return false;
                }
                if(document.getElementById('ementa').value == ''){
                    alert("Digite a Ementa da disciplina");
                    document.getElementById('ementa').focus();
                    return false;

                }
                if(document.getElementById('objetivo').value == ''){
                    alert("Digite o objetivo da disciplina");
                    document.getElementById('objetivo').focus();
                    return false;
                }
                if(document.getElementById('bb').value == ''){
                    alert("Digite a Bibliografia Básica");
                    document.getElementById('bb').focus();
                    return false;
                }
                if(document.getElementById('bc').value == ''){
                    alert("Digite a Bibliografia Complementar");
                    document.getElementById('bc').focus();
                    return false;
                }
            }
        </script>

    </head>
    <body>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <br>

    <div class="container-fluid">
        <h3 class="page-header"> Cadastro de Disciplina</h3><br>
        <div class="row">
            <form method="POST" action="cadDisc.php" class="form-horizontal" onSubmit="javascript: return valida();">
                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo1">Código:</label>
                    <div class="col-md-3">
                        <input type="number" name="codigo" id="codigo" class="form-control" placeholder="Digite o Código aqui.">
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo2">Disciplina:</label>
                    <div class="col-md-3">
                        <input type="text" name="nome" id="nome" class="form-control input-md" placeholder="Digite o nome da Disciplina aqui." maxlength="80">
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo3">Carga Horária:</label>
                    <div class="col-md-3">
                        <input type="number" name="ch" id="ch" class="form-control input-md" placeholder="Digite a Carga Horária aqui.">
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo4">Ementa:</label>
                    <div class="col-md-1">
                        <textarea name="ementa" id="ementa" cols="80" rows="5" placeholder="Digite a Ementa aqui."></textarea>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo5">Objetivo:</label>
                    <div class="col-md-9">
                        <textarea name="objetivo" id="objetivo" cols="80" rows="5" placeholder="Digite o Objetivo aqui."></textarea>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div> 

                    <label class="col-md-1 control-label" for="campo6">Bibliografia Básica:</label>
                    <div class="col-md-9">
                        <textarea name="bb" id="bb" cols="80" rows="5" placeholder="Digite Bibliografia Básica aqui."></textarea>
                    </div>

                    <div class="col-md-1"></div> 
                </div> 

                <div class="form-group"> 
                    <div class="col-md-1"></div>

                    <label class="col-md-1 control-label" for="campo7">Bibliografia Complementar:</label>
                    <div class="col-md-9">
                        <textarea name="bc" id="bc" cols="80" rows="5" placeholder="Digite Bibliografia Complementar aqui."></textarea>
                    </div>

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

</html>
