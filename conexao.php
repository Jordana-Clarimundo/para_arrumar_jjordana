<?php

    $servidor="localhost";
    $usuario="root";
    $senha="";
    $banco="lolita";

    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);

    if($mysqli->connect_errno){
        echo "Não deu certo" . $mysqli->connect_error;
        exit();
    }
?>