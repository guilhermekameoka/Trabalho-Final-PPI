<?php
require "conexao.php";
require "sessionmanager.php";
$pdo = mysqlConnect();
$sesh = session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pega o ID da sessão 
    $sessionManager = new SessionManager();
    $id = $sessionManager->get("id");

    $id_paciente = $id;

    // Resgata os dados do formulário
    $nome_paciente = $_POST["nome_paciente"] ?? "";
    $data_nascimento = $_POST["data_nascimento"] ?? "";
    $sexo = $_POST["sexo"] ?? "";

    $email = $_POST["email"] ?? "";
    $telefone = $_POST["telefone"] ?? "";

    $id_funcionario = $_POST["id_funcionario"] ?? "";

    // Consulta para obter o nome_funcionario com base no id_funcionario
    $consulta_nomeFuncionario = "SELECT nome FROM funcionario WHERE id = ?";
    $stmt_nomeFuncionario = $pdo->prepare($consulta_nomeFuncionario);
    $stmt_nomeFuncionario->execute([$id_funcionario]);

    $resultado_nomeFuncionario = $stmt_nomeFuncionario->fetch(PDO::FETCH_ASSOC);
    $nome_funcionario = $resultado_nomeFuncionario["nome"];

    // Consulta para obter o especialidade com base no id_funcionario
    $consulta_especialidadeFuncionario = "SELECT especialidade FROM funcionario WHERE id = ?";
    $stmt_especialidadeFuncionario = $pdo->prepare($consulta_especialidadeFuncionario);
    $stmt_especialidadeFuncionario->execute([$id_funcionario]);

    $resultado_especialidadeFuncionario = $stmt_especialidadeFuncionario->fetch(PDO::FETCH_ASSOC);
    $especialidade = $resultado_especialidadeFuncionario["especialidade"];


    $data_consulta = $_POST["data_consulta"] ?? "";
    $hora_consulta = $_POST["hora_consulta"] ?? "";
    $convenio = $_POST["convenio"] ?? "";

    try {
        // Iniciar a transação
        $pdo->beginTransaction();

        // Insere dados na tabela consulta
        $consulta = "INSERT INTO consulta (especialidade, nome_profissional, data_consulta, horario_consulta, convenio, nome_paciente, data_nascimento, sexo, email, telefone, id_funcionario, id_paciente)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";

        $stmt_consulta = $pdo->prepare($consulta);
        $stmt_consulta->execute([$especialidade, $nome_funcionario, $data_consulta, $hora_consulta, $convenio, $nome_paciente, $data_nascimento, $sexo, $email, $telefone, $id_funcionario, $id_paciente]);

        if ($stmt_consulta->rowCount() <= 0) {
            throw new Exception('Falha na inserção na tabela consulta');
        }

        // Insere dados na tabela agenda_funcionario
        $agenda_funcionario = "INSERT INTO agenda_funcionario (nome_paciente, sexo, data_consulta, hora_consulta, id_funcionario)
                              VALUES (?, ?, ?, ?, ?)";

        $stmt_agenda_funcionario = $pdo->prepare($agenda_funcionario);
        $stmt_agenda_funcionario->execute([$nome_paciente, $sexo, $data_consulta, $hora_consulta, $id_funcionario]);

        if ($stmt_agenda_funcionario->rowCount() <= 0) {
            throw new Exception('Falha na inserção na tabela agenda_funcionário');
        }

        // Insere dados na tabela agenda_paciente
        $agenda_paciente = "INSERT INTO agenda_paciente (data_consulta, hora_consulta, nome_profissional, especialidade, id_funcionario)
                            VALUES (?, ?, ?, ?, ?)";

        $stmt_agenda_paciente = $pdo->prepare($agenda_paciente);
        $stmt_agenda_paciente->execute([$data_consulta, $hora_consulta, $nome_funcionario, $especialidade, $id_funcionario]);

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
