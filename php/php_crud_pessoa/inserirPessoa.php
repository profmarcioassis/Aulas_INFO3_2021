<?php
//incluir o aquivo de conexão com o BD
include_once("conexao.php");

//receber os dados que veio do form via POST
$nome = $_POST["txtNome"];
$sobrenome = $_POST["txtSobreNome"];
$idade = $_POST["txtIdade"];
$idestcivil = $_POST["ddlEstCivil"];
$sexo = $_POST["radioSexo"];

//criar o comando sql do insert
$sql = "INSERT INTO tbpessoa (nomePessoa, sobrenomePessoa, idadePessoa, idEstCivil, Sexo)
VALUES ('$nome', '$sobrenome', $idade, $idestcivil, '$sexo')";

//echo $sql;

//executar o comando sql
if ($conn->query($sql) === TRUE) {
    ?>
    <script>
        alert("Registro salvo com sucesso!");
        window.location = "selecionarPessoa.php";
    </script>
    
    <?php
}
else{
    ?>
        <script>
            alert("Erro ao inserir o registro");
            window.history.back(); //simula voltar do navegador
        </script>

    <?php
}





?>