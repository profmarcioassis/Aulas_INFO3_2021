<?php
include_once("conexao.php");

//isset() verifica se foi setado algum valor para $_GET["idPessoa]
if (isset($_GET["idPessoa"])) {
    $idPessoa = $_GET["idPessoa"];

    $sql = "DELETE FROM tbPessoa WHERE idPessoa = $idPessoa";

    if ($conn->query($sql) === TRUE) {
?>
        <script>
            alert("Registro excluído com sucesso.");
            window.location = "selecionarPessoa.php";
        </script>

    <?php

    } else {
    ?>
        <script>
            alert("Erro ao excluir o registro.");
            window.history.back();
        </script>
<?php

    }
}


?>