<?php
session_start(); //continuar a sessão
session_destroy();
header("location: index.php");
?>