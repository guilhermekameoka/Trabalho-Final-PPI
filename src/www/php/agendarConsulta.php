<?php
require "conexao.php";
$pdo = mysqlConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Resgata os dados do formulário
    $nome = $_POST["nome"] ?? "";
    $dataNascimento = $_POST["data-nascimento"] ?? "";
    $sexo = $_POST["sexo"] ?? "";

    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";

    $especialidade = $_POST["especialidade"] ?? "";
    $profissional = $POST["profissional"] ?? "";
    $data_consulta = $_POST["data_consulta"] ?? "";
    $horario = $_POST["horario"] ?? "";
    $convenio = $_POST["convenio"] ?? "";

    // Iniciar a transação
    $pdo->beginTransaction();

    try {
        // Inserir na tabela agenda_funcionario
        $agenda_funcionario = <<<SQL
        INSERT INTO agenda_funcionario (nome, sexo, data_consulta, hora_consulta)
        VALUES (?, ?, ?, ?)
    SQL;

        $stmt_agenda_funcionario = $pdo->prepare($agenda_funcionario);
        if (!$stmt_agenda_funcionario->execute([$nome, $sexo, $data_consulta, $hora_consulta])) {
            throw new Exception('Falha na inserção na tabela agenda_funcionário');
        }

        // implementar a insercao na tabela consulta


        // implementar insercao agenda_paciente


        // Commit da transação
        $pdo->commit();

        // Redireciona para a homepage
        // header("location: ../templates/private/funcionario/homeFuncionario.php");
        exit();

    } catch (Exception $e) {
        // Rollback em caso de falha
        $pdo->rollback();
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
?>