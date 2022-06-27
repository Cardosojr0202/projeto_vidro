<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta http-equiv="refresh" content="15;URL=index.php">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificação do Contato</title>
    <!-- Link do CSS do bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <link rel="stylesheet" href="css/meu_estilo.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
    <?php //include('menu_publico.php'); ?>
    <br>
    <main class="container">
        <div class="jumbotron alert-info">
            <h1 class="text-info text-center">Agradecemos seu contato</h1>
            <?php
                $destino = "contato@FrontVidraçaria.com.br";
                $nome_contato = $_POST['nome_contato'];
                $email_contato = $_POST['email_contato'];
                $msg_contato = "Mensagem de: ".$_POST['nome_contato']."\n".$_POST['comentarios_contato'];
                //$mailsend   = mail("$destino","Formulário de comentário","$msg_contato","From: $email_contato");

                echo "<p class='text-center'> Obrigado por enviar seus comentários, <b>$nome_contato</b>!</p>";
                echo "<p class='text-center'> Mensagem enviada com sucesso!</p>";
            ?>
            <h5 class="text-info text-center"> 
                Caso não visualize a mensagem de agradecimento, entre em contato através do email
                <b><i><?php echo $destino; ?></i></b>
            </h5><br>
        </div><!-- fecha jumbotron alert-danger -->
    </main>
   

    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>