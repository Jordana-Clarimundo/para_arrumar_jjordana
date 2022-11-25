<?php
    include("conexao.php");

    $sql_consultar = "SELECT * FROM produto";

    $retorno_consulta = $mysqli->query($sql_consultar) or die($msqli->error);

    $quantidade_produtos = $retorno_consulta->num_rows;
    

?>
<!DOCTYPE html>
    <html lang="pt-br">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
            <title>Consultar Arquivo</title>
        </head>
        <body>
            <div class="container">
                <table class="table table-hover">
                    <thead>
                        <th>Id</th>
                        <th>Nome do produto</th>
                        <th>Link da foto</th>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Ações</th>
                    </thead>
                <tbody>
                    <?php
                        if ($quantidade_produtos == 0){?>
                        <tr>
                            <td colspan="">Nenhum produto cadastrado.</td>
                        </tr>
                        <?php
                            }else{
                                while($mostrar_arquivo = $retorno_consulta ->fetch_assoc()){                                    
                        ?>
                            <tr>
                                <td><?php echo $mostrar_arquivo['id_produto']; ?></td>
                                <td><?php echo $mostrar_arquivo['nome']; ?></td>
                                <td><a href="<?php echo $mostrar_arquivo['foto']; ?>"><?php echo $mostrar_arquivo['foto'];?></a></td>
                                <td><?php echo $mostrar_arquivo['descricao']; ?></td>
                                <td><?php echo $mostrar_arquivo['valor']; ?></td>
                                <td>
                                    <a class="btn btn-default" href="editar_produto.php?id=<?php echo $mostrar_arquivo['id_produto']; ?>" role="button"><span class="glyphicon glyphicon-pencil" aria-hidden="true"></span> Editar</a>
                                    <a class="btn btn-default" href="deletar_produto.php?id=<?php echo $mostrar_arquivo['id_produto']; ?>" role="button"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span> Deletar</a>
                                </td>
                            </tr>
                        <?php
                                }
                            }

                        ?>    
                </tbody>
            </table>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
    </body>
</html>