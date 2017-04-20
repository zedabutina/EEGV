<!-- viNi++ -->

<?php include "conexao.php"; ?>

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
    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#">Editar Disciplina</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Página Inicial</a></li>
                    <li><a href="#">Login</a></li> 
                    <li><a href="#">Cadastrar usuário</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <br><br>

    <div class="container-fluid">
        <h3 class="page-header"> Editar Disciplina</h3><br>
        
        <div class="row">

  <form method="POST" action="setDisc.php" class="form-horizontal" onSubmit="javascript: return valida();">
                <div class="form-group">
        <?php 

            if(!empty( $_POST['cod_disc'])){
                $cod = $_POST['cod_disc'];
                $sql = sprintf('SELECT * FROM disciplina WHERE codigo = %s',$cod);
                $result = pg_query($con,$sql);


                     while($dados = pg_fetch_array($result)){

                        echo '<div class="col-md-1"></div> 

                            <label class="col-md-1 control-label" for="codigo">Código:</label>
                            <div class="col-md-3">


                            <input type="number" name="codigo" id="codigo" class="form-control" value="'. $dados['codigo'] .'" placeholder="Digite o Código aqui.">
                            </div>

                             <div class="col-md-1"></div> 
                            </div> 

                            <div class="form-group"> 
                            <div class="col-md-1"></div> 

                            <label class="col-md-1 control-label" for="disciplina">Disciplina:</label>
                            <div class="col-md-3">
                            <input type="text" name="nome" id="nome" value="' . $dados['nome'] .'"class="form-control input-md" placeholder="Digite o nome da Disciplina aqui." maxlength="80">
                            </div>

                        <div class="col-md-1"></div>';


                        echo '   
                        </div> 

                        <div class="form-group"> 
                            <div class="col-md-1"></div> 

                            <label class="col-md-1 control-label" for="ch">Carga Horária:</label>
                            <div class="col-md-3">
                                <input type="number" name="ch" id="ch" value="' . $dados['ch']  . '" class="form-control input-md" placeholder="Digite a Carga Horária da disciplina aqui">
                            </div>

                            <div class="col-md-1"></div> 
                        </div> 

                        <div class="form-group"> 
                            <div class="col-md-1"></div> 

                            <label class="col-md-1 control-label" for="ementa">Ementa:</label>
                            <div class="col-md-1">
                                <textarea name="ementa" id="ementa" cols="80" rows="5" placeholder="Digite a Ementa da disciplina aqui.">' . $dados['ementa']. '</textarea>
                            </div>

                            <div class="col-md-1"></div> 
                        </div> 

                        <div class="form-group"> 
                            <div class="col-md-1"></div> 

                            <label class="col-md-1 control-label" for="objetivo">Objetivo:</label>
                            <div class="col-md-9">
                                <textarea name="objetivo" id="objetivo" cols="80" rows="5" placeholder="Digite o Objetivo da disciplina aqui.">' . $dados['objetivo'] . '</textarea>
                            </div>

                            <div class="col-md-1"></div> 
                        </div> 

                        <div class="form-group"> 
                            <div class="col-md-1"></div> 

                            <label class="col-md-1 control-label" for="bb">Bibliografia Básica:</label>
                            <div class="col-md-9">
                                <textarea name="bb" id="bb" cols="80" rows="5" placeholder="Digite Bibliografia Básica da disciplina aqui.">' . $dados['bibliografia_basica'] . '</textarea>
                            </div>

                            <div class="col-md-1"></div> 
                        </div> 

                        <div class="form-group"> 
                            <div class="col-md-1"></div>

                            <label class="col-md-1 control-label" for="bc">Bibliografia Complementar:</label>
                            <div class="col-md-9">
                                <textarea name="bc" id="bc" cols="80" rows="5" placeholder="Digite Bibliografia Complementar da disciplina aqui.">' . $dados['bibliografia_complementar'] . '</textarea>
                            </div>

                            ';


                            echo '<br><br><br><br><br><br><br>

                                    <b> Todos os campos devem ser preenchidos</b>

                                <div class="col-md-1"></div> 
                            </div>             

                            <hr/>

                                <div class="form-group"> 
                                    <div class="col-md-9"></div> 

                                    <div class="col-md-1">
                                        <button type="submit" class="btn btn-primary" type="submit ">Atualizar</button>
                                    </div>

                            </form>

                                    <div class="col-md-0">
                                        <a href="alterarDisc.php" class="btn btn-default">Voltar</a>
                                    </div>

                                    <div class="col-md-1"></div> 
                                </div> 

                                <br/>
                                <br/>

                            ';
                            


                    } } else {
                echo 'FAVOOOOOOOR, PASSAR O CODIGO DA DISCIPLINA';
            } 
        ?>
                   
               

                

            </form>
        </div>
    </div>
    
  
</body>

</html>
