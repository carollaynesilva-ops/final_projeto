<?php
$host = "localhost";
$user = "root";
$senha = "mysql";
$banco = "almafisio";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

/* =========================
   EXCLUIR AGENDAMENTO
========================= */
if (isset($_GET['excluir'])) {
    $id = intval($_GET['excluir']);

    $stmt = $conn->prepare("DELETE FROM agendamentos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    } else {
        echo "Erro ao excluir.";
    }

    $stmt->close();
}

/* =========================
   LISTAR AGENDAMENTOS
========================= */
$sql = "SELECT * FROM agendamentos ORDER BY data_consulta, hora_consulta";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Agendamentos</title>
    <link rel="stylesheet" href="style2.css">
    <link rel="shortcut icon" href="imagens/logo.png">
</head>
<body>
    <nav class="navbar">
        <h2 class="logo">
            <img src="imagens/logo.png" alt="Logo do sistema" class="logo">
        </h2>

        <!-- MENU -->

        <ul class="nav-links">
            <li><a href="inicio.php">Início</a></li>
            <li><a href="servico.php">Serviços</a></li>
            <li class="active"><a href="agendamento.php">Agendamentos</a></li>
            <li><a href="exercicios.php">Exercícios</a></li>
            <li>
                <a href="inicio.php">
                    <img src="imagens/sair.png" alt="Sair" class="icon-sair">
                </a>
            </li>
        </ul>

        <!-- FOTO USUÀRIO -->

        <div class="profile">
            <a href="perfil_cliente.php">
                <img src="imagens/user2.png" alt="foto do usuário">
                <!-- <span>Perfil</span> -->
            </a>

        </div>
    </nav>


<div class="container">
    <h1>Meus Agendamentos</h1>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Observações</th>
                
            </tr>

            <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['servico']); ?></td>
                    <td><?php echo htmlspecialchars($row['data_consulta']); ?></td>
                    <td><?php echo htmlspecialchars($row['hora_consulta']); ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo htmlspecialchars($row['telefone']); ?></td>
                    <td><?php echo htmlspecialchars($row['observacoes']); ?></td>
                    
                    
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
$conn->close();
?>