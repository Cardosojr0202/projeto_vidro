<?php
// Incluindo o sistema de autentificação 
include("acesso_com.php");

include("../connection/connection.php");

if($_POST){
    mysqli_select_db($conexao,$database_conn);

    // Variáveis para acrescentar dados ao banco
    $table_insert = "tb_categoria";
    $campos_insert = "sigla_categoria,rotulo_categoria";

    // Receber os dados do formulário
    $sigla_categoria = $_POST['sigla_categoria'];
    $rotulo_categoria = $_POST['rotulo_categoria'];

    // Reunir os valores a serem inseridos
    $valores_in = "'$sigla_categoria','$rotulo_categoria'";

    // Consulta SQL
    $cunsulSQL = "INSERT INTO ".$table_insert."
                    (".$campos_insert.")
                  VALUES
                    (".$valores_in.")
                  ";
    $result = $conexao->query($cunsulSQL);

    // Após a ação a página será redirecionada
    $destino = "categoria_lista.php";
    if(mysqli_insert_id($conexao)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Categoria - Insere</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
    <main class="container">
        <div class="row">
            <div class="mx-auto col-xs-12 col-sm-6 col-md-7"><br>
                <h1 class="text-light bg-primary bg-gradient">
                    <a href="categoria_lista.php" >
                        <button class="btn btn-danger" type="button">
                            <span class="bi bi-chevron-left" aria-hidden="true"></span>
                        </button>
                    </a>
                    Inserindo Categoria
                </h1>
                <div class="thumbnail">
                    <div class="alert alert-primary">
                        <form action="categoria_insere.php" name="form_categoria_insere" id="form_categoria_insere" method="post" enctype="multipart/form-data">

                            <br>
                            <!-- input rotulo_categoria -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="rotulo_categoria" id="rotulo_categoria" aria-label="Rótulo" aria-describedby="basic-addon1" autofocus maxlength="15" placeholder="Rótulo" class="form-control" required>
                            </div>
                            <!-- fecha rotulo_categoria -->

                            <br>
                            <!-- input sigla_categoria -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" aria-label="Sigla" aria-describedby="basic-addon1" name="sigla_categoria" id="sigla_categoria" placeholder="Sigla" class="form-control" required>
                            </div>
                            <!-- fecha sigla_categoria -->

                            <br>
                            <!-- Botão enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" role="button" class="btn col-12 btn-primary">
                        </form>
                    </div><!-- fecha alert -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha dimensionamento -->
        </div><!-- Fecha row -->
    </main>

    <!-- Link arquivos bootstrap script js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>