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
</head>
<body>
    <main class="container">
        <h1>lista de categoria</h1>
        <table class="table table-hover tbopacidade">
             <!-- thead>tr>th*8 -->
             <thead>
                 <tr>
                     <th class="col">ID</th>
                     <th class="col">SIGLA</th>
                     <th class="col">ROTULO</th>
                     <th class="col">ADICIONAR</th>
                 </tr>
             </thead>
              <!-- tbody>tr>td*8 -->
              <tbody>
                  <?php do { ?>
                  <tr>
                        <td><?php echo $row['id_categoria'] ?></td>
                        <td><?php echo $row['sigla_categoria'] ?></td>
                        <td><?php echo $row['rotulo_categoria'] ?></td>
                        <td>ALTERAR|EXCLUIR</td>
                  </tr>
                  <?php } while ($row = $list->fetch_assoc()); ?>
              </tbody>
        </table>
    </main>

    <!-- Link arquivos bootstrap script js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($list); ?>