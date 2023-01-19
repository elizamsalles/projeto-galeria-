<style>
.registo {
    border: 1px solid transparent;
    margin-top: 15px;
    text-align: center;
    font-family: 'Ibarra Real Nova', serif;
    font-size: small;
}
</style>

<div class="registo">
<form method="post">
    <p>username: <input type="text" name="username" required></p>
    <p>password: <input type="password" name="password" required minlength="3"></p>
    <p>confirmar password: <input type="password" name="cpassword" required></p>
    <p><button>criar conta</button>
</form>
</div>
<?php



if (!empty($_POST["username"])) {
    require("config.php");
    $username = $_POST["username"];
    $password = $_POST["password"];
    $cpassword = $_POST["cpassword"];

    if ($password != $cpassword) {
        echo "<p>password e confirmar password são diferentes!</p>";
        exit;
    } 
    $result=$conn->query("select * from utilizador where username='$username'");
   
   if ($result->num_rows>0){
      echo "<p>username já existente! tente outro!</p>";
      exit;
   }

   $sql="insert into utilizador(username,password) values('$username','$password')";
   //echo $sql;
   $conn->query($sql);
   if ($conn->affected_rows==1)
   {
          echo "<p>utilizador registado com sucesso!</p>";
          echo "<p>efetue o login <a href='index.php?opcao=login'>aqui</a></p>";
          echo "<script>document.forms[0].style.display='none';</script>";
   }
}
?>