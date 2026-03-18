<?php
$host = "localhost";
$user = "root";
$senha = "mysql";
$banco = "almafisio";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$sql = "SELECT * FROM agendamentos ORDER BY data_consulta, hora_consulta";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Meus Agendamentos</title>
    <link rel="stylesheet" href="style4.css">
</head>
<body>

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