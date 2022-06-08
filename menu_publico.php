<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu Template | Front</title>
    <link rel="stylesheet" href="css/menu.css">
    <link rel="stylesheet" href="css/meu_estilo.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
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
                <div class="direita position-absolute end-0 top-o me-3">
                    <form class="d-flex">
                        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-success" type="submit">Search</button>
                      </form>
                </div>
            </header>
            <!-- As a heading -->
        <!-- <span class="navbar-brand mb-0 h1">Navbar</span> -->
        </div>
    </nav>
    <!--header final-->
    
    <!--sidebar começo-->
    <div class="sidebar z-index">
        <a href="admin/index.php"><i class="bi bi-person-fill"></i><span>Area adm</span></a>
        <a href="#produto"><i class="bi bi-archive-fill"></i><span>Produtos</span></a>
        <a href="#"><i class="bi bi-badge-wc-fill"></i><span>Categoria</span></a>
        <a href="#contato"><i class="bi bi-telephone-fill"></i><span>Contato</span></a>
    </div>
    <!--sidebar final-->
    <!-- <div class="content"></div> -->
    
    <!-- Link bootstrap js -->
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>