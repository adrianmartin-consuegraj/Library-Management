-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2022 at 05:05 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biblioteca`
--

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `idCat` int(10) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`idCat`, `descripcion`) VALUES
(1, 'Novela'),
(2, 'Misterio'),
(3, 'Narrativa'),
(4, 'Historia');

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id` int(10) NOT NULL,
  `isbn` varchar(13) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `categoria` varchar(2) NOT NULL,
  `editorial` varchar(50) NOT NULL,
  `resumen` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `isbn`, `titulo`, `autor`, `categoria`, `editorial`, `resumen`) VALUES
(94, '9788499890951', 'Rebelión en la granja', 'George Orwell', '1', 'Debolsillo', 'Esta sátira de la Revolución rusa y el triunfo del estalinismo, escrita en 1945, se ha convertido por derechos propio en un hito de la cultura contemporánea y en uno de los libros más mordaces de todos los tiempos. Ante el auge de los animales de la Granja Solariega, pronto detectamos las semillas de totalitarismo en una organización aparentemente ideal; y en nuestros líderes más carismáticos, la sombra de los opresores más crueles.'),
(95, '9788466356718', 'Fahrenheit 451', ' Ray Bradbury', '1', 'Debolsillo', 'En un futuro sombrío y turbador, Montag forma parte de una extraña brigada de bomberos cuya misión no es sofocar incendios, sino producirlos para quemar libros. Y es que en su mundo está prohibido leer, porque lo que se quiere suprimir es la capacidad de pensar. Una vez que Montag lo comprenda, alertado por una organización secreta dedicada a memorizar volúmenes enteros, sabrá que ha llegado el momento de elegir entre la obediencia y la rebeldía. En esta nueva traducción, que captura mejor que nunca toda la fuerza del original.'),
(98, '9798669592257', 'La metamorfosis', 'Fran Kafka', '1', 'Alianza', 'Edición de bolsillo en tapa blanda completa y revisada.La metamorfosis relata la peripecia subterránea y literal de Gregor Samsa, un viajante de comercio que «al despertarse una mañana de un sueño lleno de pesadillas se encontró en su cama convertido en un bicho enorme».La metamorfosis cuenta la historia de la transformación de Gregorio Samsa en un monstruoso insecto, y del drama familiar que, a raíz de este acontecimiento, se desata.');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tipo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`, `tipo`) VALUES
('admin', 'admin', 'administrador'),
('user', 'user', 'usuario');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idCat`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=99;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
