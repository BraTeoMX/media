-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-01-2024 a las 16:50:13
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
-- Base de datos: `multimedia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `estatus`, `created_at`, `updated_at`) VALUES
(1, 'MAQUINARIA Y EQUIPOS', 'A', '2023-12-06 13:02:40', '2024-01-17 19:25:24'),
(2, 'METODOS', 'A', '2023-12-06 13:02:41', '2023-12-12 00:11:53'),
(3, 'CALIDAD', 'A', '2023-12-06 13:02:41', '2023-12-12 14:21:11'),
(4, 'INDUCCION', 'A', '2023-12-11 17:54:42', '2023-12-12 14:23:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE `subcategoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) DEFAULT '0',
  `categoria_id` int(11) DEFAULT NULL,
  `estatus` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`id`, `nombre`, `categoria_id`, `estatus`, `created_at`, `updated_at`) VALUES
(3, 'MANUAL DE USUARIOS', 5, 'A', '2023-12-06 20:00:07', '2023-12-06 20:00:07'),
(4, 'PARTES', 1, 'A', '2023-12-06 20:01:38', '2023-12-06 20:01:38'),
(5, 'ENHEBRADO', 1, 'A', '2023-12-06 20:02:04', '2023-12-06 20:02:04'),
(6, 'TENSIONES', 1, 'A', '2023-12-06 22:46:36', '2023-12-06 22:46:36'),
(7, 'PARTES DE LA AGUJA Y COLOCACION', 1, 'A', '2023-12-06 22:46:49', '2023-12-06 22:46:49'),
(17, 'FUNCIONES', 1, 'A', '2023-12-19 17:17:05', '2023-12-19 17:17:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) NOT NULL,
  `email` varchar(191) NOT NULL,
  `no_empleado` varchar(20) DEFAULT NULL,
  `password` varchar(191) DEFAULT NULL,
  `puesto` varchar(200) DEFAULT NULL,
  `inactivo` varchar(1) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `fecha_ultimo_acceso` datetime DEFAULT NULL,
  `fecha_ultima_notificacion` datetime DEFAULT NULL,
  `usuario_creacion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `usuario_actualizacion_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci ROW_FORMAT=DYNAMIC;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `no_empleado`, `password`, `puesto`, `inactivo`, `remember_token`, `fecha_ultimo_acceso`, `fecha_ultima_notificacion`, `usuario_creacion_id`, `usuario_actualizacion_id`, `created_at`, `updated_at`) VALUES
(1, 'Administrador del Sistema', 'admin@hotmail.com', '1', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'administrador', '0', NULL, '2023-03-23 12:22:49', '2023-02-01 00:00:00', NULL, NULL, '2020-11-04 19:34:26', '2023-03-23 18:22:49'),
(2, 'Administrador-1', 'administrador@multimedia.com', '2', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'Administrador', '0', 'gRTfGuPvSYWj1u6IfD9NdCP7iSf8jYaDmx8VBqkqSSPXGSV4aBWMjFPLNWc0', '2023-10-25 11:05:16', '2023-02-01 00:00:00', NULL, NULL, '2020-11-04 19:34:26', '2023-10-25 17:05:16'),
(1001, 'INVITADO1', 'invitado@invitado.com', '0', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'invitado', '0', NULL, '2023-12-12 10:23:21', NULL, NULL, NULL, NULL, NULL),
(489, 'INVITADO', 'multimedia@multimedia.com', '3213', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'invitado', NULL, NULL, '2023-09-20 19:24:58', NULL, NULL, NULL, '2023-09-21 01:22:01', '2023-09-21 01:24:58'),
(1000, 'BRAYAM TEOFILO JIMENEZ', 'bteofilo@intimark.com.mx', '18080', '$2y$10$Rq5ZnRyS8TYIKaV4yVb8hubGOJ1eI57d2C4.h/0FwjVDuAPsenqYS', 'Administrador', '0', 'brl9IyV44cO7Jrur5QJihrL0jG01wDmB2O8RJGJehamw44EkEmRrKP7qmuvc', '2023-11-22 09:45:16', '2023-11-22 09:45:17', NULL, NULL, '2023-11-22 15:45:21', '2023-11-22 15:45:22');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `video`
--

