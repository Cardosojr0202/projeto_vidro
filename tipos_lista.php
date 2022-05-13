<?php
// Incluir o arquivo e fazer a conexão
include("../Connections/conn_produtos.php");
// Selecionar os dados
$consulta   =   "SELECT * FROM tbtipos ORDER BY rotulo_tipo ASC";
// Fazer a lista completa dos dados
$lista  =   $conn_produtos->query($consulta);
// Separar os dados em linhas (row)
$row    =   $lista->fetch_assoc();
// Contar o total de linhas
$totalRows  =   ($lista)->num_rows;
?>
<!DOCTYPE html>
<html lang="ptbr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tipos - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css" rel="stylesheet">
</head>
<body class="fundofixo">
<?php include "menu_adm.php"; ?>
<main class="container">
    <h1 class="breadcrumb alert-warning" >Lista de Tipos</h1>
    <div class="col-xs-12 col-sm-6 col-sm-offset-3 col-md-6 col-md-offset-3">
    <table class="table table-hover tbopacidade">
        <!-- thead>tr>th*4 -->
        <thead>
            <tr> <!-- Cabeçalho da tabela -->
                <th class="hidden">ID</th> <!-- Cabeça da coluna -->
                <th>SIGLA</th>
                <th>RÓTULO</th>
                <th>
                    <a href="tipos_insere.php" target="_self" class="btn btn-block btn-primary btn-xs" role="button">
                        <span class="hidden-xs">ADICIOMAR<br></span>
                        <span class="glyphicon glyphicon-plus"></span>
                    </a>
                </th>
            </tr>
        </thead>
        <!-- tbody>tr>td*4 -->
        <tbody> <!-- Corpo da tabela -->
            <!-- Abre a estrutura de repetição -->
            <?php do { ?>
            <tr> <!-- Linha da tabela -->
                <td class="hidden"><?php echo $row['id_tipo']; ?></td>
                <td><?php echo $row['sigla_tipo']; ?></td>
                <td><?php echo $row['rotulo_tipo']; ?></td>
                <td>
                    <a href="tipos_atualiza.php?id_tipo=<?php echo $row['id_tipo']; ?>" target="_self" class="btn btn-warning btn-block btn-xs">
                        <span class="hidden-xs">ALTERAR<br></span>
                        <span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                    </a>

                    <button data-nome="<?php echo $row['rotulo_tipo']; ?>" data-id="<?php echo $row['id_tipo']; ?>" class="delete btn btn-danger btn-block btn-xs">
                        <span class="hidden-xs">EXCLUIR<br></span>
                        <span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
                    </button>
                </td>
            </tr>
            <?php } while ($row = $lista->fetch_assoc()); ?>
            <!-- Fecha a estrutura de repetição -->
        </tbody>
    </table>
    </div>
</main> 
<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-danger">ATENÇÃO!</h4>
            </div> <!-- fecha modal-header -->
            <div class="modal-body">
                Deseja mesmo EXCLUIR o item?
                <h4><span class="nome text-danger"></span></h4>
            </div> <!-- fecha modal-body -->
            <div class="modal-footer">
                <a href="#" type="button" class="btn btn-danger delete-yes">
                    Confirmar
                </a>
                <button class="btn btn-success" data-dismiss="modal">
                    Cancelar
                </button>
            </div> <!-- fecha modal-footer -->
        </div> <!-- fecha modal-content -->
    </div> <!-- fecha modal-dialog -->
</div> <!-- Fecha myModal -->

<!-- Link arquivos bootstrap script js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>

<!-- Script para o Modal -->
<script type="text/javascript">
    $('.delete').on('click',function(){
        var nome    = $(this).data('nome');
        var id      = $(this).data('id');
        $('span.nome').text(nome);
        $('a.delete-yes').attr('href','tipos_exclui.php?id_tipo='+id);
        $('#myModal').modal('show');
    });
</script>

</body>
</html>
<?php mysqli_free_result($lista); ?>