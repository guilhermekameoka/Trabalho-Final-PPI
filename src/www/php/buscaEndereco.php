<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');

require "conexao.php";

class Endereco
{
    public $bairro;
    public $cidade;
    public $estado;

    function __construct($bairro, $cidade, $estado)
    {
        $this->bairro = $bairro;
        $this->cidade = $cidade;
        $this->estado = $estado;
    }
}

$pdo = mysqlConnect();

$cep = $_GET['cep'] ?? '';

try {
        $sql = <<<SQL
        SELECT bairro, cidade, estado
        FROM paciente WHERE cep = ?
        UNION
        SELECT bairro, cidade, estado
        FROM funcionario WHERE cep = ?
        SQL;

        $stmt = $pdo->prepare($sql);
        $stmt->execute([$cep, $cep]);

} 
catch (Exception $e) {
        exit('Ocorreu uma falha: ' . $e->getMessage());
}


if($row = $stmt->fetch()){
    $endereco = new Endereco($row['bairro'], $row['cidade'], $row['estado']);
}
else{
    $endereco = new Endereco('', '', '');
}

echo json_encode($endereco);

?>