<?php
include("../connection/connection.php");

// Definindo o banco de dados
mysqli_select_db($conexao,$database_conn);

// Recebendo os dados 
$table_del = "tb_categoria";
$id_table = "id_categoria";
$id_filtro = $_GET['id_categoria'];

// SQL exclusão
$delSQL = "DELETE
           FROM ".$table_del."
           WHERE ".$id_table."=".$id_filtro."
          ";
$result = $conexao->query($delSQL);

// Após a ação a página será redirecionada
$destino = "categoria_lista.php";
if(mysqli_insert_id($conexao)){
    header("Location: $destino");
}else{
    header("Location: $destino");
};
?>