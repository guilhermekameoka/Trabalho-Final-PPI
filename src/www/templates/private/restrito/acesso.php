<?php
// Conexão com o banco de dados
require "../../../php/conexao.php";
$pdo = mysqlConnect();

// Consulta para listar todas as consultas
$consulta = "SELECT * FROM consulta";
$stmt_consulta = $pdo->query($consulta);
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <script type="module" src="../../../../assets/js/validaLogin.js"></script>
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Acesso

    </title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="navbar">
            <a class="navbar-brand" href="../../../../../index.html">
                <div class="d-flex align-items-center" id="logo-items-flex">
                    <img src="../../../../assets/images/logo.jpg" class="logo" id="logo" alt="Logomarca CiniSimples">
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
        <div class="container">
            <div class="pre-cadastro">
                <h3>Acesso Restrito</h3>

                <?php
                // Verifica se há consultas
                if ($stmt_consulta->rowCount() > 0) {
                    echo "<div class='container'>";
                    echo "<h2 class='mt-4'>Lista de Consultas</h2>";
                    echo "<table class='table table-bordered mt-3'>";
                    echo "<thead class='thead-dark'>";
                    echo "<tr><th>Especialidade</th><th>Nome do Profissional</th><th>Data da Consulta</th><th>Horário</th><th>Convênio</th><th>Nome do Paciente</th><th>Data de Nascimento</th><th>Sexo</th><th>Email</th><th>Telefone</th></tr>";
                    echo "</thead><tbody>";

                    // Loop através das consultas
                    while ($consulta = $stmt_consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td>{$consulta['especialidade']}</td>";
                        echo "<td>{$consulta['nome_profissional']}</td>";
                        echo "<td>{$consulta['data_consulta']}</td>";
                        echo "<td>{$consulta['horario_consulta']}</td>";
                        echo "<td>{$consulta['convenio']}</td>";
                        echo "<td>{$consulta['nome_paciente']}</td>";
                        echo "<td>{$consulta['data_nascimento']}</td>";
                        echo "<td>{$consulta['sexo']}</td>";
                        echo "<td>{$consulta['email']}</td>";
                        echo "<td>{$consulta['telefone']}</td>";
                        echo "</tr>";
                    }

                    echo "</tbody></table></div>";
                } else {
                    echo "<div class='container mt-4'>";
                    echo "<p class='alert alert-info'>Nenhuma consulta encontrada.</p>";
                    echo "</div>";
                }
                ?>

            </div>
        </div>
    </main>

    <footer>
        <p>CliniSimples - Trabalho final PPI</p>
    </footer>
</body>

</html>