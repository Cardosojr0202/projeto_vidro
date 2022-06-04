<?php
    session_start();
    // print_r($_REQUEST);
    if(isset($_POST['submit']) && !empty($_POST['login'] && !empty($_POST['senha']) && !empty($_POST['nivel'])))
    {
        // Acessa o sistema
        include_once('../connection/connection.php');
        $login = $_POST['login'];
        $senha = $_POST['senha'];
        $nivel = $_POST['nivel'];

        // corfirmação se está chegando todos os dados
        // print_r('Login: ' . $login);
        // print_r('<br>');
        // print_r('Senha: ' . $senha);
        // print_r('<br>');
        // print_r('Nivel: ' . $nivel);

        $sql = "SELECT * FROM tb_colaborador WHERE login_colaborador='$login' AND senha_colaborador='$senha' AND nivel_colaborador='$nivel'";
        $result = $conexao->query($sql);

        // corfirmação da consulta do SQL
        // print_r($sql);
        // print_r('<br>');
        //print_r($result);

        if(mysqli_num_rows($result) < 1)
        {
            // corfirmação caso não exista no banco
            //print_r('Não existe');
            unset($_SESSION['login']);
            unset($_SESSION['senha']);
            unset($_SESSION['nivel']);
            header('Location: login.php');
        }
        else
        {
            // corfirmação caso exista no banco
            //print_r('Existe');
            $_SESSION['login'] = $login;
            $_SESSION['senha'] = $senha;
            $_SESSION['nivel'] = $nivel;
            header('Location: index.php');
        };
    }
    else{
        // Não acessa o sistema 
        header('Location: login.php');
    };
?>