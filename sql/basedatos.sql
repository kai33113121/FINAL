-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 30, 2025 at 04:14 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `final`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `fecha_agregado` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id`, `usuario_id`, `libro_id`, `fecha_agregado`) VALUES
(2, 3, 3, '2025-07-24 03:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `icono` varchar(10) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `comentarios_evento`
--

CREATE TABLE `comentarios_evento` (
  `id` int(11) NOT NULL,
  `id_evento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `comentario` text DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comentarios_evento`
--

INSERT INTO `comentarios_evento` (`id`, `id_evento`, `id_usuario`, `comentario`, `fecha`) VALUES
(1, 2, 1, 'Es duro y complejo pero opino que para saber que estoy leyendo y de que trata especificamente el tema del libro', '2025-07-25 21:37:44'),
(2, 3, 3, 'a', '2025-07-25 21:44:11'),
(3, 3, 1, 'interesante', '2025-07-26 02:17:50'),
(4, 1, 8, 'hhhdvhs', '2025-07-29 16:08:48');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compras`
--

INSERT INTO `compras` (`id`, `usuario_id`, `libro_id`, `fecha`) VALUES
(1, 3, 2, '2025-07-24 02:56:11'),
(2, 1, 2, '2025-07-24 17:01:08'),
(3, 1, 4, '2025-07-24 17:01:08'),
(4, 1, 4, '2025-07-29 15:03:42'),
(5, 8, 6, '2025-07-29 16:09:11'),
(6, 1, 4, '2025-07-29 17:03:55'),
(7, 1, 2, '2025-07-29 17:03:55');

-- --------------------------------------------------------

--
-- Table structure for table `config_usuario`
--

CREATE TABLE `config_usuario` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `tema` varchar(20) DEFAULT 'claro',
  `color_acento` varchar(20) DEFAULT 'morado',
  `vista_libros` varchar(10) DEFAULT 'grid',
  `notificaciones` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `config_usuario`
--

INSERT INTO `config_usuario` (`id`, `id_usuario`, `tema`, `color_acento`, `vista_libros`, `notificaciones`) VALUES
(1, 1, 'oscuro', 'azul', 'lista', 1),
(2, 8, 'oscuro', 'morado', 'lista', 0);

-- --------------------------------------------------------

--
-- Table structure for table `eventos`
--

CREATE TABLE `eventos` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `fecha_creacion` datetime DEFAULT current_timestamp(),
  `creado_por` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `eventos`
--

