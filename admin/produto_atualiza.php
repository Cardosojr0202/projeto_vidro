<?php
    session_start();
    // corfirmando se a secão esta sendo criada
    //print_r($_SESSION);
    if((!isset($_SESSION['login']) == true) and (!isset($_SESSION['senha']) == true) and (!isset($_SESSION['nivel']) == true))
    {
        // Destroi qualquer sessão ativa
        unset($_SESSION['login']);
        unset($_SESSION['senha']);
        unset($_SESSION['nivel']);
        header('Location: login.php');
    }
      $logado = $_SESSION['login'];

// Incluir o arquivo e fazer a conexão
include("../connection/connection.php");

// Variáveis Globais
$tabela         = "tb_produtos";
$campo_filtro   = "id_produto";

// Atualizando no banco de dados
if($_POST){
    // Definindo o USE do banco de dados
    mysqli_select_db($conexao,$database_conn);

// Guardo o nome da imagem no banco e o arquivo no diretório
    if($_FILES['imagem_produto']['name']){
        $nome_img   = $_FILES['imagem_produto']['name'];
        $tmp_img    = $_FILES['imagem_produto']['tmp_name'];
        $dir_img    = "../imagens/".$nome_img;
        move_uploaded_file($tmp_img,$dir_img);
    }else{
        $nome_img=$_POST['imagem_produto_atual'];
    };

// Receber os dados do formulário e Organize os campos na mesma ordem
    $codigo_produto = $_POST['codigo_produto'];
    $descri_produto = $_POST['descri_produto'];
    $unidade_produto = $_POST['unidade_produto'];
    $espessura_produto = $_POST['espessura_produto'];
    $cor_produto = $_POST['cor_produto'];
    $id_categoria_produto = $_POST['id_categoria_produto'];
    $imagem_produto = $nome_img;
    $venda_produto = $_POST['venda_produto'];
    $promo_produto = $_POST['promo_produto'];


// Campo para filtrar o registro (WHERE)
    $filtro_update      = $_POST['id_produto'];

// Consulta SQL para atualização dos dados
    $updateSQL  =   "UPDATE ".$tabela."
                    SET codigo_produto = '".$codigo_produto."',
                        descri_produto= '".$descri_produto."',
                        unidade_produto  = '".$unidade_produto."',
                        espessura_produto  = '".$espessura_produto."',
                        cor_produto   = '".$cor_produto."',
                        id_categoria_produto  = '".$id_categoria_produto."',
                        imagem_produto   = '".$imagem_produto."',
                        venda_produto   = '".$venda_produto."',
                        promo_produto   = '".$promo_produto."'    
                    WHERE ".$campo_filtro."='".$filtro_update."'
                    ";
    $resultado  =   $conexao->query($updateSQL);

// Após a ação a página será redirecionada
    $destino    = "produto_lista.php";
    if(mysqli_insert_id($conexao)){
        header("Location: $destino");
    }else{
        header("Location: $destino");
    };
};
// Definindo o USE do banco de dados
mysqli_select_db($conexao,$database_conn);
// Consulta para trazer e filtrar os dados
$filtro_select  =   $_GET['id_produto'];
$consulta       =   "SELECT *
                    FROM ".$tabela."
                    WHERE ".$campo_filtro."=".$filtro_select."
                    ";
$lista          =   $conexao->query($consulta);
$row            =   $lista->fetch_assoc();
$totalRows      =   ($lista)->num_rows;

// Selecionar o banco de dados
mysqli_select_db($conexao,$database_conn);

// Selecionar os dados da chave estrangeira
$tabela_fk      =   "tb_categoria";
$ordenar_por    =   "rotulo_categoria ASC";
$consulta_fk    =   "
                    SELECT *
                    FROM ".$tabela_fk."
                    ORDER BY ".$ordenar_por."
                    ";
