<?php
session_start();

require_once('../config.php');

// Verifique se o administrador está autenticado
if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== true) {
    header('Location: login.php');
    exit();
}

// Lógica CRUD para produtos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Adicionar Produto
    if (isset($_POST['add_product'])) {
        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];

        $stmt = $conn->prepare("INSERT INTO products (name, price) VALUES (?, ?)");
        $stmt->bind_param("sd", $productName, $productPrice);
        $stmt->execute();
        $stmt->close();
    }

    // Editar Produto
    if (isset($_POST['edit_product'])) {
        $productId = $_POST['product_id'];
        $productName = $_POST['product_name'];
        $productPrice = $_POST['product_price'];

        $stmt = $conn->prepare("UPDATE products SET name=?, price=? WHERE id=?");
        $stmt->bind_param("sdi", $productName, $productPrice, $productId);
        $stmt->execute();
        $stmt->close();
    }

    // Excluir Produto
    if (isset($_POST['delete_product'])) {
        $productId = $_POST['product_id'];

        $stmt = $conn->prepare("DELETE FROM products WHERE id=?");
        $stmt->bind_param("i", $productId);
        $stmt->execute();
        $stmt->close();
    }
}

// Recupere a lista de produtos do banco de dados
$result = $conn->query("SELECT * FROM products");
$products = $result->fetch_all(MYSQLI_ASSOC);

// Adicione estas linhas no topo do arquivo para configurar a paginação
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$items_per_page = 10; // Número de itens por página

// Atualize as consultas SQL para incluir LIMIT e OFFSET
$product_query = "SELECT * FROM products LIMIT $items_per_page OFFSET " . ($page - 1) * $items_per_page;
$order_query = "SELECT * FROM orders LIMIT $items_per_page OFFSET " . ($page - 1) * $items_per_page;
$user_query = "SELECT * FROM users LIMIT $items_per_page OFFSET " . ($page - 1) * $items_per_page;

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
        <!-- Adicione um campo de pesquisa para produtos -->
        <form method="get" action="">
            <input type="text" name="search_product" placeholder="Pesquisar por nome">
            <button type="submit">Pesquisar</button>
        </form>

        <h2>Gerenciar Produtos</h2>

        <!-- Formulário para Adicionar Produto -->
        <form method="post" action="">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="product_name">Nome do Produto:</label>
                    <input type="text" class="form-control" name="product_name" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="product_price">Preço do Produto:</label>
                    <input type="number" class="form-control" name="product_price" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary" name="add_product">Adicionar Produto</button>
        </form>

        <!-- Tabela de Produtos -->
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Preço</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?= $product['id'] ?></td>
                        <td><?= $product['name'] ?></td>
                        <td><?= $product['price'] ?></td>
                        <td>
                            <form method="post" action="">
                                <input type="hidden" name="product_id" value="<?= $product['id'] ?>">
                                <button type="submit" name="edit_product">Editar</button>
                                <button type="submit" name="delete_product">Excluir</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <?php
        // Adicione links de paginação no final da tabela
        echo '<ul class="pagination">';
        for ($i = 1; $i <= ceil($total_items / $items_per_page); $i++) {
            echo '<li class="page-item ' . ($page == $i ? 'active' : '') . '"><a class="page-link" href="?page=' . $i . '">' . $i . '</a></li>';
        }
        echo '</ul>';
        ?>
    </div>
</body>
</html>