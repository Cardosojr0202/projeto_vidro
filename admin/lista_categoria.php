<?php
include("../connection/connection.php");
$consul = "SELECT * FROM tb_categoria ORDER BY rotulo_categoria ASC";

// Fazer a lista completa dos dados
$list   = $conexao->query($consul);
// Separar os dados em linhas (row)
$row    = $list->fetch_assoc();
// Contar o total de linhas
$totalrows = ($list)->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista categoria</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
    <main class="container"><br>
        <h1 class="bg-primary bg-gradient">lista de Categoria</h1>
        <div>
            <table class="table table-hover tbopacidade">
             <!-- thead>tr>th*8 -->
             <thead>
                 <tr>
                     <th class="d-none">ID</th>
                     <th>SIGLA</th>
                     <th>ROTULO</th>
                     <th>
                         <a href="#" target="_self" class="btn btn-primary d-block" role="button">
                            <i class="d-xs-none">ADICIONAR </i>
                            <i class="bi bi-plus-circle"></i>
                         </a>
                    </th>
                 </tr>
             </thead>
              <!-- tbody>tr>td*8 -->
              <tbody>
                  <?php do { ?>
                  <tr>
                        <td class="d-none"><?php echo $row['id_categoria'] ?></td>
                        <td><?php echo $row['sigla_categoria'] ?></td>
                        <td><?php echo $row['rotulo_categoria'] ?></td>
                        <td class="d-grid gap-2">
                            <a href="#" class="btn btn-success" role="button">
                                <i>ALTERAR</i>
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                            <button data-nome="" data-id="" class="btn btn-danger">
                                <i>EXCLUIR</i>
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                  </tr>
                  <?php } while ($row = $list->fetch_assoc()); ?>
              </tbody>
            </table>
        </div>
    </main>

    <!-- Link arquivos bootstrap script js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($list); ?>