$lista_fk       =   $conexao->query($consulta_fk);
$row_fk         =   $lista_fk->fetch_assoc();
$totalRows_fk   =   ($lista_fk)->num_rows;
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
            <div class="mx-auto col-sm-12 col-md-8 col-lg-6 mx-auto"> <!-- Dimensionamento -->
                <h2 class="text-light bg-info bg-gradient">
                    <a href="produto_lista.php">
                        <button class="btn btn-danger">
                            <span class="bi bi-chevron-left" aria-hidden="true"></span>
                        </button>
                    </a>
                    Atualizando Produtos
                </h2>
                <div class="thumbnail col-md-12"> <!-- Abre thumbnail -->
                    <div class="alert alert-info" role="alert"> <!-- Abre Alert -->
                        <form action="produto_atualiza.php" id="form_produto_atualiza" name="form_produto_atualiza" method="post" enctype="multipart/form-data">

                            <!-- Inserir o campo id_produto oculto para uso em filtro -->
                            <input type="hidden" name="id_produto" id="id_produto" value="<?php echo $row['id_produto']; ?>">

                            <br>
                            <!-- text codigo_produto -->
                            <label for="codigo_produto">Código:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="codigo_produto" id="codigo_produto" class="form-control" placeholder="Digite o codigo do produto." maxlength="100" required value="<?php echo $row['codigo_produto']; ?>">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha text codigo_produto -->
                            <br>
                            <!-- Abre textarea descri_produto -->
                            <label for="descri_produto">Descrição:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-list-alt" aria-hidden="true"></span>
                                </span>
                                <textarea name="descri_produto" id="descri_produto" cols="30" rows="8" placeholder="Digite a descrição do produto." class="form-control"><?php echo $row['descri_produto']; ?></textarea>
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha textarea descri_produto -->
                            <br>
                            <!-- text unidade_produto -->
                            <label for="unidade_produto">Unidade:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="unidade_produto" id="unidade_produto" class="form-control" placeholder="Digite a unidade do produto." maxlength="100" required value="<?php echo $row['unidade_produto']; ?>">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha text unidade_produto -->
                            <br>
                            <!-- text espessura_produto -->
                            <label for="espessura_produto">Espessura:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="espessura_produto" id="espessura_produto" class="form-control" placeholder="Digite a espessura do produto." maxlength="100" required value="<?php echo $row['espessura_produto']; ?>">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha text espessura_produto -->
                            <br>
                            <!-- text cor_produto -->
                            <label for="cor_produto">Cor:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-cutlery" aria-hidden="true"></span>
                                </span>
                                <input type="text" name="cor_produto" id="cor_produto" class="form-control" placeholder="Digite a cor do produto." maxlength="100" required value="<?php echo $row['cor_produto']; ?>">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha text cor_produto -->
                            <br>
                            <!-- Select id_categoria_produto -->
                            <label for="id_categoria_produto">Categoria:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tasks" aria-hidden="true"></span>
                                </span>
                                <!-- select>opt*2 -->
                                <select name="id_categoria_produto" id="id_categoria_produto" class="form-control" required>

                                    <!-- Abre estrutura de repetição -->
                                    <?php do { ?>
                                    <option value="<?php echo $row_fk['id_categoria']; ?>" <?php if(!(strcmp($row_fk['id_categoria'],$row['id_categoria_produto']))){echo "selected=\"selected\"";}; ?> >
                                        <?php echo $row_fk['rotulo_categoria']; ?>
                                    </option>
                                    <?php } while ($row_fk = $lista_fk->fetch_assoc()); 
                                    $rows_fk = mysqli_num_rows($lista_fk);
                                    if($rows_fk > 0){
                                        mysqli_data_seek($lista_fk,0);
                                        $rows_fk = $lista_fk->fetch_assoc();
                                    };
                                    ?>
                                    <!-- Fecha estrutura de repetição -->

                                </select>
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha Select id_categoria_produto -->
                            <br>
                            <!-- file imagem_produto ATUAL -->
                            <label for="">Imagem Atual:</label>
                            <img src="../imagens/<?php echo $row['imagem_produto']; ?>" alt="" class="img-responsive" style="max: width 100px;">

                            <!-- guardamos o nome da imagem caso não seja alterada -->
                            <input type="hidden" name="imagem_produto_atual" id="imagem_produto_atual" value="<?php echo $row['imagem_produto']; ?>"> 
                            <br>

                            <!-- file imagem_produto NOVA -->
                            <label for="imagem_produto">Imagem:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-picture" aria-hidden="true"></span>
                                </span>
                                <!-- Exibe a imagem inserida -->
                                <img src="" alt="" name="imagem" id="imagem" class="img-responsive" >
                                <input type="file" name="imagem_produto" id="imagem_produto" class="form-control" accept="imagens/*">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha file imagem_produto -->
                            <br>
                            <!-- number venda_produto -->
                            <label for="venda_produto">Valor:</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-tags" aria-hidden="true"></span>
                                </span>
                                <input type="number" name="venda_produto" id="venda_produto" min="0" step="0.01" class="form-control" value="<?php echo $row['venda_produto']; ?>">
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha number venda_produto -->
                            <br>
                            <!-- radio promo_produto -->
                            <label for="promo_produto">Em Promoção?</label>
                            <div class="input-group"> <!-- Abre grupo de inserção -->
                                <label for="promo_produto_s" class="radio-inline mx-2">
                                    <input type="radio" name="promo_produto" id="promo_produto" value="Sim" <?php echo $row['promo_produto']=="Sim" ? "checked" : null; ?> > Sim
                                </label>
                                <label for="promo_produto_n" class="radio-inline">
                                    <input type="radio" name="promo_produto" id="promo_produto" value="Não"  <?php echo $row['promo_produto']=="Não" ? "checked" : null; ?>> Não
                                </label>
                            </div> <!-- Fecha grupo de inserção -->
                            <!-- Fecha radio promo_produto -->
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
<script src="../js/bootstrap.bundle.js"></script>
<script src="../js/bootstrap.min.js"></script>
</body>
</html>
<?php
    mysqli_free_result($lista_fk);
    mysqli_free_result($lista);
?>