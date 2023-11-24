<?php
require "../../../php/conexao.php";
require "sessionmanager.php";
session_start();

$sessionManager = new SessionManager();

$pdo = mysqlConnect();

$id_funcionario = $sessionManager->get("id");

// Consulta para obter as consultas com base no id_funcionario
$consulta_agenda = "SELECT * FROM consulta WHERE id_funcionario = ?";
$stmt_agenda = $pdo->prepare($consulta_agenda);
$stmt_agenda->execute([$id_funcionario]);

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
    <title>Sua agenda</title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-xl navbar-dark fixed-top" id="navbar">
            <a class="navbar-brand" href="./homeFuncionario.php">
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
                        <a class="nav-link color-white" href="./homeFuncionario.php">Home</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link color-white" href="./perfilFuncionario.php">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agendaFuncionario.php">Agenda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./pacientes.php">Pacientes</a>
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
                <h2>Sua agenda</h2>
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
                            <th>Data Consulta</th>
                            <th>Hora Consulta</th>
                            <th>Nome Paciente</th>
                            <!-- <th>Ação</th> -->
                        </tr>
                    </thead>
                    <?php
                    if ($stmt_agenda->rowCount() > 0) {
                        while ($consulta = $stmt_agenda->fetch(PDO::FETCH_ASSOC)) {
                            echo "<tr>";
                            echo "<td>{$consulta['data_consulta']}</td>";
                            echo "<td>{$consulta['horario_consulta']}</td>";
                            echo "<td>{$consulta['nome_paciente']}</td>";
                            // echo "<td>";
                            // echo "<div class='d-block'>";
                            // echo "<button class='btn btn-primary btn-sm'>Remarcar</button>";
                            // echo "</div>";
                            // echo "<div class='d-block'>";
                            // echo "<button class='btn btn-danger btn-sm'>Cancelar</button>";
                            // echo "</div>";
                            // echo "</td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum paciente encontrado.</td></tr>";
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

    <footer>
        <p>CliniSimples - Trabalho final PPI</p>
    </footer>

</body>

</html>