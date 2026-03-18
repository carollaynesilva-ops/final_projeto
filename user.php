<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Autenticação - Cliente</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imagens/logo.png">
</head>

<body>
    <div class="menu-topo">
         <img src="imagens/logo.png" alt="Logo do sistema" class="logo">
          <a href="decisao.php" class="link-sair">
            <img src="imagens/sair.png" alt="Sair do sistema" class="sair">
        </a>
    </div>
    <h1 class="log">AUTENTICAÇÃO - CLIENTE </h1>
    <div class="sla">
        <div class="inputr">
        <div>
            <label for="email" class="campo">✉️E-mail</label>
            <input type="email" name="email" class="email" required>
        </div>
        <div>
            <label for="senha" class="campo">🔒Senha:</label>
            <input type="password" name="senha" class="senha" required>
        </div>
        <div>
            <label for="telefone" class="campo">📞Telfone:</label>
            <input type="tel" name="telefone" class="telefone" required>
        </div>
        </div>
        <br>
        <div>
            <button type="submit" id="bt">Entrar</button>
        </div>
        </form>

        <p>Não tem conta?<a href="registro.php">Cadastre-se aqui.</a></p>
        <p>Não é cliente?<a href="decisao.php">Mude aqui.</a></p>
    </div>

</body>

</html>