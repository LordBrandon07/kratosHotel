-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-04-2024 a las 02:12:47
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `kratos_hotel_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_facturas`
--

CREATE TABLE `detalle_facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `factura_id` bigint(20) UNSIGNED NOT NULL,
  `reserva_id` bigint(20) UNSIGNED DEFAULT NULL,
  `servicio_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor` double(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_facturas`
--

INSERT INTO `detalle_facturas` (`id`, `factura_id`, `reserva_id`, `servicio_id`, `cantidad`, `valor`, `created_at`, `updated_at`) VALUES
(12, 5, NULL, 1, 2, 30000.00, '2024-04-15 05:21:45', '2024-04-15 05:21:45'),
(13, 8, NULL, 1, 2, 30000.00, '2024-04-16 05:11:05', '2024-04-16 05:11:05');

--
-- Disparadores `detalle_facturas`
--
DELIMITER $$
CREATE TRIGGER `actualizar_total_factura` AFTER INSERT ON `detalle_facturas` FOR EACH ROW BEGIN
    DECLARE total_actual double(10,2);
    
    -- Obtener el total actual de la factura
    SELECT total INTO total_actual FROM facturas WHERE id = NEW.factura_id;
    
    -- Sumar el valor del nuevo detalle al total de la factura
    SET total_actual = total_actual + (NEW.cantidad * NEW.valor / 2);
    
    -- Actualizar el total de la factura en la tabla facturas
    UPDATE facturas SET total = total_actual WHERE id = NEW.factura_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calcular_valor_consumo` BEFORE INSERT ON `detalle_facturas` FOR EACH ROW BEGIN
	DECLARE precio_servicio DECIMAL(10,2);

    SELECT valor INTO precio_servicio FROM servicios WHERE id = NEW.servicio_id;

    SET NEW.valor = precio_servicio * NEW.cantidad;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Activo', '2024-03-15 07:42:54', '2024-03-15 07:42:54'),
(2, 'En proceso', '2024-03-19 17:38:42', '2024-03-19 17:38:42');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `impuesto` double(10,2) NOT NULL,
  `total` double(10,2) NOT NULL,
  `id_cliente` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `facturas`
--

INSERT INTO `facturas` (`id`, `fecha`, `impuesto`, `total`, `id_cliente`, `created_at`, `updated_at`) VALUES
(2, '2024-03-14 05:00:00', 0.70, 4000000.00, '11111', '2024-03-15 05:38:23', '2024-03-15 05:40:25'),
(5, '2024-04-15 00:21:45', 0.00, 60000.00, '44444', '2024-04-12 04:18:43', '2024-04-12 04:19:30'),
(8, '2024-04-16 00:11:05', 0.00, 80000.00, '66666', '2024-04-16 05:09:33', '2024-04-16 05:09:33');

--
-- Disparadores `facturas`
--
DELIMITER $$
CREATE TRIGGER `actualizar_estado_reserva` AFTER INSERT ON `facturas` FOR EACH ROW BEGIN
    DECLARE reserva_id BIGINT UNSIGNED;
    
    -- Encuentra el ID de la reserva asociada a esta factura
    SELECT id INTO reserva_id FROM reservas WHERE documento = NEW.id_cliente;
    
    -- Actualiza el estado de la reserva a 'activo'
    UPDATE reservas SET est_id = 1 WHERE id = reserva_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `actualizar_total_factura_reserva` BEFORE INSERT ON `facturas` FOR EACH ROW BEGIN
    -- Encuentra el valor de la reserva asociada a esta factura
    DECLARE reserva_valor DOUBLE(12,2);
    SELECT valor INTO reserva_valor FROM reservas WHERE documento = NEW.id_cliente;
    
    -- Asigna el valor de la reserva al total de la factura
    SET NEW.total = reserva_valor;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habitaciones`
--

