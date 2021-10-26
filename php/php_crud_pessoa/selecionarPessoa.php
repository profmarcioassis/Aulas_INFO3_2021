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

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
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

    <script>
        $(document).ready(function() {
            $("#form-pesquisa").submit(function(evento) {
                evento.preventDefault();
                let pesquisa = $("#pesquisa").val();

                let dados = {
                    pesquisa: pesquisa
                }

                $.post("buscaPessoa.php", dados, function(retorna) {
                    $(".resultados").html(retorna);
                });
            });
        });


        function confirmarExclusao(id, nome, sobrenome) {
            if (window.confirm("Deseja realmente excluir o registro: \n" + id + " - " + nome + " " + sobrenome)) {
                window.location = "excluirPessoa.php?idPessoa=" + id;
            }
        }
    </script>


</head>

<body style="margin: 10px">
    <h2>Lista de pessoas cadastradas</h2>
    <form id="form-pesquisa" action="" method="post">
        <div class="form-group row">
            <label for="pesquisa" class="col-sm-4 font-weight-bold col-form-label text-right">Informe o campo a ser pesquisado</label>
            <div class="col-sm-4">
                <input type="text" class="form-control" name="pesquisa" id="pesquisa">
                <input type="submit" class="btn btn-primary" name="enviar" value="Pesquisar">
            </div>
        </div>
    </form>

    <div class="resultados">

    </div>

</body>

</html>