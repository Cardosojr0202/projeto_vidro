<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <style>
        .bg{
            background-color: rgba(0, 0, 0, 0.6);
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
        <form action="test_login.php" method="post">
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-person-fill"></i>
                </span>
                <input type="login" name="login" id="login" placeholder="Login" class="form-control">
            </div> <!-- fecha input-group -->

            <br><br>
            <div class="input-group">
                <span class="input-group-text">
                    <i class="bi bi-qr-code"></i>
                </span>
                <input type="password" name="senha" id="senha" placeholder="Senha" class="form-control">
            </div> <!-- fecha input-group -->

            <br><br>
            <label for="nivel_colaborador" class="radio-inline mx-2">
                <input type="radio" name="nivel" id="nivel" value="adm"> adm
            </label>
            <label for="nivel_colaborador" class="radio-inline">
                <input type="radio" name="nivel" id="nivel" value="comum"> Comum
            </label>

            <br><br>
            <input type="submit" name="submit" id="btn" value="Enviar">
        </form>
    </div>
    
    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>