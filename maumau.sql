-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Fev-2017 às 23:56
-- Versão do servidor: 10.1.16-MariaDB
-- PHP Version: 5.6.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `maumau`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `aluno`
--

CREATE TABLE `aluno` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) COLLATE utf8_bin NOT NULL,
  `matricula` int(11) NOT NULL,
  `nascimento` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `aluno`
--

INSERT INTO `aluno` (`id`, `nome`, `matricula`, `nascimento`) VALUES
(1, 'Ana Clara', 39001, '1998-04-12'),
(2, 'Vitória Falcão', 39002, '1998-05-31'),
(3, 'Miguel Albuquerque', 39003, '1998-10-15'),
(4, 'Rebeca Costa sousa', 39004, '1998-09-24'),
(5, 'Luan Silva', 39005, '1998-07-09'),
(6, 'Gabriela Nobre', 39006, '1998-12-14'),
(7, 'Samuel França Nobre', 39007, '1997-05-26'),
(8, 'Maria das Graças Matos', 39008, '1998-01-02'),
(9, 'Oscar Neymar', 38154, '1997-05-16'),
(10, 'João de Melo Jr', 39009, '1999-12-24'),
(11, 'Yasmin Rocha ', 39506, '1997-11-06'),
(12, 'Ivo Borges Alves', 39010, '1997-06-25'),
(13, 'Beyonce de Oliveira', 39011, '1999-05-31'),
(14, 'James Bond', 39012, '1998-09-21'),
(15, 'Juliana Paiva Santos', 34102, '1998-07-01'),
(16, 'Arthur Guedes', 39013, '1999-03-27'),
(17, 'Bruna Albuquerque', 39086, '1997-08-06'),
(18, 'Gabriel Lopes', 37214, '1998-09-19'),
(19, 'Alan César Mota', 39022, '1999-05-30'),
(20, 'Fernanda Marques ', 39021, '1997-04-18');

-- --------------------------------------------------------

--
-- Estrutura da tabela `disciplina`
--

CREATE TABLE `disciplina` (
  `id` int(11) NOT NULL,
  `nome` varchar(110) COLLATE utf8_bin NOT NULL,
  `professor` varchar(111) COLLATE utf8_bin NOT NULL,
  `ch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `disciplina`
--

INSERT INTO `disciplina` (`id`, `nome`, `professor`, `ch`) VALUES
(1, 'Implementação de Sistemas', 'Davis Junior', 64),
(2, 'Sistemas Operacionais de Redes I', 'Maurício Marinho', 64),
(3, 'Gestão Empresarial', 'Carlos Alexandre', 32),
(4, 'Suporte ao Usuário', 'Sávio Gomes', 64),
(5, 'Tópicos especiais em informática', 'Fulano de Tal', 32);

-- --------------------------------------------------------

--
-- Estrutura da tabela `turmas`
--

CREATE TABLE `turmas` (
  `id` int(11) NOT NULL,
  `id_aluno` int(11) NOT NULL,
  `id_disciplina` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `turmas`
--

INSERT INTO `turmas` (`id`, `id_aluno`, `id_disciplina`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 6, 1),
(4, 11, 1),
(5, 7, 1),
(6, 13, 1),
(7, 19, 1),
(8, 5, 1),
(9, 17, 1),
(10, 2, 2),
(11, 7, 2),
(12, 18, 2),
(13, 19, 2),
(14, 3, 2),
(15, 5, 2),
(16, 8, 2),
(17, 9, 2),
(18, 10, 2),
(19, 11, 2),
(20, 3, 3),
(21, 4, 3),
(22, 7, 3),
(23, 16, 3),
(24, 15, 3),
(25, 14, 3),
(26, 2, 3),
(27, 1, 3),
(28, 8, 3),
(29, 12, 3),
(30, 4, 4),
(31, 5, 4),
(32, 6, 4),
(33, 7, 4),
(34, 13, 4),
(35, 16, 4),
(36, 20, 4),
(37, 17, 4),
(38, 15, 4),
(39, 1, 5),
(40, 2, 5),
(41, 3, 5),
(42, 4, 5),
(43, 5, 5),
(44, 10, 5),
(45, 11, 5),
(46, 12, 5),
(47, 13, 5),
(48, 14, 5),
(49, 19, 5),
(50, 20, 5);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aluno`
--
ALTER TABLE `aluno`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `disciplina`
--
ALTER TABLE `disciplina`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `turmas`
--
ALTER TABLE `turmas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_aluno` (`id_aluno`),
  ADD KEY `id_disciplina` (`id_disciplina`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aluno`
--
ALTER TABLE `aluno`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `disciplina`
--
ALTER TABLE `disciplina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `turmas`
--
ALTER TABLE `turmas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `turmas`
--
ALTER TABLE `turmas`
  ADD CONSTRAINT `turmas_ibfk_1` FOREIGN KEY (`id_disciplina`) REFERENCES `disciplina` (`id`),
  ADD CONSTRAINT `turmas_ibfk_2` FOREIGN KEY (`id_aluno`) REFERENCES `aluno` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
