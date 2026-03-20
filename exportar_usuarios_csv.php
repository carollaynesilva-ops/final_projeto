<?php
ob_start();

$host = "localhost";
$user = "root";
$senha = "mysql";
$banco = "almafisio";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

$conn->set_charset("utf8");

$nome_arquivo = "relatorio_usuarios_" . date("Y-m-d_H-i-s") . ".csv";

header("Content-Type: text/csv; charset=UTF-8");
header("Content-Disposition: attachment; filename=\"$nome_arquivo\"");
header("Pragma: no-cache");
header("Expires: 0");

$saida = fopen("php://output", "w");

// BOM para o Excel reconhecer acentos
fprintf($saida, chr(0xEF) . chr(0xBB) . chr(0xBF));

// TROQUE os nomes das colunas conforme a sua tabela usuario
$sql = "SELECT id, nome, email FROM usuario";
$resultado = $conn->query($sql);

if (!$resultado) {
    die("Erro na consulta: " . $conn->error);
}

// Cabeçalho da planilha
fputcsv($saida, ["ID", "Nome", "Email"], ";");

// Dados
while ($linha = $resultado->fetch_assoc()) {
    fputcsv($saida, $linha, ";");
}

fclose($saida);
$conn->close();
ob_end_flush();
exit;