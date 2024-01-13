<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Administrador</title>
    <link rel="stylesheet" href="styles.css"> <!-- Se você tiver um arquivo de estilos CSS -->
</head>
<body>

<div class="container">
    <h2>Cadastro de Administrador</h2>

    <?php
    // Processar o formulário quando for enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Conectar ao banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "projeto_11_1";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar a conexão
        if ($conn->connect_error) {
            die("Erro na conexão com o banco de dados: " . $conn->connect_error);
        }

        // Obter dados do formulário
        $username = $_POST["username"];
        $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
        $full_name = $_POST["full_name"];
        $email = $_POST["email"];

        // Inserir dados na tabela de administradores
        $sql = "INSERT INTO admins (username, password_hash, full_name, email) VALUES ('$username', '$password', '$full_name', '$email')";

        if ($conn->query($sql) === TRUE) {
            echo "<p>Cadastro de administrador realizado com sucesso!</p>";
        } else {
            echo "<p>Erro ao cadastrar administrador: " . $conn->error . "</p>";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    }
    ?>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    <div class="form-group">
        <label for="username">Nome de Usuário:</label>
        <input type="text" name="username" required>
    </div>
    <div class="form-group">
        <label for="password">Senha:</label>
        <input type="password" name="password" required>
    </div>
    <div class="form-group">
        <label for="full_name">Nome Completo:</label>
        <input type="text" name="full_name" required>
    </div>
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" required>
    </div>

        <button type="submit">Cadastrar</button>
    </form>
</div>

</body>
</html>
