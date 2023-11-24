<?php
require "conexao.php";
$pdo = mysqlConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";

    try {
        $pdo->beginTransaction();

        // Verifica se é paciente
        $consulta_paciente = "SELECT * FROM paciente WHERE email = ?";
        $stmt_paciente = $pdo->prepare($consulta_paciente);
        $stmt_paciente->execute([$email]);

        if ($stmt_paciente->rowCount() > 0) {
            $dados_paciente = $stmt_paciente->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha corresponde com a senha hash
            try {
                if (password_verify($senha, $dados_paciente['senha'])) {
                    session_start();
                    $_SESSION["login"] = "1";
                    $_SESSION["nome"] = $row['nome'];
                    header("location: acesso.html");
                    exit();
                }
            } catch (Exception $e) {
                echo "<h1>Erro</h1>";
                echo "<p>Mensagem: " . $e->getMessage() . "</p>";
            }
        }

        // Verifica se é funcionário
        $consulta_funcionario = "SELECT * FROM funcionario WHERE email = ?";
        $stmt_funcionario = $pdo->prepare($consulta_funcionario);
        $stmt_funcionario->execute([$email]);

        if ($stmt_funcionario->rowCount() > 0) {
            $dados_funcionario = $stmt_funcionario->fetch(PDO::FETCH_ASSOC);

            // Verifica se a senha corresponde com a senha hash
            if (password_verify($senha, $dados_funcionario['senha'])) {
                session_start();
                $_SESSION["login"] = "1";
                $_SESSION["nome"] = $row['nome'];
                header("location: acesso.html");
                exit();
            }
        }

        // Se chegou aqui, as credenciais não foram encontradas
        throw new Exception('Credenciais inválidas');

    } catch (Exception $e) {
        // Rollback em caso de falha
        $pdo->rollback();
        exit('Falha no login: ' . $e->getMessage());
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../assets/css/formulario.css">
    <link rel="stylesheet" href="../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../assets/css/bootstrap.min.css">
    <script type="module" src="../../../assets/js/validaLogin.js"></script>
    <script src="../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Login</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="navbar">
            <a class="navbar-brand" href="../../../../index.html">
                <div class="d-flex align-items-center" id="logo-items-flex">
                    <img src="../../../assets/images/logo.jpg" class="logo" id="logo" alt="Logomarca CiniSimples">
                    <h1 id="CliniSimples" class="ml-2">CliniSimples</h1>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="../../../../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="sobre.html">Sobre</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="acesso.html">Acesso</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header> 
    
    <main>
        <div class="paginaLogin">
            <div class="container">
                <h3>Login</h3>
                <form action="" method="POST" class="row g-3" id="login">
                    <div class="col-sm-12 form-floating">
                        <input type="email" name="email" class="form-control" id="email" placeholder=" " autofocus>
                        <label for="email" class="form-label labelLogin">Email</label>
                        <div class="alert alert-danger alert-dismissible" id="alertaEmail">
                            <span>O email deve ser preenchido!</span>
                        </div>
                    </div>
                    <div class="col-sm-12 form-floating">
                        <input type="password" name="senha" class="form-control" id="senha" placeholder=" ">
                        <label for="senha" class="form-label labelLogin">Senha</label>
                        <div class="alert alert-danger alert-dismissible" id="alertaSenha">
                            <span>A senha deve ser preenchida!</span>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary col-sm-12 btn-success" id="botao" value="Entrar">
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>CliniSimples - Trabalho final PPI</p>
    </footer>
</body>

</html>