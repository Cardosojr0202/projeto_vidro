<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developers</title>
    <!-- Link do CSS do bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
<?php include('menu_publico.php') ?>
   <main class="container-fluid">
      <div class="row">
         <div class="container d-flex justify-content-around align-items-center flex-wrap" style="margin-top: 10rem; margin-bottom: 6rem;">
         
            <div class="card" style="width: 18rem;">
               <img src="imagens/perfil/perfil-2.jpg" class="card-img-top" alt="perfil-2">
               <div class="card-body">
                  <h3>Gabriel</h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
               </div>
            </div><!-- Fecha Card 1 -->

            <div class="card" style="width: 18rem;">
               <img src="imagens/perfil/perfil-1.jpeg" class="card-img-top" alt="perfil-1">
               <div class="card-body">
                  <h3>Claudio</h3>
                  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
               </div>
            </div><!-- Fecha Card 1 -->

         </div>
      </div><!-- Fecha Row -->
   </main>

   <!-- Link arquivos bootstrap script js -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>