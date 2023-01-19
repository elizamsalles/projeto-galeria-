<style>
.upload {
    border: 1px solid transparent;
    margin-top: 30px;
    text-align: center;
    font-family: 'Ibarra Real Nova', serif;
    font-size: small;
    }
</style>

<div class="upload">
<form method="post" enctype="multipart/form-data">
    <p>ficheiro: <input type="file" name="ficheiro"></p>
    <p><button>enviar</button></p>
</form>
</div>

<?php
if ($_FILES){
    echo "nome original do ficheiro: ".$_FILES["ficheiro"]["name"]."<br>";
    echo "tamanho em bytes: ".$_FILES["ficheiro"]["size"]."<br>";
    echo "tipo de ficheiro (código mime): ".$_FILES["ficheiro"]["type"]."<br>";
    echo "código de erro (sendo que 0 é tudo ok!): ".$_FILES["ficheiro"]["error"]."<br>";
    echo "ficheiro temporário: ".$_FILES["ficheiro"]["tmp_name"]."<br>";

    //mover o ficheiro da pasta tempoária, para a pasta img
    if (move_uploaded_file($_FILES["ficheiro"]["tmp_name"],"img/".$_FILES["ficheiro"]["name"]))
    echo "<h3> ficheiro enviado com sucesso</h3>";
}
?>