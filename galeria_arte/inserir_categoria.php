<style>
.adicionar {
    border: 1px solid transparent;
    margin-top: 30px;
    text-align: center;
    font-family: 'Ibarra Real Nova', serif;
    font-size: small;
    }
</style>

<div class="adicionar">
<form method="post">
    <p>categoria: <input type="text" name="categoria" required></p>
    <p><button>adicionar</button></p>
</form>
</div>

<?php
if (!empty($_POST["categoria"])){
    $categoria = $_POST["categoria"];
    include("config.php");
    $conn->query("insert into categoria(categoria) values('$categoria')");
    $conn->close();

    echo "<p>categoria <b>$categoria</b> inserida com sucesso!</p>";
}
?>

