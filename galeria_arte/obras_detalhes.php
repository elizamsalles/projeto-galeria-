<!-- essa página mostra os detalhes dos obras -->
<style>
    .item {
        /* border: 1px solid black; */
        width: 80vw;  /* isso significa 60% da largura do ecrã  */
        height: 30vh; 
        padding: 10px;
    }
    .item img {
        height: 50vh; 
        float: right;
        /* width: 30vh; */
    }
    .titulo {
        font-size: 2rem;
        font-weight: bold;
        color: darkcyan;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
        text-transform: lowercase;
    }
    .autor {
        font-size: 1rem;
        color: black;
        text-align: center;
        text-transform: uppercase;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .ano {
        font-size: 0.7rem;
        text-align: center;
        font-family: Verdana, Geneva, Tahoma, sans-serif;
    }
    .lista {
        margin-top: 300px;
        /* border: 1px solid black; */
        height: 35vh; /* isso significa 40% da altura do ecrã */
        width: 100%; 
        padding: 10px;
        display: flex;
        justify-content: space-evenly;
        flex-wrap: wrap;
        align-items: center;
    }
    .lista img {
        height: 100%;
        float: none;
        /* margin-top: 30px; */
        margin-right: 10px;
        margin-bottom: 10px;
        
    }
</style>
<?php
include("config.php");
$result=$conn->query("select * from obras where idobras=".$_GET['id']);
if ($registo = $result -> fetch_assoc()) {
    echo "<div class='item'>";
    $id = $registo["idobras"];
    echo "<a href='{$registo["imagem_url"]}'>";
    echo "<img id='principal' src='{$registo["imagem_url"]}'>";
    echo "</a>";
    echo "<p class='titulo'>".$registo["nome"]."</p>";
    echo "<p class='ano'>".$registo["ano"]."</p>";
    echo "<p class='autor'>".$registo["autor"]."</p>";

    //obter mais imagens do produto
   
    echo "<div class='lista'>";
    // echo "<h3>outras imagens:</h3>";
    // echo "<br>";
    $imagens=$conn->query("select * from imagem where idobrasFK = '$id'");
    while ($imagem = $imagens -> fetch_assoc()){
        echo "<img src='{$imagem["imagem_url"]}'onclick='muda(this.src)'>";
    }

    echo "</div>";
    echo "</div>";

   
}

?>

<script>
    function muda(url){
        // alert(url);
        // document.querySelectorAll(".item img")[0].src = url;
        // document.querySelector(".item img").src = url;
        document.getElementById('principal').src = url;
    }
</script>