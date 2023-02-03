<?php

if(isset($_POST['email'])) {
        include("conexao.php");

        $email = $_POST['email'];
        $senha = $_POST['senha'];

        $sql_code = "SELECT * FROM clientes WHERE email = '$email' LIMIT 1";
        $sql_exec = $mysqli->query($sql_code) or die($mysqli->error);

        $usuario = $sql_exec->fetch_assoc();
        if(password_verify($senha, $usuario['senha'])) {
                if(!isset($_SESSION)) 
                        session_start();
                $_SESSION['usuario'] = $usuario['id'];
                header("Location: home.php");
        }else {
                echo "Senha invalida";
        }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Login</title>
</head>
<body>
        <form method="post">
                <h2>Login</h2>
                <label>Email</label><br>
                <input type="text" name="email"><br>
                <label>Senha</label><br>
                <input type="text" name="senha"><br><br>

                <button type="submit">Entrar</button>

        </form>
</body>
</html>