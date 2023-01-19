<style>
.login {
    border: 1px solid transparent;
    margin-top: 15px;
    text-align: center;
    font-family: 'Ibarra Real Nova', serif;
    font-size: small;
}
</style>
<div class="login">
<form method="post">
    <p>username: <input type="text" name="username"></p>
    <p>password: <input type="password" name="password"></p>
    <p><button>entrar</button></p>
</form>
</div>

<?php
if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    require("config.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $sql = "select * from utilizador where username = '$username' and password = '$password'";
    echo $sql;
    $result = $conn -> query($sql);
    if ($registo = $result -> fetch_assoc()) {
        //login correto
        $_SESSION["userid"] = $registo["idutilizador"];
        $_SESSION["username"] = $registo["username"];
        $_SESSION["admin"] = $registo["admin"];
        header("location: index.php");
    }
    else {
        echo "<p>username e/ou password estão incorretos. tente novamente!</p>";
    }
}
?>