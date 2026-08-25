<?php

include "../infra/conexao.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nome = trim($_POST["nome"]);
    $email = trim($_POST["email"]);
    $telefone = trim($_POST["telefone"]);

    if ($nome == "" || $email == "" || $telefone == "") {
        $erro = "Preencha todos os campos.";
    } else {

        $sql = "INSERT INTO clientes (nome, email, telefone) VALUES (?, ?, ?)";

        $stmt = $conexao->prepare($sql);
        $stmt->bind_param("sss", $nome, $email, $telefone);

        if ($stmt->execute()) {
            header("Location: listagem_clientes.php");
            exit;
        } else {
            $erro = "Erro ao cadastrar cliente.";
        }

        $stmt->close();
    }
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastrar Cliente</title>
    <link rel="stylesheet" href="../style/style.css">
</head>

<body>

    <h1>Cadastrar Cliente</h1>

    <?php if (isset($erro)) { ?>
        <p><?php echo $erro; ?></p>
    <?php } ?>

    <form method="POST">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <br><br>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <br><br>

        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" required>

        <br><br>

        <button type="submit">Cadastrar Cliente</button>

    </form>

    <br>

    <a href="listagem_clientes.php">Voltar para clientes</a>

</body>

</html>