<?php
    //verificando se foi enviado algum valor de arquivo
    if (isset($_POST["upload"])) {
        //recebendo os valores dos arquivos enviados pelo form
        $file = $_FILES["file"];
        //conta quantos arquivos foram enviados
        $numFile = count(array_filter($file["name"]));
        //definir qual pasta a imagem será salva
        $folder = "uploads";
        //definir os tipos suportados de arquivos
        $permite = array("tif", "jpg", "png", "jpeg", "pdf");
        //definir o tamanho máximo do arquivo
        $maxSize = 1024 * 1024 * 5;
        
        //mensagens de erro
        $msg = array(); //cria um array vazio
        $erroMsg = array(
            1 => "O arquivo é maior que o limite permitido",
            2 => "O upload do arquivo foi feito parcialmente",
            3 => "Não foi possível fazer o upload"
        );

        for ($i=0; $i < $numFile; $i++) {
            $name = $file["name"][$i]; //pega o nome do arquivo
            $type = $file["type"][$i]; //pega o tipo do arquivo
            $size = $file["size"][$i]; //pega o tamanho do arquivo
            $error = $file["error"][$i]; //pega os erros
            $tmp = $file["tmp_name"][$i]; //pega um nome temporário para o arquivo
            
            $extensao = @end(explode(".", $name)); //nome_arquivo.png
            //echo $extensao;
            
            $novoNome = rand() . ".$extensao"; //gera um novo nome
            
            if ($error != 0) { //se houver erro ao carregar a imagem
                $msg[] = "<b>$name</b>" . $erroMsg[$error];
            }else if(!in_array($extensao, $permite)){ //se não existir nenhuma extensão do vetor permite 
                $msg[] = "<b>$name</b>" . "Erro: tipo de arquivo não permitido!";
            }else if ($size > $maxSize){
                $msg[] = "<b>$name</b>" . "Tamanho maior que o permitido!";
            }else{ //se não ocorrer nenhum erro, vamos inserir o arquivo
                //move o arquivo para a pasta
                if (move_uploaded_file($tmp, $folder."/".$novoNome)) {
                    include_once("conexao.php");
                    $sql = "INSERT INTO tbFile (nameFile, extensaoFile) 
                            VALUES ('$novoNome', '$extensao')";
                    //echo $sql;
                    if ($conn->query($sql) === TRUE) {
                        $msg[] = "Upload realizado com sucesso";
                    }else{
                        $msg[] = "Erro ao fazer upload";
                    }
                }else{
                    $msg[] = "Ocorreu algum erro ao fazer o upload do arquivo";
                }
            }
        }
        foreach($msg as $value){
            echo $value . "<br>";
        }
        header("Location: index.php");
    }
?>