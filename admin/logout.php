<?php
    session_name('from_vidracariaaa');
    session_start();
    
    //destroi a sessao limpando todos os dados
    session_destroy();

    //apos  a acão a pagina sera redicio
    $destino = "../index.php";
    header("Location: $destino");
    exit;
?>