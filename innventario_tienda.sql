-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2025 a las 02:20:30
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `innventario_tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL,
  `codigo_barras` varchar(50) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL DEFAULT 0,
  `proveedor` varchar(150) NOT NULL,
  `fecha_ingreso` timestamp NOT NULL DEFAULT current_timestamp(),
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `codigo_barras`, `categoria`, `precio`, `stock`, `proveedor`, `fecha_ingreso`, `activo`) VALUES
(2, 'Samsung Galaxy S24', 'Smartphone Samsung con pantalla Dynamic AMOLED y procesador Snapdragon 8 Gen 3.', 'SMS-GS24-002', 'Celulares', 4299.00, 30, 'Samsung Electronics', '2025-10-17 13:52:23', 1),
(3, 'MacBook Air M2', 'Laptop Apple ultraligera con chip M2, pantalla Retina de 13.6 pulgadas y 8 GB RAM.', 'APL-MBA-M2-003', 'Computadoras', 5999.00, 15, 'Apple Inc.', '2025-10-17 13:52:23', 1),
(4, 'AirPods Pro', 'Audífonos inalámbricos Apple con cancelación activa de ruido y modo ambiente.', 'APL-APPRO-004', 'Accesorios', 1199.00, 5, 'Apple Inc.', '2025-10-17 13:52:23', 1),
(7, 'PC GAMER', 'PC perfecta para juegos de ultima generacion', '33321312', 'GAMER', 4000.00, 100, 'RAZER', '2025-10-17 23:06:28', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `codigo_barras` (`codigo_barras`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
