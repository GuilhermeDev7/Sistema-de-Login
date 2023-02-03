<?php

if(!isset($_SESSION['usuario'])) {
        session_start();
}

include('conexao.php');

$sql = "SELECT * FROM colaboradores";
$query_cliente = $mysqli->query($sql) or die($mysqli->error);
$num_clientes = $query_cliente->num_rows;
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
</head>
<body>
      
<h1>Lista de Clientes</h1>
        <p>Esses são os clientes cadastrados no seu sistema</p>
        <table border="1 solid" cellpadding="8">
                <thead>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Endereço</th>
                        <th>departamento</th>
                        <th>CPF</th>
                        <th>Data Criaçção</th>
                </thead>
                <tbody>
                        <?php
                        if($num_clientes == 0) {?>
                        <tr>
                                <td colspan="7">Nenhum cliente cadastrado</td>
                                <?php } else {
                                        while($cliente = $query_cliente->fetch_assoc()){
                                                
                                                ?>
                        </tr>
                        <tr>
                                <td><?php echo $cliente['id']?></td>
                                <td><?php echo $cliente['nome']?></td>
                                <td><?php echo $cliente['email']?></td>
                                <td><?php echo $cliente['telefone']?></td>
                                <td><?php echo $cliente['endereco']?></td>
                                <td><?php echo $cliente['departamento']?></td>
                                <td><?php echo $cliente['cpf']?></td>
                                <td><?php echo $cliente['data_criacao']?></td>
                               
                        </tr>
                        <?php };
                        }?>
                </tbody>
        </table><br>
<a href="gerar_excel.php">Gerar relatorio</a><br><br>

<a href="home.php">Home</a><br><br>
<a href="logout.php">Sair</a>
</body>
</html>