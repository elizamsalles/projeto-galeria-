

<h1>categorias:</h1>
<?php
include("config.php");
$result = $conn -> query("select * from categoria");



//vamos usar o while para ler as linhas da tabela de categorias:
while($registo = $result -> fetch_assoc()){ //criamos a var. registo com o valor da var. result + fetch. / fetch assoc lê e retorna uma linha.
    echo $registo["idcategoria"];
    echo " ";
    echo $registo["categoria"];
    echo "<br>";
}

$conn -> close();
?>