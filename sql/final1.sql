-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 28, 2025 at 02:39 AM
-- Server version: 11.8.3-MariaDB-log
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u379646107_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `fecha_agregado` datetime DEFAULT current_timestamp(),
  `tabla_origen` enum('libros','libros_venta') DEFAULT 'libros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carrito`
--

INSERT INTO `carrito` (`id`, `usuario_id`, `libro_id`, `fecha_agregado`, `tabla_origen`) VALUES
(72, 40, 75, '2025-09-24 19:03:35', 'libros'),
(80, 33, 80, '2025-09-27 22:24:00', 'libros'),
(81, 34, 80, '2025-09-27 23:17:55', 'libros');

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
(6, 11, 33, 'sass', '2025-09-24 18:50:24'),
(7, 11, 40, 'Excelente página 10/10 👍🏻', '2025-09-24 19:00:11'),
(8, 11, 41, 'Página de calidad, me encanta su diseño y la paleta de color utilizada', '2025-09-24 19:00:58'),
(9, 11, 33, 'xd', '2025-09-24 19:20:26');

-- --------------------------------------------------------

--
-- Table structure for table `compras`
--

CREATE TABLE `compras` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `libro_id` int(11) DEFAULT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `total` decimal(10,2) DEFAULT 0.00,
  `estado` varchar(50) DEFAULT 'pendiente',
  `stripe_session_id` varchar(255) DEFAULT NULL,
  `stripe_payment_intent_id` varchar(255) DEFAULT NULL,
  `tabla_origen` enum('libros','libros_venta') DEFAULT 'libros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detalle_compras`
--

