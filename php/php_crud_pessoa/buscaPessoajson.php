<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    header("Content-type: application/json");

    require_once("conexao.php");

    $sql = "SELECT * FROM tbpessoa order by nomePessoa";

    $dadosPessoa = $conn->query($sql);

    $arraydados = array();

    if ($dadosPessoa->num_rows > 0) {
        while ($dados = $dadosPessoa->fetch_assoc()) {
            array_push($arraydados, array("id" => $dados["idPessoa"], "nome" => $dados["nomePessoa"]));
        }

        echo json_encode($arraydados);
    } else {
        echo json_encode($arraydados);
    }
}
