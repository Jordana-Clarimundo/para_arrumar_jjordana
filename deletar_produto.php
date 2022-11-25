<?php

    if(!empty($_GET['id']))
    {
        include_once('config.php');
   
        $id = $_GET['id'];

        $sqlSelect = "SELECT * FROM usuarios Where id=$id";

        $result =$conexão->qyery($sqlSelect);

        if($result->num_rows > 0)
        {
            $sqlDelete = "DELETE FROM usuarios Where id=$id";
            $result =$conexão->qyery($sqlSelect);
        }
    }  
    header('location: sistema.php');

    
?>