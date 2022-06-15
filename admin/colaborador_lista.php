<?php
// Incluindo o sistema de autentificação 
include("acesso_adm.php");

include("../connection/connection.php");
// consultar SQL
$consulta   =   "SELECT *
                FROM tb_colaborador
                ORDER BY login_colaborador ASC
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
    <title>Lista de Colaboradores</title>
    <!--link  para o Bootstrap-->
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <!--link  para o meu css-->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
<?php include'menu_adm.php'; ?>
<main class="container"><br>
    <div class="row">
        <div class="mx-auto col-sm-7 col-md-8 col-lg-8 col-xs-9">
            <h1 class="bg-primary bg-gradient">Lista de Colaboradores</h1>
            <table class="table table-hover table-condensed tbopacidade blur">
                    <thead>
                        <tr>
                            <th class="col d-none">ID</th>
                            <th class="col text-light">Login</th>
                            <th class="col d-none">Senha</th>
                            <th class="col text-light">Nivel</th>
                            <th class="col text-light">Imagem</th>
                            <th>
                                <a href="colaborador_insere.php" target="_self" class="btn btn-sm col-12 btn-primary">
                                    <span class="d-none d-sm-block">Cadastrar</span>
                                    <i class="bi bi-plus-circle" aria-hidden="true"></i>
                                </a>
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php do { ?>
                        <tr>
                            <td class="d-none"><?php echo $row['id_colaborador']; ?></td>
                            <td class="text-light"><?php echo $row['login_colaborador']; ?></td>
                            <td class="d-none"><?php echo $row['senha_colaborador']; ?></td>
                            <td class="text-light"><?php echo $row['nivel_colaborador']; ?></td>
                            <td class="text-light"><img src="../imagens/<?php echo $row['imagem_colaborador']; ?>" alt="" width="100px"></td>                 
                            <td class="d-grid gx-3 gap-2">
                                <a href="colaborador_atualiza.php?id_colaborador=<?php echo $row['id_colaborador']; ?>" target="_self" class="btn btn-sm btn-success btn-xs">
                                    <span class="d-none d-sm-block">Atualizar</span>
                                    <i class="bi bi-arrow-clockwise"></i>
                                </a>    
                                <button class="btn btn-sm btn-danger btn-xs delete" role="button" data-nome="<?php echo $row['login_colaborador'];?>" data-id="<?php echo $row['id_colaborador'];?>">
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
            $('a.delete-yes').attr('href','colaborador_exclui.php?id_colaborador='+id);
            // mudar dinamicamente o id do link no botão confirmar
            $('#confimacao').modal('show'); // modal abre
        });
    </script>
<!-- Fecha Script para o Modal -->
</body>
</html>
<?php mysqli_free_result($lista); ?>