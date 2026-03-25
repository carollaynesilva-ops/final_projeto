<?php
include("conexao.php");
$sql = "SELECT * FROM agendamentos ORDER BY data_consulta ASC, hora_consulta ASC";
$result = $conn->query($sql);

if (!$result) {
    die("Erro na consulta: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consultas Agendadas - ADM</title>
    <link rel="stylesheet" href="css/style7.css">
    <link rel="shortcut icon" href="imagens/logo_.png">
</head>
<body>
    

<div class="container">
    <h1>Consultas Agendadas</h1>
    <button class="btn-voltar" onclick="history.back()">← Voltar</button>

    <?php if ($result->num_rows > 0): ?>
        <table border="1" cellpadding="10" cellspacing="0" width="100%">
            <tr>
                <th>ID</th>
                <th>Serviço</th>
                <th>Data</th>
                <th>Hora</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Telefone</th>
                <th>Observações</th>
            </tr>

            <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row["id"]); ?></td>
                    <td><?php echo htmlspecialchars($row["servico"]); ?></td>
                    <td><?php echo htmlspecialchars($row["data_consulta"]); ?></td>
                    <td><?php echo htmlspecialchars($row["hora_consulta"]); ?></td>
                    <td><?php echo htmlspecialchars($row["nome"]); ?></td>
                    <td><?php echo htmlspecialchars($row["email"]); ?></td>
                    <td><?php echo htmlspecialchars($row["telefone"]); ?></td>
                    <td><?php echo htmlspecialchars($row["observacoes"]); ?></td>
                </tr>
            <?php endwhile; ?>
        </table>
    <?php else: ?>
        <p>Nenhuma consulta agendada.</p>
    <?php endif; ?>
</div>

<a href="exportar_usuarios_csv.php">
    <button type="button">Baixar relatório CSV</button>
</a>

</body>
</html>

<?php
$conn->close();
?>