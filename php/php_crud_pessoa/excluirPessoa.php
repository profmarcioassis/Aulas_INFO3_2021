<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<?php
require_once("conexao.php");
session_start();

if (isset($_SESSION["usuario"])) {
    if ($_SESSION["tipo"] === "A") {
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
    } else {
        ?>
        <div class="alert alert-warning">
            <p>Usuário não autorizado!</p>
            <p>Entre em contato com o administrador do sistema.</p>
        </div>

    <?php
    }
} else {
    ?>
    <div class="alert alert-warning">
        <p>Usuário não autenticado!</p>
        <a href="index.php">Se identifique aqui</a>
    </div>
<?php
}
?>