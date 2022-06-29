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

  <!-- Links arquivos slick css -->
  <!-- https://github.com/kenwheeler/slick -->
  <!-- http://kenwheeler.github.io/slick/ -->
  <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
  <!-- Adicione o slick-theme.css se desejar o estilo padrão -->
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
  <h2 class="bg-primary bg-gradient">Outros Produtos em Promoção</h2>
   <!-- Mostrar se o registro retornar VAZIO -->
        <?php if($totalRows == 0){ ?>
          <br>
          <div class="col-md-12"> 
            <h2 class="alert alert-primary">
                  DESCULPA.<br>
                  No momento não temos Produto em Promoção!!    
            </h2> 
          </div>
        <?php }; ?>
  <section class="responsive slider">
        <?php if($totalRows > 0){ ?>
          <!-- Mostrar se o registro NÃO retornar VAZIO -->
          <?php do { ?>
          <!-- ABRE estrutura de repetição -->
            <div class="col-sm-6 col-md-4"> <!-- Abre Dimensionamento -->
              <a href="produto_descri.php?id_produto=<?php echo $row['id_produto']; ?>" style="text-decoration: none;">
                <div class="card mb-3">
                  <div class="row g-1">
                    <div class="col-md-4"><br>
                      <img src="imagens/<?php echo $row['imagem_produto']; ?>" class="img-fluid rounded-start" alt="img">
                    </div>
                    <div class="col-md-8">
                      <div class="card-body">
                          <p class="card-title">Categoria: 
                            <strong><?php echo $row['rotulo_categoria']; ?></strong>  
                          </p>
                          <hr>
                          <h4 class="text-danger">
                            <strong><?php echo mb_strimwidth($row['legenda_produto'],0,15,'...'); ?></strong>
                          </h4>
                          <br>
                          <h4 class="text-dark" role="button">R$  
                            <?php echo number_format($row['venda_produto'],2,',','.'); ?>
                          </h4>  
                      </div>
                    </div>
                  </div>
                </div>
              </a>
            </div><!-- FECHA Dimensionamento -->
          <!-- FECHA estrutura de repetição-->   
          <?php } while ($row=$lista->fetch_assoc()); ?>
        <?php };?>
  </section>
 
  <!-- Link arquivos Bootstrap 5 js -->    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="js/bootstrap.min.js"></script>

  <!-- Links arquivos slick js -->
  <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

  <script>
    $('.responsive').slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true
      }
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2
      }
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1
      }
    }
    // You can unslick at a given breakpoint now by adding:
    // settings: "unslick"
    // instead of a settings object
  ]
});
  </script>
  
</body>
</html>