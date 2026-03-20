<?php
include("conexao.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $stmt = $conn->prepare("DELETE FROM agendamentos WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: sua_pagina.php");
        exit();
    } else {
        echo "Erro ao excluir.";
    }

    $stmt->close();
}

$conn->close();
?>