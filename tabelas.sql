CREATE TABLE paciente (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(255) NOT NULL,
    `cpf` VARCHAR(15) NOT NULL,
    `data_nascimento` DATE NOT NULL,
    `sexo` VARCHAR(9) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `hash_senha` VARCHAR(255) NOT NULL,
    `telefone` VARCHAR(20) NOT NULL,
    `cep` VARCHAR(9) NOT NULL,
    `rua` VARCHAR(255) NOT NULL,
    `bairro` VARCHAR(255) NOT NULL,
    `cidade` VARCHAR(255) NOT NULL,
    `estado` VARCHAR(255) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE funcionario (
    `id` INT NOT NULL AUTO_INCREMENT,
    `nome_paciente` VARCHAR(255) NOT NULL,
    `cpf` VARCHAR(14) NOT NULL,
    `data_nascimento` DATE NOT NULL,
    `sexo` VARCHAR(9) NOT NULL,
    `email` VARCHAR(255) NOT NULL,
    `hash_senha` VARCHAR(255) NOT NULL,
    `especialidade` VARCHAR(50) NOT NULL,
    `regpro` VARCHAR(20) NOT NULL,
    `telefone` VARCHAR(20) NOT NULL,
    `cep` VARCHAR(9) NOT NULL,
    `rua` VARCHAR(255) NOT NULL,
    `bairro` VARCHAR(255) NOT NULL,
    `cidade` VARCHAR(255) NOT NULL,
    `estado` VARCHAR(2) NOT NULL,
    PRIMARY KEY (`id`)
) ENGINE = InnoDB;

CREATE TABLE consulta (
    `especialidade` VARCHAR(25) NOT NULL,
    `nome_profissional` VARCHAR(50) NOT NULL,
    `data_consulta` DATE NOT NULL,
    `horario_consulta` VARCHAR(15) NOT NULL,
    `convenio` VARCHAR(20) NOT NULL,
    `nome_paciente` VARCHAR(50) NOT NULL,
    `data_nascimento` DATE NOT NULL,
    `sexo` VARCHAR(10) NOT NULL,
    `email` VARCHAR(100) NOT NULL,
    `telefone` INT(14) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE agenda_funcionario (
    `data_consulta` DATE NOT NULL,
    `hora_consulta` VARCHAR(10) NOT NULL,
    `nome_paciente` VARCHAR(50) NOT NULL,
    `sexo` VARCHAR(10) NOT NULL
) ENGINE = InnoDB;

CREATE TABLE agenda_paciente (
    `data_consulta` DATE NOT NULL,
    `hora_consulta` VARCHAR(10) NOT NULL,
    `nome_profissional` VARCHAR(50) NOT NULL,
    `especialidade` VARCHAR(25) NOT NULL
) ENGINE = InnoDB;