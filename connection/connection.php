<?php
// Definindo variáveis para conexão
$hostname_conn = "localhost";
$database_conn = "bd_vidracaria";
$username_conn = "cardosojr";
//$password_conn = "1234";
$password_conn = "#@senac4321@#";
$charset_conn = "utf8";

// Definindo parâmetros da conexão
$conexao = new mysqli($hostname_conn, $username_conn, $password_conn, $database_conn);

// Definindo o conjunto de caracteres da conexão
mysqli_set_charset($conexao,$charset_conn);

// Verificando possíveis erros na conexão
if($conexao->connect_error){
    echo "Error: ".$conexao->connect_error;
};
// Não deixar espaço vazio depois do fechamento do PHP causa erro HEADER
?>