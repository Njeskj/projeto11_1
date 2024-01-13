<!-- navbar.php -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">E-commerce</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item active">
                <a class="nav-link" href="index.php">Página Inicial</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="produtos.php">Produtos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="orders.php">Pedidos</a>
            </li>
            <?php if (session_status() == PHP_SESSION_ACTIVE && isset($_SESSION['admin']) && $_SESSION['admin']): ?>
                <!-- Exibir estes itens apenas para administradores -->
                <li class="nav-item">
                    <a class="nav-link" href="admin.php">Admin</a>
                </li>
            <?php endif; ?>
            <li class="nav-item">
                <a class="nav-link" href="perfil.php">Perfil</a>
            </li>
            <?php if (session_status() == PHP_SESSION_ACTIVE): ?>
                <!-- Exibir apenas se a sessão estiver ativa -->
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Entrar</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>
