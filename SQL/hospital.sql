-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 08-Abr-2023 às 19:06
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `hospital`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `Agendamento`
--

CREATE TABLE `Agendamento` (
  `paciente_id` int(5) NOT NULL,
  `medico_id` int(3) NOT NULL,
  `sala_id` int(3) NOT NULL,
  `secretario_id` int(3) NOT NULL,
  `data` varchar(10) NOT NULL,
  `horario` varchar(5) NOT NULL,
  `descrição` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Agendamento`
--

INSERT INTO `Agendamento` (`paciente_id`, `medico_id`, `sala_id`, `secretario_id`, `data`, `horario`, `descrição`) VALUES
(2, 2, 1, 1, '2023-04-20', '14:00', 'consulta'),
(3, 1, 2, 1, '2023-04-21', '11:00', 'cirurgia'),
(1, 2, 3, 1, '2023-04-21', '16:00', 'cirurgia'),
(4, 3, 4, 2, '2023-04-22', '16:00', 'cirurgia'),
(7, 7, 5, 3, '2023-04-22', '17:00', 'cirurgia'),
(6, 6, 6, 4, '2023-04-22', '11:00', 'consulta'),
(9, 5, 7, 3, '2023-04-22', '08:00', 'retorno'),
(10, 3, 8, 6, '2023-04-25', '15:00', 'consulta'),
(8, 5, 10, 2, '2023-04-27', '18:30', 'radiografia'),
(5, 4, 9, 3, '2023-04-28', '10:30', 'radiografia');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Enfermeiro`
--

CREATE TABLE `Enfermeiro` (
  `enfermeiro_id` int(3) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `CIP` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Enfermeiro`
--

INSERT INTO `Enfermeiro` (`enfermeiro_id`, `nome`, `CIP`, `telefone`) VALUES
(1, 'Bernardo Gomes', 'MG9876543-2', '(11) 91234-5678'),
(2, 'Isadora Oliveira', 'PE4567890-1', '(21) 99876-5432'),
(3, 'Thiago Santos', 'RJ2345678-5', '(85) 99999-9999'),
(4, 'Fernanda Pereira', 'SC5432109-8', '(47) 93333-3333'),
(5, 'Rafaela Rocha', 'BA8765432-0', '(31) 95555-5555'),
(6, 'Pedro Castro', 'ES7654321-4', '(41) 97777-7777'),
(7, 'Juliana Souza', 'PR3210987-6', '(51) 92222-2222'),
(8, 'Lucas Fernandes', 'RS7890123-3', '(62) 98888-8888'),
(9, 'Mariana Carvalho', 'GO5678901-9', '(27) 94444-4444'),
(10, 'André Almeida', 'CE2109876-4', '(91) 97777-6666');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Medico`
--

CREATE TABLE `Medico` (
  `medico_id` int(3) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `especialização` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `CRM` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Medico`
--

INSERT INTO `Medico` (`medico_id`, `nome`, `especialização`, `telefone`, `CRM`) VALUES
(1, 'Camila Silva', 'Cardiologista', '(11) 97812-3456', 'CRM-BA 97865'),
(2, 'Victor Santos', 'Cirurgião Geral', '(21) 76543-2190', 'CRM-SP 43210'),
(3, 'Lucas Pereira', 'Ortopedista', '(47) 23456-7890', 'CRM-RJ 55678'),
(4, 'Amanda Costa', 'Cirurgião Plástico', '(81) 87654-3210', 'CRM-MG 23456'),
(5, 'Paulo Oliveira', 'Cirurgião Geral', '(31) 34567-8901', 'CRM-SC 98765'),
(6, 'Rafaela Rodrigues', 'Infectologista', '(51) 65432-1098', 'CRM-PR 34567'),
(7, 'Juliana Almeida', 'Dermatologista', '(83) 21098-7654', 'CRM-RS 78901'),
(8, 'Bruno Souza', 'Cirurgião Cardiovascular', '(12) 76543-2109', 'CRM-ES 12345'),
(9, 'Fernanda Ferreira', 'Neurologista', '(98) 43210-9876', 'CRM-DF 67890'),
(10, 'Thiago Andrade', 'Pediatra', '(19) 21098-7654', 'CRM-CE 23451');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Medicos_enfermeiros`
--

CREATE TABLE `Medicos_enfermeiros` (
  `medico_id` int(3) NOT NULL,
  `enfermeiro_id` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Medicos_enfermeiros`
--

INSERT INTO `Medicos_enfermeiros` (`medico_id`, `enfermeiro_id`) VALUES
(1, 3),
(2, 4),
(2, 2),
(3, 5),
(3, 6),
(3, 1),
(4, 3),
(5, 1),
(7, 2),
(8, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Paciente`
--

CREATE TABLE `Paciente` (
  `paciente_id` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `CPF` text NOT NULL,
  `idade` int(3) NOT NULL,
  `contato_familia` varchar(20) NOT NULL,
  `medico_id` int(3) NOT NULL,
  `secretario_id` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Paciente`
--

INSERT INTO `Paciente` (`paciente_id`, `nome`, `CPF`, `idade`, `contato_familia`, `medico_id`, `secretario_id`) VALUES
(1, 'João Silva', '634.368.854-29', 23, '(71) 93465-8899', 2, 1),
(2, 'Ana Santos', '194.021.936-73', 57, '(83) 97823-3412', 2, 1),
(3, 'Pedro Oliveira', '836.512.097-40', 46, '(31) 94251-1398', 1, 1),
(4, 'Maria Sousa', '785.313.984-05', 64, '(54) 98102-7654', 3, 2),
(5, 'Carlos Rodrigues', '012.635.830-09', 31, '(11) 92876-5019', 4, 3),
(6, 'Fernanda Costa', '582.459.713-62', 68, '(21) 93765-2231', 6, 4),
(7, 'André Pereira', '046.903.822-45', 24, '(62) 94913-3300', 7, 3),
(8, 'Sofia Ferreira', '319.586.471-61', 14, '(85) 99358-0192', 5, 2),
(9, 'Diogo Alves', '972.810.543-88', 63, '(41) 93682-9981', 5, 3),
(10, 'Beatriz Gomes', '240.157.366-11', 40, '(47) 97523-4159', 3, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Sala`
--

CREATE TABLE `Sala` (
  `sala_id` int(3) NOT NULL,
  `tipo_sala` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Sala`
--

INSERT INTO `Sala` (`sala_id`, `tipo_sala`) VALUES
(1, 'raio-x'),
(2, 'cirurgia'),
(3, 'cirurgia'),
(4, 'cirurgia'),
(5, 'cirurgia'),
(6, 'consultório'),
(7, 'consultório'),
(8, 'enfermaria'),
(9, 'raio-x'),
(10, 'raio-x');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Secretario`
--

CREATE TABLE `Secretario` (
  `secretario_id` int(2) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `CPF` varchar(14) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `Secretario`
--

INSERT INTO `Secretario` (`secretario_id`, `nome`, `telefone`, `CPF`) VALUES
(1, 'Beatriz Fernandes', '(11) 2345-6789', '012.345.678-90'),
(2, 'Rodrigo Santos', '(21) 3456-7890', '123.456.789-01'),
(3, 'Camila Oliveira', '(85) 4567-8901', '234.567.890-12'),
(4, 'Rafaela Silva', '(47) 5678-9012', '345.678.901-23'),
(5, 'Mateus Costa', '(31) 6789-0123', '456.789.012-34'),
(6, 'Isabela Pereira', '(41) 7890-1234', '567.890.123-45'),
(7, 'Tiago Souza', '(51) 8901-2345', '678.901.234-56'),
(8, 'Larissa Alves', '(62) 9012-3456', '789.012.345-67'),
(9, 'Gabriel Lima', '(27) 0123-4567', '890.123.456-78'),
(10, 'Juliana Castro', '(91) 2345-6789', '901.234.567-89');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `Agendamento`
--
ALTER TABLE `Agendamento`
  ADD KEY `Paciente` (`paciente_id`),
  ADD KEY `Secretario` (`secretario_id`),
  ADD KEY `Sala` (`sala_id`),
  ADD KEY `Medico_agend` (`medico_id`);

--
-- Índices para tabela `Enfermeiro`
--
ALTER TABLE `Enfermeiro`
  ADD PRIMARY KEY (`enfermeiro_id`);

--
-- Índices para tabela `Medico`
--
ALTER TABLE `Medico`
  ADD PRIMARY KEY (`medico_id`);

--
-- Índices para tabela `Medicos_enfermeiros`
--
ALTER TABLE `Medicos_enfermeiros`
  ADD KEY `Medico` (`medico_id`),
  ADD KEY `Enfermeiro` (`enfermeiro_id`);

--
-- Índices para tabela `Paciente`
--
ALTER TABLE `Paciente`
  ADD PRIMARY KEY (`paciente_id`),
  ADD KEY `Paciente_medico` (`medico_id`),
  ADD KEY `Paciente_secretario` (`secretario_id`);

--
-- Índices para tabela `Sala`
--
ALTER TABLE `Sala`
  ADD PRIMARY KEY (`sala_id`);

--
-- Índices para tabela `Secretario`
--
ALTER TABLE `Secretario`
  ADD PRIMARY KEY (`secretario_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `Enfermeiro`
--
ALTER TABLE `Enfermeiro`
  MODIFY `enfermeiro_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `Paciente`
--
ALTER TABLE `Paciente`
  MODIFY `paciente_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `Sala`
--
ALTER TABLE `Sala`
  MODIFY `sala_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `Secretario`
--
ALTER TABLE `Secretario`
  MODIFY `secretario_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `Agendamento`
--
ALTER TABLE `Agendamento`
  ADD CONSTRAINT `Medico_agend` FOREIGN KEY (`medico_id`) REFERENCES `Medico` (`medico_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Paciente` FOREIGN KEY (`paciente_id`) REFERENCES `Paciente` (`paciente_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Sala` FOREIGN KEY (`sala_id`) REFERENCES `Sala` (`sala_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Secretario` FOREIGN KEY (`secretario_id`) REFERENCES `Secretario` (`secretario_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Medicos_enfermeiros`
--
ALTER TABLE `Medicos_enfermeiros`
  ADD CONSTRAINT `Enfermeiro` FOREIGN KEY (`enfermeiro_id`) REFERENCES `Enfermeiro` (`enfermeiro_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Medico` FOREIGN KEY (`medico_id`) REFERENCES `Medico` (`medico_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Limitadores para a tabela `Paciente`
--
ALTER TABLE `Paciente`
  ADD CONSTRAINT `Paciente_medico` FOREIGN KEY (`medico_id`) REFERENCES `Medico` (`medico_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Paciente_secretario` FOREIGN KEY (`secretario_id`) REFERENCES `Secretario` (`secretario_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