INSERT INTO `eventos` (`id`, `titulo`, `descripcion`, `fecha_creacion`, `creado_por`, `activo`) VALUES
(1, 'Hablemos de categorias en los libros, ¿es necesario que un libro tenga categoria?', 'Categorias', '2025-07-25 21:33:59', 3, 1),
(2, 'Hablemos de categorias en los libros, ¿es necesario que un libro tenga categoria?', 'Categoriasa', '2025-07-25 21:36:54', 3, 0),
(3, 'Hablemos de autores Colombianos y de latinoamerica', 'Interesante hablar de visioneros colombianos en la literatura', '2025-07-25 21:44:03', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `intercambios`
--

CREATE TABLE `intercambios` (
  `id` int(11) NOT NULL,
  `libro_id_1` int(11) DEFAULT NULL,
  `libro_id_2` int(11) DEFAULT NULL,
  `usuario_1` int(11) DEFAULT NULL,
  `usuario_2` int(11) DEFAULT NULL,
  `estado` enum('pendiente','aceptado','rechazado') DEFAULT 'pendiente',
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `intercambios`
--

INSERT INTO `intercambios` (`id`, `libro_id_1`, `libro_id_2`, `usuario_1`, `usuario_2`, `estado`, `fecha`) VALUES
(2, 2, 3, 3, 1, 'aceptado', '2025-07-24 02:13:08'),
(3, 6, 4, 1, 2, 'aceptado', '2025-07-29 14:51:04');

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `estado` enum('nuevo','usado') DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `modo` enum('intercambio','venta') DEFAULT 'intercambio',
  `precio` decimal(10,2) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `genero`, `estado`, `descripcion`, `imagen`, `usuario_id`, `modo`, `precio`, `id_usuario`) VALUES
(2, 'Cien años de soledads', 'Gabriel Garcia Marquez', 'Fantasia', 'nuevo', 'Una saga familiar mágica en Macondo, mezcla realidad y fantasía.', 'cien.jpg', 3, 'intercambio', NULL, 0),
(3, 'El código Da Vinci', 'Dan Brown', 'Misterio y Thriller', 'usado', 'Un profesor descubre secretos ocultos en obras de arte que desafían la historia.', 'oferta7.jpg', 1, 'intercambio', NULL, 0),
(4, 'El psicoanalista', 'Ricardo', 'Romance', 'nuevo', 'LIBRACO', 'cardadmin.jpg', 2, 'intercambio', NULL, 0),
(6, 'DUNE', 'Frank Herbert', 'Ciencia Ficción', 'nuevo', 'Épica interestelar sobre poder, religión y ecología en el desértico planeta Arrakis.', '687eb9c590e03_crepusculo.jpg', 1, NULL, NULL, 0),
(7, '\"Sapiens: De animales a dioses\"', 'Yuval Noah Harari', 'No Ficción', 'nuevo', 'Historia de la humanidad desde la evolución hasta la era digital.', 'viento.jpg', 1, 'venta', 222222.00, 0),
(12, 'sasaas', 'asassa', 'assasa', 'nuevo', 'asas', 'default.jpg', NULL, 'intercambio', 0.00, 3),
(13, 'El guardián entre el centeno', 'J.D. Salinger', ' Novela literaria / Bildungsroman (novela de formación)', 'nuevo', 'La novela sigue a Holden Caulfield, un adolescente de 16 años expulsado de su escuela preparatoria, quien deambula por Nueva York durante tres días después de huir del colegio. ', 'default.jpg', NULL, 'intercambio', 0.00, 3),
(14, 'Bajo la misma estrella', ' John Green', 'Romance', 'usado', 'Dos adolescentes con cáncer se enamoran y buscan significado en su vida.', 'default.jpg', NULL, 'intercambio', 0.00, 3),
(15, 'Los Miserables', 'Victor Hugo', 'Sátira política', 'nuevo', 'Los animales de una granja expulsan a los humanos y crean un sistema igualitario, pero los cerdos (líderes) corrompen el ideal revolucionario hasta replicar la tiranía anterior. Una crítica feroz al totalitarismo soviético y a la manipulación del poder.', '6884776aae082_ficcion.jpg', NULL, 'intercambio', 0.00, 1),
(16, 'Los Miserables', 'Victor Hugo', 'Sátira política', 'nuevo', 'Los animales de una granja expulsan a los humanos y crean un sistema igualitario, pero los cerdos (líderes) corrompen el ideal revolucionario hasta replicar la tiranía anterior. Una crítica feroz al totalitarismo soviético y a la manipulación del poder.', '6884778759368_ficcion.jpg', NULL, 'intercambio', 0.00, 1),
(17, 'spppppppppp', 'pppppppppp', 'ppppppp', 'nuevo', 'ppppp', NULL, NULL, NULL, NULL, 1),
(20, 'spppppppppp', 'pppppppppp', 'ppppppp', 'nuevo', 'sasasa', '68847cf804bfc_6.jpg', NULL, 'intercambio', 0.00, 1),
(22, 'patatas', 'ahhasgbh', 'hsgahgahsg', 'nuevo', 'gsjahasj', '688925fa3340b_6.jpg', NULL, 'intercambio', 0.00, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `emisor_id` int(11) NOT NULL,
  `receptor_id` int(11) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` datetime DEFAULT current_timestamp(),
  `leido` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mensajes`
--

INSERT INTO `mensajes` (`id`, `emisor_id`, `receptor_id`, `mensaje`, `fecha_envio`, `leido`) VALUES
(1, 1, 8, 'Hola como estas, quiero saber si todavia esta disponible tu libro???', '2025-07-25 22:10:16', 0),
(2, 8, 1, 'Si por supuesto que esta disponible.', '2025-07-25 22:11:11', 0),
(3, 1, 2, 'Holaaaaa!!!', '2025-07-25 22:39:10', 0),
(4, 1, 4, 'Toncessss', '2025-07-25 22:50:03', 0),
(5, 8, 1, 'Uyy', '2025-07-25 22:51:17', 0),
(6, 1, 8, 'Holaaaa', '2025-07-25 22:51:45', 0),
(7, 8, 6, 'a', '2025-07-25 22:58:19', 0),
(8, 1, 8, 'habaskasjas\r\n', '2025-07-29 14:48:18', 0),
(9, 10, 1, 'QUE MAS PENDEJP, QUE HIZO MIS 7000 LUKAS?\r\n', '2025-07-29 14:56:22', 0),
(10, 1, 10, 'entonces', '2025-07-29 14:57:01', 0),
(11, 1, 10, 'olaaaaaaa', '2025-07-29 16:08:07', 0),
(12, 11, 1, 'HOLA', '2025-07-29 17:07:28', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT 'info',
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `usuario_id`, `mensaje`, `link`, `tipo`, `fecha`) VALUES
(1, 3, '📖 ¡Tu libro recibió una nueva reseña!', 'index.php?c=ResenaController&a=ver&id=2', 'reseña', '2025-07-25 20:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `resenas`
--

CREATE TABLE `resenas` (
  `id` int(11) NOT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `calificacion` int(11) DEFAULT NULL CHECK (`calificacion` between 1 and 5),
  `comentario` text DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `resenas`
--

INSERT INTO `resenas` (`id`, `libro_id`, `usuario_id`, `calificacion`, `comentario`, `fecha`) VALUES
(1, 2, 1, 5, 'Muy buen libraco', '2025-07-24 15:49:09'),
(2, 4, 1, 1, 'ss', '2025-07-24 16:42:14'),
(3, 3, 8, 5, 'Muy buen libro, interesante.', '2025-07-25 19:25:46'),
(4, 4, 8, 5, 'Libro tan gueno mano', '2025-07-25 20:40:19'),
(5, 2, 8, 3, 'Libro bueno', '2025-07-25 20:47:57');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol` enum('usuario','admin') DEFAULT 'usuario',
  `foto` varchar(255) DEFAULT NULL,
  `bio` text DEFAULT NULL,
  `token_recuperacion` varchar(255) DEFAULT NULL,
  `token_expira` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `foto`, `bio`, `token_recuperacion`, `token_expira`) VALUES
(1, 'Angels', 'angelvanegas944@gmail.com', '$2y$10$qilQp4gPc5YigRUy.8AdJu1d.xoxytCNI2n5lh009GGsOc937jXcS', 'usuario', 'default.jpg', '', '0a83b38d99f6d258aed380f2b55dfc9d141f2ad391cee407fff7976711dcabd8', '2025-07-30 09:44:38'),
(2, 'Ana', 'aelixabeth201@gmail.com', '$2y$10$jxv1n/Z0gK3nuacmUrrje.U107zmdguQOX.902IvsMeafWqdyd8aK', 'usuario', NULL, '', NULL, NULL),
(3, 'Jairs', 'jair@gmail.com', '$2y$10$a4k0KvfdkJqDuRTKTB473erMg8Utd5js0EmCuzzB4mlNPy348.hwe', 'admin', 'default.jpg', 'Estudiante Tecnologo del SENA', NULL, NULL),
(4, 'cristian', 'giovannyv292@gmail.com', '$2y$10$B9E8UKgSV5Z4aoDXh3AJN.TrdIVuyCWwfaXjpGZjemF9gUzgZVpTG', 'usuario', NULL, NULL, NULL, NULL),
(6, 'prueba, Angel 2', 'a@gmail.com', '$2y$10$Je9oSR1kFa.2vPN3xL3Sreuw919ovXhN3s/Gh4PE2kc82/FZMoL1i', 'usuario', NULL, '', NULL, NULL),
(8, 'Prueba, Angel', 'aa@gmail.com', '$2y$10$K8BHH802dqVSkaBF3Yk08.moYPD7V2ykS8vVd3jLNv9fPfyj7n416', 'usuario', NULL, '', NULL, NULL),
(10, 'PRUEBADOS', 'prueba4@gmail.com', '$2y$10$b.tz0uQHBmjLKDLvgU5Kh.lIDkYmknZrF0xepm/E6lTNsmxSjigve', 'usuario', NULL, NULL, NULL, NULL),
(11, 'david', 'david@gmail.com', '$2y$10$L6ZNipHNBmoiezFzymf4hOfivs3pSn.lsqWx.y4JipUK.DAOKZhwG', 'usuario', NULL, NULL, NULL, NULL),
(12, 'ssssssssssssssssss', 'shirlygeren+1058s67@zohomail.com', '$2y$10$ZPqtgV9uCk5vx4Iia3AlhOv5WV7lTpkmHNe94IN1idO5zZtdzWW9.', 'usuario', NULL, NULL, NULL, NULL),
(13, 'misnotas_practica', 'aelizabeth@gmail.com', '$2y$10$82mw7BiF/JTIt4aHtcI4x.Zs6M0V7j72EO8/2Y5fKMq0GHrtQQwgS', 'usuario', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `precio` decimal(10,2) NOT NULL,
  `estado` varchar(20) DEFAULT 'completada'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `libro_id` (`libro_id`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comentarios_evento`
--
ALTER TABLE `comentarios_evento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_evento` (`id_evento`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `libro_id` (`libro_id`);

--
-- Indexes for table `config_usuario`
--
ALTER TABLE `config_usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `intercambios`
--
ALTER TABLE `intercambios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libro_id_1` (`libro_id_1`),
  ADD KEY `libro_id_2` (`libro_id_2`),
  ADD KEY `usuario_1` (`usuario_1`),
  ADD KEY `usuario_2` (`usuario_2`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `resenas`
--
ALTER TABLE `resenas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libro_id` (`libro_id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comentarios_evento`
--
ALTER TABLE `comentarios_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `config_usuario`
--
ALTER TABLE `config_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `resenas`
--
ALTER TABLE `resenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

--
-- Constraints for table `comentarios_evento`
--
ALTER TABLE `comentarios_evento`
  ADD CONSTRAINT `comentarios_evento_ibfk_1` FOREIGN KEY (`id_evento`) REFERENCES `eventos` (`id`),
  ADD CONSTRAINT `comentarios_evento_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `compras_ibfk_2` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

--
-- Constraints for table `config_usuario`
--
ALTER TABLE `config_usuario`
  ADD CONSTRAINT `config_usuario_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `intercambios`
--
ALTER TABLE `intercambios`
  ADD CONSTRAINT `intercambios_ibfk_1` FOREIGN KEY (`libro_id_1`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `intercambios_ibfk_2` FOREIGN KEY (`libro_id_2`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `intercambios_ibfk_3` FOREIGN KEY (`usuario_1`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `intercambios_ibfk_4` FOREIGN KEY (`usuario_2`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `resenas`
--
ALTER TABLE `resenas`
  ADD CONSTRAINT `resenas_ibfk_1` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`),
  ADD CONSTRAINT `resenas_ibfk_2` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
