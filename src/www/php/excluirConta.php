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
    <link rel="stylesheet" href="../../assets/css/style.css">
    <link rel="stylesheet" href="../../assets/css/formulario.css">
    <link rel="stylesheet" href="../../assets/css/media.css">
    <link rel="stylesheet" href="../../assets/css/bootstrap.min.css">
    <script type="module" src="../../assets/js/validaCadastroPaciente.js"></script>
    <script src="../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Alterar dados</title>
</head>

<body>
    <main>
        <form action="" method="POST">
            <div class="container">
                <div class="cadastro">
                    <input type="hidden" name="confirmado" value="true">
                    <h3>Exlcuir Conta</h3>
                    <legend>Tem certeza que deseja excluir sua conta?</legend>

                    <a href="../../../index.html">
                        <button class="btn btn-success btn-sm">Cancelar
                        </button>
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