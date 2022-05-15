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
    <title> Categoria - Lista</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
    <main class="container"><br>
        <h1 class="text-light bg-primary bg-gradient">lista de Categoria</h1>
        <div class="mx-auto col-9">
            <table class="table table-hover tbopacidade">
             <!-- thead>tr>th*8 -->
             <thead>
                 <tr>
                     <th class="d-none text-light">ID</th>
                     <th class="text-light">SIGLA</th>
                     <th class="text-light">ROTULO</th>
                     <th>
                        <a href="categoria_insere.php" target="_self" class="btn col-6 btn-primary" role="button">
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
                        <td class="text-light"><?php echo $row['sigla_categoria'] ?></td>
                        <td class="text-light"><?php echo $row['rotulo_categoria'] ?></td>
                        <td class="d-grid gap-2">
                            <a href="#" class="btn col-6 btn-success" role="button">
                                <i>ALTERAR</i>
                                <i class="bi bi-arrow-clockwise"></i>
                            </a>
                            <button data-nome="" data-id="" class="btn col-6 btn-danger">
                                <i>EXCLUIR</i>
                                <i class="bi bi-trash-fill"></i>
                            </button>
                        </td>
                  </tr>
                  <?php } while ($row = $list->fetch_assoc()); ?>
              </tbody>
            </table>
        </div><!-- fecha dimensionamento -->
    </main>

    <!-- Link arquivos bootstrap script js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($list); ?>