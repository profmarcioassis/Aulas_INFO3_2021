<?php
    session_start(); //iniciando a session
    session_destroy(); //destruindo a session
    header("location: index.php"); //fazendo o redirecionamento para outra página
?>
