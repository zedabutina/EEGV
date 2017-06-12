<!-- viNi++ -->

<?php include "boots.php"; ?>

<?php include "cabecalho.php";
        session_start(); ?>
    </head>

<?php include "conexao.php"; ?>
    <body>


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

    <div class="container-fluid">
        <h3 class="page-header"> Editar Disciplina</h3><br>
        
        <div class="row">


  <form method="POST" action="setDisc.php" class="form-horizontal" onSubmit="javascript: return valida();">
                <div class="form-group">

    <?php 
        if(!isset($_SESSION['login']) || !isset($_SESSION['nivel'])){ 
            echo "</br><b>Você deve estar logado e ter permissão para isso!!!</b><br><hr>";
            echo "<div class='container' >";
            echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
            echo "</div>"; 
            
        }if($_SESSION['nivel'] == 'A' || $_SESSION['nivel'] == 'C'){
    ?>


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
                        }
                     }
        ?>
                   


             </form>
        </div>
    </div>

<?php 
            }elseif(isset($_SESSION['login']) && ($_SESSION['nivel'] != 'A' || $_SESSION['nivel'] != 'C')){
                echo "<b>Você não tem permissão</b><br>";
                echo "<div class='col-md-7'>";
                echo "<button class='btn btn-primary pull-right h2' onClick='window.history.go(-1)'><b>Voltar</b></button>";
                echo "</div>";
            } 
?>


<?php
        include "rodape.php";
?>    
  
</body>

</html>

