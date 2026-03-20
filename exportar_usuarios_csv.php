<?php
$host = "localhost";
$user = "root";
$senha = "mysql";
$banco = "almafisio";

$conn = new mysqli($host, $user, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}

// Define o nome do arquivo que será baixado
$nome_arquivo = "relatorio_usuarios_" . date("Y-m-d_H-i-s") . ".csv";

// Cabeçalhos para forçar o download do CSV
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=' . $nome_arquivo);

// Abre a saída
$saida = fopen('php://output', 'w');

// BOM para corrigir acentos no Excel
fprintf($saida, chr(0xEF).chr(0xBB).chr(0xBF));

// Consulta os dados da tabela usuario
$sql = "SELECT * FROM usuario";
$resultado = $conn->query($sql);

if ($resultado && $resultado->num_rows > 0) {
    
    // Pega os nomes das colunas automaticamente
    $campos = $resultado->fetch_fields();
    $cabecalho = [];

    foreach ($campos as $campo) {
        $cabecalho[] = $campo->name;
    }

    // Escreve o cabeçalho no CSV
    fputcsv($saida, $cabecalho, ';');

    // Volta para o início dos resultados
    $resultado->data_seek(0);

    // Escreve os dados
    while ($linha = $resultado->fetch_assoc()) {
        fputcsv($saida, $linha, ';');
    }

} else {
    // Caso não tenha dados
    fputcsv($saida, ['Nenhum usuário encontrado'], ';');
}

fclose($saida);
$conn->close();
exit;
?>