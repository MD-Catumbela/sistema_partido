-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 21/11/2024 às 11:27
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_mpla`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_caps`
--

CREATE TABLE `tb_caps` (
  `id_cap` int(11) NOT NULL,
  `cap` varchar(255) NOT NULL,
  `id_comite` int(11) DEFAULT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_caps`
--

INSERT INTO `tb_caps` (`id_cap`, `cap`, `id_comite`, `d_criacao`, `d_actualizacao`) VALUES
(1, '120', 1, '2024-11-10 15:13:38', NULL),
(3, '150', 1, '2024-11-20 23:05:20', NULL),
(4, '124', 2, '2024-11-21 10:50:40', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cas`
--

CREATE TABLE `tb_cas` (
  `id_cas` int(11) NOT NULL,
  `cas` varchar(255) NOT NULL,
  `id_comite` int(11) DEFAULT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cas`
--

INSERT INTO `tb_cas` (`id_cas`, `cas`, `id_comite`, `d_criacao`, `d_actualizacao`) VALUES
(1, 'SECTOR 1', 1, '2024-11-10 15:14:11', NULL),
(2, 'SECTOR 2', 1, '2024-11-10 15:14:28', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_comites`
--

CREATE TABLE `tb_comites` (
  `id_comite` int(11) NOT NULL,
  `comite` varchar(255) NOT NULL,
  `municipio` varchar(255) NOT NULL,
  `provincia` varchar(255) NOT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_comites`
--

INSERT INTO `tb_comites` (`id_comite`, `comite`, `municipio`, `provincia`, `d_criacao`, `d_actualizacao`) VALUES
(1, 'GAMA', 'CATUMBELA', 'BENGUELA', '2024-11-03 22:21:18', NULL),
(2, 'BIOPIO', 'CATUMBELA', 'BENGUELA', '2024-11-03 22:57:59', '2024-11-03 23:22:45'),
(6, 'CATUMBELA CEDE', 'CATUMBELA', 'BENGUELA', '2024-11-04 14:17:09', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_funcoes`
--

CREATE TABLE `tb_funcoes` (
  `id_funcao` int(11) NOT NULL,
  `funcao` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_funcoes`
--

INSERT INTO `tb_funcoes` (`id_funcao`, `funcao`, `d_criacao`, `d_actualizacao`) VALUES
(1, '1ª Secretario', '2024-11-03 19:11:07', '2024-11-04 13:55:34');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_militantes`
--

CREATE TABLE `tb_militantes` (
  `id_militante` int(11) NOT NULL,
  `nome_mi` varchar(255) NOT NULL,
  `nome_pai` varchar(255) NOT NULL,
  `nome_mae` varchar(255) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `bi` varchar(15) DEFAULT NULL,
  `d_nascimento` date DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `n_academico` varchar(255) DEFAULT NULL,
  `especialidade` varchar(255) NOT NULL,
  `trabalho` varchar(255) NOT NULL,
  `local_trabalho` varchar(255) NOT NULL,
  `organizacao` varchar(10) DEFAULT NULL,
  `d_ingresso` date DEFAULT NULL,
  `n_cartao` varchar(255) DEFAULT NULL,
  `id_cap` int(11) NOT NULL,
  `id_cas` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_comite` int(11) DEFAULT NULL,
  `idade` int(11) NOT NULL,
  `anos` int(11) NOT NULL,
  `imagen` mediumtext DEFAULT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_militantes`
--

INSERT INTO `tb_militantes` (`id_militante`, `nome_mi`, `nome_pai`, `nome_mae`, `genero`, `bi`, `d_nascimento`, `endereco`, `tel`, `n_academico`, `especialidade`, `trabalho`, `local_trabalho`, `organizacao`, `d_ingresso`, `n_cartao`, `id_cap`, `id_cas`, `id_funcao`, `id_usuario`, `id_comite`, `idade`, `anos`, `imagen`, `d_criacao`, `d_actualizacao`) VALUES
(1, 'Hunkuim Wilton César', 'Fernando César', 'Luciana Kangole Lino César', 'M', '000765003BA035', '1995-03-31', 'Luongo - Rua Escola Lúcio Lara', 923320645, 'Licenciatura', 'Engenharia Informática', 'Técnico de T.I', 'Cyber Fercesar', 'JMPLA', '2016-02-16', '0005', 1, 2, 1, 1, 1, 29, 8, NULL, '2024-11-21 00:45:03', '2024-11-21 00:45:03');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_niveis`
--

CREATE TABLE `tb_niveis` (
  `id_nivel` int(11) NOT NULL,
  `nivel` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_niveis`
--

INSERT INTO `tb_niveis` (`id_nivel`, `nivel`, `d_criacao`, `d_actualizacao`) VALUES
(1, 'Administrador', '2024-06-17 10:31:41', '2024-11-04 12:12:01'),
(3, 'Usuário Comum', '2024-07-01 09:15:22', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_quotas`
--

CREATE TABLE `tb_quotas` (
  `id_quota` int(11) NOT NULL,
  `mes_pago` varchar(50) NOT NULL,
  `valor_pago` varchar(50) NOT NULL,
  `data_pago` year(4) NOT NULL,
  `id_militante` int(11) DEFAULT NULL,
  `d_criacao` datetime DEFAULT current_timestamp(),
  `d_actualizacao` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_quotas`
--

INSERT INTO `tb_quotas` (`id_quota`, `mes_pago`, `valor_pago`, `data_pago`, `id_militante`, `d_criacao`, `d_actualizacao`) VALUES
(4, 'Janeiro', '1500', '2024', 1, '2024-11-21 11:21:39', '2024-11-21 11:21:39'),
(5, 'Fevereiro', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(6, 'Março', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(7, 'Abril', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(8, 'Maio', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(9, 'Junho', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(10, 'Julho', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(11, 'Agosto', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(12, 'Setembro', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(13, 'Outubro', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(14, 'Novembro', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48'),
(15, 'Dezembro', '1500', '2024', 1, '2024-11-21 11:24:48', '2024-11-21 11:24:48');

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password_user` mediumtext NOT NULL,
  `id_nivel` int(11) NOT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id_usuario`, `nome`, `username`, `password_user`, `id_nivel`, `d_criacao`, `d_actualizacao`) VALUES
(1, 'Mundo Digital', 'md', '$2y$10$3zhgWzJbAWStJXiFssACHuWSgAimY9C7nL3On.FW6F5tv/jN48aS6', 1, '2024-06-17 10:31:58', '2024-11-04 12:19:30'),
(10, 'Hunkuim Wilton César', 'hwc', '$2y$10$1/AVb0GWFTJlSNLZJSrnEuO0VBp33EqJaMmZgcp4S9gO3WTH6NQe6', 3, '2024-11-04 21:11:30', '2024-11-10 14:37:54');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_caps`
--
ALTER TABLE `tb_caps`
  ADD PRIMARY KEY (`id_cap`),
  ADD KEY `id_comite` (`id_comite`);

--
-- Índices de tabela `tb_cas`
--
ALTER TABLE `tb_cas`
  ADD PRIMARY KEY (`id_cas`),
  ADD KEY `id_comite` (`id_comite`);

--
-- Índices de tabela `tb_comites`
--
ALTER TABLE `tb_comites`
  ADD PRIMARY KEY (`id_comite`),
  ADD UNIQUE KEY `comuna` (`comite`);

--
-- Índices de tabela `tb_funcoes`
--
ALTER TABLE `tb_funcoes`
  ADD PRIMARY KEY (`id_funcao`);

--
-- Índices de tabela `tb_militantes`
--
ALTER TABLE `tb_militantes`
  ADD PRIMARY KEY (`id_militante`),
  ADD UNIQUE KEY `nome` (`nome_mi`),
  ADD KEY `id_cap` (`id_cap`),
  ADD KEY `id_cas` (`id_cas`),
  ADD KEY `id_funcao` (`id_funcao`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_comite` (`id_comite`);

--
-- Índices de tabela `tb_niveis`
--
ALTER TABLE `tb_niveis`
  ADD PRIMARY KEY (`id_nivel`),
  ADD UNIQUE KEY `funcao` (`nivel`);

--
-- Índices de tabela `tb_quotas`
--
ALTER TABLE `tb_quotas`
  ADD PRIMARY KEY (`id_quota`),
  ADD KEY `id_militante` (`id_militante`);

--
-- Índices de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `id_funcao` (`id_nivel`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_caps`
--
ALTER TABLE `tb_caps`
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_cas`
--
ALTER TABLE `tb_cas`
  MODIFY `id_cas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_comites`
--
ALTER TABLE `tb_comites`
  MODIFY `id_comite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `tb_funcoes`
--
ALTER TABLE `tb_funcoes`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tb_militantes`
--
ALTER TABLE `tb_militantes`
  MODIFY `id_militante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_niveis`
--
ALTER TABLE `tb_niveis`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `tb_quotas`
--
ALTER TABLE `tb_quotas`
  MODIFY `id_quota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_caps`
--
ALTER TABLE `tb_caps`
  ADD CONSTRAINT `tb_caps_ibfk_1` FOREIGN KEY (`id_comite`) REFERENCES `tb_comites` (`id_comite`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_cas`
--
ALTER TABLE `tb_cas`
  ADD CONSTRAINT `tb_cas_ibfk_1` FOREIGN KEY (`id_comite`) REFERENCES `tb_comites` (`id_comite`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_militantes`
--
ALTER TABLE `tb_militantes`
  ADD CONSTRAINT `tb_militantes_ibfk_1` FOREIGN KEY (`id_funcao`) REFERENCES `tb_funcoes` (`id_funcao`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_5` FOREIGN KEY (`id_comite`) REFERENCES `tb_comites` (`id_comite`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_6` FOREIGN KEY (`id_cap`) REFERENCES `tb_caps` (`id_cap`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_7` FOREIGN KEY (`id_cas`) REFERENCES `tb_cas` (`id_cas`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_quotas`
--
ALTER TABLE `tb_quotas`
  ADD CONSTRAINT `tb_quotas_ibfk_1` FOREIGN KEY (`id_militante`) REFERENCES `tb_militantes` (`id_militante`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `tb_niveis` (`id_nivel`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
