<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almafisio - Registro</title>
    <link rel="stylesheet" href="style5.css">
    <link rel="shortcut icon" href="imagens/logo.png">
    <script src="script.js"></script>
</head>
<body>
    <div class="menu-topo">
        <img src="imagens/logo.png" alt="Logo do sistema" class="logo">
        <a href="decisao.php" class="link-sair">
            <img src="imagens/sair.png" alt="Sair do sistema" class="sair">
        </a>
    </div>

    <form class="sla" method="POST" action="salvar.php">
        <h2>Criação de Conta</h2>

        <div class="campo">
            <label for="email">Insira seu E-mail</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="campo">
            <label for="senha">Coloque sua Senha</label>
            <input type="password" id="senha" name="senha" required>
        </div>

        <div class="campo">
            <label for="telefone">Coloque seu Telefone</label>
            <input type="tel" id="telefone" name="telefone" required>
        </div>

        <div class="campo">
            <p>Selecione seu cargo:</p>

            <div class="radio-group">
                <label>
                    <input type="radio" name="cargo" value="cliente" required> Cliente
                </label>

                <label>
                    <input type="radio" name="cargo" value="adm" required> Adm
                </label>
            </div>
        </div>

        <button type="submit" onclick="verificarCargo()" id="bt">Criar Conta</button>

        <p>Já tem uma conta? <a href="decisao.php">Entrar</a></p>
    </form>
</body>
</html>