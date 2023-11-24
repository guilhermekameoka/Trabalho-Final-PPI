<?php
// Conexão com o banco de dados
require "../../../php/conexao.php";
require "sessionmanager.php";
session_start();

$sessionManager = new SessionManager();

$pdo = mysqlConnect();

$idUsuario = $sessionManager->get("id");

$consultaUsuario = "SELECT * FROM funcionario WHERE id = ?";
$stmtUsuario = $pdo->prepare($consultaUsuario);
$stmtUsuario->execute([$idUsuario]);
$dadosUsuario = $stmtUsuario->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Seu perfil</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="navbar">
            <a class="navbar-brand" href="./homeFuncionario.php">
                <div class="d-flex align-items-center">
                    <img src="../../../../assets/images/logo.jpg" class="logo" alt="Logomarca CiniSimples">
                    <h1 id="CliniSimples" class="ml-2">CliniSimples</h1>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./homeFuncionario.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./perfilFuncionario.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agendaFuncionario.php">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./pacientes.php">Pacientes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="../../../../../index.html">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <div class="container">
            <div class="perfil">
                <h3>Seu perfil</h3>
                <h3>
                    <?php echo $dadosUsuario['nome']; ?>
                </h3>

                <table class="table table-striped table-sm text-center">
                    <thead>
                        <tr>
                            <th class="table-success" colspan="3">Dados cadastrais</th>
                        </tr>
                    </thead>
                    <tbody class="tbody-dark">
                        <tr class="table-secondary">
                            <th>Nome:</th>
                            <td>
                                <?php echo $dadosUsuario['nome']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                <?php echo $dadosUsuario['email']; ?>
                            </td>
                        </tr>
                        <tr class="table-secondary">
                            <th>CPF:</th>
                            <td>
                                <?php echo $dadosUsuario['cpf']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Data nasc:</th>
                            <td>
                                <?php echo $dadosUsuario['data_nascimento']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Rua:</th>
                            <td>
                                <?php echo $dadosUsuario['rua']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Bairro:</th>
                            <td>
                                <?php echo $dadosUsuario['bairro']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Cidade:</th>
                            <td>
                                <?php echo $dadosUsuario['cidade']; ?>
                            </td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <?php echo $dadosUsuario['estado']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="excluir-conta">
                    <a href="../../../php/excluirConta.php">
                        <button class="btn btn-danger btn-sm">Excluir conta</button>
                    </a>
                    <a href="alterarCadastro.php">
                        <button class="btn btn-success btn-sm">Alterar dados</button>
                    </a>
                </div>
            </div>
        </div>
    </main>

    <footer>
        <p>CliniSimples - Trabalho final PPI</p>
    </footer>

    <script src="../../../../assets/js/perfil.js"></script>

</body>

</html>