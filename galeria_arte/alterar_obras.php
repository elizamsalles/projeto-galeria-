<!-- <?php
//obter o parâmetro id do url
if (empty($_GET["id"])){
    header("location: obras.php");
}
$id = $_GET["id"];
require("config.php");
$result = $conn->query("select * from obras where idobras='$id'");
if ($registo = $result->fetch_assoc()) {
    $nome = $registo["nome"];
    $autor = $registo["autor"];
}

?>
<form>
    <p>obra: <input type="text" name="nome" value="<?php echo $nome; ?>"></p>
    <p>autor: <input type="text" name="autor" value="<?php echo $autor; ?>"></p>
    <p><button>alterar</button></p>
</form>

<?php
if (!empty($_POST["produto"])) { //verificar se o form foi submetido 
    $obras = $_POST["nome"];
    $autor = $_POST["autor"];
}
?> -->