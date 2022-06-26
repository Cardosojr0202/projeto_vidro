<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DEVs</title>
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
         <div class="container d-flex justify-content-center  flex-wrap" style="margin-top: 10rem; margin-bottom: 6rem;">
         
            <div class="card-dev">
               <div class="imgBg">
                  <img src="imagens/perfil/perfil-2.jpg" alt="">
               </div>
               <div class="content">
                  <div class="details">
                     <h2>Gabriel cardoso<br><span>junior ux/ui Designer</span></h2>
                     <div class="data">
                        <h3>322<br><span>Posts</span></h3>
                        <h3>120k<br><span>Followers</span></h3>
                        <h3>280<br><span>Following</span></h3>
                     </div>
                     <div class="actionBtn">
                        <button>Follow</button>
                        <button>Menssage</button>
                     </div>
                  </div>
               </div>
            </div><!-- Fecha card-dev -->


            

         </div>
      </div><!-- Fecha Row -->
   </main>

   <!-- Link arquivos bootstrap script js -->
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
   <script src="js/bootstrap.bundle.min.js"></script>
   <script src="js/bootstrap.min.js"></script>
</body>
</html>