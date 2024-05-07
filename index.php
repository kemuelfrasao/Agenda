<?php
// incluir a conexao na pagina e todo o seu conteudo
include 'conexao.php';
if(insert($_GET['acao'])&& $_GET['acao']== 'escolar'){
    echo "EU QUERO DELETAR ALGUEM DO MEU SISTEMA";
    exit;
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
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="cadastrar.php">Cadastrar</a></li>
        </ul>
    </nav>
    </header>
    <section>
        <h2>Lista de Contatos</h2>
        <table border= "1">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Nome</td>
                    <td>Sobrenome</td>
                    <td>Nascimento</td>
                    <td>Endereço</td>
                    <td>Telefone</td>
                    <td>Ações</td>
                </tr>
            </thead>
            <tbody>
                <?php
                //Abrir a conexao com banco de dados
                $conexaoComBanco = abrirBanco();
                //Preparar a consulta SQL papa selecionar os dados no BD
                $query = "SELECT id, nome, sobrenome, nascimento, endereço, telefone;
                FROM pessoas";
                //Executar a query (o sql no banco)
                $result = $conexaoComBanco ->query($query);
                //$registros = $result ->fetch_assoc();//
                //verificar se a query retomou registros
               /* echo "</pre>";
                print_r($registros);
                echo "</pre>";
                exit;*/
                if ($result->num_rows > 0) {
                    //tem registro no bsnco
                    while ($registro = $result->fetch_assoc()){
                        ?>
                        <tr>
                            <td><?= $registro['id'] ?></td>
                            <td><?= $registro['nome'] ?></td>
                            <td><?=  $registro['sobrenome'] ?></td>
                            <td><?=  date('d/m/Y', strtotime($registros['nascimento'])) ?></td>
                            <td><?=  $registro['endereço'] ?></td>
                            <td><?=  $registro['telefone'] ?></td>
                            <td>
                                <a href="#"><button>Editar</button></a>
                                <a href="?acao=excluir&id=<?=$registro['id']?>"
                                anclick= "return confirm('Tem certeza que deseja excluir?');">
                                <button>Excluir</button></a>  
                                </td>
                        </tr>
                        <?php
                    }

                } else {
                    ?> 
                    <tr>
                        <td colspan='7'>Nenhum Registro no banco de dados</td>
                    </tr>
                    <?php

                }
                //Criar um laço de repetição para preencher a tabela
                ?>
            </tbody>
        </table>
    </section>
<body>
    </html>
</body>