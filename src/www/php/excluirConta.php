<?php
// Inicia a sessão
require "sessionmanager.php";
session_start();
$sessionManager = new SessionManager();

// Resgata o ID
$idUsuario = $sessionManager->get("id");

// Conecta ao servidor MySQL
require "conexao.php";
$pdo = mysqlConnect();

// Obtém o ID do usuário da sessão
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['confirmado'])) {
    // Exclua o usuário do banco de dados
    $consultaExclusao = "DELETE FROM paciente WHERE id = ?";
    $stmtExclusao = $pdo->prepare($consultaExclusao);
    $stmtExclusao->execute([$idUsuario]);

    // Adicione qualquer lógica adicional necessária, como redirecionar para a página de login
    header("Location: ../../../index.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../assets/css/formulario.css">
    <link rel="stylesheet" href="../../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <script type="module" src="../../../../assets/js/validaCadastroPaciente.js"></script>
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Alterar dados</title>
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
                        <a class="nav-link color-white" href="../../../index.html">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <main>
        <form action="../../../php/alterarPaciente.php" method="POST">
            <div class="container">
                <div class="cadastro">
                    <input type="hidden" name="confirmado" value="true">
                    <h3>Exlcuir Conta</h3>
                    <legend>Tem certeza que deseja excluir sua conta?</legend>
                    <a href="alterarCadastro.php">
                        <button class="btn btn-success btn-sm">Cancelar</button>
                    </a>
                    <button type="submit" class="btn btn-danger btn-sm">Sim, Excluir</button>
                </div>
            </div>
        </form>
    </main>

    <footer>
        <p>CliniSimples - Trabalho final PPI</p>
    </footer>

    <script href="../../../assets/js/ajaxBuscaEndereco.js"></script>
</body>

</html>