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
    <style>
        /* Estilizando barras de rolagem no Chrome, Edge e Safari */
        body::-webkit-scrollbar {
        width: 10px;               /* width of the entire scrollbar */
        }

        body::-webkit-scrollbar-track {
        background: rgba(59, 153, 241, 0.846);        /* color of the tracking area */
        }

        body::-webkit-scrollbar-thumb {
        background-color: rgb(48, 48, 242);    /* color of the scroll thumb */
        border-radius: 20px;       /* roundness of the scroll thumb */
        border: 3px solid rgb(0, 60, 255);  /* creates padding around scroll thumb */
        }

        /* Estilizando barras de rolagem no Firefox */
       * {
        scrollbar-width: thin;
        scrollbar-color: blue rgb(0, 153, 255);
        }
    </style>
</head>
<body class="fundofixo">
<?php include('menu_publico.php') ?>
   <main class="container-fluid">
      <div class="row">
         <div class="container d-flex justify-content-center  flex-wrap" style="margin-top: 10rem; margin-bottom: 6rem;">
         
            <div class="card-dev" style="margin: 36px;">
               <div class="imgBg">
                  <img src="imagens/perfil/perfil-2.jpg" alt="">
               </div>
               <div class="content">
                  <div class="details">
                     <h2>Gabriel cardoso<br><span>junior ux/ui Designer</span></h2>
                     <div class="data">
                        <ul class="nav text-center d-flex justify-content-center mx-auto">
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-info">
                                   <i class="bi bi-facebook" style="font-size: 3rem;"></i>
                               </a>
                           </li>
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-danger">
                                   <i class="bi bi-instagram" style="font-size: 3rem;"></i>
                               </a>
                           </li>
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-info">
                                   <i class="bi bi-twitter" style="font-size: 3rem;"></i>
                               </a>
                           </li>
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-success" style="font-size: 3rem;">
                                   <i class="bi bi-whatsapp"></i>
                               </a>
                           </li>
                       </ul>
                     </div> 
                     <div class="actionBtn">
                        <button class="btn">Follow</button>
                        <button class="btn">Menssage</button>
                     </div>
                  </div>
               </div>
            </div><!-- Fecha card-dev -->


            <div class="card-dev" style="margin: 36px;">
               <div class="imgBg">
                  <img src="imagens/perfil/perfil-1.jpeg" alt="">
               </div>
               <div class="content">
                  <div class="details">
                     <h2>Claudio milton<br><span>junior ux/ui Designer</span></h2>
                     <div class="data">
                        <ul class="nav text-center d-flex justify-content-center mx-auto">
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-info">
                                   <i class="bi bi-facebook" style="font-size: 3rem;"></i>
                               </a>
                           </li>
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-danger">
                                   <i class="bi bi-instagram" style="font-size: 3rem;"></i>
                               </a>
                           </li>
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-info">
                                   <i class="bi bi-twitter" style="font-size: 3rem;"></i>
                               </a>
                           </li>
                           <li class="nav-item mx-2">
                               <a href="#home" class="text-success" style="font-size: 3rem;">
                                   <i class="bi bi-whatsapp"></i>
                               </a>
                           </li>
                       </ul>
                     </div> 
                     <div class="actionBtn">
                        <button class="btn">Follow</button>
                        <button class="btn">Menssage</button>
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