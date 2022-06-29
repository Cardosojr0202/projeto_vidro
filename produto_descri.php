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
    <title><?php echo $row['rotulo_categoria']; ?></title>
    <!--link  para o Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
    <!--link  para o meu css-->
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
         /* Estilizando barras de rolagem no Chrome, Edge e Safari */
         body::-webkit-scrollbar {
        width: 10px;               
        }

        body::-webkit-scrollbar-track {
        background: rgba(59, 153, 241, 0.846);        
        }

        body::-webkit-scrollbar-thumb {
        background-color: rgb(48, 48, 242);    
        border-radius: 20px;       
        border: 3px solid rgb(0, 60, 255);  
        }

        /* Estilizando barras de rolagem no Firefox */
       * {
        scrollbar-width: thin;
        scrollbar-color: blue rgb(0, 153, 255);
        }
    </style>
</head>
<body class="fundofixo">
    <main class="container-fluid">
        <div class="row"> <!-- manter os elementos da linha -->
            <section style="margin-top: 10px;">
                <h3 class="bg-primary bg-gradient">
                    <a href="javascript:window.history.go(-1)" class="btn btn-danger">
                        <span class="bi bi-chevron-left"></span>
                    </a>
                    Descrição Completa do Produto
                </h3>

                <br>
                <?php do { ?>

                    <div class="container" style="background-color: #fff;">
                        <div class="row d-flex flex-xl-wrap">
                            <div class="col text-center m-auto">
                                <img src="imagens/<?php echo $row['imagem_produto']; ?>" class="rounded mx-auto d-block" alt="Produto" style="max-width: 20em; max-height: 20%;">
                            </div>
                            <div class="col border">
                                <h2><?php echo $row['legenda_produto']; ?></h2>
                                <h3 style="margin-top: 40px;">R$
                                    <?php echo number_format($row['venda_produto'],2,',','.'); ?> 
                                </h3>
                                <p>
                                    <?php echo $row['descri_produto']; ?>
                                </p>
                                <p>
                                    <strong>Categoria:</strong> 
                                    <?php echo $row['rotulo_categoria']; ?>
                                </p>
                                <div class="btn-group d-flex flex-column m-3" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-success">Comprar agora</a>
                                </div>
                            </div>
                        </div><!-- Fecha Row(Card) -->
                    </div><!-- Fecha Card -->
                
                <?php } while ($row=$lista->fetch_assoc()); ?>
            </section>
        </div> <!-- fecha row -->
        <?php include('produtos_promo_carroussel.php'); ?>
    </main>

    <!--link arquivo bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   
</body>
</html>
<?php mysqli_free_result($lista); ?>