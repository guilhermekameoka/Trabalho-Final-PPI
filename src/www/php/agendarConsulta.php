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
    $profissional = $_POST["profissional"] ?? "";
    $data_consulta = $_POST["data_consulta"] ?? "";
    $horario = $_POST["horario"] ?? "";
    $convenio = $_POST["convenio"] ?? "";

    // Iniciar a transação
    $pdo->beginTransaction();

    try {
        // Insere dados na tabela agenda_funcionario
        $agenda_funcionario = <<<SQL
        INSERT INTO agenda_funcionario (nome, sexo, data_consulta, hora_consulta)
        VALUES (?, ?, ?, ?)
    SQL;

        $stmt_agenda_funcionario = $pdo->prepare($agenda_funcionario);
        if (!$stmt_agenda_funcionario->execute([$nome, $sexo, $data_consulta, $hora_consulta])) {
            throw new Exception('Falha na inserção na tabela agenda_funcionário');
        }

        // Insere dados na tabela consulta
        $consulta = <<<SQL
        INSERT INTO consulta (especialidade, profissional, data_consulta, horario, convenio, nome_paciente, data_nascimento, sexo, email, telefone)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
        SQL;

        $stmt_consulta = $pdo->prepare($consulta);
        if (!$stmt_consulta->execute([$especialidade, $profissional, $data_consulta, $horario, $convenio, $nome, $dataNascimento, $sexo, $email, $telefone])) {
            throw new Exception('Falha na inserção na tabela consulta');
        }


        // Insere dados na tabela agenda_paciente
        $agenda_paciente = <<<SQL
        INSERT INTO agenda_paciente (data_consulta, hora_consulta, profissional, especialidade)
        VALUES (?, ?, ?, ?)
        SQL;

        $stmt_agenda_paciente = $pdo->prepare($agenda_paciente);
        if (!$stmt_agenda_paciente->execute([$data_consulta, $horario, $profissional, $especialidade])) {
            throw new Exception('Falha na inserção na tabela agenda_paciente');
        }

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
