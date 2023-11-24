<?php
require "conexao.php";
$pdo = mysqlConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Resgata os dados do formulário
    $nome_paciente = $_POST["nome_paciente"] ?? "";
    $data_nascimento = $_POST["data_nascimento"] ?? "";
    $sexo = $_POST["sexo"] ?? "";

    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";

    $id_funcionario = $_POST["id_funcionario"] ?? "";
    // $id_funcionario = $_POST["id_funcionario"] ?? "";
    $data_consulta = $_POST["data_consulta"] ?? "";
    $hora_consulta = $_POST["hora_consulta"] ?? "";
    $especialidade = "NULL";
    $convenio = $_POST["convenio"] ?? "";

    // $stmt_funcionario = $pdo->query("SELECT id FROM funcionario WHERE id = $id_funcionario");
    // $stmt_funcionario->execute();

    try {
        // Iniciar a transação
        $pdo->beginTransaction();

        // Insere dados na tabela consulta
        $consulta = "INSERT INTO consulta (especialidade, nome_profissional, data_consulta, hora_consulta, convenio, nome_paciente, data_nascimento, sexo, email, telefone, id_funcionario)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_consulta = $pdo->prepare($consulta);
        $stmt_consulta->execute([$especialidade, $nome_profissional, $data_consulta, $hora_consulta, $convenio, $nome_paciente, $data_nascimento, $sexo, $email, $telefone, $id_funcionario]);

        if ($stmt_consulta->rowCount() <= 0) {
            throw new Exception('Falha na inserção na tabela consulta');
        }

        // Insere dados na tabela agenda_funcionario
        $agenda_funcionario = "INSERT INTO agenda_funcionario (nome_paciente, sexo, data_consulta, hora_consulta, id_funcionario)
                              VALUES (?, ?, ?, ?)";

        $stmt_agenda_funcionario = $pdo->prepare($agenda_funcionario);
        $stmt_agenda_funcionario->execute([$nome_paciente, $sexo, $data_consulta, $hora_consulta, $id_funcionario]);

        if ($stmt_agenda_funcionario->rowCount() <= 0) {
            throw new Exception('Falha na inserção na tabela agenda_funcionário');
        }

        // Insere dados na tabela agenda_paciente
        $agenda_paciente = "INSERT INTO agenda_paciente (data_consulta, hora_consulta, nome_profissional, especialidade, id_funcionario)
                            VALUES (?, ?, ?, ?)";

        $stmt_agenda_paciente = $pdo->prepare($agenda_paciente);
        $stmt_agenda_paciente->execute([$data_consulta, $hora_consulta, $nome_profissional, $especialidade, $id_funcionario]);

        if ($stmt_agenda_paciente->rowCount() <= 0) {
            throw new Exception('Falha na inserção na tabela agenda_paciente');
        }

        // Commit da transação
        $pdo->commit();

        // Redireciona para a homepage
        header("location: ../templates/private/paciente/home.php");

        exit();
    } catch (Exception $e) {
        // Rollback em caso de falha
        $pdo->rollback();
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
