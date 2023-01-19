<style>
    .categorias {
    border: 1px solid transparent;
    margin-top: 30px;
    text-align: center;
    font-family: 'Ibarra Real Nova', serif;
    font-size: small;
    }
</style>


<div class="categorias">
categorias:
<?php
include("config.php");
$result = $conn -> query("select * from categoria");
echo "<select name='idcategoria'>";

//vamos usar o while para ler as linhas da tabela de categorias:
while($registo = $result -> fetch_assoc()){ //criamos a var. registo com o valor da var. result + fetch. / fetch assoc lê e retorna uma linha.
    //em html: <option value='1'>teste</option>
    $idcategoria = $registo["idcategoria"];
    $categoria = $registo["categoria"];
    echo "<option value='$idcategoria'>$categoria</option>";
    
}
echo "</select>";
$conn -> close();
?>
</div>