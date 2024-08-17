<?php
    include("config.php");

    $conexao = mysqli_connect(SERVIDOR,USUARIO,SENHA,BANCO) or die("banco nao conectado!" . mysqli_connect_error());

