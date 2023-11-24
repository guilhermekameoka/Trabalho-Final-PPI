<<<<<<< HEAD:src/www/templates/private/paciente/agendarConsulta.php
<?php
require "conexao.php";
$pdo = mysqlConnect();

// Consulta para obter todos os pacientes
$funcionarios = "SELECT id, nome, especialidade FROM funcionario";
$stmt_funcionario = $pdo->query($funcionarios);
?>

=======
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/paciente/agendarConsulta.html
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../assets/css/style.css">
    <link rel="stylesheet" href="../../../../assets/css/formulario.css">
    <link rel="stylesheet" href="../../../../assets/css/media.css">
    <link rel="stylesheet" href="../../../../assets/css/bootstrap.min.css">
    <script type="module" src="../../../../assets/js/validaAgendamento.js"></script>
    <script src="../../../../assets/js/bootstrap.bundle.min.js"></script>
    <title>Agendar Consulta</title>
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
<<<<<<< HEAD:src/www/templates/private/paciente/agendarConsulta.php
                        <a class="nav-link color-white" href="./agendarConsulta.php">Agendar consulta</a>
=======
                        <a class="nav-link color-white" href="./agendarConsulta.html">Agendar consulta</a>
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/paciente/agendarConsulta.html
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
                <h3>Agendar Consulta</h3>
                <form action="../../../php/agendarConsulta.php" method="POST">
                    <fieldset>
                        <legend>Informações da consulta</legend>

                        <div class="row">
<<<<<<< HEAD:src/www/templates/private/paciente/agendarConsulta.php
                            <!-- ESPECIALIDADE REMOVED -->

                            <!-- <div class="col-sm-6">
=======
                            <div class="col-sm-6">
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/paciente/agendarConsulta.html
                                <select class="form-select" name="especialidade" id="especialidade">
                                    <option value=""> Especialidade</option>
                                    <option value="nutricionista">Nutricionista</option>
                                    <option value="psicologo">Psicólogo</option>
                                    <option value="endocrinologista">Endócrinologista</option>
                                    <option value="psiquiatra">Psiquiatra</option>
                                </select>

                                <div class="alert alert-danger alert-dismissible" id="alertaEspecialidade">
                                    <span>A especialidade deve ser selecionada!</span>
                                </div>
<<<<<<< HEAD:src/www/templates/private/paciente/agendarConsulta.php
                            </div> -->

                            <div class="col-sm-6">
                                <select class="form-select" name="nomeProfissional" id="nomeProfissional">
                                    <option value="">Profissional</option>
                                    <?php foreach ($stmt_funcionario as $funcionario) : ?>
                                        <option value="<?php echo $funcionario['nome']; ?>">
                                            <?php echo $funcionario['nome']; ?> - <?php echo $funcionario['especialidade']; ?>
                                        </option>
                                    <?php endforeach; ?>


=======
                            </div>
                            <div class="col-sm-6">
                                <select class="form-select" name="nomeProfissional" id="nomeProfissional">
                                    <option value="">Profissional</option>
                                    <option value="Fulano">Fulano</option>
                                    <option value="Ciclano">Ciclano</option>
                                    <option value="Beltrano">Beltrano</option>
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/paciente/agendarConsulta.html
                                </select>
                                <div class="alert alert-danger alert-dismissible" id="alertaNomeProfissional">
                                    <span>O profissional deve ser selecionado!</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input type="date" name="data_consulta" id="data_consulta" class="form-control">
                                    <label for="data">Data consulta</label>
                                </div>

                                <div class="alert alert-danger alert-dismissible" id="alertaData">
                                    <span>A data deve ser selecionada!</span>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <select class="form-select" name="horario" id="horario">
                                    <option value="">Horário</option>
                                    <option value="nutricionista">7:00 - 8:00</option>
                                    <option value="nutricionista">8:00 - 9:00</option>
                                    <option value="nutricionista">9:00 - 10:00</option>
                                    <option value="nutricionista">10:00 - 11:00</option>
                                    <option value="nutricionista">11:00 - 12:00</option>
                                    <option value="nutricionista">12:00 - 13:00</option>
                                    <option value="nutricionista">13:00 - 14:00</option>
                                    <option value="nutricionista">14:00 - 15:00</option>
                                    <option value="nutricionista">15:00 - 16:00</option>
                                    <option value="nutricionista">16:00 - 17:00</option>
                                    <option value="nutricionista">17:00 - 18:00</option>
                                </select>

                                <div class="alert alert-danger alert-dismissible" id="alertaHorario">
                                    <span>O horário deve ser selecionado!</span>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <select class="form-select" name="convenio" id="convenio">
                                    <option value="">Convênio</option>
                                    <option value="Nenhum">Sem Convênio</option>
                                    <option value="Unimed">Unimed</option>
                                    <option value="SF">São Francisco</option>
                                </select>
                                <div class="alert alert-danger alert-dismissible" id="alertaConvenio">
                                    <span>O convênio deve ser selecionado!</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Dados pessoais</legend>

                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="text" id="nome" name="nome" placeholder=" ">
                                    <label for="nome">Nome</label>

                                    <div class="alert alert-danger alert-dismissible" id="alertaNome">
                                        <span>O nome deve ser preenchido!</span>
                                    </div>

                                </div>
                            </div>

                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="date" id="data_nascimento" name="data_nascimento">
                                    <label for="data_nascimento">Data de nascimento</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaDataNascimento">
                                        <span>A data de nascimento deve ser preenchida!</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-6">
                                <select name="sexo" id="sexo" class="form-select">
                                    <option value="">Sexo</option>
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                    <option value="Outro">Outro</option>
                                </select>
                                <div class="alert alert-danger alert-dismissible" id="alertaSexo">
                                    <span>O sexo deve ser preenchido!</span>
                                </div>
                            </div>
                        </div>
                    </fieldset>

                    <fieldset>
                        <legend>Informações de contato</legend>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-floating">
                                    <input class="form-control" type="email" id="email" name="email" placeholder=" ">
                                    <label for="email">E-mail</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaEmail">
                                        <span>O e-mail deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-floating">
<<<<<<< HEAD:src/www/templates/private/paciente/agendarConsulta.php
                                    <input class="form-control" type="tel" id="telefone" name="telefone" placeholder=" ">
=======
                                    <input class="form-control" type="tel" id="telefone" name="telefone"
                                        placeholder=" ">
>>>>>>> d5e342313861798e178a79185a763ab65b56db2a:src/www/templates/private/paciente/agendarConsulta.html
                                    <label for="telefone">Telefone</label>
                                    <div class="alert alert-danger alert-dismissible" id="alertaTelefone">
                                        <span>O telefone deve ser preenchido!</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </fieldset>


                    <button class="btn btn-success col-sm-12" id="botao">Agendar</button>
                </form>
            </div>
        </div>
    </main>

    <footer>
        <p>CliniSimples - Trabalho final PPI</p>
    </footer>
</body>

</html>