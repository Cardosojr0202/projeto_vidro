<?php 
// Incluir arquivo para fazer a conexão
include("Connection/connection.php");

// Consulta para trazer os dados e se necessário filtrar
$tabela         = "vw_tbprodutos";
$ordenar_por    = "descri_produto ASC";
$campo_filtro   = "id_produto";
$filtro_select  = $_GET['id_produto'];
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
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saiba mais</title>
    <!--link  para o Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
    <!--link  para o meu css-->
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

</head>
<body class="fundofixo">
<main class="container">
<section>
    <h3 class="breadcrumb bg-primary bg-gradient card text-center">Descrição Completa do Produto
        <a href="javascript:window.history.go(-1)" class="btn btn-success">
            <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <strong>Categoria: <?php echo $row['rotulo_categoria']; ?></strong>
    </h3>
    <div class="row"> <!-- manter os elementos da linha -->
    <!-- ABRE estrutura de repetição -->
        <?php do { ?>
    <!-- ABRE thumbnail/card -->
        <div class="card"> <!-- Dimensionamento -->
            <div class="thumbnail">
                <div class="caption text-right">
                    <h3 class="text-danger">
                        <strong><?php echo $row['legenda_produto']; ?></strong>
                        <img src="imagens/<?php echo $row['imagem_produto']; ?>" alt="" class="img-responsive img-rounded"> 
                    </h3>
                    <p class="text-left">
                        <?php echo $row['descri_produto']; ?>
                    </p>
                    <p>
                        <button class="btn btn-primary text-right" role="button">R$  
                            <?php echo number_format($row['venda_produto'],2,',','.'); ?>
                        </button>
                        <a href="#" class="btn btn-success" role="button">
                                <span class="hidden-xs">Comprar</span>
                            <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>
                        <a href="#" class="btn btn-primary" role="button">
                                <span class="hidden-xs">Adicionar na Lista.</span>
                            <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                        </a>

                    </p>
                </div><!-- fecha caption -->
            </div>
        </div> <!-- Fecha Dimensionamento -->
    <!-- FECHA thumbnail/card -->
        <?php } while ($row=$lista->fetch_assoc()); ?>
    <!-- FECHA estrutura de repetição -->
    </div> <!-- fecha row -->
</section>
</main>
<!--link arquivo bootstrap script js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="../js/bootstrap.bundle.min.js"></script>
  <script src="../js/bootstrap.min.js"></script>   
</body>
</html>
<?php mysqli_free_result($lista); ?>