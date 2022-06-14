<?php
//incluir o arquivo e fazer a conexão
include('../connection/connection.php');

//inicia a verificação do login
if($_POST){
    //definindo o banco de dados 
    mysqli_select_db($conexao,$database_conn);

    //verificar o login e a senha recebida
    $login_colaborador = $_POST['login_colaborador'];
    $senha_colaborador = $_POST['senha_colaborador'];

    $verificaSQL    =   "
                        SELECT *
                        FROM tb_colaborador
                        WHERE login_colaborador='$login_colaborador'
                        AND senha_colaborador='$senha_colaborador'
                        ";

    //carregar os dados e verificar
    $lista_session  =   mysqli_query($conexao,$verificaSQL);
    $row_session    =   $lista_session->fetch_assoc();
    $totalRow_session   =   mysqli_num_rows($lista_session);

    //se a sessão nao existir, inicia uma
    if(!isset($SESSION)){
        $sessao_antiga  =   session_name("from_vidracariaaa");//colocar senha de acesso de sessao
        session_start();
        $session_name_new   =   session_name(); //recupera o nome da atual
    } 

    //carregar informações em uma sessão
    if($totalRow_session>0){
        $_SESSION['login_colaborador']  = $login_colaborador;
        $_SESSION['nivel_colaborador']  = $row_session['nivel_colaborador'];
        $_SESSION['nome_da_sessao'] = session_name();
        echo "<script>window.open('index.php','_self')</script>";
    }else{
        echo "<script>window.open('invasor.php','_self')</script>";
    };
};
  
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <meta http-equiv="Refresh" content="25;URL=../index.php"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
        .bg{
            background-color: rgba(0, 0, 0, 0.8);
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 30px;
            border-radius: 15px;
            color: white;
            width: 350px;
        }
        #btn{
            background-color: dodgerblue;
            border: none;
            padding: 15px;
            width: 100%;
            border-radius: 10px;
            color: white;
            font-size: 15px;
        }
        #btn:hover{
            background-color: deepskyblue;
            cursor: pointer;
        }
    </style>
</head>
<body class="fundofixo">
    <!-- <a href="home.php">Voltar</a> -->
    <div class="bg mx-auto col-sm-6 col-md-5 col-lg-4">
        <h1>Login</h1>
        <br>
        <form action="login.php" method="post">
            <label class="my-3" for="senha_colaborador">Login:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>
                <input type="login" name="login_colaborador" id="login_colaborador" autofocus required placeholder="Digite seu login" autocomplete="off" class="form-control">
            </div> <!-- fecha input-group -->

            <br>
            <label class="my-3" for="senha_colaborador">Senha:</label>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-qr-code"></i>
                </span>
                <input type="password" name="senha_colaborador" id="senha_colaborador" required placeholder="Digite sua senha" class="form-control">
            </div> <!-- fecha input-group -->

            <br><br>
            <input type="submit" name="submit" id="btn" value="Entrar">
        </form>
        <p class="text-center">
            <small>
                <br>
                caso não faça uma escolha em 25 segundo será redirecionado automaticamente para pagina inicial.
            </small>
        </p>
    </div>
    
    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>