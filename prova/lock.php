<?php session_start();
    if (!isset($_SESSION['id']) ||
        !isset($_SESSION['usuario']) || 
        !isset($_SESSION['senha'])) {
        header('location:index.php?codigo=1');
    }
?>