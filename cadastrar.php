<?php
include 'conexao.php';
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";
// exit;

if ($_SERVER['REQUEST_METHOD']== "POST"){
    //Captura os dados digitados no form e salva em variaveis
    //para facilitar a manipulacao dos dados
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $nascimento = $_POST['nascimento'];
    $endereco = $_POST['endereco'];
    $telefone = $_POST['telefone'];

    //Vamos abrir a conexao com o banco de dados
    $conexao = abrirBanco();

    //vamos criar o SQL para realizar o insert dos dados no BD
    $sql = "INSERT INTO pessoas (nome, sobrenome, endereco, telefone)
    VALUES
    ('$nome', '$sobrenome','$endereco', '$telefone')";



    if($conexao->query($sql)=== TRUE) {
        echo ":) Sucesso ao cadastrar o contato :)";
    } else {
        echo ":( Erro ao cadastrar o contato :(";
    }

    fecharBanco($conexao);
}


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda</title>
</head>
<body>
    <header>
        <h1>Agenda de Contatos</h1>
    </header>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastrar.php">Cadastrar</a></li>
        </ul>
    </nav>
    </header>

    <section>
        <h2>Cadastrar Contatos</h2>
        <form action="" method="post" enctype="multipart/form-data">

        <label for="nome">Nome</label>
            <input type="text" id="nome" name="nome" required>

            <label for="nome">Sobrenome</label>
            <input type="text" id="sobrenome" name="sobrenome" required>

            <label for="nome">Nascimento</label>
            <input type="text" id="nascimento" name="nascimento" required>

            <label for="nome">Endereco</label>
            <input type="text" id="endereco" name="endereco" required>

            <label for="nome">Telefone</label>
            <input type="text" id="telefone" name="telefone" required>

            <button type="submit">Cadastrar</button>
        </form>
    </section>

</body>

</html>