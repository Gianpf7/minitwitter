-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29-Jul-2018 às 06:55
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `reacts`
--

CREATE TABLE `reacts` (
  `id` int(11) NOT NULL,
  `id_tweet` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `react` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

-- --------------------------------------------------------

--
-- Estrutura da tabela `seguir`
--

CREATE TABLE `seguir` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_seguidor` int(11) NOT NULL,
  `data` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `seguir`
--

INSERT INTO `seguir` (`id`, `id_usuario`, `id_seguidor`, `data`) VALUES
(7, 5, 4, '2018-07-29'),
(8, 6, 4, '2018-07-29'),
(10, 5, 6, '2018-07-29');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `texto` varchar(120) COLLATE utf8_bin NOT NULL,
  `data` date NOT NULL,
  `foto` varchar(150) COLLATE utf8_bin DEFAULT NULL,
  `editado` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `tweets`
--

INSERT INTO `tweets` (`id`, `id_usuario`, `texto`, `data`, `foto`, `editado`) VALUES
(15, 4, 'Meu primeiro tweet', '2018-07-28', '../fotos/5f5bc33c467a2312dc5ea24654157d8d.jpg', 0),
(16, 4, 'Meu primeiro tweet', '2018-07-28', '../fotos/6f660bf9fbecdcf1e9ed17a903f09765.jpg', 0),
(17, 4, 'Meu primeiro tweet', '2018-07-28', '../fotos/7efc60a705fc781e61382b9eac897eaa.jpg', 0),
(19, 5, 'Neymar', '2018-07-29', '../fotos/6042ad0de5f79d17d753e5c066006cf3.jpg', 0),
(20, 5, 'Indo jogar bola', '2018-07-29', '../fotos/70ac7562313274f90dea6a9521af9228.jpg', 0),
(21, 6, 'Novas Regras!', '2018-07-29', '../fotos/195b3a786865338c7ad8f9b2d124fc8c.jpg', 0),
(22, 6, 'Novas Regras!2', '2018-07-29', '../fotos/c7904dceb1208bea883425b0bdf869cb.jpg', 0),
(23, 6, 'Novas Regras!3', '2018-07-29', '../fotos/d635bb11665fb9c9796d6db323dd6c92.jpg', 0),
(24, 6, 'Novas Regras!4', '2018-07-29', '../fotos/d9f5ad3c86a6bc7afab906ffa05849fe.jpg', 0),
(25, 6, 'Novas Regras!5', '2018-07-29', '../fotos/c279143a33e6f684aa7b7e9d65d02584.jpg', 0),
(26, 5, 'saveiro', '2018-07-29', '../fotos/61b0e07e187d21a232478c1032f9fdd1.jpg', 0),
(27, 5, 'TOP', '2018-07-29', '../fotos/d14127d7a866e39f45d2257fbb8ff885.jpg', 0),
(28, 5, 'TOP1', '2018-07-29', '../fotos/d2ed4ec21ce0e4b45bb948e0aa263ffd.jpg', 0),
(29, 5, 'TOP1', '2018-07-29', NULL, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) COLLATE utf8_bin NOT NULL,
  `usuario` varchar(20) COLLATE utf8_bin NOT NULL,
  `senha` varchar(200) COLLATE utf8_bin NOT NULL,
  `email` varchar(50) COLLATE utf8_bin NOT NULL,
  `foto` varchar(150) COLLATE utf8_bin NOT NULL,
  `admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `usuario`, `senha`, `email`, `foto`, `admin`) VALUES
(4, 'Messi', 'messi', '202cb962ac59075b964b07152d234b70', 'messi@gmail.com', '../fotos/53f16f6753ffb099a19e70223b71751a.jpg', 0),
(5, 'Gian Paulo', 'gp23', '202cb962ac59075b964b07152d234b70', 'gp23@gmail.com', '../fotos/e84eab6ad64989438a55db892354aa77.jpg', 0),
(6, 'Administrador', 'adm', '202cb962ac59075b964b07152d234b70', 'adm@minitwitter.com', '../fotos/a2da64600ef7a033133414da3fa299ae.jpg', 0),
(10, 'Joao Silva Sauro', 'disse_o_dino', '202cb962ac59075b964b07152d234b70', 'dinossauro@gmail.com', '../fotos/42958c6e5fefad2798028eff58574e9a.jpg', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `reacts`
--
ALTER TABLE `reacts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tweet` (`id_tweet`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `seguir`
--
ALTER TABLE `seguir`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_seguidor` (`id_seguidor`);

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `reacts`
--
ALTER TABLE `reacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `seguir`
--
ALTER TABLE `seguir`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `reacts`
--
ALTER TABLE `reacts`
  ADD CONSTRAINT `reacts_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `reacts_ibfk_2` FOREIGN KEY (`id_tweet`) REFERENCES `tweets` (`id`);

--
-- Limitadores para a tabela `seguir`
--
ALTER TABLE `seguir`
  ADD CONSTRAINT `seguir_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `seguir_ibfk_2` FOREIGN KEY (`id_seguidor`) REFERENCES `usuarios` (`id`);

--
-- Limitadores para a tabela `tweets`
--
ALTER TABLE `tweets`
  ADD CONSTRAINT `tweets_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
