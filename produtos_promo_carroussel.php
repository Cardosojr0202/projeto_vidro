<?php 
// Incluir arquivo para fazer a conexão
include("Connection/connection.php");

// Consulta para trazer os dados e se necessário filtrar
$tabela         = "vw_tbprodutos";
$ordenar_por    = "descri_produto ASC";
$campo_filtro   = "promo_produto";
$filtro         = "Sim";
$consulta   =   "SELECT *
                FROM ".$tabela."
                WHERE ".$campo_filtro."='".$filtro."'
                ORDER BY ".$ordenar_por."";
$lista      =   $conexao->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>
<!doctype html>
<html lang="pt-br">
<header>
  <title>vitrini</title>
  <meta charset="utf-8">
  <!-- Link arquivos Bootstrap css -->
  <!-- CÓDIGO DESABILITADO PARA NÃO HAVER CONFLITOS --> 
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="css/bootstrap.min.css" rel="stylesheet">


  <!-- https://github.com/kenwheeler/slick -->
  <!-- http://kenwheeler.github.io/slick/ -->
  <link rel="stylesheet" type="text/css" href="./slick/slick.css">
  <link rel="stylesheet" type="text/css" href="./slick/slick-theme.css">
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <!-- Add the slick-theme.css if you want default styling -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>
  <link href="css/meu_estilo.css" rel="stylesheet">
  <style type="text/css">
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }
    .slider {
      width: 80%;
      margin: 20px auto;
    }
    .slick-slide {
      margin: 0px 20px;
    }
    .slick-slide:hover {
      opacity: .7;
    }  
    .slick-slide img {
      width: 100%;
    }
    .slick-prev:before,
    .slick-next:before {
      color: gray;
    }
    .slick-slide {
      transition: all ease-in-out .3s;
      opacity: .2;
    }   
    .slick-active {
      opacity: 1;
    }
    .slick-current {
      opacity: 1;
    }
    .img-responsive:hover{
      width: 90%;
    } 

  </style>
</header>

<body>
  <br>
  <h2 class="bg-primary bg-gradient">Vitrine</h2>
  <section class="regular slider">
        <!-- ABRE estrutura de repetição -->
        <?php do { ?>
          <div class="col-sm-6 col-md-4"> <!-- Abre Dimensionamento -->
            <a href="produto_descri.php?id_produto=<?php echo $row['id_produto']; ?>" style="text-decoration: none;">
              <div class="card mb-3">
                <div class="row g-1">
                  <div class="col-md-4"><br>
                    <img src="imagens/<?php echo $row['imagem_produto']; ?>" class="img-fluid rounded-start" alt="">
                  </div>
                  <div class="col-md-8">
                    <div class="card-body">
                      <h5 class="card-title">Categoria: 
                        <strong><?php echo $row['rotulo_categoria']; ?></strong>  
                      </h5>
                      <hr>
                          <p>
                            <h4 class="text-danger">
                              <strong><?php echo mb_strimwidth($row['legenda_produto'],0,15,'...'); ?></strong>
                            </h4>
                          </p>
                          <br>
                          <p>
                            <button class="btn btn-outline-primary text-dark disabled" role="button">R$  
                              <?php echo number_format($row['venda_produto'],2,',','.'); ?>
                            </button>
                          </p>    
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div><!-- FECHA Dimensionamento --> 
        <?php } while ($row=$lista->fetch_assoc()); ?>
        <!-- FECHA estrutura de repetição-->
  </section>


  <!-- Link arquivos Bootstrap 5 js -->   
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/bootstrap.min.js"></script> 

  <script type="text/javascript">
    $(document).on('ready', function() {
      $(".regular").slick({
        dots: true,
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3
      });
    });
  </script>

  <!-- <script src="https://code.jquery.com/jquery-2.2.0.min.js" type="text/javascript"></script> -->
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script> 
</body>
</html>