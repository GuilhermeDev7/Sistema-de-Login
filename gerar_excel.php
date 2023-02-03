<?php
 header("Content-type: application/vnd.ms-excel");
 header("Content-type: application/force-download");
 header("Content-Disposition: attachment; filename=relatario200.xls");
 header("Pragma: no-cache");

 include("conexao.php");

 $sql_usuario = "SELECT * FROM colaboradores";
 $query_clientes = $mysqli->query($sql_usuario) or die($mysqli->error);
 $num_clientes = $query_clientes->num_rows;
 

?>

<meta charset='utf-8'>
<table>
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
                                        while($cliente = $query_clientes->fetch_assoc()){
                                                
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
        </table>