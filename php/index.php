<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula de PHP</title>
</head>

<body>
    
    <?php

    $nome = "Márcio Assis";
    $x = 10;


    if ($nome == "Márcio Assis") {
        echo '<br><br>Oi, bom dia! Eu sou o professor ' . $nome;
        echo "<br>";
        echo "Oi, bom dia! Eu sou o professor $nome";
    }
    echo "<br>";

    echo strlen($nome);

    ?>


</body>

</html>