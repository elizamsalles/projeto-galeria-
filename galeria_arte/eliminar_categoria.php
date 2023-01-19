<style>
.eliminar {
    border: 1px solid transparent;
    margin-top: 10px;
    text-align: center;
    font-family: 'Ibarra Real Nova', serif;
    font-size: small;
    }
</style>

<div class="eliminar">

<?php
if (!empty($_POST["idcategoria"])){
    include("config.php");
    $idcategoria = $_POST["idcategoria"];
    //só elimina categorias que não tenham produtos incluídos
    $conn->query("delete from categoria where idcategoria = '$idcategoria'");
    $conn->close(); 
}
?>

<form method="post">
    <?php include("categorias_select.php"); ?>
    <br>
    <button>eliminar</button>
</form>
</div>