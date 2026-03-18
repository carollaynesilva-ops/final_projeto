<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}

$email = trim($_POST["email"]);
$senha = trim($_POST["senha"]);
$telefone = trim($_POST["telefone"]);
$cargo = trim($_POST["cargo"]);

if (empty($email) || empty($senha) || empty($telefone) || empty($cargo)) {
    die("Preencha todos os campos.");
}

$senhaHash = password_hash($senha, PASSWORD_DEFAULT);

$stmt = $conn->prepare("INSERT INTO usuarios (email, senha, telefone, cargo) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $email, $senhaHash, $telefone, $cargo);

if ($stmt->execute()) {
    if ($cargo === "cliente") {
        header("Location: user.php");
        exit();
    } else {
        header("Location: adm.php");
        exit();
    }
} else {
    echo "Erro ao cadastrar: " . $conn->error;
}

$stmt->close();
$conn->close();
?>