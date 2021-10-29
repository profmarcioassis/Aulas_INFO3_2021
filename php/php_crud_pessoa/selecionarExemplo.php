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

    <script>
        $(document).ready(function() {
            $("#ddlPessoa").change(function(evento) {
                evento.preventDefault();
                let pessoa = $("#ddlPessoa").val();

                let dados = {
                    pessoa: pessoa
                }

                $.post("buscaExemplo.php", dados, function(retorna) {
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
        <div class="row">
            <div class="form-group col-sm-12">
                <label for="">Selecine uma pessoa</label>
                <div class="col-sm-12">
                    <select class="form-control" name="ddlPessoa" id="ddlPessoa">
                        <?php
                        //incluir o arquivo de conexão
                        include_once('conexao.php');
                        //buscar dados do dropdown no BD (tbestcivil)
                        //criar o comando sql
                        $sql = "SELECT *
                        FROM tbPessoa
                        ORDER BY nomePessoa";

                        //executar o comando sql
                        $dadosPessoa = $conn->query($sql);

                        while ($rowPessoa = $dadosPessoa->fetch_assoc()) {
                        ?>
                            <option value="<?php echo $rowPessoa["idPessoa"]; ?>"><?php echo $rowPessoa["nomePessoa"]; ?></option>
                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
        </div>
    </form>

    <div class="resultados">

    </div>

</body>

</html>