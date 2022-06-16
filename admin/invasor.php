<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="Refresh" content="15;URL=../index.php"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invasor</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/2495680ceb.js" crossorigin="anonymous"></script>
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo">
<main class="container" style="margin-top: 3rem;">
<section>
    <article>
        <div class="row">
            <div class="bg mx-auto col-sm-6 col-md-5 col-lg-4">
                <h1 class="breadcrumb text-danger text-center">ATENÇÃO!</h1>
                <div class="thumbnail text-center">
                    <span class="fa-stack fa-9x">
                        <i class="fas fa-user-secret fa-stack-1x"></i>
                        <i class="fas fa-ban fa-stack-2x text-danger"></i>
                    </span>
                    <br><br>
                    <div class="alert alert-warning" role="alert">
                        <h4>
                            <i class="fas fa-spinner fa-lg fa-pulse"></i>
                            Usuario e/ou senha invalida <br>Tente novamente ou sai logo
                        </h4>
                        <p class="text-danger">
                            <a href="login.php" class="btn btn-danger">
                                <i class="fas fa-external-link-alt fa-rotate-270 fa-3x"></i>
                                <br><br>
                                tentar <br> novamente
                            </a>
                            <a href="../index.php" class="btn btn-success">
                                <i class="fas fa-home fa-3x"></i>
                                <br><br>
                                Voltar <br> Área Publica
                            </a>
                        </p>
                        <p>
                            <small>
                                <br>
                                caso não faça uma escolha em 15 segundo será redirecionado automaticamente para pagina inicial.
                            </small>
                        </p>
                    </div><!--fecha alerta-->
                </div><!--fecha thumbnail-->
            </div><!--fecha dimensionamento-->

        </div><!--fecha row-->
    </article>
</section>
</main>

  <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>