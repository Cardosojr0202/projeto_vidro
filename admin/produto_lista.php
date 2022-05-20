<?php
include("../connection/connection.php");
// consultar SQL
$consulta   =   "
                SELECT *
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
    <title>LISTA DE PRODUTOS</title>
    <!--link  para o Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <!--link  para o meu css-->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
<main class="container"><br>
    <div class="mx-auto col-11">
        <h1 class="alert-primary">Lista de Produtos</h1>
        <table class="table table-hover table-condensed tbopacidade" >
                <thead>
                    <tr>
                        <th class="d-none text-light">ID</th>
                        <th class="text-light">CODIGO</th>
                        <th class="text-light">DESCRIÇÃO</th>
                        <th class="text-light">UNIDADE</th>
                        <th class="text-light">ESPESSURA</th>
                        <th class="text-light">COR</th>
                        <th class="text-light">CATEGORIA</th>
                        <th class="text-light">IMAGENS</th>
                        <th class="text-light">Venda</th>
                        <th class="text-light">Promoção</th>
                        <th>
                            <a href="produto_cadastro.php" target="_self" class="btn col-12 btn-primary">
                                <span class="hidden-xs">Cadastrar</span>
                                <i class="bi bi-plus-circle" aria-hidden="true"></i>
                            </a>
                        </th>
                    </tr>
                </thead>

                <tbody>
                    <?php do { ?>
                    <tr>
                        <td class="d-none text-light"><?php echo $row['id_produto']; ?></td>
                        <td class="text-light"><?php echo $row['codigo_produto']; ?></td>
                        <td class="text-light"><?php echo $row['descri_produto']; ?></td>
                        <td class="text-light"><?php echo $row['unidade_produto']; ?></td>
                        <td class="text-light"><?php echo $row['espessura_produto']; ?></td>
                        <td class="text-light"><?php echo $row['cor_produto']; ?></td>
                        <td class="text-light"><?php echo $row['rotulo_categoria']; ?></td>
                        <td><img src="../imagem/<?php echo $row['imagem_produto']; ?>" alt="" width="100px"> </td>
                        <td class="text-light"><?php echo number_format($row['venda_produto'],2,',','.');?></td>   
                        <td>
                            <?php 
                                if($row['promo_produto']=='Sim'){
                                    echo ("<span class='glyphicon glyphicon-ok text-info' arial-hidden='true'></span>");
                                }else if($row['promo_produto']=='Não'){
                                    echo ("<span class='glyphicon glyphicon-remove-sign text-danger' arial-hidden='true'></span>");
                                };
                            ?>
                        </td>                    
                        <td class="d-grid gap-2">
                            <a href="produto_atualiza.php?id_produto=<?php echo $row['id_produto']; ?>" target="_self" class="btn btn-warning btn-block">
                                <span class="hidden-xs">Atualizar</span>
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>    
                            <button class="btn btn-danger btn-block btn-xs delete" role="button" data-nome="<?php echo $row['descri_produto'];?>" data-id="<?php echo $row['id_produto'];?>">
                                <span class="hidden-xs">Excluir</span>
                                <i class="bi bi-trash-fill"></i>
                            </button> 
                        </td>                    
                    </tr>    
                    <?php } while ($row = $lista->fetch_assoc()); ?>
                </tbody>                
        </table>
    </div><!-- fecha dimensionamento -->
     

</main>

<!-- Modal (Bootstrap 5) -->
<div class="modal fade" id="confimacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    <script src="../js/bootstrap.min.js"></script>   

<!-- Abre Script para o Modal -->
    <script type="text/javascript">
        $('.delete').on('click',function(){
            var nome    = $(this).data('nome');
            // buscar o valor do atributo data-nome
            var id      = $(this).data('id');
            // buscar o valor do atributo id
            $('span.nome').text(nome);
            // Inserir o nome do item na pergunta de confirmação
            $('a.delete-yes').attr('href','produto_exclui.php?id_produto='+id);
            // mudar dinamicamente o id do link no botão confirmar
            $('#confimacao').modal('show'); // modal abre
        });
    </script>
<!-- Fecha Script para o Modal -->
</body>
</html>
<?php mysqli_free_result($lista); ?>