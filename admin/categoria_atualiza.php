<?php
    session_start();
    // corfirmando se a secão esta sendo criada
    //print_r($_SESSION);
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['nivel']) == true))
    {
        // Destroi qualquer sessão ativa
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['nivel']);
        header('Location: login.php');
    }
      $logado = $_SESSION['login'];

include("../connection/connection.php");

// variáveis globais
$table = "tb_categoria";
$campo_fil = "id_categoria";

if($_POST){
    mysqli_select_db($conexao,$database_conn);

    // Receber os dados do formulário
    $sigla_categoria = $_POST['sigla_categoria'];
    $rotulo_categoria = $_POST['rotulo_categoria'];

    // Campo para filtrar o registro (WHERE)
    $filtro_up = $_POST['id_categoria'];

    // Inserção dos dados
    $upSQL = "UPDATE ".$table."
            SET sigla_categoria = '".$sigla_categoria."',
                rotulo_categoria = '".$rotulo_categoria."'
            WHERE ".$campo_fil."='".$filtro_up."'
            ";
    $result = $conexao->query($upSQL);

    // Após a ação a página será redirecionada
    $destino = "categoria_lista.php";
    if(mysqli_insert_id($conexao)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
// Consulta para trazer e filtrar os dados
mysqli_select_db($conexao,$database_conn);
$fil_select = $_GET['id_categoria'];
$consul = "SELECT *
          FROM ".$table."
          WHERE ".$campo_fil."=".$fil_select."
        ";
$list = $conexao->query($consul);
$row = $list->fetch_assoc();
$totalrow = ($list)->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Categoria - Atualiza</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
    <main class="container">
        <div class="row">
            <div class="mx-auto col-8"><br>
                <h1 class="text-light bg-primary bg-gradient">
                    <a href="categoria_lista.php" >
                        <button class="btn btn-danger" type="button">
                            <span class="bi bi-chevron-left" aria-hidden="true"></span>
                        </button>
                    </a>
                    Atualiza Categoria
                </h1>
                <div class="thumbnail">
                    <div class="alert alert-primary">
                        <form action="categoria_atualiza.php" name="form_categoria_atualiza" id="form_categoria_atualiza" method="post" enctype="multipart/form-data">

                            <input type="hidden" name="id_categoria" id="id_categoria" value="<?php echo $row['id_categoria']; ?>">

                            <br>
                            <!-- input rotulo_categoria -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="rotulo_categoria" id="rotulo_categoria" aria-label="Rótulo" aria-describedby="basic-addon1" maxlength="15" placeholder="Rótulo" class="form-control" required value="<?php echo $row['rotulo_categoria']; ?>">
                            </div>
                            <!-- fecha rotulo_categoria -->

                            <br>
                            <!-- input sigla_categoria -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" aria-label="Sigla" aria-describedby="basic-addon1" name="sigla_categoria" id="sigla_categoria" placeholder="Sigla" class="form-control" required value="<?php echo $row['sigla_categoria']; ?>">
                            </div>
                            <!-- fecha sigla_categoria -->

                            <br>
                            <!-- Botão enviar -->
                            <input type="submit" value="Atualizar" role="button" name="enviar" id="enviar"  class="btn col-12 btn-primary">
                        </form>
                    </div><!-- fecha alert -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha dimensionamento -->
        </div><!-- Fecha row -->
    </main>
    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($list); ?>