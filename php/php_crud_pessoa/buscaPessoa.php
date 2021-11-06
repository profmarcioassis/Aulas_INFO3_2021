<?php
require_once("conexao.php");
session_start();

$pesquisa = $_POST["pesquisa"];
$estCivil = $_POST["estCivil"];
//comando sql
if ($estCivil == 0) {
    $sql = "SELECT * 
    FROM tbpessoa
    where nomePessoa like '%$pesquisa%' 
    or sobrenomePessoa like '%$pesquisa%'
    order by nomePessoa";
} else {
    $sql = "SELECT * 
    FROM tbpessoa
    where (nomePessoa like '%$pesquisa%' 
    or sobrenomePessoa like '%$pesquisa%') 
    and idEstCivil = $estCivil 
    order by nomePessoa";
}
//echo $sql;
//executar o comando
$dadosPessoa = $conn->query($sql);

//se número de registro retornados for maior que 0
if ($dadosPessoa->num_rows > 0) {
?>
    <table class="table table-bordered table-striped">
        <tr>

            <th>Id</th>
            <th>Nome</th>
            <th>Sobrenome</th>
            <th>Idade</th>
            <th>Estado Civil</th>
            <th>Sexo</th>
            <?php
            if ($_SESSION["tipo"] === 'A') {
            ?>
                <th>Editar</th>
                <th>Excluir</th>
            <?php
            }
            ?>
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

                <?php
                if ($_SESSION["tipo"] === 'A') {

                ?>
                    <td><a href="editarPessoa.php?idPessoa=<?php echo $exibir["idPessoa"] ?>">Editar</a></td>

                    <td>
                        <a href="#" onclick="confirmarExclusao(
                    '<?php echo $exibir["idPessoa"] ?>',
                    '<?php echo $exibir["nomePessoa"] ?>',
                    '<?php echo $exibir["sobrenomePessoa"] ?>')">
                            Excluir
                        </a>
                    </td>
                <?php
                }
                ?>
            </tr>
        <?php
        }
        ?>
    </table>
<?php
} else {
    echo "<h4>Nenhum registro retornado!</h4";
}
?>