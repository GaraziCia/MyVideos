-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-12-2020 a las 19:41:03
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin_live`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historial_login`
--

CREATE TABLE `historial_login` (
  `id` bigint(20) NOT NULL,
  `idUsuario` bigint(20) NOT NULL,
  `ip` varchar(16) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `historial_login`
--

INSERT INTO `historial_login` (`id`, `idUsuario`, `ip`, `fecha`) VALUES
(1, 1, '::1', '2020-12-10 17:45:57'),
(2, 1, '::1', '2020-12-10 18:19:52');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movies`
--

CREATE TABLE `movies` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `shortcode` varchar(600) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `movies`
--

INSERT INTO `movies` (`id`, `nombre`, `shortcode`) VALUES
(1, 'el-pequeño-nicolas-short', '<div style=\'position: relative; padding-bottom: 56.25%; height: 0;\'><iframe src=\'https://imgur.com/jg1MLmH.mp4\' style=\'position: absolute; top: 0; left: 0; width: 100%; height: 100%;\' frameborder=\'0\' allow=\'autoplay\' allowfullscreen></iframe></div>'),
(2, 'el-pequeño-nicolas', '<div style=\'position: relative; padding-bottom: 56.25%; height: 0;\'><iframe src=\'movies/gorkaeselputoam.mp4\' style=\'position: absolute; top: 0; left: 0; width: 100%; height: 100%;\' frameborder=\'0\' allow=\'autoplay\' allowfullscreen></iframe></div>');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` bigint(11) NOT NULL,
  `nombre` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellidos` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `usuario` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `pass` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `email` varchar(600) COLLATE utf8mb4_spanish_ci NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `validado` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `apellidos`, `usuario`, `pass`, `email`, `fecha_creacion`, `validado`) VALUES
(1, 'abel', 'stoopid', 'abel@stoopid.com', '$2y$10$/ZCQpcG9byXmC7EmNedAz.f.y0oDe29BeYr7Wk17MCbIYwvYUb3KO', 'abel@stoopid.com', '2020-12-10 17:45:52', 3);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `historial_login`
--
ALTER TABLE `historial_login`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `historial_login`
--
ALTER TABLE `historial_login`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` bigint(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
