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

    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }
    </style>

</head>

<body>
    <h2>Lista de pessoas cadastradas</h2>

    <?php

    //comando sql
    $sql = "SELECT * 
        FROM tbpessoa 
        order by nomePessoa";
    //executar o comando
    $dadosPessoa = $conn->query($sql);

    //se número de registro retornados for maior que 0
    if ($dadosPessoa->num_rows > 0) {
    ?>

        <table class="table table-striped">
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Sobrenome</th>
                <th>Idade</th>
                <th>Estado Civil</th>
                <th>Sexo</th>
                <th>Editar</th>
                <th>Excluir</th>
            </tr>
            <?php
            while ($exibir = $dadosPessoa->fetch_assoc()) {
            ?>


                <tr>
                    <td><?php echo $exibir["idPessoa"] ?></td>
                    <td><?php echo $exibir["nomePessoa"] ?> </td>
                    <td><?php echo $exibir["sobrenomePessoa"] ?> </td>
                    <td><?php echo $exibir["idadePessoa"] ?> </td>
                    <?php
                    //busca o estado civil de acordo com o código da tabela tbpessoa
                    $sqlEstCivil = "SELECT * FROM tbestcivil WHERE idEstCivil = " . $exibir["idEstCivil"];
                    $dadosEstCivil = $conn->query($sqlEstCivil);
                    $estCivil = $dadosEstCivil->fetch_assoc();
                    ?>
                    <td><?php echo $estCivil["estadoCivil"] ?> </td>
                    <td><?php echo $exibir["Sexo"] ?></td>
                    <td><a href="#">Editar</a></td>

                    <td>
                        <a href="#" onclick="confirmarExclusao(
                        '<?php echo $exibir["idPessoa"] ?>',
                        '<?php echo $exibir["nomePessoa"] ?>',
                        '<?php echo $exibir["sobrenomePessoa"] ?>')">
                            Excluir
                        </a>
                    </td>
                </tr>
            <?php
            }




            ?>
        </table>
    <?php
    }




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

<script>
    function confirmarExclusao(id, nome, sobrenome) {
        if (window.confirm("Deseja realmente excluir o registro: \n" + id + " - " + nome + " " + sobrenome)) {
            window.location = "excluirPessoa.php?idPessoa=" + id;
        }
    }
</script>

</html>