<?php

$mensagem = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $host = "localhost";
    $user = "root";
    $senha = "";
    $banco = "fisioterapia";

    $conn = new mysqli($host, $user, $senha, $banco);

    if ($conn->connect_error) {
        die("Erro na conexão: " . $conn->connect_error);
    }

    $servico = $_POST['servico'];
    $data = $_POST['data'];
    $hora = $_POST['hora'];
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $telefone = $_POST['telefone'];
    $observacoes = $_POST['observacoes'];

    $sql = "INSERT INTO agendamentos
(servico, data_consulta, hora_consulta, nome, email, telefone, observacoes)

VALUES
('$servico','$data','$hora','$nome','$email','$telefone','$observacoes')";

    if ($conn->query($sql) === TRUE) {

        $mensagem = "Consulta agendada com sucesso!";
    } else {

        $mensagem = "Erro ao agendar consulta.";
    }

    $conn->close();
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style4.css">
    <title>Agendar Consulta</title>


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
                <a href="logout.php">
                    <img src="imagens/sair.png" alt="Sair" class="icon-sair">
                </a>
            </li>
        </ul>

        <!-- FOTO USUÀRIO -->

        <div class="profile">
            <a href="perfil.php">
                <img src="imagens/user2.png" alt="foto do usuário">
                <!-- <span>Perfil</span> -->
            </a>

        </div>
    </nav>


    <div class="container">

        <h1>Agendar Consulta</h1>

        <?php
        if ($mensagem != "") {
            echo "<div class='msg'>$mensagem</div>";
        }
        ?>

        <form method="POST">

            <label>Escolha o serviço</label>

            <select name="servico" required>

                <option value="">Selecione um serviço</option>

                <option value="Reabilitação Esportiva">
                    Reabilitação Esportiva - R$180
                </option>

                <option value="Recovery Pós-Treino">
                    Recovery Pós-Treino - R$120
                </option>

                <option value="Osteopatia">
                    Osteopatia - R$220
                </option>

                <option value="Prevenção de Lesão">
                    Prevenção de Lesão - R$150
                </option>

            </select>


            <div class="row">

                <div>
                    <label>Data</label>
                    <input type="date" name="data" required>
                </div>

                <div>
                    <label>Hora</label>
                    <input type="time" name="hora" required>
                </div>

            </div>


            <label>Nome completo</label>
            <input type="text" name="nome" required>


            <div class="row">

                <div>
                    <label>Email</label>
                    <input type="email" name="email" required>
                </div>

                <div>
                    <label>Telefone</label>
                    <input type="tel" name="telefone" required>
                </div>

            </div>


            <label>Observações</label>
            <textarea name="observacoes"></textarea>


            <button type="submit">

                Confirmar Agendamento

            </button>

        </form>

    </div>

</body>

</html>