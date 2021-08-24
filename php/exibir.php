<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exibir Dados</title>
</head>
<body>
    <h2>Dados do usuário</h2>
    <?php
        $nome = $_POST["txtNome"];
        $idade = $_POST["txtIdade"];
        $email = $_POST["txtEmail"];

        //se eu quisesse salvar os dados no banco, aqui iria implementar o código de inserção
        echo "$nome - $idade - $email";
    ?>
    
</body>
</html>