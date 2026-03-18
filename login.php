<?php
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}

$email = trim($_POST["email"]);
$senha = trim($_POST["senha"]);
$telefone = trim($_POST["telefone"]);
$cargoEsperado = trim($_POST["cargo_esperado"]);

if (empty($email) || empty($senha) || empty($telefone) || empty($cargoEsperado)) {
    die("Preencha todos os campos.");
}

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND telefone = ?");
$stmt->bind_param("ss", $email, $telefone);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if (password_verify($senha, $usuario["senha"])) {
        if ($usuario["cargo"] === $cargoEsperado) {
            if ($usuario["cargo"] === "adm") {
                header("Location: central_adm.php");
                exit();
            } else {
                header("Location: inicio.php");
                exit();
            }
        } else {
            echo "Esse usuário não pertence a esse tipo de acesso.";
        }
    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}

$stmt->close();
$conn->close();
?>