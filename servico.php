<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <link rel="stylesheet" href="css/style2.css">
    <link rel="shortcut icon" href="imagens/logo_.png">
</head>

<body>
    <nav class="navbar">
        <h2 class="logo">
            <img src="imagens/logo.png" alt="Logo do sistema" class="logo">
        </h2>

        <!-- MENU -->

        <ul class="nav-links">
            <li><a href="inicio.php">Início</a></li>
            <li class="active"><a href="servico.php">Serviços</a></li>
            <li><a href="agendamento.php">Agendamentos</a></li>
            <li><a href="exercicios.php">Exercícios</a></li>
            <li>
                <a href="inicio.php">
                    <img src="imagens/sair.png" alt="Sair" class="icon-sair">
                </a>
            </li>
        </ul>

        <!-- FOTO USUÀRIO -->

        <div class="profile">
            <a href="perfil_cliente.php">
                <img src="imagens/user2.png" alt="foto do usuário">
                <!-- <span>Perfil</span> -->
            </a>

        </div>
    </nav>

    <!-- NOSSOS TRATAMENTOS -->

    <div class="centro">
        <h1>Nossos Tratamentos</h1>
        <h4>Fisioterapia de elite para atletas e entusiastas.</h4>
    </div>

    <!-- CONTAINER DAS DIV -->

    <div class="container-central">
        <div class="tratamentos" id="reabilitacao">
            <h3>Reabilitação Esportiva</h3>
            <h4>Sessões personalizadas de 50 minutos.</h4>
            <h3>R$ 180</h3>
            <a href="https://www.drandrekirihara.com.br/reabilitacao-esportiva" target="_blank"><button>Mais Informações</button></a>
        </div>

        <div class="tratamentos" id="recovery">
            <h3>Recovery Pós-Treino</h3>
            <h4>Sessões personalizadas de 50 minutos.</h4>
            <h3>R$ 120</h3>
            <a href="https://www.reactive.com.br/artigos/esportes/o-que-e-recovery/" target="_blank"><button>Mais Informações</button></a>
        </div>

        <div class="tratamentos" id="osteopatia">
            <h3>Osteopatia</h3>
            <h4>Sessões personalizadas de 50 minutos.</h4>
            <h3>R$ 220</h3>
            <a href="https://www.lusiadas.pt/blog/prevencao-estilo-vida/bem-estar/que-para-que-serve-osteopatia" target="_blank"><button>Mais Informações</button></a>
        </div>

        <div class="tratamentos" id="prevencao">
            <h3>Prevenção de Lesão</h3>
            <h4>Sessões personalizadas de 50 minutos.</h4>
            <h3>R$ 150</h3>
            <a href="https://intranet.ebserh.gov.br/sites/default/files/produtos-de-conhecimento/2025-05/POP.CSP_.005%20Preven%C3%A7%C3%A3o%20de%20les%C3%A3o%20por%20press%C3%A3o%20v.4.pdf" 
            target="_blank"><button>Mais Informações</button></a>
        </div>

    </div>

</body>

</html>