<?php
include_once("conexao.php");
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Pessoas</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    </head>

<body>
    <h2>Exemplo carregar num objeto os dados vindos de uma consulta - PHP</h2>

    <?php
    //****************************************************** */

    //comando sql para buscar os estados civis na tabela
    $sqlEstCivil = "SELECT * FROM tbestcivil order by estadoCivil";
    //executa o comando sql
    $dadosEstCivil = $conn->query($sqlEstCivil);

    while ($estCivil = $dadosEstCivil->fetch_assoc()) {
        //cria um objeto com cada linha da tabela 
        $objEstCivil[] = (object) $estCivil;
    }
    //print_r($objEstCivil);

    for ($i = 0; $i < 3; $i++) {


    ?>
        <select name="" id="">
            <?php
            //percorre o objeto (array)
            foreach ($objEstCivil as $key => $val) {
                //a seguir preenche o option com os dados do objeto (id e nome do estado civil)
            ?>
                <option value="<?php print($objEstCivil[$key]->idEstCivil) ?>"><?php print($objEstCivil[$key]->estadoCivil) ?></option>
            <?php
            }

            ?>

        </select>
    <?php
    }

    ?>
</body>

</html>