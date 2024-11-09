-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 04/11/2024 às 00:04
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
  `id_cas` int(11) DEFAULT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_caps`
--

INSERT INTO `tb_caps` (`id_cap`, `cap`, `id_cas`, `d_criacao`, `d_actualizacao`) VALUES
(18, '121', 19, '2024-10-30 08:25:19', NULL),
(19, '10000', 21, '2024-10-30 22:25:44', NULL),
(20, '110', 20, '2024-10-30 12:16:38', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cas`
--

CREATE TABLE `tb_cas` (
  `id_cas` int(11) NOT NULL,
  `cas` varchar(255) NOT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_cas`
--

INSERT INTO `tb_cas` (`id_cas`, `cas`, `d_criacao`, `d_actualizacao`) VALUES
(19, 'SECTOR 3', '2024-10-29 23:31:32', '2024-10-30 08:40:23'),
(20, 'SECTOR 1', '2024-10-30 12:14:34', NULL),
(21, 'SECTOR 2', '2024-10-30 12:14:50', NULL),
(22, 'SECTOR 4', '2024-10-30 12:15:04', NULL);

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
(2, 'BIOPIO', 'CATUMBELA', 'BENGUELA', '2024-11-03 22:57:59', '2024-11-03 23:22:45');

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
(1, '1ª Secre.', '2024-11-03 19:11:07', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_militantes`
--

CREATE TABLE `tb_militantes` (
  `id_militante` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `genero` enum('M','F') NOT NULL,
  `bi` varchar(15) DEFAULT NULL,
  `d_nascimento` date DEFAULT NULL,
  `endereco` varchar(255) DEFAULT NULL,
  `tel` int(10) DEFAULT NULL,
  `f_academico` varchar(255) DEFAULT NULL,
  `organizacao` varchar(10) DEFAULT NULL,
  `d_ingresso` date DEFAULT NULL,
  `n_cartao` varchar(255) DEFAULT NULL,
  `id_cap` int(11) NOT NULL,
  `id_cas` int(11) NOT NULL,
  `id_funcao` int(11) NOT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `id_comite` int(11) DEFAULT NULL,
  `imagen` mediumtext DEFAULT NULL,
  `d_criacao` datetime DEFAULT NULL,
  `d_actualizacao` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `tb_militantes`
--

INSERT INTO `tb_militantes` (`id_militante`, `nome`, `genero`, `bi`, `d_nascimento`, `endereco`, `tel`, `f_academico`, `organizacao`, `d_ingresso`, `n_cartao`, `id_cap`, `id_cas`, `id_funcao`, `id_usuario`, `id_comite`, `imagen`, `d_criacao`, `d_actualizacao`) VALUES
(1, 'Hunkuim César', 'M', '123456890BA040', '1995-03-31', 'Bairro do Luongo', 923320645, 'ENSINO MEDIO', 'JMPLA', '2016-11-03', '024AC4', 18, 21, 1, 1, 1, NULL, '2024-11-03 23:29:23', NULL);

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
(1, 'Admin', '2024-06-17 10:31:41', '2024-06-20 08:58:45'),
(2, 'Contabilista', '2024-06-17 10:36:49', NULL),
(3, 'Secretário', '2024-07-01 09:15:22', NULL),
(4, 'Gestor de Projetos', '2024-07-05 14:30:10', NULL),
(5, 'Analista de Sistemas', '2024-07-10 11:40:25', NULL),
(6, 'Desenvolvedor', '2024-07-15 12:55:05', '2024-07-20 16:45:30'),
(9, 'Vendedor', '2024-07-30 13:15:12', NULL),
(10, 'Recursos Humanos', '2024-08-01 09:25:05', NULL),
(11, 'Marketing', '2024-08-05 14:00:00', NULL),
(12, 'Suporte Técnico', '2024-08-10 11:35:20', NULL);

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
(1, 'Mundo Digital', 'md', '$2y$10$L2sk61Rw4Ja9TSm.APiGvunytA.53XPRqNCsPNDQj5bwes//w1U5y', 1, '2024-06-17 10:31:58', NULL),
(6, 'Hunkuim César', 'hunkuim', '$2y$10$/2PnqEjolbSoJpWhiNJ6u.OHnUl0dWuMZENcOPo/VR178VOPrbFQq', 3, '2024-10-03 19:11:52', '2024-10-30 10:27:01');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_caps`
--
ALTER TABLE `tb_caps`
  ADD PRIMARY KEY (`id_cap`),
  ADD KEY `fk_tb_caps_tb_cas` (`id_cas`);

--
-- Índices de tabela `tb_cas`
--
ALTER TABLE `tb_cas`
  ADD PRIMARY KEY (`id_cas`);

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
  ADD UNIQUE KEY `nome` (`nome`),
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
  MODIFY `id_cap` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `tb_cas`
--
ALTER TABLE `tb_cas`
  MODIFY `id_cas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `tb_comites`
--
ALTER TABLE `tb_comites`
  MODIFY `id_comite` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tb_funcoes`
--
ALTER TABLE `tb_funcoes`
  MODIFY `id_funcao` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_militantes`
--
ALTER TABLE `tb_militantes`
  MODIFY `id_militante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `tb_niveis`
--
ALTER TABLE `tb_niveis`
  MODIFY `id_nivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_caps`
--
ALTER TABLE `tb_caps`
  ADD CONSTRAINT `fk_tb_caps_tb_cas` FOREIGN KEY (`id_cas`) REFERENCES `tb_cas` (`id_cas`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_militantes`
--
ALTER TABLE `tb_militantes`
  ADD CONSTRAINT `tb_militantes_ibfk_1` FOREIGN KEY (`id_funcao`) REFERENCES `tb_funcoes` (`id_funcao`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_2` FOREIGN KEY (`id_cap`) REFERENCES `tb_caps` (`id_cap`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_3` FOREIGN KEY (`id_cas`) REFERENCES `tb_cas` (`id_cas`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `tb_usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tb_militantes_ibfk_5` FOREIGN KEY (`id_comite`) REFERENCES `tb_comites` (`id_comite`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Restrições para tabelas `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD CONSTRAINT `tb_usuarios_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `tb_niveis` (`id_nivel`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
