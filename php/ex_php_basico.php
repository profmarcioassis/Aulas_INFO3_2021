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

    //exemplos de arrays com índices numéricos
    $arrayNomes = ["Márcio", "Pedro", "Duda", "Matheus"];
    $arrayNomesLojas = array("Renner", "Mglu", "AME", "Zemma");
    print_r($arrayNomesLojas);
    ?>

    <br><br>

    <?php
    //exemplos de arrays com índices associativos
    $idades = array("Márcio" => 41, "Pedro" => 18, "Matheus" => 19);
    print_r($idades);
    echo "<br>";
    $registro = array("id" => 01, "nome" => "Márcio Assis");
    print("<br>Código: " . $registro["id"] . "<br>Nome: " . $registro["nome"]);

    //arrays multidimensional
    $disciplinas = array(
        "1_ano" => array("SO", "LP I", "ELET"),
        "2_ano" => array("LP II", "PS I", "BD", "DES"),
        "3_ano" => array("PW", "PS II", "Mobile")
    );

    echo "<br><br>";
    //Escrevento todo o array
    print_r($disciplinas);

    echo "<br><br>";
    //Escrevendo uma linha do array 
    print_r($disciplinas["2_ano"]);

    echo "<br><br>";
    //escrevendo um registro específico
    print_r($disciplinas["2_ano"][1] . "<br><br>"); //PS I

    //as estruturas if, switch, while, do while funcionam como no java / javascript

    //foreach
    $arrayDisciplinas = array("SO", "LP I", "ELET", "PS I", "PW");

    //escrevendo array com for
    //count (array) -> retorna quantos elementos tem no array
    for ($i = 0; $i < count($arrayDisciplinas); $i++) {
        print("<br>$arrayDisciplinas[$i]");
    }

    echo "<br>";
    //foreach
    foreach ($arrayDisciplinas as $value) {
        print("<br>$value");
    }

    //exemploo foreach array associativo
    echo "<br><br>";
    $age = array("Peter" => "35", "Ben" => "37", "Joe" => "43");
    foreach ($age as $x => $val) {
        echo "$x = $val<br>";
    }

    echo "<br><br>";
    //funções com php sem retorno e sem parâmetro
    function escreverNome(){
        echo "Professor de PW: Márcio Assis";
    }
    echo escreverNome();

    //função com retorno
    function escreverNome_return(){
       return "Márcio Assis";
    }
    echo "<br>Professor de PW: " . escreverNome_return();

    //função com parâmetro
    function Soma ($x, $y){
        return $x + $y;
    }

    echo "<br><br>A soma de 3 + 5 = " . Soma(3, 5);
    echo "<br>A soma de 13 + 25 = " . Soma(13, 25);
    echo "<br>A soma de 31 + 53 = " . Soma(31, 53);
    echo "<br>A soma de 12 + 34 = " . Soma(12, 34);


    ?>

    <br><br><br>

    <?php

    $nome = "Márcio Assis";
    $x = 10;

    $a = 1;

    while ($a <= 10) {
        echo "$a <br>";
        $a++;
    }


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