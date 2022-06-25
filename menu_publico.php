<?php
include("Connection/connection.php");

// Consulta para trazer dados
$table = "tb_categoria";
$order = "rotulo_categoria";

$consult = "SELECT *
FROM ".$table."
ORDER BY ".$order."";

$lista_categoria = $conexao->query($consult);
$row_categoria = $lista_categoria->fetch_assoc();
$totalRows_tipos = ($lista_categoria)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- CSS bootstrap 5 -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
  <!-- Meu CSS -->
  <link rel="stylesheet" href="css/menu_publico.css">
  <link rel="stylesheet" href="css/meu_estilo.css">
 
  <title>menu_publico</title>
</head>
<body>

  <nav class="navbar navbar-dark bg-dark position-fixed" style="width: 100%; height: 5em; z-index: 1000;">
    <div class="container-fluid">
        <!--header começo-->
          <header class="d-flex ">

            <div class="menu-btn mx-3">
              <i class="fas fa-bars"></i>
            </div>

            <div class="logo">
              <a href="index.php" style="text-decoration: none;">
                <h3>Front <span>Vidraçaria</span></h3>
              </a>
            </div>

            <div class="direita position-absolute end-0 top-o me-3">
                <form action="produtos_busca.php" method="get" name="form_busca" id="form_busca" class="d-flex" role="search">
                  <input class="form-control me-2" style="width: 7em;" type="search" name="buscar" id="buscar" placeholder="Pesquise" aria-label="Search" required>
                  <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
                </form>
            </div>

          </header>
        <!--header final-->
      </div>
  </nav>

        <div class="side-bar" style="z-index: 100;">
          <div class="close-btn">
            <i class="fas fa-times"></i>
          </div>

          <div class="menu" style="z-index: 1000;">
            <div class="item"><a href="admin/index.php"><i class="fas fa-desktop"></i>Admin</a></div>
            <div class="item">
              <a class="sub-btn"><i class="fas fa-table"></i>Categoria<i class="fas fa-angle-right dropdown"></i></a>
              <div class="sub-menu">
                <!-- Abre estrutura de repetição -->
                <?php do { ?>
                  <a href="produtos_por_categoria.php?id_categoria=<?php echo $row_categoria['id_categoria']; ?>" class="sub-item"><?php echo $row_categoria['rotulo_categoria'];?></a>
                  <?php } while ($row_categoria=$lista_categoria->fetch_assoc()); ?>
                  <!-- Fecha estrutura de repetição -->
              </div>
            </div>
            <div class="item"><a href="#promo"><i class="fas fa-th"></i>Promoção</a></div>
            <div class="item"><a href="#produ"><i class="fas fa-th"></i>Produtos</a></div>
            <div class="item"><a href="#contato"><i class="fas fa-info-circle"></i>Sobre</a></div>
          </div><!-- Fecha menu -->
        </div><!-- Fecha side-bar -->
        
    <!-- Link arquivos bootstrap script js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="UTF-8" ></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){

          $('.sub-btn').click(function(){
            $(this).next('.sub-menu').slideToggle();
            $(this).find('.dropdown').toggleClass('rotate');
          });

          $('.menu-btn').click(function(){
            $('.side-bar').addClass('active');
            $('.menu-btn').css("visibility", "hidden");
          });

          $('.close-btn').click(function(){
            $('.side-bar').removeClass('active');
            $('.menu-btn').css("visibility", "visible");
          });

        });
    </script>
  
</body>
</html>