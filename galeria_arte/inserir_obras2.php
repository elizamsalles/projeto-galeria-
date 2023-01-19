<style>
.inserir2 {
    border: 1px solid transparent;
    margin-top: 30px;
    text-align: center;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    font-size: small;
    }
</style>

<div class="inserir2">
<form method="post" enctype="multipart/form-data">
    <p>obra de arte: <input type="text" name="nome" required></p>
    <p>autor: <input type="text" name="autor" required></p>
    <p>ano: <input type="number" name="ano"></p>
    <p><?php include("categorias_select.php") ?></p>
    <p>imagens: <input type="file" name="imagens[]" required multiple></p>
    <p><button>adicionar</button></p>
    
</form>
</div>


<?php
if (!empty($_POST["nome"])){

    $imagem_url = "null";
    // $obras = $_POST["obras"];
    $idcategoria = $_POST["idcategoria"];

    $nome = $_POST["nome"];
    $autor = $_POST["autor"];
    $idcategoria = $_POST["idcategoria"];
    $ano = $_POST["ano"];
    
    

    //ligar ao servidor mysql
    include("config.php");
    $sql = "insert into obras (nome, autor, idcategoriaFK, imagem_url, ano) values ('$nome', '$autor', '$idcategoria', $imagem_url, $ano)";

    echo $sql;
    $conn->query($sql);
    $idobra = $conn->insert_id; 
    echo "<p>novo produto com id $idobras</p>";
    
    // upload das várias imagens
    $comando = "";
    foreach($_FILES["imagens"]["tmp_name"] as $key=>$value)
    {
     echo "$key  $value<br>"; // 0   C:\xampp\tmp\php92FE.tmp
     
     move_uploaded_file($value,"img/".$_FILES["imagens"]["name"][$key]);
 
     $imagem_url="img/".$_FILES["imagens"]["name"][$key];
 
     $comando.="insert into imagem(imagem_url,idobrasFK)
     values('$imagem_url',$idobras);";
    }
    echo $comando;
    $conn->multi_query($comando);
 
    $conn->close();

    //redirecionar para a página obras
    header("location: index.php?opcao=obras");
}
?>