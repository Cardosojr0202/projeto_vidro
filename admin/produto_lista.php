<?php
include("../connection/connection.php");
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
    <title>Lista de Produtos</title>
    <!--link  para o Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <!--link  para o meu css-->
    <link rel="stylesheet" href="../css/meu_estilo.css" type="text/css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
<?php include'menu_adm.php'; ?>
<main class="container-md" ><br>
    <div class="row">
        <div class="mx-auto col-sm-8 col-md-9 col-lg-10 col-xl-11">
            <h1 class="bg-primary bg-gradient">Lista de Produtos</h1>
            <table class="table table-hover table-condensed tbopacidade">
                    <thead>
                        <tr>
                            <th class="col d-none">ID</th>
                            <th class="col text-light">CODIGO</th>
                            <th class="col text-light">DESCRIÇÃO</th>
                            <th class="col text-light">UNIDADE</th>
                            <th class="col text-light">ESPESSURA</th>
                            <th class="col text-light">COR</th>
                            <th class="col text-light">CATEGORIA</th>
                            <th class="col text-light">IMAGENS</th>
                            <th class="col text-light">Venda</th>
                            <th class="col text-light">Promoção</th>
                            <th>
                                <a href="produto_cadastro.php" target="_self" class="btn btn-sm col-12 btn-primary">
                                    <span class="d-none d-sm-block">Cadastrar</span>
                                    <span class="bi bi-plus-circle"></span>
                                </a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php do { ?>
                        <tr>
                            <td class="col d-none"><?php echo $row['id_produto']; ?></td>
                            <td class="col text-light"><?php echo $row['codigo_produto']; ?></td>
                            <td class="col text-light"><?php echo $row['descri_produto']; ?></td>
                            <td class="col text-light"><?php echo $row['unidade_produto']; ?></td>
                            <td class="col text-light"><?php echo $row['espessura_produto']; ?></td>
                            <td class="col text-light"><?php echo $row['cor_produto']; ?></td>
                            <td class="col text-light"><?php echo $row['rotulo_categoria']; ?></td>
                            <td class="col"><img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="" width="100px"></td>
                            <td class="col text-light"><?php echo number_format($row['venda_produto'],2,',','.');?></td>   
                            <td>
                                <?php 
                                    if($row['promo_produto']=='Sim'){
                                        echo ("<span class='bi bi-cart-check-fill text-info' arial-hidden='true'></span>");
                                    }else if($row['promo_produto']=='Não'){
                                        echo ("<span class='bi bi-cart-x-fill text-danger' arial-hidden='true'></span>");
                                    };
                                ?>
                            </td>                    
                            <td class="d-grid gx-3 gap-2">
                                <a href="produto_atualiza.php?id_produto=<?php echo $row['id_produto']; ?>" target="_self" class="btn btn-sm btn-success btn-xs">
                                    <span class="d-none d-sm-block">Atualizar</span>
                                    <i class="bi bi-arrow-clockwise"></i>
                                </a>    
                                <button class="btn btn-sm btn-danger btn-xs delete" role="button" data-nome="<?php echo $row['descri_produto'];?>" data-id="<?php echo $row['id_produto'];?>">
                                    <span class="d-none d-sm-block">Excluir</span>
                                    <i class="bi bi-trash-fill"></i>
                                </button> 
                            </td>                    
                        </tr>    
                        <?php } while ($row = $lista->fetch_assoc()); ?>
                    </tbody>                
            </table>
        </div><!-- fecha dimensionamento -->
    </div><!-- fecha Row -->
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
    <script src="../js/bootstrap.bundle.min.js"></script>
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