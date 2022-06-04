<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Template | Front</title>
    <link rel="stylesheet" href="../css/menu.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <input type="checkbox" id="check" class="d-none">
    
    <nav class="navbar navbar-dark bg-dark">
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
                    <a type="button" class="btn btn-outline-danger position-absolute end-0 top-o me-3" href="sair.php"><i class="bi bi-box-arrow-left"></i> Sair</a>
                </div>
            </header>
            <!-- As a heading -->
        <!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
        </div>
    </nav>
    <!--header final-->
    
    <!--sidebar começo-->
    <div class="sidebar z-index">
        <!-- <img src="image/img-1.jpg" class="image" alt=""> -->
        <h2 class="text-center">Maria</h2>
        <a href="indexx.php"><i class="bi bi-display"></i><span>Painel</span></a>
        <a href="produto_lista.php"><i class="bi bi-archive-fill"></i><span>Produtos</span></a>
        <a href="categoria_lista.php"><i class="bi bi-badge-wc-fill"></i><span>Categoria</span></a>
        <a href="colaborador_lista.php"><i class="bi bi-people-fill"></i><span>Colaboradores</span></a>
        <a href="#"><i class="bi bi-gear-fill"></i><span>Configuração</span></a>
    </div>
    <!--sidebar final-->
    <!-- <div class="content"></div> -->
    
    <!-- Link bootstrap js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>