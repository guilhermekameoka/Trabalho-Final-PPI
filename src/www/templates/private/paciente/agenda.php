<?php
require "conexao.php";
$pdo = mysqlConnect();

<<<<<<< HEAD
// Consulta para obter todos os pacientes
$consultas = "SELECT nome_profissional FROM consulta";
$stmt_consulta = $pdo->query($consultas);

// Consulta para obter todos os funcionários
$funcionario = "SELECT nome FROM funcionario f JOIN consulta c ON f.nome = c.nome_profissional";
$stmt_funcionario = $pdo->query($funcionario);
=======
// Consulta para obter todos os profissionais
$consulta_profissionais = "SELECT * FROM agenda_paciente";
$stmt_profissionais = $pdo->query($consulta_profissionais);
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../assets/css/formulario.css">
    <link rel="stylesheet" href="../../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Seus agendamentos</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="navbar">
            <a class="navbar-brand" href="./home.php">
                <div class="d-flex align-items-center">
                    <img src="../../../../assets/images/logo.jpg" class="logo" alt="Logomarca CiniSimples">
                    <h1 id="CliniSimples" class="ml-2">CliniSimples</h1>
                </div>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./home.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./perfil.html">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agenda.php">Agendamentos</a>
                    </li>
                    <li class="nav-item">
<<<<<<< HEAD
                        <a class="nav-link color-white" href="./agendarConsulta.php">Agendar consulta</a>
=======
                        <a class="nav-link color-white" href="./agendarConsulta.html">Agendar consulta</a>
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="../../../../../index.html">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
    <main>
        <div class="container">
            <div class="agendamento">
                <h2>Agendamentos</h2>
                <form>
                    <div class="row">
                        <div class="col-sm-12 d-flex">
                            <div class="form-floating flex-grow-1" id="pesquisa">
                                <input class="form-control" type="text" id="nome" placeholder=" ">
                                <label for="nome">Pesquisar...</label>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <button class="btn btn-success col-sm-2" id="botao-pesquisa">Buscar</button>
                        </div>
                    </div>
                </form>


                <table class="table table-striped table-sm text-center">
                    <thead>
                        <tr class="text-center table-success">
                            <th>Data</th>
                            <th>Hora</th>
<<<<<<< HEAD
                            <th>Profissional</th>
                        </tr>
                    </thead>
                    <?php
                    if ($stmt_consulta->rowCount() > 0) {
                        while ($consulta = $stmt_consulta->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . isset($consulta['data_consulta']) . "</td>";
                            echo "<td>" . (isset($consulta['hora_consulta']) ? $consulta['hora_consulta'] : '') . "</td>";
                            echo "<td>" . (isset($consulta['nome_profissional']) ? $consulta['nome_profissional'] : '') . "</td>";
=======
                            <th>Esp.</th>
                            <th>Profissional</th>
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <?php
                    // Verifica se há resultados
                    if ($stmt_profissionais->rowCount() > 0) {
                        while ($profissional = $stmt_profissionais->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>" . (isset($profissional['data_consulta']) ? $profissional['data_consulta'] : '') . "</td>";
                            echo "<td>" . (isset($profissional['hora_consulta']) ? $profissional['hora_consulta'] : '') . "</td>";
                            echo "<td>" . (isset($profissional['especialidade']) ? $profissional['especialidade'] : '') . "</td>";
                            echo "<td>" . (isset($profissional['nome_profissional']) ? $profissional['nome_profissional'] : '') . "</td>";
                            echo "<td>";
                            echo "<div class='d-block'>";
                            echo "<button class='btn btn-primary btn-sm'>Remarcar</button>";
                            echo "</div>";
                            echo "<div class='d-block'>";
                            echo "<button class='btn btn-danger btn-sm'>Cancelar</button>";
                            echo "</div>";
                            echo "</td>";
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum profissional encontrado.</td></tr>";
                    }
                    ?>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <p>CliniSimples - Trabalho final PPI</p>
    </footer>

</body>

</html>