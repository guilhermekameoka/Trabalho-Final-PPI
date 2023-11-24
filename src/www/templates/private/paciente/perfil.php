<?php
// Conexão com o banco de dados
require "conexao.php";
require "sessionmanager.php";
session_start();

$sessionManager = new SessionManager();

$pdo = mysqlConnect();

$idUsuario = $sessionManager->get("id");

$consultaUsuario = "SELECT * FROM paciente WHERE id = ?";
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
            <a class="navbar-brand" href="./home.php">
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
                        <a class="nav-link color-white" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./perfil.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agenda.php">Agendamentos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agendarConsulta.php">Agendar consulta</a>
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
                <img id="fotoPerfil" src="../../../../assets/images/perfil.jpg" alt="Foto de perfil">
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
                        <tr>
                            <th>Foto:</th>
                            <td colspan="2">
                                <input id="insereImg" type="file" name="foto" accept="image/*">
                            </td>
                        </tr>
                        <tr class="table-secondary">
                            <th>Nome:</th>
                            <td>
                                <?php echo $dadosUsuario['nome']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>
                                <?php echo $dadosUsuario['email']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                        <tr class="table-secondary">
                            <th>CPF:</th>
                            <td>
                                <?php echo $dadosUsuario['cpf']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Data nasc:</th>
                            <td>
                                <?php echo $dadosUsuario['data_nascimento']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Rua:</th>
                            <td>
                                <?php echo $dadosUsuario['rua']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Bairro:</th>
                            <td>
                                <?php echo $dadosUsuario['bairro']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Cidade:</th>
                            <td>
                                <?php echo $dadosUsuario['cidade']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                        <tr>
                            <th>Estado:</th>
                            <td>
                                <?php echo $dadosUsuario['estado']; ?>
                            </td>
                            <td>
                                <button class="btn btn-success btn-sm">Editar</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="excluir-conta">
                    <button class="btn btn-danger btn-sm">Excluir conta</button>
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