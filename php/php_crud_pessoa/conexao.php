<?php
      
    //parãmetros de conexão com BD
    define("HOST", "localhost");
    define("USER", "root");
    define("PASS", "");
    define("DB", "bdpessoa");

    $charset = "utf8";

    //criar um objeto de conexão
    $conn = new mysqli(HOST, USER, PASS, DB);

    //checar a conexão
    if ($conn->connect_error) {
        die("Falha na conexão: " . $conn->connect_error);
    }
?>