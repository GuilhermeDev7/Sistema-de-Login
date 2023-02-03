<?php
include("conexao.php");

if(!isset($_SESSION)) {
        session_start();
}
if(!isset($_SESSION['usuario'])){
        die("Você não esta logado <a href='login.php'>Clique aqui</a>");
}

if(count($_POST) > 1){

$nome  = $_POST['nome'];
$email  = $_POST['email'];
$telefone  = $_POST['telefone'];
$endereco  = $_POST['endereco'];
$departamento  = $_POST['departamento'];
$cpf = $_POST['cpf'];

$sql_code = "INSERT INTO colaboradores (nome, email, telefone,
endereco, departamento, cpf) VALUES ('$nome', '$email',
 '$telefone','$endereco', '$departamento', '$cpf')";
        
        $mysqli->query($sql_code) or die($mysqli->error); 


}

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
        <h2>Home</h2>
        <a href="logout.php">Sair</a>
        <form method="post">
                <label>nome</label><br>
                <input type="text" name="nome"><br>

                <label>email</label><br>
                <input type="text" name="email"><br>

                <label>telefone</label><br>
                <input type="text" name="telefone"><br>

                <label>endereço</label><br>
                <input type="text" name="endereco"><br>

                <label>departamento</label><br>
                <input type="text" name="departamento"><br>

                <label>CPF</label><br>
                <input type="text" name="cpf"><br>

                <br>
                <input type="submit" value="Enviar"><br>

        </form><br>
        <a href="ver_colaboradores.php">Visualizar relatorio</a>
</body>
</html>