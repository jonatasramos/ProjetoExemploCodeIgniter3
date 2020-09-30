-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 15-Set-2020 às 17:02
-- Versão do servidor: 10.1.35-MariaDB
-- versão do PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telzir_master`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigo`
--

CREATE TABLE `codigo` (
  `cod_id` int(11) NOT NULL,
  `cod_codigo` int(10) UNSIGNED NOT NULL,
  `cod_datacadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Códigos de origem e destino das ligações.';

--
-- Extraindo dados da tabela `codigo`
--

INSERT INTO `codigo` (`cod_id`, `cod_codigo`, `cod_datacadastro`) VALUES
(1, 11, '2020-09-09 00:00:00'),
(2, 16, '2020-09-09 00:00:00'),
(3, 17, '2020-09-09 00:00:00'),
(4, 18, '2020-09-09 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `codigo_tarifa`
--

CREATE TABLE `codigo_tarifa` (
  `cot_id` int(11) NOT NULL,
  `cot_id_origem` int(11) NOT NULL,
  `cot_id_destino` int(11) NOT NULL,
  `cot_id_tarifa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tabela contêndo as tarifas das determinadas ligações entre os códigos.';

--
-- Extraindo dados da tabela `codigo_tarifa`
--

INSERT INTO `codigo_tarifa` (`cot_id`, `cot_id_origem`, `cot_id_destino`, `cot_id_tarifa`) VALUES
(1, 1, 2, 3),
(2, 2, 1, 5),
(3, 1, 3, 2),
(4, 3, 1, 4),
(5, 1, 4, 1),
(6, 4, 1, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `minuto`
--

CREATE TABLE `minuto` (
  `min_id` int(11) NOT NULL,
  `min_minuto` int(10) UNSIGNED NOT NULL,
  `min_datacadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Minutos das ligações.';

--
-- Extraindo dados da tabela `minuto`
--

INSERT INTO `minuto` (`min_id`, `min_minuto`, `min_datacadastro`) VALUES
(1, 30, '2020-09-09 00:00:00'),
(2, 60, '2020-09-09 00:00:00'),
(3, 120, '2020-09-09 00:00:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tarifa`
--

CREATE TABLE `tarifa` (
  `tar_id` int(11) NOT NULL,
  `tar_tarifa` float UNSIGNED NOT NULL,
  `tar_datacadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin COMMENT='Tarifas dos minutos.';

--
-- Extraindo dados da tabela `tarifa`
--

INSERT INTO `tarifa` (`tar_id`, `tar_tarifa`, `tar_datacadastro`) VALUES
(1, 0.9, '2020-09-09 00:00:00'),
(2, 1.7, '2020-09-09 00:00:00'),
(3, 1.9, '2020-09-09 00:00:00'),
(4, 2.7, '2020-09-09 00:00:00'),
(5, 2.9, '2020-09-09 00:00:00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `codigo`
--
ALTER TABLE `codigo`
  ADD PRIMARY KEY (`cod_id`);

--
-- Indexes for table `codigo_tarifa`
--
ALTER TABLE `codigo_tarifa`
  ADD PRIMARY KEY (`cot_id`),
  ADD KEY `fk_codigo_tarifa_codigo_idx` (`cot_id_origem`),
  ADD KEY `fk_codigo_tarifa_codigo1_idx` (`cot_id_destino`),
  ADD KEY `fk_codigo_tarifa_tarifa1_idx` (`cot_id_tarifa`);

--
-- Indexes for table `minuto`
--
ALTER TABLE `minuto`
  ADD PRIMARY KEY (`min_id`);

--
-- Indexes for table `tarifa`
--
ALTER TABLE `tarifa`
  ADD PRIMARY KEY (`tar_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `codigo`
--
ALTER TABLE `codigo`
  MODIFY `cod_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `codigo_tarifa`
--
ALTER TABLE `codigo_tarifa`
  MODIFY `cot_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `minuto`
--
ALTER TABLE `minuto`
  MODIFY `min_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tarifa`
--
ALTER TABLE `tarifa`
  MODIFY `tar_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `codigo_tarifa`
--
ALTER TABLE `codigo_tarifa`
  ADD CONSTRAINT `fk_codigo_tarifa_codigo` FOREIGN KEY (`cot_id_origem`) REFERENCES `codigo` (`cod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_codigo_tarifa_codigo1` FOREIGN KEY (`cot_id_destino`) REFERENCES `codigo` (`cod_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_codigo_tarifa_tarifa1` FOREIGN KEY (`cot_id_tarifa`) REFERENCES `tarifa` (`tar_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
