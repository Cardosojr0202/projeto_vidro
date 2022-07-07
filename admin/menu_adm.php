<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Template | Front</title>
    <link rel="stylesheet" href="../css/menu_adm.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
        /* Estilizando barras de rolagem no Chrome, Edge e Safari */
        body::-webkit-scrollbar {
            width: 10px;               
        }

        body::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.8);        
        }

        body::-webkit-scrollbar-thumb {
            background-color: rgb(48, 48, 242);    
            border-radius: 20px;       
            border: 3px solid rgb(0, 60, 255);  
        }
        /* Estilizando barras de rolagem no Firefox */
        * {
            scrollbar-width: thin;
            scrollbar-color: blue rgba(0, 0, 0,.6);
        }
    </style>
</head>
<body>
    <input type="checkbox" id="check" class="d-none">
    
    <nav class="navbar navbar-dark bg-dark position-fixed" style="width: 100%; z-index: 2000;">
        <div class="container-fluid">
            <!--header começo-->
            <header class="d-flex justify-content-between">
                <label for="check">
                    <i class="bi bi-list" id="sidebar_btn"></i>
                </label>
                <div class="logo">
                    <h3>Front <span>Vidraçaria</span></h3>
                </div>
                <div class="direita">
                    <a type="button" class="btn btn-outline-danger position-absolute end-0 top-o me-2" href="logout.php">
                        <i class="bi bi-box-arrow-left"></i> 
                        <!-- <span class="d-none d-sm-block">Sair</span> -->
                    </a>
                </div>
            </header>
            <!-- As a heading -->
        <!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
        </div>
    </nav>
    <!--header final-->
    
    <!--sidebar começo-->
    <div class="sidebar z-index">
        <img src="../imagens/perfil/<?php echo ($_SESSION['imagem_colaborador']) ?>" class="image mx-auto d-block" alt="perfil">
        <h2 class="text-center">Olá, <?php echo($_SESSION['login_colaborador']) ?></h2>
        <a href="index.php"><i class="bi bi-display"></i><span>Painel</span></a>
        <a href="produto_lista.php"><i class="bi bi-archive-fill"></i><span>Produtos</span></a>
        <a href="categoria_lista.php"><i class="bi bi-badge-wc-fill"></i><span>Categoria</span></a>
        <a href="colaborador_lista.php"><i class="bi bi-people-fill"></i><span>Colaboradores</span></a>
    </div>
    <!--sidebar final-->
    <!-- <div class="content"></div> -->
    
    <!-- Link bootstrap js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>