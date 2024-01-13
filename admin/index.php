<?php
session_start();

require_once('../config.php');

// Verifique se o administrador está autenticado
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Inclua os links para os estilos Bootstrap aqui -->
    <!-- Adicione este link ao cabeçalho de seus arquivos HTML -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8sh+WyPI62z9BqUpiHpQ6t2EZN/sN6lJOp5Yaa" crossorigin="anonymous">

</head>
<body>
    <div class="container">
        <h2>Painel de Controle do Administrador</h2>
        <p>Bem-vindo, Administrador!</p>
        <ul>
            <li><a href="products.php">Gerenciar Produtos</a></li>
            <li><a href="orders.php">Visualizar Pedidos</a></li>
            <li><a href="users.php">Gerenciar Usuários</a></li>
            <li><a href="../logout.php">Sair</a></li>
        </ul>
    </div>
</body>
</html>