CREATE TABLE `habitaciones` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hab_numero` varchar(3) NOT NULL,
  `tipo_hab` bigint(20) UNSIGNED NOT NULL,
  `tarifa` double(10,2) NOT NULL,
  `capacidad` bigint(20) UNSIGNED NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  `disponible` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `habitaciones`
--

INSERT INTO `habitaciones` (`id`, `hab_numero`, `tipo_hab`, `tarifa`, `capacidad`, `ruta_imagen`, `disponible`, `created_at`, `updated_at`) VALUES
(1, '101', 1, 20000.00, 1, 'https://hotelklimtxalapa.com/wp-content/uploads/2022/06/Habitacion-Sencilla-2-scaled.jpg', 0, '2024-03-15 05:51:16', '2024-03-19 18:18:22'),
(2, '103', 1, 20000.00, 2, 'https://hotelcasamorales.com/wp-content/uploads/2018/11/DSC016701.jpg', 0, '2024-03-15 09:59:42', '2024-03-19 18:18:28'),
(3, '104', 3, 50000.00, 2, 'sppspsp', 0, '2024-03-19 20:20:07', '2024-03-19 20:20:07'),
(4, '105', 2, 90000.00, 3, 'Sasss', 0, '2024-03-19 20:27:38', '2024-03-19 20:30:31'),
(5, '107', 1, 50000.00, 2, 'blalbalb', 0, '2024-03-19 21:28:09', '2024-03-19 21:28:09'),
(6, '102', 1, 25000.00, 2, 'https://hotelibiza.co/wp-content/uploads/2018/07/hotelibiza_habitacion_sencilla_02.jpg', 0, '2024-04-08 02:23:14', '2024-04-16 05:06:28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_resets_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2023_11_10_181950_create_roles_table', 1),
(5, '2023_11_12_000000_create_users_table', 1),
(6, '2023_11_25_190752_create_tipos_table', 1),
(7, '2023_11_29_173938_create_habitaciones_table', 1),
(8, '2023_12_13_134623_create_estados_table', 1),
(9, '2023_12_13_174656_create_reservas_table', 1),
(10, '2023_12_13_181028_create_servicios_table', 1),
(11, '2023_12_13_182922_create_facturas_table', 1),
(12, '2023_12_13_184216_create_detalle_facturas_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reservas`
--

CREATE TABLE `reservas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `adultos` int(11) NOT NULL,
  `ninos` int(11) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `valor` double(12,2) UNSIGNED NOT NULL,
  `documento` varchar(255) NOT NULL,
  `nro_hab` varchar(3) NOT NULL,
  `est_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `reservas`
--

INSERT INTO `reservas` (`id`, `adultos`, `ninos`, `fecha_inicio`, `fecha_final`, `valor`, `documento`, `nro_hab`, `est_id`, `created_at`, `updated_at`) VALUES
(10, 2, 2, '2024-03-19', '2024-03-20', 20000.00, '1000626703', '101', 2, '2024-03-19 18:19:08', '2024-03-19 18:19:08'),
(11, 4, 0, '2024-03-20', '2024-03-25', 100000.00, '44444', '103', 2, '2024-03-19 18:24:13', '2024-03-19 18:24:13'),
(13, 1, 2, '2024-03-18', '2024-03-20', 180000.00, '1000626703', '105', 2, '2024-03-19 20:28:18', '2024-03-19 20:28:18'),
(14, 1, 1, '2024-03-19', '2024-03-20', 50000.00, '77777', '107', 2, '2024-03-19 21:29:06', '2024-03-19 21:29:06'),
(17, 2, 2, '2024-04-16', '2024-04-18', 50000.00, '66666', '102', 1, '2024-04-16 05:06:51', '2024-04-16 05:06:51');

