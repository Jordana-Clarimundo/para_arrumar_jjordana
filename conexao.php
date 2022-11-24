<?php

    $servidor="localhost";
    $usuario="lolita";
    $senha="1234";
    $banco="lolita";

    $mysqli = new mysqli($servidor, $usuario, $senha, $banco);

    if($mysqli->connect_errno){
        echo "Não deu certo" . $mysqli->connect_error;
        exit();
    }
?>