<?php
session_start();

if (!isset($_SESSION["usuario"])) {
    header("Location: perfil_cliente.php");
    exit();
}

$usuario = $_SESSION["usuario"];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Perfil Cliente</title>
<link rel="stylesheet" href="css/perfil.css">
<link rel="shortcut icon" href="imagens/logo.png">

</head>

<body>

<div class="perfil">

    <h2>👤 Meu Perfil</h2>

    <div class="card">
        <p><strong>Email:</strong> <?php echo $usuario["email"]; ?></p>
        <p><strong>Telefone:</strong> <?php echo $usuario["telefone"]; ?></p>
        <p><strong>Tipo:</strong> Cliente</p>
    </div>

    <a href="inicio.php" class="btn">CONTINUAR</a>

</div>

</body>
</html>