CREATE TABLE `video` (
  `id` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL DEFAULT '0',
  `descripcion` text DEFAULT NULL,
  `categoria_id` varchar(50) DEFAULT NULL,
  `subcategoria_id` varchar(50) DEFAULT NULL,
  `estatus` varchar(10) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `video`
--

INSERT INTO `video` (`id`, `titulo`, `descripcion`, `categoria_id`, `subcategoria_id`, `estatus`, `link`, `created_at`, `updated_at`) VALUES
(45, 'PARTES DE LA MÁQUINA RECTA', 'en este video aprenderemos cuales son las partes basicas de la maquina recta', '1', '4', 'B', 'videos/mkl1ac0Y3aM61JORsk8KqW4Wyeqmi9KuZ25SVbvf.mp4', '2023-12-21 16:54:26', '2024-01-17 19:32:14'),
(46, 'PARTES DE LA MAQUINA OVER LOOK', 'en este video aprenderemos cuales son las partes basicas de la maquina overlock', '1', '4', 'B', 'videos/i9jYo8ULOykoUMjWeLrgCsuiHXCYL2NL0XzWQLKy.mp4', '2023-12-21 17:05:33', '2024-01-17 19:33:54'),
(51, 'OVERLOOK', '.', '1', '5', 'B', 'videos/cSEznTHOoHnn1o5uUOokwRGYvcHZnsNCunCF1h1N.mp4', '2024-01-10 15:25:38', '2024-01-17 19:33:41'),
(52, 'OVERLOOK', 'OVERLOOK', '1', '4', 'B', 'videos/JaSR4WaGtQmAbg5ZhaKh0QVpDZ9nlD9T6VkYccYK.mp4', '2024-01-10 18:04:43', '2024-01-17 19:33:34'),
(54, '1 PARTES DE LA MÁQUINA', 'Identificacion de partes maquina recta', '1', '4', 'B', 'videos/pfllch089tq0otpFEiUrAJtkoKsyU1CVaNRKzWpn.mp4', '2024-01-17 19:30:48', '2024-01-17 22:23:21'),
(55, '2 ENEBRADO Y CARRETE MÁQUINA RECTA', 'Descripción de proceso de enebrado de maquina recta y colocación de la bobina', '1', '5', 'B', 'videos/kDz7je1fZ9OfVjefC3B079IF2hE93rdHHHMyKONK.mp4', '2024-01-17 19:36:06', '2024-01-17 21:05:44'),
(56, '3 AJUSTE DE TENSIONES MAQUINA RECTA', 'Se describe el proceso de tensionar maquina recta', '1', '6', 'A', 'videos/JrNDUSKutqaoF0HzNU8D6jqt5wqYJJlDbwnAnTpw.mp4', '2024-01-17 19:39:44', '2024-01-17 19:39:44'),
(57, 'PARTES DE MAQUINA OVERLOCK', 'Identificación de partes de la maquina overlock', '1', '4', 'A', 'videos/TXnlmh5ThPAkIYsb60AXRRbsKy41rTn7HWB4Z4LW.mp4', '2024-01-17 19:48:22', '2024-01-17 19:48:22'),
(58, 'ENHEBRADO DE MAQUINA OVERLOCK', 'Proceso de enhebrado de maquina overlock', '1', '5', 'A', 'videos/pMXjpODlYbiFMOqsQfDEEmWtNHpMOY5rTAguePHN.mp4', '2024-01-17 19:56:11', '2024-01-17 19:56:11'),
(59, 'TENSIONES MAQUINA OVERLOCK', 'Proceso de ajuste de tensiones de la máquina overlock', '1', '6', 'A', 'videos/W32OjNfzHdu8lMY67Wj4YI2dU0GFy4gDUDhx8bRq.mp4', '2024-01-17 19:58:14', '2024-01-17 19:58:14'),
(60, 'ENHEBRADO MAQUINA RECTA', 'Proceso de enhebrado, llenado de carrete y colocación de bobina de máquina recta', '1', '5', 'A', 'videos/JJXHePCYfoHQJocjwX8DbD1vhOg6GCjw8LrwwMLr.mp4', '2024-01-17 20:38:02', '2024-01-17 20:38:02'),
(61, 'ENHEBRADO MAQUINA RECTA', 'Proceso de enhebrado, llenado de carrete y colocación de bobina de máquina recta', '1', '5', 'B', 'videos/CJWCiM2chf5T6dxofTjkoiRC5ZYfHJvMwgQpspuT.mp4', '2024-01-17 20:38:54', '2024-01-17 21:06:30'),
(62, 'PARTES DE LA MAQUINA RECTA', 'Identificación de las partes de la máquina recta', '1', '4', 'A', 'videos/F8Fxi3JQbImOdVFAVp1nvblNWWkCVNPu5hXaifyM.mp4', '2024-01-17 21:23:13', '2024-01-17 21:23:13');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD UNIQUE KEY `users_email_unique` (`email`) USING BTREE,
  ADD UNIQUE KEY `users_no_empleado_unique` (`no_empleado`) USING BTREE,
  ADD KEY `users_usuario_creacion_id_foreign` (`usuario_creacion_id`) USING BTREE,
  ADD KEY `users_usuario_actualizacion_id_foreign` (`usuario_actualizacion_id`) USING BTREE,
  ADD KEY `Índice 6` (`password`) USING BTREE;

--
-- Indices de la tabla `video`
--
ALTER TABLE `video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1003;

--
-- AUTO_INCREMENT de la tabla `video`
--
ALTER TABLE `video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
