<?php
//eliminar_obras.php?id=1

if (!empty($_GET["id"])){
    //1. ligar ao servidor mysql
    include("config.php");
    //2. executar o comando sql / query
    $id = $_GET["id"]; //fazer isso no pág. produto
    $conn->query("delete from obras where idobras='$id'");
    echo "delete from obras where idobras='$id'";
    //3. fechar a ligação
    $conn->close();
    //redirecionar para a página pretendida
    header("location: index.php?opcao=obras");
}
?>