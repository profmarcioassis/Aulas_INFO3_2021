<?php
    require_once("conexao.php"); //inclui o arquivo de conexão
    session_start(); //starta a session
    //receber usuário e senha vindo do login
    $usuario = $conn->real_escape_string($_POST["txtUser"]);
    $senha = md5($_POST["txtPassword"]);

    $sql = "SELECT * 
            from tbuser 
            where user = '$usuario' and 
            password = '$senha'";

    echo $sql;

    $resultado = $conn->query($sql);

    if($resultado->num_rows > 0){
        $dados_usuario = $resultado->fetch_assoc();
        //preencher a session com os dados do usuário
        $_SESSION["usuario"] = $dados_usuario["user"];
        $_SESSION["nome"] = $dados_usuario["name"];
        $_SESSION["tipo"] = $dados_usuario["type"];
        header("location: selecionarPessoa.php");
    }else{
            $_SESSION["erro"] = "Erro";
        ?>
        <script>window.history.back();</script>
        <?php
    }
?>