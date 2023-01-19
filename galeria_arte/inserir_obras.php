<style>
.inserir {
    border: 1px solid transparent;
    margin-top: 30px;
    text-align: center;
    font-family: 'Ibarra Real Nova', serif;
    font-size: small;
    }
</style>

<div class="inserir">

<form method="post" enctype="multipart/form-data">
    <p>obra de arte: <input type="text" name="nome" required></p>
    <p>autor: <input type="text" name="autor" required></p>
    <p>ano: <input type="number" name="ano"></p>
    <p><?php include("categorias_select.php") ?></p>
    <p>imagem: <input type="file" name="imagem" required></p>
    <p><button>adicionar</button></p>
    
</form>
</div>


<?php
if (!empty($_POST["nome"])){

    $imagem_url = "null";
    if (move_uploaded_file($_FILES["imagem"]["tmp_name"],"img/".$_FILES["imagem"]["name"])){
        $imagem_url = "'img/".$_FILES["imagem"]["name"]."'";
    }

    $ano = $_POST["ano"];
    if ($ano == ""){
        $ano = "null"; 
    }

    $nome = $_POST["nome"];
    $autor = $_POST["autor"];
    $idcategoria = $_POST["idcategoria"];
    
    

    //ligar ao servidor mysql
    include("config.php");
    $sql = "insert into obras (nome, autor, idcategoriaFK, imagem_url, ano) values ('$nome', '$autor', '$idcategoria', $imagem_url, $ano)";

    echo $sql;
    $conn->query($sql);
    $conn->close();

    //redirecionar para a página obras
    header("location: index.php?opcao=obras");
}
?>