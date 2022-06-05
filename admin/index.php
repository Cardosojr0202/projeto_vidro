<?php 
    session_start();
    // corfirmando se a secão esta sendo criada
    //print_r($_SESSION);
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['nivel']) == true))
    {
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['nivel']);
        header('Location: login.php');
    }
      $logado = $_SESSION['login'];
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>área administrativa</title>
    <!-- Link do CSS do bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <?php include'menu_adm.php'; ?>
    <main  style="margin-left: 10vh; margin-right: 3vh;"><br>
        <div class="row">
            <div class="mx-auto col-sm-9 col-md-10">
                <?php include'adm_options.php'; ?>

            </div><!-- Fecha Div dimensionamento -->
        </div>
    </main>

    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>