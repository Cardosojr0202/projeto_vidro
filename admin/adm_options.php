<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Área Administrativa</title>
    <!-- Link do CSS do bootstrap -->
    <link rel="stylesheet" href="../css/bootstrap.min.css" >
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
</head>
<body class="fundofixo">
    <main class="container">
        <h1 class=" bg-primary bg-gradient ">Área Administrativa</h1>
        <div class="row gx-3 gy-4"> <!-- manter os elementos na linha -->

            <!-- ADM PRODUTOS -->
            <div class="col-sm-6 col-md-4"> <!-- dimensionamento -->
                <div class="thumbnail alert-danger">
                    <img class="img-fluid img-thumbnail rounded mx-auto d-block" src="../imagens/c1.jpg" alt="">
                    <br>
                    <div class="alert-danger">
                        <!-- Botão Principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <h1 class="btn btn-default disabled" style="cursor:default;">
                                    PRODUTOS
                                </h1>
                            </div>
                        </div>
                        <!-- Fecha Botão Principal -->
                        <!-- Grupo de botões -->
                        <div class="btn-group btn-group-justified" role="group">
                            <!-- Botão Listar -->
                            <div class="btn-group">
                                <a href="produto_lista.php">
                                    <button class="btn btn-danger">Listar</button>
                                </a>
                            </div>
                            <!-- Fecha Botão Listar -->
                            <!-- Botão Inserir -->
                            <div class="btn-group">
                                <a href="produto_cadastro.php">
                                    <button class="btn btn-danger">Cadastrar</button>
                                </a>
                            </div>
                            <!-- Fecha Botão Inserir -->
                        </div>
                        <!-- Fecha Grupo de botões -->
                    </div> <!-- fecha alert-danger -->
                </div> <!-- fecha thumbnail alert-danger -->
            </div><!-- fecha dimensionamento -->
            <!-- FECHA ADM PRODUTOS -->

            <!-- ADM categoria -->
            <div class="col-sm-6 col-md-4"> <!-- dimensionamento -->
                <div class="thumbnail alert-warning">
                    <img class="img-fluid img-thumbnail rounded mx-auto d-block" src="../imagens/cat1.jpg" alt="">
                    <br>
                    <div class="alert-warning">
                        <!-- Botão Principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <h1 class="btn btn-default disabled" style="cursor:default;">
                                    CATEGORIAS
                                </h1>
                            </div>
                        </div>
                        <!-- Fecha Botão Principal -->
                        <!-- Grupo de botões -->
                        <div class="btn-group btn-group-justified" role="group">
                            <!-- Botão Listar -->
                            <div class="btn-group">
                                <a href="categoria_lista.php">
                                    <button class="btn btn-warning">Listar</button>
                                </a>
                            </div>
                            <!-- Fecha Botão Listar -->
                            <!-- Botão Inserir -->
                            <div class="btn-group">
                                <a href="categoria_insere.php">
                                    <button class="btn btn-warning">Cadastrar</button>
                                </a>
                            </div>
                            <!-- Fecha Botão Inserir -->
                        </div>
                        <!-- Fecha Grupo de botões -->
                    </div> <!-- fecha alert-danger -->
                </div> <!-- fecha thumbnail alert-danger -->
            </div><!-- fecha dimensionamento -->
            <!-- FECHA ADM categoria -->

            <!-- ADM colaboradores -->
            <div class="col-sm-6 col-md-4"> <!-- dimensionamento -->
                <div class="thumbnail alert-info">
                    <img class="img-fluid img-thumbnail rounded mx-auto d-block" src="../imagens/col1.png" alt="">
                    <br>
                    <div class="alert-info">
                        <!-- Botão Principal -->
                        <div class="btn-group btn-group-justified" role="group">
                            <div class="btn-group">
                                <h1 class="btn btn-default disabled" style="cursor:default;">
                                    COLABORADORES
                                </h1>
                            </div>
                        </div>
                        <!-- Fecha Botão Principal -->
                        <!-- Grupo de botões -->
                        <div class="btn-group btn-group-justified" role="group">
                            <!-- Botão Listar -->
                            <div class="btn-group">
                                <a href="colaborador_lista.php">
                                    <button class="btn btn-info">Listar</button>
                                </a>
                            </div>
                            <!-- Fecha Botão Listar -->
                            <!-- Botão Inserir -->
                            <div class="btn-group">
                                <a href="colaborador_insere.php">
                                    <button class="btn btn-info">Cadastrar</button>
                                </a>
                            </div>
                            <!-- Fecha Botão Inserir -->
                        </div>
                        <!-- Fecha Grupo de botões -->
                    </div> <!-- fecha alert-danger -->
                </div> <!-- fecha thumbnail alert-danger -->
            </div><!-- fecha dimensionamento -->
            <!-- FECHA ADM colaboradores -->
        </div> <!-- fecha row -->
    </main><br>

  <!-- Link arquivos bootstrap script js -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="../js/bootstrap.bundle.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
</body>
</html>