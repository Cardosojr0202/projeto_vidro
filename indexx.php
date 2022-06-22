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
</head>
<body class="fundofixo">
<?php include('menu_publico.php') ?>
    <main class="container">
        <div class="row">
            <div style="margin-top: 4rem;">
                <br>
                <?php include('carrousel.php') ?>
                <br><hr>
                <a id="promo"></a>
                <?php include('produto_promo.php') ?>
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