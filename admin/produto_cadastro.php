<?php
// Incluindo o sistema de autentificação 
include("acesso_com.php");

include("../connection/connection.php");

if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conexao,$database_conn);
    // Variáveis para inserir dados ao banco
    $tabela_insert  =   "tb_produtos";
    $campos_insert  =   "codigo_produto,legenda_produto,descri_produto,unidade_produto,espessura_produto,cor_produto,id_categoria_produto,imagem_produto,venda_produto,promo_produto";

    // Guardando o Nome da imagem no banco de dados e arquivo no diretório
    if($_FILES['imagem_produto']['name']){
        $nome_img   = $_FILES['imagem_produto']['name'];
        $tmp_img    = $_FILES['imagem_produto']['tmp_name'];
        $dir_img    = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    };

    // Receber os dados do formulário sempre Organize os campos na mesma ordem
    $codigo_produto     =   $_POST['codigo_produto'];
    $legenda_produto    =   $_POST['legenda_produto'];
    $descri_produto     =   $_POST['descri_produto'];
    $unidade_produto    =   $_POST['unidade_produto']; 
    $espessura_produto  =   $_POST['espessura_produto'];
    $cor_produto        =   $_POST['cor_produto'];
    $id_categoria_produto = $_POST['id_categoria_produto'];
    $imagem_produto     =   $_FILES['imagem_produto']['name'];
    $venda_produto      =   $_POST['venda_produto'];
    $promo_produto      =   $_POST['promo_produto'];
   

    // Reunir os valores a serem inseridos
    $valores_insert     =  "'$codigo_produto','$legenda_produto','$descri_produto','$unidade_produto','$espessura_produto','$cor_produto','$id_categoria_produto','$imagem_produto','$venda_produto','$promo_produto'";

    // Consulta SQL para inserção dos dados
    $SQLinsert  =   "INSERT INTO ".$tabela_insert."
                        (".$campos_insert.")
                    VALUES
                        (".$valores_insert.")
                    ";
    $result  =   $conexao->query($SQLinsert);

    // Após a ação a página será redirecionada
    $destino    =   "produto_lista.php";
    if(mysqli_insert_id($conexao)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
// Selecionar o banco de dados
mysqli_select_db($conexao,$database_conn);
// Conexão chave estrangeira tabela categoria 
$tabela_cat_fk      =   "tb_categoria";
$ordenar_cat_por    =   "rotulo_categoria ASC";
$consulta_cat_fk    =   "
                    SELECT *
                    FROM ".$tabela_cat_fk."
                    ORDER BY ".$ordenar_cat_por."
                    ";
$lista_cat_fk       =   $conexao->query($consulta_cat_fk);
$row_cat_fk         =   $lista_cat_fk->fetch_assoc();
$totalRows_cat      =   ($lista_cat_fk)->num_rows;
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrando - Produtos</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" rel="stylesheet">
    <!-- Link para icones do bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <!-- Link para CSS específico -->
    <link rel="stylesheet" href="../css/meu_estilo.css">
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
<body class="fundofixo"><br>
    <main class="container">
        <div class="row"> <!-- Abre Row -->
            <div class="mx-auto col-sm-12 col-md-6 col-lg-7"><!--Abre Dimensionamento -->
                <h2 class="text-light bg-info bg-gradient">
                    <a href="produto_lista.php">
                        <button class="btn btn-danger">
                            <span class="bi bi-chevron-left" aria-hidden="true"></span>
                        </button>
                    </a>
                Cadastrando - Produtos
                </h2>
                <div class="thumbnail"> <!-- Abre thumbnail -->
                    <div class="alert alert-info" role="alert"> <!-- Abre Alert -->
                        <form action="produto_cadastro.php" id="form_produto_cadastro" name="form_produto_cadastro" method="post" enctype="multipart/form-data">                 
        
                            <label for="codigo_produto">Código:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-link-45deg"></i>
                                </span>
                                <input type="text" name="codigo_produto" id="codigo_produto" class="form-control" placeholder="código" maxlength="10" required>
                            </div> <!-- Fecha grupo de inserção -->

                            <br>
                            <label for="descri_produto">LEGENDA:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-pencil-fill"></i>
                                </span>
                                <textarea name="legenda_produto" id="legenda_produto" cols="30" rows="2" placeholder="Digite a legenda do produto." class="form-control"></textarea>
                            </div> <!-- Fecha grupo de inserção -->
        
                            <br>
                            <label for="descri_produto">DESCRIÇÃO:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-pen-fill"></i>
                                </span>
                                <textarea name="descri_produto" id="descri_produto" cols="30" rows="2" placeholder="Digite a descrição do produto." class="form-control"></textarea>
                            </div> <!-- Fecha grupo de inserção -->
    
                            <br>
                            <label for="unidade_produto">Unidade:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-archive-fill"></i>
                                </span>
                                <input type="text" name="unidade_produto" id="unidade_produto" class="form-control" placeholder="unidade" maxlength="10" required>
                            </div> <!-- Fecha grupo de inserção -->

                            <br>
                            <label for="espessura_produto">Espessura:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-aspect-ratio-fill"></i>
                                </span>
                                <input type="text" name="espessura_produto" id="espessura_produto" class="form-control" placeholder="espessura" maxlength="10" required>
                            </div> <!-- Fecha grupo de inserção -->

                            <br>
                            <label for="cor_produto">Cor:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-palette-fill"></i>
                                </span>
                                <input type="text" name="cor_produto" id="cor_produto" class="form-control" placeholder="cor" maxlength="10" required>
                            </div> <!-- Fecha grupo de inserção -->

                            <br>          
                            <label for="id_categoria_produto">CATEGORIA:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-badge-wc-fill"></i>
                                </span>
                                <!-- select>opt*2 -->
                                <select name="id_categoria_produto" id="id_categoria_produto" class="form-control" required>

                                    <!-- Abre estrutura de repetição -->
                                    <?php do { ?>
                                    <option value="<?php echo $row_cat_fk['id_categoria']; ?>">
                                        <?php echo $row_cat_fk['rotulo_categoria']; ?>
                                    </option>
                                    <?php } while ($row_cat_fk = $lista_cat_fk->fetch_assoc()); 
                                    $rows_cat_fk = mysqli_num_rows($lista_cat_fk);
                                    if($rows_cat_fk > 0){
                                        mysqli_data_seek($lista_cat_fk,0);
                                        $rows_cat_fk = $lista_cat_fk->fetch_assoc();
                                    };
                                    ?><!-- Fecha estrutura de repetição -->
                                </select>
                            </div> <!-- Fecha grupo de inserção -->

                            <br>                
                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                    <i class="bi bi-image-fill" aria-hidden="true"></i>
                                </span>
                                <!-- Exibe a imagem inserida -->
                                <img src="" alt="" name="imagem" id="imagem" class="img-fluid">
                                <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="imagens/*" style="width: 30%;">
                            </div> <!-- Fecha grupo de inserção -->

                            <br>
                            <label for="venda_produto">Preço de Venda:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-text">
                                <i class="bi bi-currency-exchange"></i>
                                </span>
                                <input type="number" name="venda_produto" id="venda_produto" min="0" step="0.01" class="form-control" placeholder="Preço de venda">
                            </div> <!-- Fecha grupo de inserção -->

                            <br>
                            <!-- radio promo_produto -->
                            <label for="promo_produto">Em Promoção?</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <label for="promo_produto_s" class="radio-inline mx-2">
                                    <input type="radio" name="promo_produto" id="promo_produto" value="Sim"> Sim
                                </label>
                                <label for="promo_produto_n" class="radio-inline">
                                    <input type="radio" name="promo_produto" id="promo_produto" value="Não"> Não
                                </label>
                            </div> <!-- Fecha grupo de inserção -->

                            <br>    
                            <input type="submit" value="Cadastrar" name="cadastrar" id="cadastrar" class="btn col-12 btn-info">
                        </form>
                    </div> <!-- Fecha Alert -->
                </div><!-- Fecha thumbnail -->
            </div><!-- Fecha Dimensionamento -->
        </div> <!-- Fecha Row -->
    </main><br>
<!-- Script para a imagem -->
<script>
    document.getElementById("imagem_produto").onchange = function(){
        var reader = new FileReader();
        if(this.files[0].size>528385){
            alert("A imagem dever ter no máximo 500kb");
            $("#imagem").attr("src","blank");
            $("#imagem").hide();
            $('#imagem_produto').wrap('<form>').closest('form').get(0).reset();
            $('#imagem_produto').unwrap();
            return false;
        }
        if(this.files[0].type.indexOf("image")==-1){
            alert("Formato inválido, escolha uma imagem!");
            $("#imagem").attr("src","blank");
            $("#imagem").hide();
            $('#imagem_produto').wrap('<form>').closest('form').get(0).reset();
            $('#imagem_produto').unwrap();
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>