<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aula de PHP</title>
</head>

<body>

    <form action="exibir.php" method="post">
        <fieldset>
            <legend>Exemplo PHP</legend>
            <label for="">Nome: </label>
            <input type="text" name="txtNome" required autofocus placeholder="Informe o nome"><br><br>
            <label for="">Idade</label>
            <input type="text" name="txtIdade" required placeholder="Informe a idade"><br><br>
            <label for="">E-mail</label>
            <input type="text" name="txtEmail" placeholder="Informe um e-mail"><br><br>
            <input type="submit" value="Enviar">
            <input type="reset" value="Cancelar">
        </fieldset>

    </form>

    <script>



        //sem ponto e vírgula
        let nome = 'Márcio Assis'
        console.log(nome)




        //com ponto e vírgula
        let nome = 'Márcio Assis';
        console.log(nome);





        var variaveljs = 'Eu sou uma variável JavaScript.';
    </script>
    <?php
    $variavelphp = "<script>document.write(variaveljs)</script>";
    echo $variavelphp;
    ?>

</body>

</html>