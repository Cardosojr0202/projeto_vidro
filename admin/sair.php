<?php 
session_start();
unset($_SESSION['email']);
unset($_SESSION['senha']);
unset($_SESSION['nivel']);
session_destroy();
header('Location: login.php');
?>