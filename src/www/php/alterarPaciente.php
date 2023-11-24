<?php
require "conexao.php";
$pdo = mysqlConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Resgata o ID da sessão
    require "sessionmanager.php";
    session_start();
    $sessionManager = new SessionManager();
    $id = $sessionManager->get("id");


    // Resgata os dados do formulário
    $nome = $_POST["nome"] ?? "";
    $cpf = $_POST["cpf"] ?? "";
    $dataNascimento = $_POST["data-nascimento"] ?? "";
    $sexo = $_POST["sexo"] ?? "";
    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";

    $telefone = $_POST["telefone"] ?? "";

    $cep = $_POST["cep"] ?? "";
    $rua = $_POST["rua"] ?? "";
    $bairro = $_POST["bairro"] ?? "";
    $cidade = $_POST["cidade"] ?? "";
    $estado = $_POST["estado"] ?? "";

    // Calcula um hash de senha seguro para armazenar no BD
    $hashsenha = password_hash($senha, PASSWORD_DEFAULT);

    // Altera na tabela paciente
    $sql = "UPDATE paciente 
        SET nome = ?, 
            cpf = ?, 
            data_nascimento = ?, 
            sexo = ?, 
            email = ?, 
            hash_senha = ?, 
            telefone = ?, 
            cep = ?, 
            rua = ?, 
            bairro = ?, 
            cidade = ?, 
            estado = ? 
        WHERE id = ?";

    try {
        // Alteração na tabela paciente
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$nome, $cpf, $dataNascimento, $sexo, $email, $hashsenha, $telefone, $cep, $rua, $bairro, $cidade, $estado, $id])) {
            throw new Exception('Falha na alteração de paciente');
        }

        // Redireciona para a página inicial
        header("location: ../templates/private/paciente/perfil.php");

        exit();
    } catch (Exception $e) {
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