--
-- Disparadores `reservas`
--
DELIMITER $$
CREATE TRIGGER `actualizar_disponibilidad` AFTER INSERT ON `reservas` FOR EACH ROW BEGIN
    UPDATE habitaciones
    SET disponible = 0
    WHERE hab_numero = NEW.nro_hab;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `actualizar_disponibilidad_cancelacion` AFTER UPDATE ON `reservas` FOR EACH ROW BEGIN
    IF OLD.est_id = 1 AND NEW.est_id = 2 THEN
        UPDATE habitaciones
        SET disponible = 1
        WHERE hab_numero = OLD.nro_hab;
    END IF;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `calcular_valor_reserva` BEFORE INSERT ON `reservas` FOR EACH ROW BEGIN
    DECLARE dias_reserva INT;
    DECLARE valor_reserva DOUBLE;
    SET dias_reserva = DATEDIFF(NEW.fecha_final, NEW.fecha_inicio);
    SET valor_reserva = dias_reserva * (SELECT tarifa FROM habitaciones WHERE hab_numero = NEW.nro_hab);
    SET NEW.valor = valor_reserva;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `recalcular_valor_reserva` BEFORE UPDATE ON `reservas` FOR EACH ROW BEGIN
    DECLARE dias_reserva INT;
    DECLARE valor_reserva DOUBLE;
    SET dias_reserva = DATEDIFF(NEW.fecha_final, NEW.fecha_inicio);
    SET valor_reserva = dias_reserva * (SELECT tarifa FROM habitaciones WHERE hab_numero = NEW.nro_hab);
    SET NEW.valor = valor_reserva;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Administracion', '2024-03-15 04:47:05', '2024-03-15 04:47:05'),
(2, 'Recepcionista', 'Recepcion', '2024-03-15 04:47:23', '2024-03-15 04:47:23'),
(3, 'Cliente', 'Cliente externo', '2024-03-15 04:47:52', '2024-03-15 04:47:52'),
(4, 'Camarero / Mesero', 'Servicio a mesa y habitacion', '2024-03-15 04:48:34', '2024-03-15 04:48:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `valor` double(10,2) NOT NULL,
  `tipo_serv` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `valor`, `tipo_serv`, `created_at`, `updated_at`) VALUES
(1, 15000.00, 'Piscina', '2024-03-19 19:08:30', '2024-03-19 19:08:36'),
(2, 80000.00, 'Bar', '2024-03-19 20:22:18', '2024-03-19 20:22:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`id`, `name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Sencilla', '1 a 2 personas', '2024-03-15 05:50:00', '2024-03-15 05:50:00'),
(2, 'Familiar', 'mas de 4 personas', '2024-03-19 17:42:02', '2024-03-19 17:42:02'),
(3, 'Matrimonial', '2 personas que se aman', '2024-03-19 17:42:17', '2024-03-19 17:42:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tipo_doc` enum('CC','CE','PS','PEP') NOT NULL,
  `documento` varchar(255) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `fecha_nacimiento` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `telefono` varchar(255) NOT NULL,
  `id_rol` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `tipo_doc`, `documento`, `nombres`, `apellidos`, `fecha_nacimiento`, `email`, `email_verified_at`, `password`, `remember_token`, `telefono`, `id_rol`, `created_at`, `updated_at`) VALUES
