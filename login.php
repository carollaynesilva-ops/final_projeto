<?php
session_start();
include("conexao.php");

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    die("Acesso inválido.");
}

$email = trim($_POST["email"]);
$senha = trim($_POST["senha"]);
$telefone = trim($_POST["telefone"]);
$cargoEsperado = trim($_POST["cargo_esperado"]);

$stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ? AND telefone = ?");
$stmt->bind_param("ss", $email, $telefone);
$stmt->execute();

$result = $stmt->get_result();

if ($result->num_rows === 1) {
    $usuario = $result->fetch_assoc();

    if (password_verify($senha, $usuario["senha"])) {

        $_SESSION["usuario"] = $usuario;

        if ($usuario["cargo"] === "adm") {
            header("Location: perfil_adm.php");
        } else {
            header("Location: perfil_cliente.php");
        }
        exit();

    } else {
        echo "Senha incorreta.";
    }
} else {
    echo "Usuário não encontrado.";
}
?>