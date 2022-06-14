<?php
// Incluindo o sistema de autentificação 
include("acesso_adm.php");

include("../connection/connection.php");

if($_POST){
    mysqli_select_db($conexao,$database_conn);

    // Variáveis para acrescentar dados ao banco
    $table_insert = "tb_colaborador";
    $campos_insert = "login_colaborador,senha_colaborador,nivel_colaborador";

    // Receber os dados do formulário
    $login_colaborador = $_POST['login_colaborador'];
    $senha_colaborador = $_POST['senha_colaborador'];
    $nivel_colaborador = $_POST['nivel_colaborador'];

    // Reunir os valores a serem inseridos
    $valores_in = "'$login_colaborador','$senha_colaborador','$nivel_colaborador'";

    // Consulta SQL
    $cunsulSQL = "INSERT INTO ".$table_insert."
                    (".$campos_insert.")
                  VALUES
                    (".$valores_in.")
                  ";
    $result = $conexao->query($cunsulSQL);

    // Após a ação a página será redirecionada
    $destino = "colaborador_lista.php";
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
            <div class="mx-auto col-sm-12 col-md-3 col-lg-4"><br>
                <h1 class="text-light bg-primary bg-gradient">
                    <a href="colaborador_lista.php">
                        <button class="btn btn-danger" type="button">
                            <span class="bi bi-chevron-left" aria-hidden="true"></span>
                        </button>
                    </a>
                    Inserindo Colaborador
                </h1>
                <div class="thumbnail">
                    <div class="alert alert-primary">
                        <form action="colaborador_insere.php" name="form_colaborador_insere" id="form_colaborador_insere" method="post" enctype="multipart/form-data">

                            <br>
                            <!-- input login_colaborador -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="text" name="login_colaborador" id="login_colaborador" aria-label="Login" aria-describedby="basic-addon1" autofocus maxlength="15" placeholder="Digite seu login" class="form-control" required>
                            </div>
                            <!-- fecha login_colaborador -->

                            <br>
                            <!-- input senha_colaborador -->
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon1">@</span>
                                <input type="password" aria-label="Senha" aria-describedby="basic-addon1" name="senha_colaborador" id="senha_colaborador" placeholder="Digite sua senha" class="form-control" required>
                            </div>
                            <!-- fecha senha_colaborador -->

                            <br>
                            <!-- input nivel_colaborador -->
                            <label for="nivel_colaborador" class="mx-3">Nivel:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <label for="nivel_colaborador" class="radio-inline mx-2">
                                    <input type="radio" name="nivel_colaborador" id="nivel_colaborador" value="adm"> adm
                                </label>
                                <label for="nivel_colaborador" class="radio-inline">
                                    <input type="radio" name="nivel_colaborador" id="nivel_colaborador" value="comum" checked> Comum
                                </label>
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha radio nivel_colaborador -->

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