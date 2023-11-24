<<<<<<< HEAD:src/www/templates/private/funcionario/pacientes.php
<?php
require "conexao.php";
$pdo = mysqlConnect();

// Consulta para obter todos os pacientes
$pacientes = "SELECT * FROM paciente";
$stmt_pacientes = $pdo->query($pacientes);
?>

=======
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/funcionario/pacientes.html
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
    <title>Seus pacientes</title>
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
                        <a class="nav-link color-white" href="./perfilFuncionario.html">Perfil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="./agendaFuncionario.php">Agenda</a>
                    </li>
                    <li class="nav-item">
<<<<<<< HEAD:src/www/templates/private/funcionario/pacientes.php
                        <a class="nav-link color-white" href="./pacientes.php">Pacientes</a>
=======
                        <a class="nav-link color-white" href="./pacientes.html">Pacientes</a>
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/funcionario/pacientes.html
                    </li>
                    <li class="nav-item">
                        <a class="nav-link color-white" href="../../../../../index.html">Sair</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>
<<<<<<< HEAD:src/www/templates/private/funcionario/pacientes.php
    
=======
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/funcionario/pacientes.html
    <main>
        <div class="container">
            <div class="agendamento">
                <h2>Seus pacientes</h2>
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
                            <th>Paciente</th>
                            <th>Data nasc.</th>
                            <th>Sexo</th>
<<<<<<< HEAD:src/www/templates/private/funcionario/pacientes.php
                            <th>Telefone</th>
=======
                            <th>Convênio</th>
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/funcionario/pacientes.html
                            <th>Ação</th>
                        </tr>
                    </thead>
                    <tbody>
<<<<<<< HEAD:src/www/templates/private/funcionario/pacientes.php
                        <?php foreach ($stmt_pacientes as $paciente) : ?>
                            <tr>
                                <td><?php echo $paciente['nome']; ?></td>
                                <td><?php echo $paciente['data_nascimento']; ?></td>
                                <td><?php echo $paciente['sexo']; ?></td>
                                <td><?php echo $paciente['telefone']; ?></td>
                                <td>
                                    <button class="btn btn-danger btn-sm">Remover</button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
=======
                        <tr>
                            <td>Fulano</td>
                            <td>05/11/1994</td>
                            <td>Masculino</td>
                            <td>Unimed</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Ciclano</td>
                            <td>07/03/2002</td>
                            <td>Feminino</td>
                            <td>SF</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </td>
                        </tr>
                        <tr>
                            <td>Beltrano</td>
                            <td>26/09/1988</td>
                            <td>Feminino</td>
                            <td>Nenhum</td>
                            <td>
                                <button class="btn btn-danger btn-sm">Remover</button>
                            </td>
                        </tr>
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/funcionario/pacientes.html
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