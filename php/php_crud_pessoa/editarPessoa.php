<?php
    require_once("conexao.php");
    session_start();

    if (isset($_POST["txtNome"])){
        $idPessoa = $_GET["idPessoa"];
        $nome = $_POST["txtNome"];
        $sobrenome = $_POST["txtSobreNome"];
        $idade = $_POST["txtIdade"];
        $estadocivil = $_POST["ddlEstCivil"];
        $sexo = $_POST["radioSexo"];

        $sql = "UPDATE tbPessoa
                SET nomePessoa = '$nome', 
                sobrenomePessoa = '$sobrenome',     
                idadePessoa = $idade,
                idEstCivil = $estadocivil,
                Sexo = '$sexo'
                WHERE idPessoa = $idPessoa";

        if ($conn->query($sql) === TRUE) {
            ?>
            <script>
                alert("Registro atualizado com sucesso!");
                window.location = "selecionarPessoa.php";
            </script>
            <?php
        }
        else{
            ?>
            <script>
                alert("Erro ao atualizar o registro!");
                window.history.back();
            </script>
            <?php
        }
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <title>Editar de Pessoa</title>
</head>

<body style="margin: 20px;">
<?php
     if (isset($_SESSION["usuario"])) {
         require_once("menu.php");
         if ($_SESSION["tipo"] === "A") {
     ?>
    <h2 class="text-center mb-1 mt-2">EDITAR DE PESSOA</h2>

    <?php
        if(isset($_GET["idPessoa"])){
            $idPessoa = $_GET["idPessoa"];
            $sql = "SELECT * from tbPessoa where idPessoa = $idPessoa";
            $consulta = $conn->query($sql);
            $pessoa = $consulta->fetch_assoc(); 
        }
    ?>
           
    <form action="editarPessoa.php?idPessoa=<?php echo $_GET['idPessoa']?>" method="post">
        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtNome">Nome</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" name="txtNome" value="<?php echo $pessoa["nomePessoa"]?>" required placeholder="Digite o nome" autofocus>
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtSobreNome">Sobrenome</label>
            <div class="col-sm-10">
                <input class="form-control" type="text" name="txtSobreNome" value="<?php echo $pessoa["sobrenomePessoa"]?>" required placeholder="Digite o sobrenome">
            </div>
        </div>

        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="txtIdade">Idade</label>
            <div class="col-sm-10">
                <input class="form-control" type="number" min="0" name="txtIdade" value="<?php echo $pessoa["idadePessoa"]?>" required placeholder="Digite a idade">
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
                        <option value="<?php echo $rowEstCivil["idEstCivil"]; ?>" <?php echo ($rowEstCivil["idEstCivil"] == $pessoa["idEstCivil"]) ? "selected" : ""?> ><?php echo $rowEstCivil["estadoCivil"]; ?></option>
                    <?php
                    }
                    ?>
                </select>

            </div>
        </div>
        <div class="form-group row">
            <label class="col-sm-2 font-weight-bold col-form-label text-right" for="radioSexo">Sexo</label>
            <div class="col-sm-10">
                <input class="radio-inline" type="radio" name="radioSexo" value="Feminino" <?php echo ($pessoa["Sexo"]=="Feminino") ? "checked" : ""?> >Feminino
                <input class="radio-inline" type="radio" name="radioSexo" value="Masculino" <?php echo ($pessoa["Sexo"]=="Masculino") ? "checked" : ""?> >Masculino
            </div>
        </div>
        <div class="text-right">
            <input class="btn btn-primary" type="submit" name="btnSalvar" value="Salvar">
            <input class="btn btn-warning" type="reset" name="btnCancelar" value="Cancelar">
        </div>
    </form>

    <?php
        } else {
        ?>
            <div class="alert alert-warning">
                <p>Usuário não autorizado!</p>
                <p>Entre em contato com o administrador do sistema.</p>
            </div>

        <?php 
        } 
        }else {
        ?>
        <div class="alert alert-warning">
            <p>Usuário não autenticado!</p>
            <a href="index.php">Se identifique aqui</a>
        </div>
    <?php } ?>

</body>

</html>