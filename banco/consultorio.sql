-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24-Out-2020 às 21:10
-- Versão do servidor: 10.4.13-MariaDB
-- versão do PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `consultorio`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cargos`
--

CREATE TABLE `cargos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `STATUS` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `clinicas`
--

CREATE TABLE `clinicas` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `clinicas`
--

INSERT INTO `clinicas` (`id`, `descricao`, `status`) VALUES
(2, 'Clinica teste', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `convenios`
--

CREATE TABLE `convenios` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `status` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `convenios`
--

INSERT INTO `convenios` (`id`, `descricao`, `status`) VALUES
(1, 'Farmacia popular', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresa`
--

CREATE TABLE `empresa` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `status` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `empresa`
--

INSERT INTO `empresa` (`id`, `nome`, `cnpj`, `status`) VALUES
(1, 'Consultorio teste ', '00000000000000', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `especialidades`
--

CREATE TABLE `especialidades` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `especialidades`
--

INSERT INTO `especialidades` (`id`, `descricao`, `STATUS`) VALUES
(2, 'Clinico geral', 'A'),
(3, 'Cardiologista', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `matmed`
--

CREATE TABLE `matmed` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `codigoTuss` varchar(30) DEFAULT NULL,
  `unidadeMedida` varchar(30) DEFAULT NULL,
  `quantidadeEmbalagem` int(11) DEFAULT NULL,
  `observacao` varchar(500) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pacientes`
--

CREATE TABLE `pacientes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `cns` varchar(20) DEFAULT NULL,
  `numero_carteirinha` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `whatsapp` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `data_nascimento` date DEFAULT NULL,
  `data_obito` date DEFAULT NULL,
  `id_convenio` int(11) DEFAULT NULL,
  `id_plano` int(11) DEFAULT NULL,
  `nome_mae` varchar(50) DEFAULT NULL,
  `nome_pai` varchar(50) DEFAULT NULL,
  `profissao` varchar(50) DEFAULT NULL,
  `profissao_pai` varchar(50) DEFAULT NULL,
  `profissao_mae` varchar(50) DEFAULT NULL,
  `estado_civil` varchar(20) DEFAULT NULL,
  `naturalidade` varchar(50) DEFAULT NULL,
  `sexo` varchar(20) DEFAULT NULL,
  `cor` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pacientes`
--

INSERT INTO `pacientes` (`id`, `nome`, `cpf`, `rg`, `endereco`, `numero`, `complemento`, `cep`, `bairro`, `cidade`, `uf`, `cns`, `numero_carteirinha`, `telefone`, `celular`, `whatsapp`, `email`, `status`, `data_cadastro`, `data_nascimento`, `data_obito`, `id_convenio`, `id_plano`, `nome_mae`, `nome_pai`, `profissao`, `profissao_pai`, `profissao_mae`, `estado_civil`, `naturalidade`, `sexo`, `cor`) VALUES
(1, 'Alexandro Gotardo', '07321485960', '102272757', 'rua rio xingu ', '70', '', '86185060', 'santo amaro', 'cambe', '00', '', '', '43984411225', '43984411225', '', 'ale_go121@hotmail.com', 'A', NULL, '0000-00-00', NULL, 0, 0, 'Clarice gatti gotardo', 'Jose mauro gotardo', 'analista de sistemas', 'Metalurgico', 'Auxiliar de costura', '', 'Sertanopolis', '', ''),
(2, 'teste', '', '', '', '', '', '', '', '', '00', '', '', '', '', NULL, '', 'A', NULL, '0000-00-00', NULL, NULL, 0, '', '', '', '', '', '', '', '', ''),
(3, '', '', '', '', '', '', '', '', '', '00', '', '', '', '', NULL, '', 'A', NULL, '0000-00-00', NULL, NULL, 0, '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `perfil`
--

INSERT INTO `perfil` (`id`, `descricao`, `status`, `id_empresa`) VALUES
(1, 'Administrador', 'A', 1),
(2, 'Medico', 'A', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `planos`
--

CREATE TABLE `planos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `STATUS` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `planos`
--

INSERT INTO `planos` (`id`, `descricao`, `STATUS`) VALUES
(2, 'UNIMED SEM COOPARTICIPACAO', 'A'),
(3, NULL, 'A'),
(4, 'TESTE PLANO 2', 'A');

-- --------------------------------------------------------

--
-- Estrutura da tabela `prestadores`
--

CREATE TABLE `prestadores` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `tipo` char(1) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `cpf` varchar(20) DEFAULT NULL,
  `cnpj` varchar(20) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `insc_estadual` varchar(20) DEFAULT NULL,
  `razao_social` varchar(50) DEFAULT NULL,
  `telefone` varchar(20) DEFAULT NULL,
  `celular` varchar(20) DEFAULT NULL,
  `id_convenio` int(11) DEFAULT NULL,
  `id_especialidade` int(11) DEFAULT NULL,
  `id_clinica` int(11) DEFAULT NULL,
  `id_plano` int(11) DEFAULT NULL,
  `cep` varchar(11) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `estado` char(2) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `crm` varchar(15) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `procedimento`
--

CREATE TABLE `procedimento` (
  `id` int(11) NOT NULL,
  `codigo` varchar(30) DEFAULT NULL,
  `descricao` varchar(50) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `dataCadastro` date DEFAULT NULL,
  `valor` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL,
  `login` varchar(50) DEFAULT NULL,
  `senha` varchar(32) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `status` char(1) DEFAULT NULL,
  `cpf` varchar(15) DEFAULT NULL,
  `rg` varchar(15) DEFAULT NULL,
  `carteira_trabalho` varchar(20) DEFAULT NULL,
  `pis` varchar(20) DEFAULT NULL,
  `cnh` varchar(20) DEFAULT NULL,
  `cep` varchar(8) DEFAULT NULL,
  `endereco` varchar(50) DEFAULT NULL,
  `numero` varchar(10) DEFAULT NULL,
  `complemento` varchar(50) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `uf` char(2) DEFAULT NULL,
  `telefone` varchar(15) DEFAULT NULL,
  `celular` varchar(15) DEFAULT NULL,
  `whatsApp` varchar(15) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `data_admissao` date DEFAULT NULL,
  `data_demissao` date DEFAULT NULL,
  `id_cargo` int(11) DEFAULT NULL,
  `salario` decimal(10,0) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `login`, `senha`, `id_perfil`, `id_empresa`, `status`, `cpf`, `rg`, `carteira_trabalho`, `pis`, `cnh`, `cep`, `endereco`, `numero`, `complemento`, `bairro`, `cidade`, `uf`, `telefone`, `celular`, `whatsApp`, `email`, `data_cadastro`, `data_admissao`, `data_demissao`, `id_cargo`, `salario`) VALUES
(2, 'Alexandro Gotardo', 'ale', '123', 1, 1, 'A', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(3, 'Jessica goncalves', 'jessica', '123', 0, NULL, 'A', '', '', '', '', '', '', '', NULL, '', NULL, '', NULL, '', '', '', 'teste@hotmail.com', '0000-00-00', '0000-00-00', '0000-00-00', 1, '0'),
(4, 'Jessica goncalves', 'jessica', '123', 1, NULL, 'A', '', '', '', '', '', '', '', NULL, '', NULL, '', 'pr', '', '', '', 'teste@hotmail.com', '0000-00-00', '0000-00-00', '0000-00-00', 1, '0'),
(7, 'alexandro gotardo', '', '', 0, 1, 'A', '', '', '', '', '', '', '', NULL, '', NULL, '', 'pr', '', '', '', 'teste@hotmail.com', '0000-00-00', '0000-00-00', '0000-00-00', 1, '0'),
(8, 'alexandro gotardo', '', '', 0, 1, 'A', '', '', '', '', '', '', '', NULL, '', NULL, '', 'pr', '', '', '', 'teste@hotmail.com', '0000-00-00', '0000-00-00', '0000-00-00', 1, '0'),
(9, 'tese', '', '', 0, 1, 'A', '', '', '', '', '', '', '', NULL, '', NULL, '', '00', '', '', '', 'teste@hotmail.com', '0000-00-00', '0000-00-00', '0000-00-00', 1, '0'),
(10, 'teste novo', '', '', 0, 1, 'A', '', '', '', '', '', '', '', NULL, '', NULL, '', '00', '', '', '', 'teste@hotmail.com', '0000-00-00', '0000-00-00', '0000-00-00', 1, '0'),
(11, 'joao da silva', '', '', 0, 1, 'A', '', '', '', '', '', '', '', NULL, '', NULL, '', '00', '', '', '', 'teste@hotmail.com', '0000-00-00', '0000-00-00', '0000-00-00', 1, '0');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `clinicas`
--
ALTER TABLE `clinicas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `convenios`
--
ALTER TABLE `convenios`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresa`
--
ALTER TABLE `empresa`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `especialidades`
--
ALTER TABLE `especialidades`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `matmed`
--
ALTER TABLE `matmed`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pacientes`
--
ALTER TABLE `pacientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `planos`
--
ALTER TABLE `planos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `prestadores`
--
ALTER TABLE `prestadores`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `procedimento`
--
ALTER TABLE `procedimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `clinicas`
--
ALTER TABLE `clinicas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `convenios`
--
ALTER TABLE `convenios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `empresa`
--
ALTER TABLE `empresa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `especialidades`
--
ALTER TABLE `especialidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `matmed`
--
ALTER TABLE `matmed`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pacientes`
--
ALTER TABLE `pacientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `planos`
--
ALTER TABLE `planos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `prestadores`
--
ALTER TABLE `prestadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `procedimento`
--
ALTER TABLE `procedimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
