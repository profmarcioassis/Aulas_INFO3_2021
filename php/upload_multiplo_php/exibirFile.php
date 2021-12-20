<style>
	.imagem {
		float: left;
		width: 20%;
		height: auto;
		margin-left: 0%;
		margin-right: 3%;
		margin-top: 10%;
		text-align: right;
	}
</style>

<?php
    include_once("conexao.php");
    $sql = "SELECT * from tbFile order by idFile desc";
    //echo $sql;
    $resultado = $conn->query($sql);
    if ($resultado->num_rows > 0) {
        while($exibir = $resultado->fetch_assoc()){
            ?>
            <div class="imagem">
                <a href="#" title="Excluir arquivo" onclick="confirmarExclusao('<?php echo $exibir["idFile"] ?>')">Excluir</a>
                <?php
                    if ($exibir["extensaoFile"] != "pdf") {
                     ?>
                        <img src="uploads/<?php echo $exibir['nameFile'] ?>" style="max-width: 100%; height: auto;"> 
                <?php
                    }else{
                        ?>
                        <br>
                        <a href="uploads/<?php echo $exibir['nameFile'] ?>"><?php echo $exibir['nameFile'] ?></a>
                    <?php
                    }
                ?>
            </div>

<?php
        }
    }else{
        echo "Nenhum arquivo encontrado";
    }

?>

<script>
    function confirmarExclusao(idFile){
        if (window.confirm("Deseja realmente excluir o registro: \n" + idFile + "?")) {
			window.location = "excluirFile.php?idFile=" + idFile;
		}

    }

</script>