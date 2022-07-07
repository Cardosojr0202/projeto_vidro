<?php
include("connection/connection.php");
// consultar SQL
$consulta   =   "SELECT *
                FROM vw_tbprodutos
                ORDER BY descri_produto ASC
                ";
// Fazer a lista completa dos dados
$lista  =  $conexao->query($consulta);
// Separar os dados em linhas(row)
$row    =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CARRINHO</title>
    <!--link  para o Bootstrap-->
    <link rel="stylesheet" href="css/bootstrap.min.css" rel="stylesheet">
    <!--link  para o meu css-->
    <link rel="stylesheet" href="css/meu_estilo.css" type="text/css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="imagens/logo.png" type="image/x-icon">
</head>
<body class="fundofixo">




<main class="container"><br>
    <div class="row" >
        <div class="mx-auto table-responsive" style="margin-top: 4rem;">
        <h3 class="bg-primary bg-gradient">
                    <a href="javascript:window.history.go(-1)" class="btn btn-success">
                        <span class="bi bi-chevron-left"></span>
                    </a>
                    CARRINHO DE COMPRAS
                </h3>
            <table class="table table-hover table-condensed tbopacidade blur">
                    <thead>
                        <tr>
                            <th class="col d-none">ID</th>
                            <th class="col text-light">CODIGO</th>
                            <th class="col text-light">IMAGEM</th>
                            <th class="col text-light">LEGENDA</th>
                            <th class="col text-light">QUANTIDADE</th>
                            <th class="col text-light">PREÇO</th>
                            <th class="col text-light">SUBTOTAL</th> 
                           
                        </tr>
                    </thead>

                    <tbody>
                        <?php do { ?>
                        <tr>
                            <td class="col d-none"><?php echo $row['id_produto']; ?></td>
                            <td class="col text-light"><?php echo $row['codigo_produto']; ?></td>
                            <td class="text-light"><img src="imagens/<?php echo $row['imagem_produto']; ?>" alt="" width="55px"></td>
                            <td class="col text-light"><?php echo mb_strimwidth($row['legenda_produto'],0,25,'...'); ?></td>
                            <td class="col text-light">2</td>
                            <td class="text-light"><?php echo number_format($row['venda_produto'],2,',','.');?></td>   
                            <td class="col text-center text-light"><?php echo number_format($row['venda_produto'] * 2,2,',','.');?></td>
                            <td class="d-grid gx-3 gap-2">
                                <button class="btn btn-sm btn-danger btn-xs delete" role="button" data-nome="<?php echo $row['legenda_produto'];?>" data-id="<?php echo $row['id_produto'];?>">
                                    <span class="d-none d-sm-block">Excluir</span>
                                    <i class="bi bi-trash-fill"></i>
                                </button> 
                            </td>                    
                        </tr>  
                        <?php } while ($row = $lista->fetch_assoc()); ?>
                        <footer>
                        <td class="d-grid  gap-2">
                                <button class="btn btn-sm  btn-success btn-xs " role="button" data-nome="">
                                    <span class="d-none d-sm-block">Finalizar Pedidos</span>
                                    <i class="bi bi-cash-coin"></i>
                                </button> 
                            </td>  
                        </footer>
                    </tbody>
            </table>
        </div><!-- fecha dimensionamento -->
    </div><!-- fecha Row -->
</main>

<!-- Modal (Bootstrap 5) -->
<div class="modal fade" id="confimacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <br>
    <div class="modal-dialog">
      <div class="modal-content">
  
        <div class="modal-header">
          <h5 class="modal-title text-danger">ATENÇÃO!</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div><!-- Fecha Modal-header (Bootstrap 5) -->
  
        <div class="modal-body">
          Deseja mesmo EXCLUIR o item?
          <h4><span class="nome text-danger"></span></h4>
        </div><!-- Fecha Modal-body (Bootstrap 5) -->
  
        <div class="modal-footer">
          <button class="btn btn-success" data-bs-dismiss="modal">Cancelar</button>
          <a href="#" type="button" class="btn btn-danger delete-yes">
              Confirmar 
          </a>
        </div><!-- Fecha Modal-footer (Bootstrap 5) -->
        
      </div>
    </div>
</div>
<!-- Fecha Modal (Bootstrap 5) -->
  
    <!--link arquivo bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>   

<!-- Abre Script para o Modal -->
    <script type="text/javascript">
        $('.delete').on('click',function(){
            var nome    = $(this).data('nome');
            // buscar o valor do atributo data-nome
            var id      = $(this).data('id');
            // buscar o valor do atributo id
            $('span.nome').text(nome);
            // Inserir o nome do item na pergunta de confirmação
            $('a.delete-yes').attr('href','carrinho_exclui.php?id_produto='+id);
            // mudar dinamicamente o id do link no botão confirmar
            $('#confimacao').modal('show'); // modal abre
        });
    </script>
<!-- Fecha Script para o Modal -->
</body>
</html>
<?php mysqli_free_result($lista); ?>