-- phpMyAdmin SQL Dump
-- version 5.2.1-1.el8.remi
-- https://www.phpmyadmin.net/
--
-- Servidor: 10.10.10.19
-- Tiempo de generación: 23-08-2023 a las 04:38:11
-- Versión del servidor: 8.0.26
-- Versión de PHP: 7.2.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `DB_Arquitectura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comidas`
--

CREATE TABLE `comidas` (
  `comidaID` int NOT NULL,
  `cantidad` int NOT NULL DEFAULT '0',
  `precio` decimal(6,2) NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `imagen` varchar(255) NOT NULL DEFAULT 'IMAGENES/Imagen_no_disponible.png',
  `descripcion` varchar(255) NOT NULL DEFAULT 'Sin información.'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `comidas`
--

INSERT INTO `comidas` (`comidaID`, `cantidad`, `precio`, `nombre`, `imagen`, `descripcion`) VALUES
(6, 1, 1000.00, 'ALITA', 'IMAGENES/Alitas.png', 'Deliciosa hamburguesa                                    ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factcom`
--

CREATE TABLE `factcom` (
  `ID` int NOT NULL,
  `comidaID` int NOT NULL,
  `facturaID` int NOT NULL,
  `cantidad` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `factcom`
--

INSERT INTO `factcom` (`ID`, `comidaID`, `facturaID`, `cantidad`) VALUES
(8, 6, 12, 98);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `facturaID` int NOT NULL,
  `cedula` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipoPago` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `total` decimal(15,2) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`facturaID`, `cedula`, `tipoPago`, `total`, `fecha`) VALUES
(9, '1231231231', 'tarjeta', 1.00, '2023-08-22 09:26:09'),
(10, '1231231231', 'tarjeta', 0.00, '2023-08-22 09:26:29'),
(11, '1231231231', 'tarjeta', 65.94, '2023-08-22 15:00:53'),
(12, '1231231231', 'paypal', 98000.00, '2023-08-22 17:08:58');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `cedula` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombre` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `apellidoPat` varchar(60) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `telefono` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `direccion` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `tarjeta` int DEFAULT NULL,
  `usuario` varchar(20) NOT NULL,
  `contrasenia` varchar(150) NOT NULL,
  `nivel` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`cedula`, `nombre`, `apellidoPat`, `telefono`, `direccion`, `tarjeta`, `usuario`, `contrasenia`, `nivel`) VALUES
('0000000001', NULL, NULL, NULL, NULL, NULL, 'asdffa', '123456', 1),
('0000000002', NULL, NULL, NULL, NULL, NULL, 'PRUEBA_FINAL', '123456', 1),
('0987654321', 'ASDA', 'asdasd', '1231231', 'asdasdasd', NULL, 'ey', '123456', 1),
('1231124315', 'asdasd', 'asdasd', '123123', 'asdasdasd', NULL, 'Juanito', '123456', 1),
('1231231231', 'asdasd', 'asdasd', '123123123', 'asdasdasd', NULL, 'xd', '123456', 1),
('1234567891', 'Willians', 'Alcivar', '09896554', 'vivo en ecuador', 5555444, 'willians', '123456', 2),
('1310000000', NULL, NULL, NULL, NULL, NULL, 'Ejemplos', '123456', 1),
('1313333333', NULL, NULL, NULL, NULL, NULL, 'EE', '123412', 1),
('1350000000', NULL, NULL, NULL, NULL, NULL, 'PRUEBA', '12345', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comidas`
--
ALTER TABLE `comidas`
  ADD PRIMARY KEY (`comidaID`);

--
-- Indices de la tabla `factcom`
--
ALTER TABLE `factcom`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_comidaID` (`comidaID`),
  ADD KEY `fk_facturaID` (`facturaID`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`facturaID`),
  ADD KEY `fk_cedula` (`cedula`) USING BTREE;

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`cedula`),
  ADD UNIQUE KEY `usuario` (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comidas`
--
ALTER TABLE `comidas`
  MODIFY `comidaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `factcom`
--
ALTER TABLE `factcom`
  MODIFY `ID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `facturaID` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `factcom`
--
ALTER TABLE `factcom`
  ADD CONSTRAINT `fk_comidaID` FOREIGN KEY (`comidaID`) REFERENCES `comidas` (`comidaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_facturaID` FOREIGN KEY (`facturaID`) REFERENCES `facturas` (`facturaID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_ibfk_1` FOREIGN KEY (`cedula`) REFERENCES `usuarios` (`cedula`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
