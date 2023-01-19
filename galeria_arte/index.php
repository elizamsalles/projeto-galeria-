<?php

session_start(); // start ou resume session --- começar ou continuar a sessão! //pode estar no index ou na página login

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Ibarra+Real+Nova&display=swap" rel="stylesheet">
    <title>art gallery</title>
    <style>
        body {
            background-color: #efefef;
            font-family: 'Ibarra Real Nova', serif;
        }
        nav {
            text-align: center;
            margin-top: 50px;
            /* margin-bottom: 40px; */
            font-size: larger;
        }
        a {
            margin-right: 10px;
        }
        a:hover {
            text-decoration: none;
        }
        a:link {
            text-decoration: none;
            text-transform: lowercase;
        }
        h1 {
            text-align: center;
        }
        .logo {
            width: 250px;
            height: 250px;
            border-radius: 300px;
            /* margin-right: 50px;
            margin-bottom: 0;  */
            display: inline; 
            position: center;
            /* left: 80%;
            top: 10px; */
            padding: 15px;
        }
        footer {
            position: fixed;
            bottom: 0;
            left: 0;
            right: 0;
            width: 100%;
            text-align: left;
            font-size: smaller;
            /* margin-top: auto;
            margin-bottom: none; */
            padding: 15px;
            color: rgb(186,187,190);
            font-family: 'Ibarra Real Nova', serif;
        }
        

        
    </style>
</head>
<body> 
<nav>
    
    <!-- <h1>art gallery </h1>  -->
    <img class="logo" src="img/logo.png"> 
    

    <br>
    <hr>
    
        

        
        <?php 
        if (!empty($_SESSION["userid"])){
            //login efetuado
            ?>
            <a href="index.php?opcao=obras">Obras</a>
            <a href="index.php?opcao=inserir_obras">Inserir Obras</a>
            <a href="index.php?opcao=inserir_categoria">Inserir Categoria</a>
            <a href="index.php?opcao=upload">Upload de imagens</a>
            <a href="index.php?opcao=categorias_select">Categorias</a>
            <a href="index.php?opcao=eliminar_categoria">Eliminar Categoria</a> 
            <a href="index.php?opcao=logout">Logout</a>
            <!-- <a href="index.php?opcao=inserir_obras2">Inserir obras com mais de 1 imagem</a> -->
            
            <?php
        }
        else {
            //sem login
            ?>
            <a href="index.php?opcao=login">Login</a>
            <a href="index.php?opcao=registo">Registo</a>
            <?php
        }
        ?>
        

    </nav>
     <?php
    if (!empty($_SESSION["username"])){
        // echo "<h3>bem vindo(a) {$_SESSION["username"]}</h3>";
    }
    ?> 
    <main>
        <?php 
        if (!empty($_GET["opcao"])){
            include($_GET["opcao"].".php");
        }
        ?>
    </main>
</body>



 </html>

<!-- footer area -->

<footer class="clearfix">
<div class="inner">
<div class="left">
    © 2022 Art Gallery Daisy - Projeto criado por Eliza Salles
    <br><br>
</div>

    <div class="social-links">
        <a target="_blank" rel="nofollow" href="https://www.linkedin.com/in/eliza-salles-26303ba4/">
            <i aria-hidden="true" class="fab fa-linkedin"></i>
        </a>
        <a target="_blank" rel="nofollow" href="https://github.com/elizamsalles">
            <i aria-hidden="true" class="fab fa-github"></i>
        </a>
    </div>

</div>

</footer>


