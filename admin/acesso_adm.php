<?php
session_name("from_vidracariaaa");

if(!isset($_SESSION)){
    session_start();
};

// Verificar se o usuário está logado na sessão
// Identifica o usuário
if(!isset($_SESSION['login_colaborador'])){
    header("Location: login.php"); exit;
};

$nome_da_sessao =   session_name();
// Verificar o nome da sessão
if(!isset($_SESSION['nome_da_sessao'])OR($_SESSION['nome_da_sessao']!=$nome_da_sessao)){
    // Se não existir, destruimos a sessão por segurança
    session_destroy();
    header("Location: login.php"); exit;
};

// Determinar o nivel de acesso
$nivel_sessão =   'adm';
// Verificar o nivel de acesso
if(!isset($_SESSION['login_colaborador'])OR($_SESSION['nivel_colaborador']!=$nivel_sessão)){
    // Redirecionar para pagina de autorização
    header("Location: invasor_user.php"); exit;
};

// Verificar se o login é válido
if(!isset($_SESSION['login_colaborador'])){
    // Se não existir, destruimos a sessão por segurança
    session_destroy();
    header("Location: login.php"); exit;
};
?>