(1, 'CC', '11111', 'pepito', 'perez', '2000-02-02', 'pepe@gmail.com', NULL, '$2y$10$drflIBXKLNxh248wf6H1dOPeJrCtq17DrK.YrVqRUu3fhRXTI.0hK', NULL, '232243443', 2, '2024-03-15 05:37:17', '2024-04-15 05:06:50'),
(2, 'CC', '22222', 'Diego', 'Moreno', '2000-02-02', 'diego@moreno.com', NULL, '$2y$10$ujCBnwl8bVtwgr1.OcAam.h7e5G.IWJoCgEV1PNtdBiNC3.qdySv2', NULL, '232344546455', 4, '2024-03-15 08:34:24', '2024-03-15 09:31:32'),
(3, 'CC', '33333', 'checho', 'chacha', '2000-02-02', 'checho@checo.com', NULL, '$2y$10$yiQ/78S091nhR25aC98vUOCP.5Rd6Ao08OwTjMTNNgaUQf62oUkQC', NULL, '4325365757', 1, '2024-03-15 08:39:44', '2024-03-15 09:43:28'),
(4, 'PS', '44444', 'Fabian', 'Masas', '2000-02-02', 'fabian@masas.com', NULL, '$2y$10$idtKG8EZFo96hwDkS07lr.KRVBjpWM4UPVqMsZItZMoQOfkSCkss2', NULL, '244325464', 3, '2024-03-15 09:34:08', '2024-03-15 09:34:08'),
(5, 'CC', '10215', 'Brandon', 'Rodriguez', '2005-03-02', 'brandonnrodriguez07@gmail.com', NULL, '$2y$10$uwBSDyBvqw50rgb2xJMTEu6A36opW/XSQn/0pbMynngBNU/O5zPWy', NULL, '3024125569', 1, '2024-03-19 01:04:55', '2024-03-19 01:10:02'),
(8, 'CC', '1000626703', 'Sergio', 'Bejarano', '1996-03-19', 'sergiodavid7003@gmail.com', NULL, '$2y$10$xCEArpRzT6bJCQrX8Sd3ZOTkQmMA5ackXNW940nbsCs70s6ecIeH6', NULL, '7272626262', 4, '2024-03-19 17:31:35', '2024-03-19 17:40:54'),
(9, 'PS', '66666', 'Paola', 'Profe', '2000-02-02', 'zgsdg@dgdgdg.com', NULL, '$2y$10$ZyxfSCmevDlYkiVq5VvHeOmIm2ymyecDrLekxvhRiZFnuyfInjEtO', NULL, '3024125569', 3, '2024-03-19 20:19:02', '2024-03-19 20:19:02'),
(10, 'CC', '88888', 'Perry', 'El orritorrinco', '2001-06-04', 'perry@gmail.com', NULL, '$2y$10$W5gpv0NooEDDNEzrfG6L9u5f0NC3/O8K5n1kNVBN3jgK0TLfEGx2i', NULL, '300000000', 2, '2024-03-19 20:46:08', '2024-03-19 20:46:40'),
(11, 'CC', '77777', 'Juilo', 'Pelaez', '2003-02-04', 'juliPelaez@gmail.com', NULL, '$2y$10$.F4oFKpUVtkc2iZCl7UBseJm4RAWvOks9oLuBfGbSjAIU29CrvQNS', NULL, '2541789353', 3, '2024-03-19 21:16:02', '2024-03-19 21:16:02');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_facturas_factura_id_foreign` (`factura_id`),
  ADD KEY `detalle_facturas_reserva_id_foreign` (`reserva_id`),
  ADD KEY `detalle_facturas_servicio_id_foreign` (`servicio_id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `facturas_id_cliente_foreign` (`id_cliente`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `habitaciones_hab_numero_unique` (`hab_numero`),
  ADD KEY `habitaciones_tipo_hab_foreign` (`tipo_hab`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `reservas_documento_foreign` (`documento`),
  ADD KEY `reservas_nro_hab_foreign` (`nro_hab`),
  ADD KEY `reservas_est_id_foreign` (`est_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_documento_unique` (`documento`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_id_rol_foreign` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `reservas`
--
ALTER TABLE `reservas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `detalle_facturas`
--
ALTER TABLE `detalle_facturas`
  ADD CONSTRAINT `detalle_facturas_factura_id_foreign` FOREIGN KEY (`factura_id`) REFERENCES `facturas` (`id`),
  ADD CONSTRAINT `detalle_facturas_reserva_id_foreign` FOREIGN KEY (`reserva_id`) REFERENCES `reservas` (`id`),
  ADD CONSTRAINT `detalle_facturas_servicio_id_foreign` FOREIGN KEY (`servicio_id`) REFERENCES `servicios` (`id`);

--
-- Filtros para la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD CONSTRAINT `facturas_id_cliente_foreign` FOREIGN KEY (`id_cliente`) REFERENCES `users` (`documento`);

--
-- Filtros para la tabla `habitaciones`
--
ALTER TABLE `habitaciones`
  ADD CONSTRAINT `habitaciones_tipo_hab_foreign` FOREIGN KEY (`tipo_hab`) REFERENCES `tipos` (`id`);

--
-- Filtros para la tabla `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `reservas_documento_foreign` FOREIGN KEY (`documento`) REFERENCES `users` (`documento`),
  ADD CONSTRAINT `reservas_est_id_foreign` FOREIGN KEY (`est_id`) REFERENCES `estados` (`id`),
  ADD CONSTRAINT `reservas_nro_hab_foreign` FOREIGN KEY (`nro_hab`) REFERENCES `habitaciones` (`hab_numero`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_id_rol_foreign` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
