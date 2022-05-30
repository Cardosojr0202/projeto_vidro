<?php
// Incluir o arquivo e fazer a conexão
include("../connection/connection.php");

// Variáveis Globais
$tabela         = "tb_colaborador";
$campo_filtro   = "id_colaborador";

// Atualizando no banco de dados
if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conexao,$database_conn);

// Receber os dados do formulário e Organize os campos na mesma ordem
    $login_colaborador = $_POST['login_colaborador'];
    $senha_colaborador = $_POST['senha_colaborador'];
    $nivel_colaborador = $_POST['nivel_colaborador'];

// Campo para filtrar o registro (WHERE)
    $filtro_update      = $_POST['id_colaborador'];

// Consulta SQL para atualização dos dados
    $updateSQL  =   "UPDATE ".$tabela."
                    SET login_colaborador = '".$login_colaborador."',
                        senha_colaborador= '". $senha_colaborador."',
                        nivel_colaborador   = '".$nivel_colaborador."'    
                    WHERE ".$campo_filtro."='".$filtro_update."'
                    ";
    $resultado  =   $conexao->query($updateSQL);

// Após a ação a página será redirecionada
    $destino    = "colaborador_lista.php";
    if(mysqli_insert_id($conexao)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
// Definindo o USE do banco de dados
mysqli_select_db($conexao,$database_conn);
// Consulta para trazer e filtrar os dados
$filtro_select  =   $_GET['id_colaborador'];
$consulta       =   "SELECT *
                    FROM ".$tabela."
                    WHERE ".$campo_filtro."=".$filtro_select."
                    ";
$lista          =   $conexao->query($consulta);
$row            =   $lista->fetch_assoc();
$totalRows      =   ($lista)->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualização de produtos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
</head>
<body class="fundofixo"><br>
    <main class="container">
        <div class="row"> <!-- Abre Row -->
            <div class="mx-auto col-sm-12 col-md-3 col-lg-4 mx-auto"> <!-- Dimensionamento -->
                <h2 class="text-light bg-info bg-gradient">
                    <a href="colaborador_lista.php">
                        <button class="btn btn-danger">
                            <span class="bi bi-chevron-left" aria-hidden="true"></span>
                        </button>
                    </a>
                    Atualizando Colaboradores
                </h2>
                <div class="thumbnail col-md-12"> <!-- Abre thumbnail -->
                    <div class="alert alert-info" role="alert"> <!-- Abre Alert -->
                        <form action="colaborador_atualiza.php" id="form_colaborador_atualiza" name="form_colaborador_atualiza" method="post" enctype="multipart/form-data">

                            <!-- Inserir o campo id_colaborador oculto para uso em filtro -->
                            <input type="hidden" name="id_colaborador" id="id_colaborador" value="<?php echo $row['id_colaborador']; ?>">

                            <br>
                            <!-- text login_colaborador -->
                            <label for="login_colaborador">Login:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="login_colaborador" id="login_colaborador" class="form-control" placeholder="Digite seu login" required value="<?php echo $row['login_colaborador']; ?>">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha text login_colaborador -->

                            <br>
                            <!-- text unidade_produto -->
                            <label for="senha_colaborador">Senha:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="password" name="senha_colaborador" id="senha_colaborador" class="form-control" placeholder="Digite sua senha" required value="<?php echo $row['senha_colaborador']; ?>">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha text unidade_produto -->
                               
                            <br>
                            <!-- input nivel_colaborador -->
                            <label for="nivel_colaborador" class="mx-3">Nivel:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <label for="nivel_colaborador" class="radio-inline mx-2">
                                    <input type="radio" name="nivel_colaborador" id="nivel_colaborador" value="adm"> adm
                                </label>
                                <label for="nivel_colaborador" class="radio-inline">
                                    <input type="radio" name="nivel_colaborador" id="nivel_colaborador" value="com" checked> Comum
                                </label>
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha radio nivel_colaborador -->    

                            <br>
                            <!-- btn Enviar -->
                            <input type="submit" value="Atualizar" name="enviar" id="enviar" class="btn col-12 btn-info ">
                            <!-- Fecha btn Enviar -->
                        </form>
                    </div> <!-- Fecha Alert -->
                </div><!-- Fecha thumbnail -->
            </div><!-- Fecha Dimensionamento -->
        </div> <!-- Fecha Row -->
    </main><br>
<!-- Script para a imagem -->
<!-- Link arquivos bootstrap script js -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php mysqli_free_result($lista); ?>