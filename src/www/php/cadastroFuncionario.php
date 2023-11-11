<?php
require "conexao.php";
$pdo = mysqlConnect();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Resgata os dados do formulário
    $nome = $_POST["nome"] ?? "";
    $cpf = $_POST["cpf"] ?? "";
    $dataNascimento = $_POST["data-nascimento"] ?? "";
    $sexo = $_POST["sexo"] ?? "";
    $email = $_POST["email"] ?? "";
    $senha = $_POST["senha"] ?? "";

    $especialidade = $_POST["especialidade"] ?? "";
    $regpro = $_POST["regpro"] ?? "";

    $telefone = $_POST["telefone"] ?? "";

    $cep = $_POST["cep"] ?? "";
    $rua = $_POST["rua"] ?? "";
    $bairro = $_POST["bairro"] ?? "";
    $cidade = $_POST["cidade"] ?? "";
    $estado = $_POST["estado"] ?? "";

    // Calcula um hash de senha seguro para armazenar no BD
    $hashsenha = password_hash($senha, PASSWORD_DEFAULT);

    // Insere na tabela funcionario
    $sql = <<<SQL
        INSERT INTO funcionario (nome, cpf, data_nascimento, sexo, email, hash_senha, especialidade, regpro, telefone, cep, rua, bairro, cidade, estado)
        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)
    SQL;

   try {
        // Inserção na tabela funcionario
        $stmt = $pdo->prepare($sql);
        if (!$stmt->execute([$nome, $cpf, $dataNascimento, $sexo, $email, $hashsenha, $especialidade, $regpro, $telefone, $cep, $rua, $bairro, $cidade, $estado])) {
            throw new Exception('Falha na inserção de funcionário');
        }

        // Redireciona para a homepage
        // header("location: ../templates/private/funcionario/homeFuncionario.php");
        
        exit();
    } catch (Exception $e) {
        exit('Falha ao cadastrar os dados: ' . $e->getMessage());
    }
}
