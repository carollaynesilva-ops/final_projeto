<?php

$mensagem = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){

$host = "localhost";
$user = "root";
$senha = "";
$banco = "fisioterapia";

$conn = new mysqli($host, $user, $senha, $banco);

if($conn->connect_error){
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

if($conn->query($sql) === TRUE){

$mensagem = "Consulta agendada com sucesso!";

}else{

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

<title>Agendar Consulta</title>

<style>

body{
margin:0;
font-family:Arial, Helvetica, sans-serif;
background: linear-gradient(to bottom,#c9d8ea,#8ea9c7);
}

.container{

max-width:800px;
margin:60px auto;
background:white;
padding:40px;
border-radius:15px;
box-shadow:0 10px 25px rgba(0,0,0,0.15);

}

h1{

text-align:center;
color:#3b4f6b;
margin-bottom:30px;

}

form{

display:flex;
flex-direction:column;
gap:18px;

}

label{

font-weight:bold;
color:#444;

}

input,select,textarea{

padding:12px;
border-radius:8px;
border:1px solid #ccc;
font-size:14px;

}

textarea{

resize:none;
height:90px;

}

.row{

display:flex;
gap:15px;

}

.row div{

flex:1;

}

button{

margin-top:20px;
padding:14px;
border:none;
border-radius:10px;
background:#2f5be7;
color:white;
font-size:16px;
cursor:pointer;
transition:0.3s;

}

button:hover{

background:#1e46c5;

}

.msg{

text-align:center;
padding:10px;
margin-bottom:20px;
color:green;
font-weight:bold;

}

</style>

</head>

<body>

<div class="container">

<h1>Agendar Consulta</h1>

<?php
if($mensagem != ""){
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