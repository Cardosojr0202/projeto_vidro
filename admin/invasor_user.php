<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Refresh" content="15;URL=index.php">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invasor</title>
    <link rel="shortcut icon" href="../imagens/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script> 
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <style>
        .bg{
            background-color: rgba(0, 0, 0, 0.8);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 30px;
            border-radius: 60px 0 60px 0;
            color: white;
            width: 350px;
        }
        .img{
            width: 250px;
            height: 140px;
        }
    </style>
</head>
<body class="fundofixo">
    <main class="container">
        <section>
            <article>
                <div class="row">
                    <div class="bg mx-auto col-sm-6 col-md-5 col-lg-4">
                        <h1 class="text-danger text-center">Check identity</h1>
                        <div class="text-center">
                            <div class="img mx-auto d-block">
                                <img src="../imagens/invasor.jpg" style="width: 100%; height: 100%;">
                            </div>
                            <div>
                                <br><br>
                                <h4>
                                    <i class="fas fa-spinner fa-lg fa-pulse"></i>
                                    Você não tem <br>acesso a essa página 
                                </h4>
                                <div class="btn-group m-2" role="group" aria-label="Basic mixed styles example">
                                    <a href="index.php" type="button" class="btn btn-success">
                                        <i class="fas fa-external-link-alt fa-rotate-270 fa-1x"></i><br>
                                        Voltar ao painel
                                    </a>
                                    <a href="../index.php" type="button" class="btn btn-danger">
                                        <i class="fas fa-home fa-1x"></i><br>
                                        Voltar ao site
                                    </a>
                                </div>
                                <p>
                                    <small>
                                        <br>
                                        caso não faça uma escolha em 15 segundo será redirecionado automaticamente para pagina inicial.
                                    </small>
                                </p>
                            </div>
                        </div>
                    </div><!-- Fecha Dimencionamento -->
                </div><!-- Fecha ROW -->
            </article>
        </section>
    </main>
    
</body>
</html>