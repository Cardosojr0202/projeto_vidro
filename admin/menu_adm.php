<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu | Front</title>
    <!-- CSS do menu -->
    <link rel="stylesheet" href="../css/menu.css">
    <!-- CSS Bootstrap -->
    <!-- <link rel="stylesheet" href="../css/bootstrap.min.css"> -->
    <!-- Icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <input type="checkbox" id="check">
    <!--header começo-->
    <header>
        <label for="check">
            <ion-icon name="menu-outline" id="sidebar_btn"></ion-icon>
        </label>
        <div class="logo">
            <h3>Front <span>Vidraçaria</span></h3>
        </div>
        <div class="btn-right">
            <a href="#" class="sair_btn">Sair</a>
        </div>
    </header>
    <!--header final-->
    <!--sidebar começo-->
    <div class="sidebar">
        <h2 class="text-center">Olá Maria<br>Seja bem vinda</h2>
        <a href="#"><ion-icon name="desktop-outline"></ion-icon><span>Painel</span></a>
        <a href="produto_lista.php"><ion-icon name="calendar-clear-outline"></ion-icon><span>Prodrutos</span></a>
        <a href="categoria_lista.php"><ion-icon name="camera-outline"></ion-icon><span>Categoria</span></a>
        <a href="colaborador_lista.php"><ion-icon name="information-circle-outline"></ion-icon><span>Colaboradores</span></a>
        <a href="#"><ion-icon name="settings-outline"></ion-icon><span>Configuração</span></a>
    </div>
    <!--sidebar final-->
    <div class="content"></div>
    
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>