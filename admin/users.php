<?php
session_start();

require_once('../config.php');

// Verifique se o administrador está autenticado
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Implemente a lógica para recuperar e exibir os usuários do banco de dados
$result = $conn->query("SELECT * FROM users");
$users = $result->fetch_all(MYSQLI_ASSOC);
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
        <!-- Adicione um campo de pesquisa para usuários -->
        <form method="get" action="">
            <input type="text" name="search_user" placeholder="Pesquisar por nome de usuário">
            <button type="submit">Pesquisar</button>
        </form>

        <h2>Gerenciar Usuários</h2>

        <!-- Tabela de Usuários -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID do Usuário</th>
                    <th>Nome de Usuário</th>
                    <th>Email</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?= $user['id'] ?></td>
                        <td><?= $user['username'] ?></td>
                        <td><?= $user['email'] ?></td>
                        <td>
                            <form method="post" action="">
                                <!-- Adicione botões ou ações para os usuários, se necessário -->
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>