<?php
session_start();
$host = "localhost";
$user = "root";
$senha = "mysql";
$banco = "almafisio";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// SEGURANÇA: Verifica se o usuário está logado
if (!isset($_SESSION["usuario"])) {
    header("Location: user.php");
    exit();
}

$usuario_id_logado = $_SESSION["usuario"];

/* =========================
   LÓGICA PARA EXCLUIR
========================= */
if (isset($_GET['excluir'])) {
    $id_agendamento = intval($_GET['excluir']);

    // IMPORTANTE: O WHERE garante que ele só exclua se o ID for dele
    $stmt_del = $conn->prepare("DELETE FROM agendamentos WHERE id = ? AND usuario_id = ?");
    $stmt_del->bind_param("ii", $id_agendamento, $usuario_id_logado);

    if ($stmt_del->execute()) {
        // Redireciona para atualizar a página e sumir o item excluído
        header("Location: meus_agendamentos.php?sucesso=1");
        exit();
    } else {
        echo "<script>alert('Erro ao excluir agendamento.');</script>";
    }
    $stmt_del->close();
}

/* =========================
   LISTAR AGENDAMENTOS
========================= */
$stmt = $conn->prepare("SELECT * FROM agendamentos WHERE usuario_id = ? ORDER BY data_consulta, hora_consulta");
$stmt->bind_param("i", $usuario_id_logado);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Agendamentos</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="shortcut icon" href="imagens/logo.png">
    <script src="script.js"></script>
</head>
<body>
    <nav class="navbar">
        <h2 class="logo"><img src="imagens/logo.png" alt="Logo" class="logo"></h2>
        <ul class="nav-links">
            <li><a href="inicio.php">Início</a></li>
            <li><a href="servico.php">Serviços</a></li>
            <li class="active"><a href="agendamento.php">Agendamentos</a></li>
            <li><a href="exercicios.php">Exercícios</a></li>
            <li><a href="inicio.php"><img src="imagens/sair.png" alt="Sair" class="icon-sair"></a></li>
        </ul>
        <div class="profile">
            <a href="perfil_cliente.php"><img src="imagens/user2.png" alt="foto"></a>
        </div>
    </nav>

<div class="container">
    <h1>Meus Agendamentos</h1>

    <?php if (isset($_GET['sucesso'])): ?>
        <p style="color: #00ff00; text-align: center;">Agendamento excluído com sucesso!</p>
    <?php endif; ?>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Observações</th>
                <th>Ações</th> </tr>

            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['servico']); ?></td>
                    <td><?php echo htmlspecialchars($row['data_consulta']); ?></td>
                    <td><?php echo htmlspecialchars($row['hora_consulta']); ?></td>
                    <td><?php echo htmlspecialchars($row['observacoes']); ?></td>
                    <td>
                        <a href="meus_agendamentos.php?excluir=<?php echo $row['id']; ?>" 
                           class="btn-excluir" 
                           onclick="return confirm('Tem certeza que deseja desmarcar esta consulta?')">
                           Excluir
                        </a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhum agendamento encontrado.</p>
    <?php endif; ?>
</div>

</body>
</html>
<?php
$stmt->close();
$conn->close();
?>