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
    <link rel="stylesheet" href="css/perfil.css">
    <link rel="shortcut icon" href="imagens/logo_.png">
</head>

<body>

    <div class="perfil">

        <div class="header">
            <div class="avatar">⚙️</div>
            <h2>Painel ADM</h2>
            <span class="sub">Área administrativa</span>
        </div>

        <div class="card">
            <div class="info">
                <span>Email</span>
                <p><?php echo $usuario["email"]; ?></p>
            </div>

            <div class="info">
                <span>Telefone</span>
                <p><?php echo $usuario["telefone"]; ?></p>
            </div>

            <div class="info">
                <span>Tipo</span>
                <p>Administrador</p>
            </div>
        </div>

        <a href="central_adm.php" class="btn">Continuar</a>

    </div>
</body>

</html>