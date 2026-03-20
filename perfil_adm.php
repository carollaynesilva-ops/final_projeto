<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: index.php");
    exit();
}

$usuario = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Perfil ADM</title>
    <link rel="stylesheet" href="perfil.css">
</head>

<body>

    <div class="perfil">

        <h2>⚙️ Painel ADM</h2>

        <div class="card">
            <p><strong>Email:</strong> <?php echo $usuario["email"]; ?></p>
            <p><strong>Telefone:</strong> <?php echo $usuario["telefone"]; ?></p>
            <p><strong>Tipo:</strong> Administrador</p>
        </div>

        <a href="central_adm.php" class="btn">CONTINUAR</a>

    </div>

</body>

</html>