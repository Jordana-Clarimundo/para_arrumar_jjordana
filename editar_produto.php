<?php
    include("conexao.php");

    if(isset($_GET["id"])){
        
        $id_produto = $_GET["id"];

        $sql_consultar = "SELECT * FROM produto WHERE id_produto = $id_produto ";
        $retorno_consulta = $mysqli->query($sql_consultar) or die($msqli->error);
        $mostrar_produto = $retorno_consulta ->fetch_assoc();

    }else{
        echo "Id não identificado";
        die();
    }

    if(isset($_POST["nome"])){

        $nome = $_POST['nome'];
        $descricao = $_POST['descricao'];
        $valor = $_POST['valor'];

        $id = $id_produto ;

        $sql_editar = "UPDATE produto
        SET nome = '$nome',
        descricao= '$descricao',
        valor = '$valor'
        WHERE id_produto = '$id'";
        $deucerto = $mysqli->query($sql_editar) or die ($mysqli->error);

        unset($_POST);
         
        header('Location: consultar.php');
        exit;
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
        <title>Lolita Boutique - Editar Produto</title>
    </head>
    <body>
        <div class="container">
            <h1>CADASTRAR PRODUTOS</h1>
            <form action="" method= "post" enctype="multipart/form-data">                
                <div class="mb-3">
                    <label for="bt_nome" class="form-label">Nome do produto:</label>
                    <input class="form-control" type="text" name="nome" value="<?php echo $mostrar_produto["nome"]; ?>" required>
                    <div class="form-text">*inserir texto completo</div>
                    <br>
                </div>
                
                <div class="mb-3">
                    <label for="bt_nome" class="form-label">Descrição do produto:</label>
                    <input class="form-control" type="text" name="descricao" value="<?php echo $mostrar_produto["descricao"]; ?>" required>
                    <div class="form-text">*inserir texto completo</div>
                    <br>
                </div>
                <div class="mb-3">
                    <label for="bt_nome" class="form-label">Valor:</label>
                    <input class="form-control" type="text" name="valor" value="<?php echo $mostrar_produto["valor"]; ?>" required>
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
    </body>
</html>