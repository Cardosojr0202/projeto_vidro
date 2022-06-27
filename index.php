<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>From vidraçaria</title>
    <!-- Link do CSS do bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
        /* Estilizando barras de rolagem no Chrome, Edge e Safari */
        body::-webkit-scrollbar {
        width: 10px;               /* width of the entire scrollbar */
        }

        body::-webkit-scrollbar-track {
        background: rgba(59, 153, 241, 0.846);        /* color of the tracking area */
        }

        body::-webkit-scrollbar-thumb {
        background-color: rgb(48, 48, 242);    /* color of the scroll thumb */
        border-radius: 20px;       /* roundness of the scroll thumb */
        border: 3px solid rgb(0, 60, 255);  /* creates padding around scroll thumb */
        }

        /* Estilizando barras de rolagem no Firefox */
       * {
        scrollbar-width: thin;
        scrollbar-color: blue rgb(0, 153, 255);
        }
    </style>
</head>
<body class="fundofixo">
<?php include('menu_publico.php') ?>
    <main class="container">
        <div class="row">
            <div style="margin-top: 5rem;">
                <br>
                <?php include('carrousel.php') ?>
                <a id="promo"></a>
                <br><br><hr>
                <?php include('produto_promo.php') ?>
                <a id="produ"></a>
                <br><br><br>
                <?php include('produto_geral.php') ?>
                <br>
                <a id="contato"></a>
                <?php include('rodape.php') ?>
            </div>
        </div>
    </main>

    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>