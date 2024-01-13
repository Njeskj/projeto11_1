<?php
session_start();
require_once('config.php'); // Inclua o arquivo config.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Utilizar prepared statements para evitar injeção de SQL
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);

    // Executar a consulta preparada
    $stmt->execute();

    // Armazenar o resultado da consulta
    $result = $stmt->get_result();

    // Verificar se o usuário foi encontrado no banco de dados
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();

        // Verificar a senha
        if (password_verify($password, $row["password_hash"])) {
            // Determinar o papel do usuário (admin ou comum)
            $isAdmin = $row["is_admin"];

            // Armazenar na sessão
            $_SESSION['admin'] = $isAdmin;

            // Redirecionar para a página correta
            if ($isAdmin) {
                header('Location: admin/index.php');
            } else {
                header('Location: index.php');
            }
            exit();
        } else {
            $error_message = "Senha incorreta.";
        }
    } else {
        $error_message = "Nome de usuário não encontrado.";
    }

    // Fechar a declaração preparada
    $stmt->close();
}

// Feche a conexão com o banco de dados
// $conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyPI62z9BqUpiHpQ6t2EZN/sN6lJOp5Yaa" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h2>Login</h2>
        <?php if (isset($error_message)): ?>
            <div class="alert alert-danger"><?= $error_message ?></div>
        <?php endif; ?>
        <form method="post" action="">
            <div class="form-group">
                <label for="username">Nome de Usuário:</label>
                <input type="text" class="form-control" name="username" required>
            </div>
            <div class="form-group">
                <label for="password">Senha:</label>
                <input type="password" class="form-control" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Entrar</button>
        </form>
    </div>
</body>
</html>
