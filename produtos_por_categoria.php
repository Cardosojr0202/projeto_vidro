<?php 
// Incluir arquivo para fazer a conexão
include("connection/connection.php");

// Consulta para trazer os dados e se necessário filtrar
$table          = "vw_tbprodutos";
$campo_filtro   = "id_categoria_produto";
$filtro_select  = $_GET['id_categoria'];
$order          = "rotulo_categoria ASC";
$consul     =   "
                SELECT *
                FROM ".$table."
                WHERE ".$campo_filtro."='".$filtro_select."'
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
    <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
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
                        Em breve mais produtos ao seu dispor!     
                </h2> 
            <?php }; ?> 

            <!-- Mostrar se o registro NÃO retornar VAZIO -->
            <?php if($totalRows > 0){ ?>
                <br>
                <h2 class="breadcrumb alert-primary" style="margin-bottom: 26px;">
                    <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                        <i class="bi bi-caret-left-fill"></i>
                    </a>
                    <?php echo $row['rotulo_categoria']; ?>
                </h2>

                <div class="row"> <!-- manter os elementos da linha -->
                    <!-- ABRE estrutura de repetição -->
                    <?php do { ?>

                        <div class="col-sm-6 col-md-4"><!-- Abre Dimensionamento -->
                        <a href="produto_descri.php?id_produto=<?php echo $row['id_produto']; ?>" style="text-decoration: none;">
                            <div class="card mb-3"><!-- Abre Card / mb-3 -->
                                <div class="row g-1">
                                    <div class="col-md-4"><br>
                                        <img src="imagens/<?php echo $row['imagem_produto']; ?>" class="img-fluid rounded-start" alt="">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body"><!-- Abre Card-body -->

                                            <h5 class="card-title">Categoria: 
                                                <strong><?php echo $row['rotulo_categoria']; ?></strong>  
                                            </h5>
                                            <hr>
                                            <h4 class="text-danger">
                                                <strong><?php echo mb_strimwidth($row['legenda_produto'],0,19,'...');?></strong>
                                            </h4>
                                            <br>
                                            <p class="text-dark" role="button">
                                                Apenas 10X 
                                                <span class="h2">R$<?php echo number_format($row['venda_produto']/10,2,',','.'); ?></span>   
                                            </p>

                                        </div><!-- FECHA Card-body -->
                                    </div>
                                </div>
                            </div><!-- FECHA Card / mb-3 -->
                            </a>
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