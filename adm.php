<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Autenticação - ADM</title>
    <link rel="stylesheet" href="style5.css">
    <link rel="shortcut icon" href="imagens/logo.png">
</head>

<body>

    <div class="menu-topo">
        <img src="imagens/logo.png" class="logo">
        <a href="decisao.php" class="link-sair">
            <img src="imagens/sair.png" class="sair">
        </a>
    </div>

    <div class="sla">

        <h2>AUTENTICAÇÃO - ADM</h2>

        <form method="POST" action="login.php">

            <div class="campo">
                <label for="email">✉️ E-mail</label>
                <input type="email" id="email" name="email" required>
            </div>

            <div class="campo">
                <label for="senha">🔒 Senha</label>
                <input type="password" id="senha" name="senha" required>
            </div>

            <div class="campo">
                <label for="telefone">📞 Telefone</label>
                <input type="tel" id="telefone" name="telefone" required>
            </div>

            <input type="hidden" name="cargo_esperado" value="adm">

            <a href="central_adm.php"><button type="submit" id="bt">Entrar</button></a>

        </form>

        <p>Não tem conta? <a href="registro.php">Cadastre-se</a></p>
        <p>Não é adm? <a href="decisao.php">Mudar</a></p>

    </div>

</body>
</html>