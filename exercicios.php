<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Exercícios</title>
    <link rel="stylesheet" href="style3.css">
    <link rel="shortcut icon" href="imagens/logo.png">
</head>

<body>

    <!-- NAVBAR -->
    <nav class="navbar">
         <h2 class="logo">
            <img src="imagens/logo.png" alt="Logo do sistema" class="logo">
        </h2>

        <ul class="nav-links">
            <li><a href="inicio.php">Início</a></li>
            <li><a href="servico.php">Serviços</a></li>
            <li><a href="agendamento.php">Agendamentos</a></li>
            <li class="active"><a href="exercicios.php">Exercícios</a></li>
            <li>
                <a href="logout.php">
                    <img src="imagens/sair.png" alt="Sair" class="icon-sair">
                </a>
            </li>
        </ul>

        <div class="profile">
            <a href="perfil.php">
                <img src="imagens/user2.png" foto do usuário>
            </a>
        </div>
    </nav>


    <!-- CONTEÚDO EXERCÍCIOS -->
    <div class="exercicios-container">
        <h2 class="titulo-exercicios">Exercícios</h2>

        <div class="grid-exercicios">

            <div class="card-exercicio">
                <div class="icone-ex">🏋️‍♂️</div>
                <h3>Agachamento Livre</h3>
                <p>Nível: Intermediário</p>
                <a href="detalhe-agachamento.php" class="btn-detalhe">Ver detalhes</a>
            </div>

            <div class="card-exercicio">
                <div class="icone-ex">💪</div>
                <h3>Rosca Direta</h3>
                <p>Nível: Iniciante</p>
                <a href="detalhe-rosca.php" class="btn-detalhe">Ver detalhes</a>
            </div>

            <div class="card-exercicio">
                <div class="icone-ex">🦵</div>
                <h3>Leg Press</h3>
                <p>Nível: Avançado</p>
                <a href="detalhe-legpress.php" class="btn-detalhe">Ver detalhes</a>
            </div>

            <div class="card-exercicio">
                <div class="icone-ex">🧘‍♂️</div>
                <h3>Alongamento Lombar</h3>
                <p>Nível: Iniciante</p>
                <a href="detalhe-alogamento.php" class="btn-detalhe">Ver detalhes</a>
            </div>

        </div>
    </div>

</body>

</html>