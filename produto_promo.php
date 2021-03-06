<?php 
// Incluir arquivo para fazer a conexão
include("Connection/connection.php");

// Consulta para trazer os dados e se necessário filtrar
$tabela         = "vw_tbprodutos";
$ordenar_por    = "descri_produto ASC";
$campo_filtro   = "promo_produto";
$filtro_select  = "Sim";
$consulta   =   "
                SELECT *
                FROM ".$tabela."
                WHERE ".$campo_filtro."='".$filtro_select."'
                ORDER BY ".$ordenar_por."
                ";
$lista      =   $conexao->query($consulta);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<header>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produtos em Promoção</title>
    <!--link  para o Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
    <!--link  para o meu css-->
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

</header>
<body>
    <h1 class="bg-primary bg-gradient" style="padding-left: 20px;">Produtos em Promoção</h1>
    <div class="row"><!-- abre row manter os elementos da linha -->
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
    <!-- Mostrar se o registro NÃO retornar VAZIO -->
     <?php if($totalRows > 0){ ?>
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
                      
                      <p class="card-title">Categoria: 
                        <strong><?php echo $row['rotulo_categoria']; ?></strong>  
                      </p>
                      <hr>
                      <h4 class="text-danger">
                        <strong><?php echo mb_strimwidth($row['legenda_produto'],0,15,'...'); ?></strong>
                      </h4>
                      <br>
                      <p class=text-dark role="button">
                        Apenas 10X<br>
                        <span class="h2">R$<?php echo number_format($row['venda_produto']/10,2,',','.'); ?></span>   
                      </p>
 
                    </div>
                  </div>
                </div>
              </div>
            </a>
          </div><!-- FECHA Dimensionamento --> 
        <?php } while ($row=$lista->fetch_assoc()); ?>
        <!-- FECHA estrutura de repetição-->
      <?php };?>
    </div><!-- fecha row manter os elementos da linha -->
  <!--link arquivo bootstrap script js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>   
</body>
</html>
<?php mysqli_free_result($lista); ?>