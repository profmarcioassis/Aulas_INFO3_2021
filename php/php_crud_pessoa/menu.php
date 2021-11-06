<div style="height: 70px; width: 100%; padding: 10px; background-color: silver; 
text-align: right;">
    Bem-vindo(a): <b><?php echo $_SESSION["nome"]; ?></b>
    <br>
    <a href="sair.php" title="Logout">Sair</a>
</div>
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
    <ul class="navbar-nav">
        <?php
            if ($_SESSION["tipo"] ==="A") {
        ?>
        <li class="nav-item">
            <a class="nav-link" href="cadPessoa.php">Cadastrar Pessoa</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="cadUsuario.php">Cadastrar Usuário</a>
        </li>
        <?php 
        } 
        ?>
        <li class="nav-item">
            <a class="nav-link" href="selecionarPessoa.php">Listar Pessoas</a>
        </li>
    </ul>

</nav>