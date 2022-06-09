<?php 
// Incluir arquivo para fazer a conexão
include("connection/connection.php");

// Consulta para trazer os dados e se necessário filtrar
$table          = "vw_tbprodutos";
$order          = "legenda_produto ASC";
$campo_filtro   = "legenda_produto";
$filtro_s  = $_GET['buscar'];
$consul     =   "
                SELECT *
                FROM ".$table."
                WHERE ".$campo_filtro." LIKE ('%".$filtro_s."%')
                ORDER BY ".$order."
                ";
$lista      =   $conexao->query($consul);
$row        =   $lista->fetch_assoc();
$totalRows  =   ($lista)->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria Produto</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/meu_estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
<?php //include('menu_publico.php') ?>
    <main class="container-fluid">
        <section>
            <!-- Mostrar se o registro retornar VAZIO -->
            <?php if($totalRows == 0){ ?>
                <br>    
                <h2 class=" alert alert-primary">
                        <a href="javascript:window.history.go(-1)" class="btn btn-danger">        
                            <i class="bi bi-caret-left-fill"></i>    
                        </a>
                        <strong><i><?php echo $_GET['buscar'] ?></i></strong>
                        <br>       
                        Em breve mais produtos ao seu dispor!     
                </h2> 
            <?php }; ?> 

            <!-- Mostrar se o registro NÃO retornar VAZIO -->
            <?php if($totalRows > 0){ ?>
                <br>
                <h2 class="breadcrumb alert-primary">
                    <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                    <?php echo $row['rotulo_categoria']; ?>
                </h2>

                <div class="row"> <!-- manter os elementos da linha -->
                    <!-- ABRE estrutura de repetição -->
                    <?php do { ?>

                        <div class="col-sm-6 col-md-4"><!-- Abre Dimensionamento -->
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-1">
                                    <div class="col-md-4"><br><!-- Abre Dimensionamento da img -->
                                        <img src="imagens/<?php echo $row['imagem_produto']; ?>" class="img-fluid rounded-start" alt="">
                                    </div><!-- Fecha Dimensionamento da img -->
                                    <div class="col-md-8"><!-- Abre Dimensionamento do text -->
                                        <div class="card-body">
                                            <h5 class="card-title">Categoria: 
                                            <strong><?php echo $row['rotulo_categoria']; ?></strong>  
                                            </h5>
                                            <br>
                                            <p class="card ">
                                                <h4 class="text-danger">
                                                    <strong><?php echo $row['legenda_produto']; ?></strong>
                                                </h4>
                                            </p>
                                            <br>
                                            <p>
                                                <button class="btn btn-primary text-right" role="button">R$  
                                                    <?php echo number_format($row['venda_produto'],2,',','.'); ?>
                                                </button>
                                                <a href="produto_descri.php?id_produto=<?php echo $row['id_produto']; ?>" class="btn btn-warning" role="button">
                                                    <span class="hidden-xs">Saiba mais...</span>
                                                    <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                </a>
                                                <a href="#" class="btn btn-success" role="button">
                                                    <span class="hidden-xs">Comprar</span>
                                                    <span class="visible-xs glyphicon glyphicon-eye-open" aria-hidden="true"></span>
                                                </a>
                                            </p>
                                        </div><!-- Fecha Dimensionamento do text -->
                                    </div>
                                </div><!-- FECHA row g-1 -->
                            </div><!-- FECHA card mb-3 -->
                        </div><!-- FECHA Dimensionamento --> 
                
                    <?php } while ($row=$lista->fetch_assoc()); ?>
                    <!-- FECHA estrutura de repetição -->
                </div> <!-- fecha row -->
            <?php include('rodape.php') ?>
            <?php }; ?>
            
        </section>
    </main>
    
    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista); ?>