CREATE TABLE `detalle_compras` (
  `id` int(11) NOT NULL,
  `compra_id` int(11) NOT NULL,
  `libro_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL DEFAULT 1,
  `precio` decimal(10,2) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `tabla_origen` enum('libros','libros_venta') DEFAULT 'libros'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(11, 'Que opinas?', 'Mmm', '2025-09-24 18:49:30', 29, 1);

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
(51, 26, 31, 33, 34, 'rechazado', '2025-09-23 20:53:40'),
(52, 26, 31, 33, 34, 'aceptado', '2025-09-24 00:22:41'),
(53, 26, 31, 33, 34, 'pendiente', '2025-09-24 18:35:52'),
(54, 36, 34, 35, 41, 'aceptado', '2025-09-24 19:10:29'),
(55, 37, 34, 33, 41, 'pendiente', '2025-09-25 05:36:55'),
(56, 31, 38, 34, 42, 'pendiente', '2025-09-27 23:27:02'),
(57, 29, 30, 34, 33, 'rechazado', '2025-09-27 23:29:54');

-- --------------------------------------------------------

--
-- Table structure for table `inventario_oficial`
--

CREATE TABLE `inventario_oficial` (
  `id` int(11) NOT NULL,
  `isbn` varchar(50) DEFAULT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `precio_compra` decimal(10,2) DEFAULT 0.00,
  `precio_venta` decimal(10,2) DEFAULT 0.00,
  `stock_actual` int(11) DEFAULT 0,
  `stock_minimo` int(11) DEFAULT 5,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT 'default.jpg',
  `fecha_ingreso` datetime DEFAULT current_timestamp(),
  `activo` tinyint(1) DEFAULT 1,
  `libro_id` int(11) DEFAULT NULL,
  `stock` int(11) DEFAULT 0,
  `precio_oficial` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `inventario_oficial`
--

INSERT INTO `inventario_oficial` (`id`, `isbn`, `titulo`, `autor`, `genero`, `precio_compra`, `precio_venta`, `stock_actual`, `stock_minimo`, `descripcion`, `imagen`, `fecha_ingreso`, `activo`, `libro_id`, `stock`, `precio_oficial`) VALUES
(1, '121212121212', '12asss', 'qwqw', 'Ficción', 121212.00, 121221.00, 121212, 1212, '0', 'default.jpg', '2025-09-20 02:45:10', 0, NULL, 0, NULL),
(2, 'sasasasas', 'asas', 'asasas', 'No ficción', 121212.00, 121212.00, 121212, 51212, '121212', 'default.jpg', '2025-09-20 04:59:05', 0, NULL, 0, NULL),
(3, '121212121212', 'saaas', 'saassa', 'Ficción', 12.00, 212121.00, 211221, 5212121, '0', 'default.jpg', '2025-09-23 17:19:32', 0, NULL, 0, NULL),
(4, '12121', 'QWQWQ', 'QWW', 'Ficción', 22.00, 21212.00, 121, 2, '212', 'default.jpg', '2025-09-24 18:55:31', 0, NULL, 0, NULL),
(5, '12121', 'QWQWQ', 'QWW', 'Ficción', 22.00, 21212.00, 121, 2, '212', 'default.jpg', '2025-09-24 18:55:32', 0, NULL, 0, NULL);

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
  `id_usuario` int(11) DEFAULT NULL,
  `tipo_catalogo` enum('oficial','usuario') DEFAULT 'oficial'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`id`, `titulo`, `autor`, `genero`, `estado`, `descripcion`, `imagen`, `usuario_id`, `modo`, `precio`, `id_usuario`, `tipo_catalogo`) VALUES
(74, 'El Señor de los Anillos: La Comunidad del Anillo', 'J.R.R. Tolkien', 'Fantasía', 'nuevo', 'La épica aventura de Frodo Bolsón y la Comunidad del Anillo en su misión para destruir el Anillo Único. Una obra maestra de la literatura fantástica que ha inspirado a generaciones de lectores y escritores. Tolkien crea un mundo completo con idiomas, culturas e historia propia en la Tierra Media.', '68d2b7478b2de_EL SEÑOR DE LOS ANILLOS 1 - LA COMUNIDAD DEL ANILLO.jpg', NULL, 'venta', 28000.00, NULL, 'oficial'),
(75, 'Harry Potter y la Piedra Filosofal', 'J.K. Rowling', 'Fantasía', 'usado', 'El inicio de la saga más popular de la literatura juvenil moderna. Harry Potter descubre que es un mago en su undécimo cumpleaños y comienza su educación en Hogwarts. Una historia que combina magia, amistad y aventura de manera magistral.', '68d2b79d795ac_harry potter.jpg', NULL, 'venta', 22000.00, NULL, 'oficial'),
(76, '1984', 'George Orwell', 'Ciencia Ficción', 'nuevo', 'Una distopía profética sobre un futuro totalitario donde el Gran Hermano vigila cada movimiento. Orwell creó conceptos como \"doblepensar\" y \"neolengua\" que siguen siendo relevantes hoy. Una obra fundamental que examina el poder, la verdad y la libertad individual.', '68d2b7d1bc5ff_1984.jpg', NULL, 'venta', 25000.00, NULL, 'oficial'),
(77, 'Los Crímenes de la Calle Morgue', 'Edgar Allan Poe', 'Misterio', 'usado', 'Considerado el primer relato de detective de la literatura, presenta al brillante C. Auguste Dupin resolviendo un misterioso doble asesinato en París. Poe estableció muchas de las convenciones del género detectivesco que perduran hasta hoy.', '68d2b82ae51ad_morgue.jpg', NULL, 'venta', 25000.00, NULL, 'oficial'),
(78, 'El sendero del guerrero ', 'Miyamoto musashi. Inazo nitobe', 'Clásicos', 'usado', 'Clásicos militares de oriente ', '68d4409d20e4d_17587405825978324384770471361387.jpg', NULL, 'venta', 25000.00, NULL, 'oficial'),
(79, 'Leyendas del mar ', 'Bernard clavel', 'Aventura', 'usado', 'En el pais de las leyendas un rey parte hacia el fondo del mar entre una urna de cristal, un tiburón juega con los niños, y los hombres se casan con las hijas del océano. ', '68d4411e20d88_17587407082938937595198296731555.jpg', NULL, 'venta', 30000.00, NULL, 'oficial'),
(80, 'El mundo perdido ', 'Arthur Conan Doyle', 'Aventura', 'usado', 'Una aventura traslada el mundo prehistorico en la historia de un explorador. Donde rarezas le aguardan al pasar el bosque. ', '68d441a7e50f0_17587408492043367823485103585556.jpg', NULL, 'venta', 50000.00, NULL, 'oficial');

-- --------------------------------------------------------

--
-- Table structure for table `libros_venta`
--

CREATE TABLE `libros_venta` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT current_timestamp(),
  `estado` enum('nuevo','usado') NOT NULL DEFAULT 'nuevo',
  `modo` enum('venta','intercambio','ambos') DEFAULT 'ambos'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `libros_venta`
--

INSERT INTO `libros_venta` (`id`, `id_usuario`, `titulo`, `autor`, `genero`, `descripcion`, `precio`, `imagen`, `fecha_publicacion`, `estado`, `modo`) VALUES
(26, 33, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Clásicos', 'Considerada la primera novela moderna y una de las obras cumbre de la literatura universal. Las aventuras del ingenioso hidalgo Don Quijote y su fiel escudero Sancho Panza han inspirado a escritores de todo el mundo durante más de cuatro siglos.', 32000.00, '68d2c2f6e41fc_quijote.jpg', '2025-09-23 13:54:24', 'nuevo', 'ambos'),
(29, 34, 'Dune', 'Frank Herbert', 'Ciencia Ficción', ' La épica historia de Paul Atreides en el planeta desértico Arrakis, fuente de la especia más valiosa del universo. Una obra compleja que combina política, religión, ecología y aventura espacial. Considerada una de las mejores novelas de ciencia ficción jamás escritas.', 30000.00, '68d2b9a452935_Dune.jpg', '2025-09-23 15:15:48', 'nuevo', 'ambos'),
(30, 33, 'La Isla del Tesoro', 'Robert Louis Stevenson', 'Aventura', 'La clásica historia de piratas que ha definido el género. Jim Hawkins se embarca en una búsqueda del tesoro que lo lleva a enfrentarse con el memorable Long John Silver. Una aventura emocionante llena de mapas del tesoro, motines y piratas.', 21000.00, '68d2c35ce6873__La isla del tesoro_ de Robert L_ Stevenson.jpg', '2025-09-23 15:57:16', 'usado', 'ambos'),
(31, 34, 'Luna de pluton', 'DROSS', 'Otro', 'En un lejano parque de diversiones y en plena misión secreta para defender a su amada luna de un peligroso emperador, una ogra conoce a un león y juntos se embarcan en una odisea de sucesos desafortunados que desatarán una verdadera guerra galáctica. La misión de Claudia se ve amenazada y su padre resulta preso, cuando ella queda envuelta equívocamente en un asesinato. Ogros y elfos deberán pelear en contra de un mismo y casi todopoderoso enemigo.', 80000.00, '68d2c48be1d89_LIBRO _ LUNA DE PLUTÓN_ Dross_.jpg', '2025-09-23 16:02:19', 'usado', 'ambos'),
(33, 40, 'La divina comedia', 'Dante', 'Clásicos', '7 infiernos', 60000.00, '68d43f161cafd_images.jpeg', '2025-09-24 18:57:26', 'usado', 'venta'),
(34, 41, 'La isla misteriosa ', 'Julio verne', 'Aventura', 'Libro de aventura escrito por julio Verne ', 50000.00, '68d43f614037b_LA-ISLA-MISTERIOSA.jpg', '2025-09-24 18:58:41', 'usado', 'venta'),
(35, 33, 'Sleepy Hollow', 'Whashington Irving', 'Thriller', 'Jinetes sin cabeza, condesas, ultrajadas. Damas guillotinadas, retratos vivientes, sabuesos infernales, princesas encantadas.  Etc. ', 36000.00, '68d43f86aadd7_17587403108917093289609479334017.jpg', '2025-09-24 18:59:18', 'usado', 'venta'),
(36, 35, 'Akelarre', 'Mario Mendoza ', 'Thriller', 'Crímenes en ciudad gótica ', 50000.00, '68d43fd783011_IMG_20250924_135633.jpg', '2025-09-24 19:00:39', 'usado', 'venta'),
(37, 33, 'El mensajero de Agarthas', 'Mario Mendoza ', 'Otro', 'La relación de los padres de Felipe se deteriora cada día más y la inminencia de un viaje a Bolivia con su tío Pablo! Historiador y arqueólogo, le abre una nueva posibilidad para fortalecerse psíquicamente. ', 60000.00, '68d44004215b7_17587404366524435064538728341969.jpg', '2025-09-24 19:01:24', 'usado', 'venta'),
(38, 42, 'Las venas abiertas de América Latina ', 'Eduardo galeano ', 'Fantasía', 'Vendo libro ', 100.00, '68d4418f4fc2c_image.jpg', '2025-09-24 19:07:59', 'usado', 'venta'),
(39, 35, 'La importancia de morir a tiempo', 'Mario Mendoza ', 'Thriller', 'El trabajo de un escritor requiere adentrarse en el corazón humano.s', 50000.00, '68d441f2b4fcc_IMG_20250924_140718.jpg', '2025-09-24 19:09:38', 'usado', 'venta');

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
(13, 22, 21, 'Hola, Muy buenas tardes, ¿Disculpa, aun tienes disponible el libro de la comunidad del anillo?\r\nme parece un libro excelente y me gustaria saber por que te gusto, ademas de comprarlo, ya que siento que es un excelente libro para una tarde soleada.\r\nEspero tu pronta respuesta, Gracias.', '2025-09-11 19:06:48', 0),
(23, 23, 21, 'xd', '2025-09-16 23:09:34', 0),
(30, 40, 41, 'Quiero su libro', '2025-09-24 18:58:41', 0),
(31, 41, 40, 'No te lo doy 😭', '2025-09-24 18:59:15', 0),
(32, 40, 41, 'Yo quiero leer', '2025-09-24 18:59:35', 0),
(33, 42, 40, 'Hola', '2025-09-24 19:09:00', 0),
(34, 42, 40, 'Precio fijo de tu libro ', '2025-09-24 19:09:15', 0),
(35, 42, 40, '!!!!', '2025-09-24 19:09:30', 0),
(36, 42, 40, '!!!!', '2025-09-24 19:09:31', 0),
(37, 40, 42, '😎', '2025-09-24 19:11:21', 0),
(40, 33, 34, 'xd', '2025-09-27 22:58:09', 0),
(41, 33, 35, 'xs', '2025-09-27 22:58:25', 0),
(42, 33, 29, 'xd', '2025-09-27 22:58:33', 0);

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `mensaje` varchar(255) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `intercambio_id` int(11) DEFAULT NULL,
  `tipo` varchar(50) DEFAULT 'info',
  `fecha` datetime DEFAULT current_timestamp(),
  `leida` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notificaciones`
--

INSERT INTO `notificaciones` (`id`, `usuario_id`, `mensaje`, `link`, `intercambio_id`, `tipo`, `fecha`, `leida`) VALUES
(57, 34, '🔄 Has recibido una solicitud de intercambio por uno de tus libros.', 'index.php?c=IntercambioController&a=notificaciones', 51, 'info', '2025-09-23 20:53:40', 1),
(58, 33, 'Tu solicitud de intercambio ha sido rechazada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-23 20:55:01', 1),
(59, 34, '🔄 Has recibido una solicitud de intercambio por uno de tus libros.', 'index.php?c=IntercambioController&a=notificaciones', 52, 'info', '2025-09-24 00:22:41', 1),
(60, 33, 'Tu solicitud de intercambio ha sido aceptada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-24 00:40:18', 0),
(61, 33, 'Tu solicitud de intercambio ha sido aceptada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-24 00:40:29', 1),
(62, 34, '🔄 Has recibido una solicitud de intercambio por uno de tus libros.', 'index.php?c=IntercambioController&a=notificaciones', 53, 'info', '2025-09-24 18:35:52', 0),
(63, 41, '🔄 Has recibido una solicitud de intercambio por uno de tus libros.', 'index.php?c=IntercambioController&a=notificaciones', 54, 'info', '2025-09-24 19:10:29', 1),
(64, 35, 'Tu solicitud de intercambio ha sido aceptada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-24 19:11:25', 1),
(65, 41, '🔄 Has recibido una solicitud de intercambio por uno de tus libros.', 'index.php?c=IntercambioController&a=notificaciones', 55, 'info', '2025-09-25 05:36:55', 0),
(66, 42, '🔄 Has recibido una solicitud de intercambio por uno de tus libros.', 'index.php?c=IntercambioController&a=notificaciones', 56, 'info', '2025-09-27 23:27:02', 0),
(67, 33, '🔄 Has recibido una solicitud de intercambio por uno de tus libros.', 'index.php?c=IntercambioController&a=notificaciones', 57, 'info', '2025-09-27 23:29:54', 1),
(68, 34, 'Tu solicitud de intercambio ha sido rechazada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-27 23:30:43', 0);

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
(18, 77, 41, 5, 'Edgar es un escritor excelente, con historias muy buenas y esta es una de ellas', '2025-09-24 19:05:58'),
(19, 76, 33, 4, 'muy bueno', '2025-09-24 19:23:49');

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
  `token_expira` datetime DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `genero_preferido` varchar(100) DEFAULT NULL,
  `libro_favorito` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol`, `foto`, `bio`, `token_recuperacion`, `token_expira`, `direccion`, `genero_preferido`, `libro_favorito`) VALUES
(29, 'Angel David Vanegas Bulla', 'angelvanegas944@gmail.com', '$2y$10$8Q5IBKzLTfx6ADznKDUaaumKAyvlxBc2H2k3JUq.5DGxolBHeGnbe', 'admin', '68d2b4474090a_peradmin.jpg', 'Estudiante de Tecnología en Análisis y Desarrollo de Software en el SENA, con una\r\nsólida formación en desarrollo web, programación y gestión contable. Poseo conocimientos\r\nen lenguajes como Python, Java, C#, y HTML, así como en frameworks como Django y\r\nbases de datos como MySQL y SQL Server. Mi enfoque es crear soluciones tecnológicas\r\ninnovadoras, optimizando procesos y adaptándome a las necesidades del cliente. Soy\r\nproactivo, analítico, disciplinado y comprometido con el aprendizaje continuo, con\r\nhabilidades destacadas en trabajo colaborativo, resolución de problemas y comunicación\r\nefectiva.', NULL, NULL, '', '', ''),
(33, 'Jair Santiago Guerra Alarcon', 'jguerra9806@gmail.com', '$2y$10$69ZXlWhaA1ckGv0pOMmpLuAUfigDIE2Obz5YykE72M56rv54QGsGm', 'usuario', '68d2c0195c83c_sdc.jpg', 'Analista de Bases de datos\r\nCon una sólida formación en normalización, seguridad y modelado relacional\r\n Su enfoque va más allá del SQL: domina la arquitectura de datos como un lenguaje que conecta áreas técnicas con necesidades humanas. Esto lo ha llevado a colaborar en proyectos que integran backend robusto, interfaces intuitivas y flujos de información que responden en tiempo real.', NULL, NULL, 'Calle 22', 'Misterio', 'La Metamorfosis, Franz Kafka'),
(34, 'Ana Elizabeth Carreño Ducuara', 'aelixabeth201@gmail.com', '$2y$10$LrW2qZc7sgkSRr.ERWgY7OebJrQh4Mr1qVqoffCcqk6e1clir805S', 'usuario', '68d2b3e37afc2_download (2).jpg', 'Especialista en testing y backend. Python, Php', NULL, NULL, 'Dubai', 'Fantasía', 'Libro. THE CAT RETURNS PICTURE BOOK'),
(35, 'giovanny', 'giovannyV292@gmail.com', '$2y$10$bIpOLx1mBPcjjdFltIDNLeWW.eehGxdIVaQDCK4qOUraq3FAopWq6', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(36, 'Jim clarck', 'clarckjim@outlook.com', '$2y$10$CUIXIvvb3sAZ6FqpaXnWYuur8UOdCMGZYEScMOhUWDg69jfo9ui/u', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(37, 'Nicolás Esteban', 'spiderdash13579@gmail.com', '$2y$10$j.x25VH3X2tQ5JNJZVZWl.JxT/uiiq84ZPKGHLwW.Z7WdjSsfnL/S', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(38, 'Cristinne Jhoanna ', 'crisroa34@gmail.com', '$2y$10$WZY0UDSoq82od1OyGiltNeMpulUrlvIJc3BuQWmetQpWddzw5neWW', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(39, 'Sam mora', 'morasamuelrincon@gmail.com', '$2y$10$gfJY45N04xdJeWvr0TtryOjNveM7PpSQo6Q3tD0vnVH/L8g06sRAG', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Thomas Felipe Aldana Betancourth', 'thomyaldabe@gmail.com', '$2y$10$/9QAsz6EcmTXCktQR.EvCeEnR7/RIRVgk1sN27sfFXHs5XDuLixhC', 'usuario', '68d4413f61632_IMG20250921114954.jpg', '<br />\r\n<b>Deprecated</b>:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in <b>/home/u379646107/domains/libroswapcol.com/public_html/views/usuario/perfil.php</b> on line <b>150</b><br />\r\n', NULL, NULL, '', '', ''),
(41, 'Jafet David Pineda Cespedes ', 'jafetdavidpi@gmail.com', '$2y$10$m3NVqW8R1Cn6Gwnzv/ryFen39mURMPYBS0yo3u48/82VYUP/9Jlva', 'usuario', '68d44154e29d2_IMG_20250916_231922_012.webp', '<br />\r\n<b>Deprecated</b>:  htmlspecialchars(): Passing null to parameter #1 ($string) of type string is deprecated in <b>/home/u379646107/domains/libroswapcol.com/public_html/views/usuario/perfil.php</b> on line <b>150</b><br />\r\n', NULL, NULL, '', '', ''),
(42, 'Alejandro López ', 'javierlopezuni07@gmail.com', '$2y$10$3etHZ7c3XDxROg7whiPGbeoN.Jk/wHJxb/sJX5afIGjTV8CMkGqzS', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Alejandro López ', 'javierlopezuni08@gmail.com', '$2y$10$fmOAc9pJljIlY4K1FqZBs.DrV0F3QMUyM8kzeNm.wYYbIZCEZa5lm', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(46, 'Joaquín Cañon ', 'danielcf97@hotmail.com', '$2y$10$ZdPllXwfOrkdCErbEmXNrOxi3cbLkN2Rf1qrqu5rNl.g5XmxPx/bC', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Alex Sanchez Linares ', 'alexsanchezli.2005@gmail.com', '$2y$10$hyZNRrqx7aGEcBTukY2GCODzh2urbjPU2/ndgwLFaBqFsAz3Mazh6', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(48, 'Daian Rodríguez ', 'dainicks08@yahoo.com', '$2y$10$z8MuhtlZ2dyJ5.mSOH6fxu29BLF3KAI5YOVXsQeLnBvh8QgGrlQEi', 'usuario', NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
-- Indexes for table `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `compra_id` (`compra_id`),
  ADD KEY `libro_id` (`libro_id`);

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
-- Indexes for table `inventario_oficial`
--
ALTER TABLE `inventario_oficial`
  ADD PRIMARY KEY (`id`),
  ADD KEY `libro_id` (`libro_id`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indexes for table `libros_venta`
--
ALTER TABLE `libros_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT for table `comentarios_evento`
--
ALTER TABLE `comentarios_evento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `compras`
--
ALTER TABLE `compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `detalle_compras`
--
ALTER TABLE `detalle_compras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT for table `inventario_oficial`
--
ALTER TABLE `inventario_oficial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `libros_venta`
--
ALTER TABLE `libros_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `resenas`
--
ALTER TABLE `resenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

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
  ADD CONSTRAINT `compras_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `detalle_compras`
--
ALTER TABLE `detalle_compras`
  ADD CONSTRAINT `detalle_compras_ibfk_1` FOREIGN KEY (`compra_id`) REFERENCES `compras` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `intercambios`
--
ALTER TABLE `intercambios`
  ADD CONSTRAINT `intercambios_ibfk_1` FOREIGN KEY (`libro_id_1`) REFERENCES `libros_venta` (`id`),
  ADD CONSTRAINT `intercambios_ibfk_2` FOREIGN KEY (`libro_id_2`) REFERENCES `libros_venta` (`id`),
  ADD CONSTRAINT `intercambios_ibfk_3` FOREIGN KEY (`usuario_1`) REFERENCES `usuarios` (`id`),
  ADD CONSTRAINT `intercambios_ibfk_4` FOREIGN KEY (`usuario_2`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `inventario_oficial`
--
ALTER TABLE `inventario_oficial`
  ADD CONSTRAINT `inventario_oficial_ibfk_1` FOREIGN KEY (`libro_id`) REFERENCES `libros` (`id`);

--
-- Constraints for table `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Constraints for table `libros_venta`
--
ALTER TABLE `libros_venta`
  ADD CONSTRAINT `libros_venta_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
