<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>rodape</title>
    <!-- Link do CSS do bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body>
    <div class="row panel-footer d-flex align-items-stretch" style="background-color: rgba(0,0,0,0.7); padding: 10px;">
        <br>
        <div class="logo text-center">
            <h3>Front <span>Vidraçaria</span></h3>
        </div>
        <div class="col-sm-6 col-md-4 gx-10">
            <h4 class="text-white text-center">Fale conosco</h4>
            <br>
            <i class="text-white">A melhor Vidraçaria da região!</i>
            <address>
                <i class="text-white">Rua Dom Joaquim, 495 - Centro - Itapetininga - SP - CEP 18200-000</i>
                <br>
                <i class="text-white bi bi-telephone-inbound-fill"></i>
                <span class="text-white">&nbsp;Fone (15) 3511 1200</span>
                <br>
                <i class="text-white bi bi-envelope-dash-fill"></i>
                <span class="text-white">&nbsp;Email:</span>
                <a href="mailto:contato@FrontVidraçaria.com.br?subject=Contato&amp;cc=seuemail@hotmail.com">
                    contato@FrontVidraçaria.com.br
                </a>
            </address>
            <div class=" embed-responsive embed-responsive-16by9">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d117003.53227995423!2d-48.10015538099095!3d-23.591404900785765!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94c5cc70ba456a65%3A0x770be09241987369!2sItapetininga%2C%20SP!5e0!3m2!1spt-BR!2sbr!4v1655317823382!5m2!1spt-BR!2sbr" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div><!-- Fecha Dimensinamento -->

        <br>
        <div class="col-md-4">
            <!-- <h4 class="text-white text-center">Social</h4> -->
            <ul class="nav text-center d-flex justify-content-center mx-auto" style="margin: 90px 90px;">
                <li class="nav-item espacamento">
                    <a href="#home" class="text-info">
                        <i class="bi bi-facebook" style="font-size: 3rem;"></i>
                    </a>
                </li>
                <li class="nav-item espacamento">
                    <a href="#home" class="text-danger">
                        <i class="bi bi-instagram" style="font-size: 3rem;"></i>
                    </a>
                </li>
                <li class="nav-item espacamento">
                    <a href="#home" class="text-info">
                        <i class="bi bi-twitter" style="font-size: 3rem;"></i>
                    </a>
                </li>
                <li class="nav-item espacamento">
                    <a href="#home" class="text-success" style="font-size: 3rem;">
                        <i class="bi bi-whatsapp"></i>
                    </a>
                </li>
            </ul>
        </div>

        <br>
        <div class="col-md-4">
            <div style="background: none;">
                <h4 class="text-white text-center">Contato</h4>
                <form action="rodape_contato_envia.php" name="form_contato" id="form_contato" method="post">
                    <!-- INPUT GROUP NOME -->
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person-fill"></i>
                        </span>
                        <input type="text" name="nome_contato" id="nome_contato" placeholder="Digite seu nome" aria-describedby="basic-addon1" required="" class="form-control">
                    </div> <!-- fecha input-group -->
        
                    <!-- INPUT GROUP EMAIL -->
                     <br>
                    <div class="input-group">
                        <span class="input-group-text" id="basic-addon2">
                            <i class="bi bi-envelope-dash-fill"></i>
                        </span>
                        <input type="email" name="email_contato" id="email_contato" placeholder="Digite seu email" aria-describedby="basic-addon2" required="" class="form-control">
                    </div> <!-- fecha input-group -->
                   
                    <!-- TEXTAREA COMENTÁRIOS -->
                    <br>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-pencil-fill" aria-hidden="true"></i>
                        </span>
                        <textarea name="comentarios_contato" id="comentarios_contato" cols="30" rows="5" placeholder="Comentários, dúvidas e/ou sugestões." aria-describedby="basic-addon3" required="" class="form-control"></textarea>
                    </div> <!-- fecha input-group -->
        
                    <!-- CONSTRUA O BOTÃO ENVIAR Use glyphicon-send -->
                    <br>
                    <button class="btn btn-info col-12" aria-label="Enviar">
                         Enviar
                        <i class="bi bi-send-fill mx-2"></i>
                    </button>
                </form>
            </div>
        </div>
        
        <br>
        <div class="container my-3">
            <h6 class="text-info text-center">
                Developed by cardosojr™/claudio™ 2022.
                <br>
                <a class="link-warning" href="developer.php">
                    www.developer.com.br
                </a>
            </h6>
        </div>
    </div><!-- Fecha row -->

    <!-- Link arquivos bootstrap script js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>