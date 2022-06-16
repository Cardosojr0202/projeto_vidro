<?php
// Incluindo o sistema de autentificação 
include("acesso_adm.php");

include("../connection/connection.php");

if($_POST){
    mysqli_select_db($conexao,$database_conn);

    // Variáveis para acrescentar dados ao banco
    $table_insert = "tb_colaborador";
    $campos_insert = "login_colaborador,senha_colaborador,nivel_colaborador,imagem_colaborador";

    // Guardo o nome da imagem no banco e o arquivo no diretório
    if($_FILES['imagem_colaborador']['name']){
        $nome_img   = $_FILES['imagem_colaborador']['name'];
        $tmp_img    = $_FILES['imagem_colaborador']['tmp_name'];
        $dir_img    = "../imagens/perfil/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    };

    // Receber os dados do formulário
    $login_colaborador = $_POST['login_colaborador'];
    $senha_colaborador = $_POST['senha_colaborador'];
    $nivel_colaborador = $_POST['nivel_colaborador'];
    $imagem_colaborador = $_POST['imagem_colaborador'];

    // Reunir os valores a serem inseridos
    $valores_in = "'$login_colaborador','$senha_colaborador','$nivel_colaborador','$imagem_colaborador'";

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
                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-image-fill" aria-hidden="true"></i>
                                </span>
                               <!-- Exibe a imagem inserida -->
                                <img src="" alt="" name="imagem" id="imagem" class="img-responsive">
                                <input type="file" name="imagem_colaborador" id="imagem_colaborador" class="form-control" accept="image/*" style="width: 30%;">
                            </div> <!-- Fecha grupo de inserção -->

                            <br>
                            <!-- Botão enviar -->
                            <input type="submit" value="Cadastrar" name="enviar" id="enviar" role="button" class="btn col-12 btn-primary">
                        </form>
                    </div><!-- fecha alert -->
                </div><!-- fecha thumbnail -->
            </div><!-- fecha dimensionamento -->
        </div><!-- Fecha row -->
    </main>

    <!-- Script para a imagem -->
    <script>
        document.getElementById("imagem_colaborador").onchange = function(){
            var reader = new FileReader();
            if(this.files[0].size>528385){
                alert("A imagem dever ter no máximo 500kb");
                $("#imagem").attr("src","blank");
                $("#imagem").hide();
                $('#imagem_colaborador').wrap('<form>').closest('form').get(0).reset();
                $('#imagem_colaborador').unwrap();
                return false;
            }
            if(this.files[0].type.indexOf("image")==-1){
                alert("Formato inválido, escolha uma imagem!");
                $("#imagem").attr("src","blank");
                $("#imagem").hide();
                $('#imagem_colaborador').wrap('<form>').closest('form').get(0).reset();
                $('#imagem_colaborador').unwrap();
                return false;
            }
            reader.onload = function(e) {
                // obter dados carregados e renderizar miniatura.
                document.getElementById("imagem").src = e.target.result;
                $("#imagem").show();
            }
            // leia o arquivo de imagem com um URL de dados.
            reader.readAsDataURL(this.files[0]);
        }
    </script>

    <!-- Link arquivos bootstrap script js -->
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>