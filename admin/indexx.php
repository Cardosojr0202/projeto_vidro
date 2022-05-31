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
    <main class="container" style="margin-left: 40px; margin-right: -200px;"><br>
        <div class="row gx-2 px-4">
            <div class="mx-auto col-md-10 col-sm-9">
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