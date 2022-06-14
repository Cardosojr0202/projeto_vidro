<?php
// Incluindo o sistema de autentificação 
include("acesso_adm.php");
 
// Incluir o arquivo e fazer a conexão
include("../connection/connection.php");

// Definindo o USE do banco de dados
mysqli_select_db($conexao,$database_conn);

// Definindo e recebendo dados para consulta
$tabela_delete  = "tb_produtos";
$id_tabela_del  = "id_produto";
$id_filtro_del  = $_GET['id_produto'];

// SQL para exclusão
$delSQL  =   "DELETE
                FROM ".$tabela_delete."
                WHERE ".$id_tabela_del."=".$id_filtro_del."
                ";
$resul  =   $conexao->query($delSQL);

// Após a ação a página será redirecionada
$destino    =   "produto_lista.php";
if(mysqli_insert_id($conexao)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};
?>