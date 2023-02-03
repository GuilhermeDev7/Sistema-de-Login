<?php

include("conexao.php");

$error = "";

if(count($_POST) > 1) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash( $_POST['senha'], PASSWORD_DEFAULT);

          
}

if(empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = "Nao esta valido"; 
       }else{
        echo(" é um e-mail válido."); 
       };

if($error){
        echo $error;
}else {
       $sql_code = "INSERT INTO clientes(nome, email, senha) VALUES ('$nome', '$email', '$senha')";
       $mysqli->query($sql_code) or die($mysqli->error); 
       header("Location: login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Cadastrar</title>
</head>
<body>
        <form  method="POST">
                <h2>Cadastra-se</h2>
                <label >Nome</label><br>
                <input type="text" name="nome"><br>
                
                <label >Email</label><br>
                <input type="text" name="email"><br>

                <label >Senha</label><br>
                <input type="text" name="senha"><br><br>

                <button type="submit">Enviar</button>
        </form>
</body>
</html>