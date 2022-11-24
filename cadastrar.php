<?php
    include("conexao.php");

    if(!isset($_SESSION)){
        session_start();
    }
    
    if(isset($_POST['nome'])){
        $nome = $_POST['nome'];
        $foto = $_POST['foto'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];
        

        $mysqli->query("INSERT INTO produto (nome, foto, descricao, valor) VALUES ('$nome', '$foto', '$descricao', '$valor')") or die ($mysqli->error);

        $_SESSION['msg'] = "<div class='alert alert-success'> Produto cadastrado com sucesso. </div>";
    }

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
        <link rel="stylesheet" href="meuestilo.css"> 
        <title>Lolita Boutique - CADASTRAR PRODUTOS</title>
    </head>
    <body>
        <div class="container">
            <h1>CADASTRAR PRODUTOS</h1>
            <form action="" method= "post" enctype="multipart/form-data">                
                <div class="mb-3">
                    <label for="bt_nome" class="form-label">Nome do produto:</label>
                    <input class="form-control" type="text" name="nome" required>
                    <div class="form-text">*inserir texto completo</div>
                    <br>
                </div>
                <div class="mb-3">
                    <label for="bt_nome" class="form-label">Foto do produto:</label>
                    <input class="form-control" type="text" name="foto" required>
                    <div class="form-text">*inserir imagem .jpg</div>
                    <br>
                </div>
                <div class="mb-3">
                    <label for="bt_nome" class="form-label">Descrição do produto:</label>
                    <input class="form-control" type="text" name="descricao" required>
                    <div class="form-text">*inserir texto completo</div>
                    <br>
                </div>
                <div class="mb-3">
                    <label for="bt_nome" class="form-label">Valor:</label>
                    <input class="form-control" type="text" name="valor" required>
                    <div class="form-text">*inserir texto completo</div>
                    <br>     
                </div>
                
                <button type="submit" class="btn btn-primary">Enviar</button>
                <button type="reset"  class="btn btn-danger">Limpar</button>
                <a href="index.php" class="btn btn-primary">Voltar</a> 
                <br>
                <?php
                    if(isset($_SESSION['msg'])){
                        echo $_SESSION['msg'];                        
                        
                        unset($_SESSION['msg']);                   
                    }
                ?>               
            </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>