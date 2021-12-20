<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload de arquivos</title>
</head>
<body>
    <div class="container">
        <div class="entrada">
            <h1>Upload de arquivos</h1>
            <?php include_once("upload.php")?>
            <form action="" method="post" enctype="multipart/form-data">
                <label for="file">Selecione os arquivos</label>
                <input type="file" name="file[]" id="file" multiple required>
                <br>
                <input type="submit" name="upload" value="Enviar">
            </form>
        </div>

        <div class="saida">
            <h2>Imagens cadastradas</h2>
            <?php include_once("exibirFile.php"); ?>
        </div>


    </div>
    
</body>
</html>