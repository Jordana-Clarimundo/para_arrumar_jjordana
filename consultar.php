<?php
    include("conexao.php");

    $sql_consultar = "SELECT * FROM tabela_receber";

    $retorno_consulta = $mysqli->query($sql_consultar) or die($msqli->error);

    $quantidade_mensagens = $retorno_consulta->num_rows;

    var_dump($quantidade_mensagens);

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
                        <th>Nome</th>
                        <th>Caminho</th>
                        <th>Data</th>
                        <th>Ações</th>
                    </thead>
                <tbody>
                    <?php
                        if ($quantidade_mensagens == 0){?>
                        <tr>
                            <td colspan="5">Nenhum arquivo recebido.</td>
                        </tr>
                        <?php
                            }else{
                                while($mostrar_arquivo = $retorno_consulta ->fetch_assoc()){
                                    $data = date("d/m/Y H:i", strtotime($mostrar_arquivo['data']));
                        ?>
                            <tr>
                                <td><?php echo $mostrar_arquivo['id_receber']; ?></td>
                                <td><?php echo $mostrar_arquivo['nome']; ?></td>
                                <td><?php echo $mostrar_arquivo['arquivo_caminho']; ?></td>
                                <td><?php echo $data; ?></td>
                                <td></td>
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
</html>