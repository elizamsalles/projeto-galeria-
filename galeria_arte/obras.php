<style>
    .div1 {
        /* width: 100vw;
        height: 100vw; */
        display: flex; 
        flex-direction: column;
        justify-content: center;
        align-items: center; 
        background-color: #efefef;
        margin-top: 0;
        display: flex;
        justify-content: center;
        font-family: 'Ibarra Real Nova', serif;
        
    }
    .item {
        border: 1px solid gray;
        width: 50vw;
        height: 30vh;
        padding: 10px;
        margin-bottom: 10px;
    }
    .item img {
        height: 25vh;
        float: right;
    }
    .titulo {
        font-size: 1.1rem;
        font-weight: bold;
        color: darkcyan;
        font-family: 'Ibarra Real Nova', serif;
    }
    .icon {
        width: 16px; 
        height: 16px !important;
        float: left !important;
        margin-top: 5px !important;
        margin-right: 5px;
        
    }
    .filtrar {
        border: 1px solid transparent;
        margin-top: 30px;
        margin-bottom: 10px;
        text-align: center;
        font-family: 'Ibarra Real Nova', serif;
        font-size: small;
    }

    
</style>

<div class="filtrar">

<form method="post">
categorias:
<?php
include("config.php");
$result = $conn -> query("select * from categoria");

// if (isset($_POST["idcategoria"])) {
//     $categoria_selecionada = $_POST["idcategoria"];
// }

echo "<select name='idcategoria'>";

//vamos usar o while para ler as linhas da tabela de categorias:
while($registo = $result -> fetch_assoc()){ //criamos a var. registo com o valor da var. result + fetch. / fetch assoc lê e retorna uma linha.
    //em html: <option value='1'>teste</option>
    $idcategoria = $registo["idcategoria"];
    $categoria = $registo["categoria"];

    if (isset($_POST["idcategoria"]) && $_POST["idcategoria"]==$idcategoria)
        echo "<option value='$idcategoria' selected>$categoria</option>";

    else
        echo "<option value='$idcategoria'>$categoria</option>";
    
}
echo "</select>";
$conn -> close();
?>

<button> filtrar </button>
</form>

</div>

<div class="div1">
<?php
include("config.php");
if (!empty($_POST["idcategoria"])){
    $idcategoria = $_POST ["idcategoria"];
    $result = $conn -> query ("select * from obras where idcategoriaFK = '$idcategoria'");
}
else {
$result = $conn -> query("select * from obras");
}

while ($registo = $result -> fetch_assoc()) {
    echo "<div class='item'>";
    $id = $registo["idobras"];
    echo "<a href='obras_detalhes.php?id=$id'>";
    echo "<img src='{$registo["imagem_url"]}'>";
    echo "</a>";
    echo "<p class='titulo'>".$registo["nome"]."</p>";
    echo "<p class='autor'>autor: {$registo["autor"]}</p>";
    echo "<p class='ano'>ano: {$registo["ano"]}</p>";

    //mostrar categoria
    echo "<p class='categoria'>categoria: {$registo["idcategoriaFK"]}</p>";

    //eliminar obras
    echo "<a href='javascript:confirmar($id)'>";
    echo "<img src='img/delete.png' class='icon'>";
    echo "</a>";

    // //editar produtos
    // echo "<a href='alterar_obras.php?id=$id'>";
    // echo "<img src='img/edit.png' class='icon'>";
    // echo "</a>";

    echo "</div>";
}
?>
</div>

<script>
    function confirmar(id){
        if (confirm("tem a certeza?")){
            location.href='eliminar_obras.php?id='+id;
        }
    }
</script>




