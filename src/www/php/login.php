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
            if (password_verify($senha, $dados_paciente['senha'])) {
                session_start();
                $_SESSION["login"] = "1";
                $_SESSION["nome"] = $row['nome'];
                header("location: ../templates/private/paciente/home.php");
                exit();
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
                header("location: ../templates/private/funcionario/homeFuncionario.php");
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