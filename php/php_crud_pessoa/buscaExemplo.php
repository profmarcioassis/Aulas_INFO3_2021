<?php
include_once("conexao.php");

$pessoa = $_POST["pessoa"];
//comando sql
$sql = "SELECT * 
    FROM tbpessoa
    where idPessoa = $pessoa 
    order by nomePessoa";
//echo $sql;
//executar o comando
$dadosPessoa = $conn->query($sql);

//se número de registro retornados for maior que 0
if ($dadosPessoa->num_rows > 0) {


    $exibir = $dadosPessoa->fetch_assoc();
    //busca o estado civil de acordo com o código da tabela tbpessoa
    $sqlEstCivil = "SELECT * FROM tbestcivil WHERE idEstCivil = " . $exibir["idEstCivil"];
    $dadosEstCivil = $conn->query($sqlEstCivil);
    $estCivil = $dadosEstCivil->fetch_assoc();
?>
    <form action="editarPessoa.php?idPessoa=<?php echo $_GET['idPessoa'] ?>" method="post">
        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtNome">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="txtNome" value="<?php echo $exibir["nomePessoa"] ?>" required placeholder="Digite o nome" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtSobreNome">Sobrenome</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="txtSobreNome" value="<?php echo $exibir["sobrenomePessoa"] ?>" required placeholder="Digite o sobrenome">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtIdade">Idade</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" min="0" name="txtIdade" value="<?php echo $exibir["idadePessoa"] ?>" required placeholder="Digite a idade">
            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="ddlEstCivil">Estado Civil</label>
            <div class="col-sm-10">
                <select class="form-control" name="ddlEstCivil" id="ddlEstCivil">
                    <?php
                    //incluir o arquivo de conexão
                    include_once('conexao.php');
                    //buscar dados do dropdown no BD (tbestcivil)
                    //criar o comando sql
                    $sql = "SELECT idEstCivil, estadoCivil
                        FROM tbestcivil
                        ORDER BY estadoCivil";

                    //executar o comando sql
                    $estadocivil = $conn->query($sql);

                    while ($rowEstCivil = $estadocivil->fetch_assoc()) {
                    ?>
                        <option value="<?php echo $rowEstCivil["idEstCivil"]; ?>" <?php echo ($rowEstCivil["idEstCivil"] == $exibir["idEstCivil"]) ? "selected" : "" ?>><?php echo $rowEstCivil["estadoCivil"]; ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="radioSexo">Sexo</label>
            <div class="col-sm-10">
                <input class="radio-inline" type="radio" name="radioSexo" value="Feminino" <?php echo ($exibir["Sexo"] == "Feminino") ? "checked" : "" ?>>Feminino
                <input class="radio-inline" type="radio" name="radioSexo" value="Masculino" <?php echo ($exibir["Sexo"] == "Masculino") ? "checked" : "" ?>>Masculino
            </div>
        </div>
        <div class="text-right">
            <input class="btn btn-primary" type="submit" name="btnSalvar" value="Salvar">
            <input class="btn btn-warning" type="reset" name="btnCancelar" value="Cancelar">
        </div>
    </form>


<?php
} else {
    echo "<h4>Nenhum registro retornado!</h4";
}
?>