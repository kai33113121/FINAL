-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 12, 2025 at 05:41 AM
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
(35, 21, 29, '2025-09-11 18:05:09');

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
(4, '¿García Márquez arruinó la literatura colombiana? El peso de la sombra del Nobel', 'Hablemos sin tapujos de algo que muchos piensan pero pocos se atreven a decir: ¿Gabriel García Márquez se convirtió en una carga para las nuevas generaciones de escritores colombianos?\r\nDesde que ganó el Nobel en 1982, parece que todo escritor colombiano debe ser comparado obligatoriamente con el maestro de Aracataca. Los editores internacionales buscan \"el nuevo García Márquez\", los críticos esperan realismo mágico en cada párrafo, y los lectores extranjeros se decepcionan cuando leen a un colombiano que no habla de mariposas amarillas o lluvia de cuatro años.\r\n¿Será que autores como Juan Gabriel Vásquez, Pilar Quintana, o Mario Mendoza han tenido que luchar contra el fantasma de Macondo para ser reconocidos por mérito propio? ¿O será que García Márquez abrió las puertas para que el mundo finalmente prestara atención a lo que siempre hemos sabido: que aquí se escribe literatura de primer nivel?\r\nPensemos en casos específicos: cuando Fernando Vallejo ganó el Rómulo Gallegos, muchos dijeron que era \"anti-García Márquez\" por su realismo crudo. Cuando Laura Restrepo escribe sobre violencia urbana, la critican por no tener la \"magia\" del maestro. ¿Es justo este eterno juego de comparaciones?\r\nY aquí va la pregunta que realmente duele: ¿cuántos escritores colombianos talentosos han sido ignorados porque no encajan en el molde del \"realismo mágico\"? ¿Cuántos han forzado elementos fantásticos en sus historias solo para ser tomados en serio internacionalmente?\r\nPor otro lado, ¿no será que estamos siendo malagradecidos? García Márquez puso a Colombia en el mapa literario mundial. Antes de \"Cien años de soledad\", ¿quién conocía a nuestros escritores fuera del continente? ¿No deberíamos estar eternamente agradecidos en lugar de quejarnos?\r\n¿Qué opinas? ¿García Márquez es una bendición o una maldición para la literatura colombiana actual?', '2025-09-11 19:33:23', 20, 1),
(5, 'Los bestsellers están matando la literatura: ¿Por qué 50 Sombras de Grey vende más que Borges?', 'Aquí va una verdad incómoda que necesitamos discutir: mientras Jorge Luis Borges, considerado uno de los escritores más brillantes del siglo XX, vendía miles de ejemplares, E.L. James vendió más de 125 millones de copias de \"50 Sombras de Grey\" en todo el mundo.\r\n¿Qué está pasando con el mundo? ¿Hemos perdido la capacidad de apreciar la verdadera literatura? ¿O será que los escritores \"serios\" se han vuelto tan pretenciosos y elitistas que han perdido la conexión con los lectores reales?\r\nPensemos en esto: Dan Brown, con \"El Código Da Vinci\", vendió más de 80 millones de copias. Mientras tanto, obras maestras como \"Pedro Páramo\" de Juan Rulfo o \"Rayuela\" de Cortázar apenas si llegan a unos pocos millones en décadas de existencia. ¿Es culpa del público \"inculto\" o es culpa de un sistema educativo que presenta la literatura clásica como una medicina amarga que hay que tragar?\r\nPero espera, aquí viene el plot twist: ¿y si los bestsellers realmente están cumpliendo una función importante? ¿Y si libros como \"Harry Potter\" están creando una generación de lectores que después pueden evolucionar hacia literatura más compleja? J.K. Rowling logró que millones de niños se emocionaran leyendo libros de 700 páginas. ¿Eso no merece respeto?\r\nY hablemos de los géneros \"menores\": ¿por qué una novela romántica se considera menos literatura que una novela experimental? ¿Por qué un thriller bien construido vale menos que una novela existencial aburrida? Stephen King ha vendido más de 350 millones de libros y ha creado obras que han definido la cultura popular. ¿No es eso también literatura válida?\r\nAquí está la pregunta que realmente incomoda: ¿será que nosotros, los \"amantes de la literatura seria\", somos unos snobs pretenciosos que despreciamos todo lo que le gusta a las masas? ¿O realmente existe una diferencia cualitativa objetiva entre \"literatura\" y \"entretenimiento\"?\r\n¿Y si el problema no son los bestsellers, sino que la educación literaria está fallando en mostrar por qué los clásicos siguen siendo relevantes?\r\n¿Tú qué piensas? ¿Los bestsellers son el enemigo de la buena literatura o son la puerta de entrada hacia ella?', '2025-09-11 19:34:02', 20, 1),
(6, '¿Existe realmente la \'literatura femenina\'? El machismo oculto en las estanterías', 'Vamos a tocar un tema que genera chispas: ¿por qué cuando una mujer escribe sobre relaciones y emociones es \"literatura femenina\", pero cuando lo hace un hombre es simplemente \"literatura\"?\r\nPensemos en esto: a Jane Austen la etiquetaron durante siglos como escritora de \"novelitas románticas para señoritas\", hasta que los críticos (la mayoría hombres) finalmente admitieron que era una genio de la sátira social. A Virginia Woolf la llamaban \"neurótica\" cuando exploraba la psicología humana, mientras que James Joyce era \"innovador\" por hacer lo mismo.\r\nY aquí en América Latina no estamos mejor: a Isabel Allende la critican por ser \"demasiado sentimental\" (¿acaso García Márquez no era sentimental?), a Laura Esquivel la encasillaron como \"escritora de cocina\" por \"Como agua para chocolate\", y a Gioconda Belli la reducen a \"poeta erótica\" ignorando su obra política.\r\nPero el machismo literario va más profundo. ¿Sabían que las librerías tienen secciones de \"literatura femenina\" pero no de \"literatura masculina\"? ¿Por qué los libros escritos por hombres se consideran \"universales\" y los escritos por mujeres son \"nicho\"?\r\nHablemos de números reales: las mujeres compran aproximadamente el 68% de todos los libros, pero solo el 32% de las reseñas en medios prestigiosos son sobre libros escritos por mujeres. ¿Coincidencia? Lo dudo.\r\nY aquí viene la pregunta incómoda: ¿cuántos hombres han leído \"Mujeres que corren con lobos\", \"Eat, Pray, Love\" o \"El cuento de la criada\" y los han descartado como \"cosas de mujeres\" sin siquiera darles una oportunidad? ¿Cuántas obras maestras nos estamos perdiendo por prejuicios de género?\r\nPero también hay que voltear la moneda: ¿será que realmente existe una sensibilidad femenina diferente en la escritura? ¿O es que las mujeres han tenido que desarrollar formas distintas de narrar porque históricamente han sido silenciadas?\r\nY aquí va la pregunta que más me intriga: ¿por qué cuando una mujer escribe ciencia ficción o thriller tiene que demostrar el doble que un hombre para ser tomada en serio, pero cuando escribe romance se le dice que \"se conformó con un género fácil\"?\r\n¿Qué opinan? ¿El mundo literario sigue siendo machista o ya hemos superado esas barreras?', '2025-09-11 19:34:28', 20, 1),
(7, 'Los clásicos están sobrevalorados: ¿Por qué seguimos leyendo libros de hace 200 años?', 'TEMAS DE DEBATE LITERARIO - ROMPE HIELOS\r\n1. LITERATURA COLOMBIANA - TEMA EXPLOSIVO\r\nTítulo: \"¿García Márquez arruinó la literatura colombiana? El peso de la sombra del Nobel\"\r\nDescripción:\r\nHablemos sin tapujos de algo que muchos piensan pero pocos se atreven a decir: ¿Gabriel García Márquez se convirtió en una carga para las nuevas generaciones de escritores colombianos?\r\nDesde que ganó el Nobel en 1982, parece que todo escritor colombiano debe ser comparado obligatoriamente con el maestro de Aracataca. Los editores internacionales buscan \"el nuevo García Márquez\", los críticos esperan realismo mágico en cada párrafo, y los lectores extranjeros se decepcionan cuando leen a un colombiano que no habla de mariposas amarillas o lluvia de cuatro años.\r\n¿Será que autores como Juan Gabriel Vásquez, Pilar Quintana, o Mario Mendoza han tenido que luchar contra el fantasma de Macondo para ser reconocidos por mérito propio? ¿O será que García Márquez abrió las puertas para que el mundo finalmente prestara atención a lo que siempre hemos sabido: que aquí se escribe literatura de primer nivel?\r\nPensemos en casos específicos: cuando Fernando Vallejo ganó el Rómulo Gallegos, muchos dijeron que era \"anti-García Márquez\" por su realismo crudo. Cuando Laura Restrepo escribe sobre violencia urbana, la critican por no tener la \"magia\" del maestro. ¿Es justo este eterno juego de comparaciones?\r\nY aquí va la pregunta que realmente duele: ¿cuántos escritores colombianos talentosos han sido ignorados porque no encajan en el molde del \"realismo mágico\"? ¿Cuántos han forzado elementos fantásticos en sus historias solo para ser tomados en serio internacionalmente?\r\nPor otro lado, ¿no será que estamos siendo malagradecidos? García Márquez puso a Colombia en el mapa literario mundial. Antes de \"Cien años de soledad\", ¿quién conocía a nuestros escritores fuera del continente? ¿No deberíamos estar eternamente agradecidos en lugar de quejarnos?\r\n¿Qué opinas? ¿García Márquez es una bendición o una maldición para la literatura colombiana actual?\r\n\r\n2. DEBATE INTERNACIONAL POLÉMICO\r\nTítulo: \"Los bestsellers están matando la literatura: ¿Por qué 50 Sombras de Grey vende más que Borges?\"\r\nDescripción:\r\nAquí va una verdad incómoda que necesitamos discutir: mientras Jorge Luis Borges, considerado uno de los escritores más brillantes del siglo XX, vendía miles de ejemplares, E.L. James vendió más de 125 millones de copias de \"50 Sombras de Grey\" en todo el mundo.\r\n¿Qué está pasando con el mundo? ¿Hemos perdido la capacidad de apreciar la verdadera literatura? ¿O será que los escritores \"serios\" se han vuelto tan pretenciosos y elitistas que han perdido la conexión con los lectores reales?\r\nPensemos en esto: Dan Brown, con \"El Código Da Vinci\", vendió más de 80 millones de copias. Mientras tanto, obras maestras como \"Pedro Páramo\" de Juan Rulfo o \"Rayuela\" de Cortázar apenas si llegan a unos pocos millones en décadas de existencia. ¿Es culpa del público \"inculto\" o es culpa de un sistema educativo que presenta la literatura clásica como una medicina amarga que hay que tragar?\r\nPero espera, aquí viene el plot twist: ¿y si los bestsellers realmente están cumpliendo una función importante? ¿Y si libros como \"Harry Potter\" están creando una generación de lectores que después pueden evolucionar hacia literatura más compleja? J.K. Rowling logró que millones de niños se emocionaran leyendo libros de 700 páginas. ¿Eso no merece respeto?\r\nY hablemos de los géneros \"menores\": ¿por qué una novela romántica se considera menos literatura que una novela experimental? ¿Por qué un thriller bien construido vale menos que una novela existencial aburrida? Stephen King ha vendido más de 350 millones de libros y ha creado obras que han definido la cultura popular. ¿No es eso también literatura válida?\r\nAquí está la pregunta que realmente incomoda: ¿será que nosotros, los \"amantes de la literatura seria\", somos unos snobs pretenciosos que despreciamos todo lo que le gusta a las masas? ¿O realmente existe una diferencia cualitativa objetiva entre \"literatura\" y \"entretenimiento\"?\r\n¿Y si el problema no son los bestsellers, sino que la educación literaria está fallando en mostrar por qué los clásicos siguen siendo relevantes?\r\n¿Tú qué piensas? ¿Los bestsellers son el enemigo de la buena literatura o son la puerta de entrada hacia ella?\r\n\r\n3. GÉNERO Y LITERATURA - TEMA CANDENTE\r\nTítulo: \"¿Existe realmente la \'literatura femenina\'? El machismo oculto en las estanterías\"\r\nDescripción:\r\nVamos a tocar un tema que genera chispas: ¿por qué cuando una mujer escribe sobre relaciones y emociones es \"literatura femenina\", pero cuando lo hace un hombre es simplemente \"literatura\"?\r\nPensemos en esto: a Jane Austen la etiquetaron durante siglos como escritora de \"novelitas románticas para señoritas\", hasta que los críticos (la mayoría hombres) finalmente admitieron que era una genio de la sátira social. A Virginia Woolf la llamaban \"neurótica\" cuando exploraba la psicología humana, mientras que James Joyce era \"innovador\" por hacer lo mismo.\r\nY aquí en América Latina no estamos mejor: a Isabel Allende la critican por ser \"demasiado sentimental\" (¿acaso García Márquez no era sentimental?), a Laura Esquivel la encasillaron como \"escritora de cocina\" por \"Como agua para chocolate\", y a Gioconda Belli la reducen a \"poeta erótica\" ignorando su obra política.\r\nPero el machismo literario va más profundo. ¿Sabían que las librerías tienen secciones de \"literatura femenina\" pero no de \"literatura masculina\"? ¿Por qué los libros escritos por hombres se consideran \"universales\" y los escritos por mujeres son \"nicho\"?\r\nHablemos de números reales: las mujeres compran aproximadamente el 68% de todos los libros, pero solo el 32% de las reseñas en medios prestigiosos son sobre libros escritos por mujeres. ¿Coincidencia? Lo dudo.\r\nY aquí viene la pregunta incómoda: ¿cuántos hombres han leído \"Mujeres que corren con lobos\", \"Eat, Pray, Love\" o \"El cuento de la criada\" y los han descartado como \"cosas de mujeres\" sin siquiera darles una oportunidad? ¿Cuántas obras maestras nos estamos perdiendo por prejuicios de género?\r\nPero también hay que voltear la moneda: ¿será que realmente existe una sensibilidad femenina diferente en la escritura? ¿O es que las mujeres han tenido que desarrollar formas distintas de narrar porque históricamente han sido silenciadas?\r\nY aquí va la pregunta que más me intriga: ¿por qué cuando una mujer escribe ciencia ficción o thriller tiene que demostrar el doble que un hombre para ser tomada en serio, pero cuando escribe romance se le dice que \"se conformó con un género fácil\"?\r\n¿Qué opinan? ¿El mundo literario sigue siendo machista o ya hemos superado esas barreras?\r\n\r\n4. LITERATURA CLÁSICA VS. CONTEMPORÁNEA\r\nTítulo: \"Los clásicos están sobrevalorados: ¿Por qué seguimos leyendo libros de hace 200 años?\"\r\nDescripción:\r\nAquí va una confesión que va a molestar a muchos: me parece absurdo que en pleno 2025 sigamos obligando a los estudiantes a leer \"Don Quijote\" o \"La Divina Comedia\" cuando hay escritores contemporáneos creando obras igual de brillantes pero infinitamente más relevantes para nuestra época.\r\n¿En serio creen que Cervantes tiene más que decirnos sobre la condición humana que Chimamanda Ngozi Adichie o Haruki Murakami? ¿Por qué Shakespeare sigue siendo \"obligatorio\" en las escuelas cuando tenemos dramaturgos actuales que abordan los mismos temas universales pero con lenguaje y contextos que realmente conectan con las nuevas generaciones?\r\nPensemos en esto objetivamente: \"Cien años de soledad\" se publicó en 1967 y ya se considera un \"clásico moderno\". Pero libros como \"Americanah\" de Adichie (2013) o \"La brevedad de la vida\" de Sara Mesa (2017) tratan temas de identidad, migración y alienación que son mil veces más relevantes para alguien de 20 años en 2025 que las aventuras de un hidalgo loco del siglo XVII.\r\nY no me malentiendan: no estoy diciendo que los clásicos sean malos. Estoy cuestionando esta veneración ciega que nos impide reconocer que tal vez, solo tal vez, algunos de esos libros se mantienen en el canon más por inercia académica que por mérito real.\r\n¿Cuántos de ustedes leyeron \"Madame Bovary\" en el colegio y lo odiaron, pero después leyeron \"Estrella distante\" de Roberto Bolaño y se enamoraron de la literatura? ¿Cuántos se aburrieron con \"Los Miserables\" pero se devoraron \"Los detectives salvajes\"?\r\nAquí va la pregunta realmente provocadora: ¿y si el problema no es que los jóvenes \"no saben leer literatura seria\", sino que les estamos dando libros que ya no hablan su idioma emocional?\r\nPero ojo, que aquí viene el contraargumento: ¿no será que precisamente por leer los clásicos podemos entender mejor la literatura contemporánea? ¿No será que esos libros \"viejos\" nos dan las herramientas para apreciar la innovación de los escritores actuales?\r\nY la pregunta final que los va a hacer pensar: si dentro de 200 años alguien dijera \"¿para qué leer a Bolaño o a Elena Poniatowska si ya tenemos escritores del siglo XXIII?\", ¿qué les responderían?\r\n¿Los clásicos merecen su estatus o es hora de refrescar el canon literario?', '2025-09-11 19:34:55', 20, 1),
(8, '¿BookTok está salvando o destruyendo la literatura? El debate que divide a los lectores', 'Admitámoslo: BookTok ha vendido más libros en 3 años que todos los suplementos culturales juntos en una década. Pero ¿a qué precio? ¿Estamos ante una revolución democrática de la lectura o ante la degradación definitiva del criterio literario?\r\nLos números son impresionantes: videos de 15 segundos sobre \"Culpa mía\" han generado millones de visualizaciones y han convertido a autores desconocidos en bestsellers internacionales. Mientras tanto, reseñas académicas de 3000 palabras sobre novelas galardonadas apenas consiguen 50 lecturas.\r\n¿Pero qué está pasando realmente? ¿BookTok está creando una generación de lectores superficiales que solo buscan romances tóxicos y finales felices, o está derribando las barreras elitistas que siempre han separado la \"buena literatura\" del público general?\r\nPensemos en casos concretos: \"Los siete maridos de Evelyn Hugo\" se volvió un fenómeno gracias a TikTok, y resulta que es una novela inteligente sobre fama, identidad sexual y manipulación mediática. \"El atlas de las nubes\" resurgió en ventas después de que BookTokers empezaran a recomendarlo. ¿No será que estos jóvenes tienen mejor criterio del que les damos crédito?\r\nPero también está el lado oscuro: la presión por crear contenido \"aesthetic\" está haciendo que los libros se evalúen más por su portada que por su contenido. Hay algoritmos que priorizan libros con covers \"bonitas\" y historias \"romantizables\". ¿Estamos reduciendo la literatura a mera decoración?\r\nY aquí viene lo que realmente me preocupa: ¿qué pasa cuando la velocidad de consumo de TikTok se aplica a la lectura? Estoy viendo reseñas de libros de 400 páginas hechas por personas que claramente solo leyeron las primeras 50. ¿Es eso reseñar o es postureo digital?\r\nPero ojo con ser muy críticos: ¿no será que nosotros, los lectores \"tradicionales\", estamos siendo prejuiciosos? Cuando yo tenía 15 años, leía a Paulo Coelho y lo consideraba el mejor escritor del mundo. ¿No será que BookTok es simplemente la puerta de entrada de esta generación?\r\nLa pregunta que realmente me mantiene despierto: si BookTok logra que un millón de adolescentes lean \"Crepúsculo\" y de ahí el 10% pasa a leer \"Drácula\", y de ese 10% el 1% termina leyendo \"Frankenstein\", ¿no habrá valido la pena?\r\n¿BookTok es el futuro de la promoción literaria o el apocalipsis de la cultura?', '2025-09-11 19:35:23', 20, 1),
(9, '¿Puede existir literatura apolítica? El falso mito de la neutralidad artística', 'Aquí va una verdad que incomoda a muchos: no existe tal cosa como literatura \"apolítica\". Cada libro que escribes, cada personaje que creas, cada historia que cuentas es una declaración política, te des cuenta o no.\r\nCuando J.K. Rowling dice que Dumbledore es gay pero no lo incluye explícitamente en los libros, esa es una decisión política. Cuando García Márquez escribe sobre dictadores latinoamericanos, obviamente es política. Pero cuando Jane Austen escribe sobre mujeres que necesitan casarse para sobrevivir económicamente, ¿por qué algunos dicen que \"no es política\"?\r\nLa literatura siempre ha sido política, desde \"La Ilíada\" (una historia sobre guerra e imperialismo) hasta \"1984\" (obvio). Pero hay un patrón sospechoso: cuando un escritor hombre, blanco, heterosexual escribe sobre \"temas universales\", se considera arte puro. Cuando una mujer, una persona racializada, o alguien LGBTI+ escribe sobre su experiencia, se considera \"literatura de agenda\".\r\nHablemos de casos concretos: ¿por qué \"El gran Gatsby\" se enseña como una obra maestra sobre el sueño americano, pero \"Beloved\" de Toni Morrison se ve como \"literatura sobre esclavitud\"? Ambas son profundamente políticas, pero solo una se etiqueta así.\r\nY en Colombia tenemos ejemplos clarísimos: cuando Fernando Vallejo critica la violencia y la corrupción, es \"literatura política\". Cuando García Márquez habla de la United Fruit Company en \"Cien años de soledad\", es \"realismo mágico\". ¿Doble estándar, no?\r\nPero aquí viene la pregunta incómoda: ¿será que los lectores usamos la etiqueta \"político\" para descartar libros que nos confrontan con realidades que no queremos enfrentar? Cuando alguien dice \"no me gusta la literatura política\", ¿realmente está diciendo \"no me gusta que me hagan pensar en problemas sociales\"?\r\nY del otro lado: ¿hay escritores que sacrifican calidad literaria por mensaje político? ¿Cuántas novelas \"comprometidas\" son aburridas porque el autor prioriza el sermón sobre la historia?\r\nLa pregunta que realmente me fascina: si todo es político, ¿por qué fingimos que no? ¿No sería más honesto admitir nuestros sesgos y hablar abiertamente de cómo la ideología influye en lo que leemos y cómo lo interpretamos?', '2025-09-11 19:35:53', 20, 1),
(10, '¿La literatura debe tomar posición o mantenerse \"neutral\"? ¿Existe realmente la neutralidad en el arte. asasasera', '¿La literatura debe tomar posición o mantenerse \"neutral\"? ¿Existe realmente la neutralidad en el arte?', '2025-09-11 21:08:38', 20, 0);

-- --------------------------------------------------------

--
-- Table structure for table `generos`
--

CREATE TABLE `generos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `generos`
--

INSERT INTO `generos` (`id`, `nombre`) VALUES
(1, 'Ficción'),
(2, 'Romance'),
(3, 'Ciencia'),
(4, 'Historia'),
(5, 'Fantasía');

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
(38, 35, 42, 21, 22, 'rechazado', '2025-09-11 18:53:22'),
(39, 31, 44, 21, 23, 'aceptado', '2025-09-11 18:54:48');

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
(29, 'El Señor de los Anillos: La Comunidad del Anillos', 'J.R.R. Tolkien', 'Fantasía', 'usado', 'La obra maestra que definió el género de fantasía épica moderna. Frodo Bolsón hereda un anillo mágico de su tío Bilbo, sin saber que es el Anillo Único forjado por el Señor Oscuro Sauron. Acompañado por el mago Gandalf y una comunidad de valientes compañeros, debe emprender un peligroso viaje para destruir el anillo y salvar la Tierra Media. Una épica aventura llena de magia, amistad, valor y la eterna lucha entre el bien y el mal que ha cautivado a generaciones de lectores.', NULL, NULL, NULL, NULL, 21),
(30, 'Harry Potter y la Piedra Filosofal', 'J.K. Rowling', 'Fantasía', 'nuevo', 'El libro que inició la saga más popular de la literatura juvenil moderna. Harry Potter descubre en su undécimo cumpleaños que es un mago y ha sido aceptado en Hogwarts, la escuela de magia más prestigiosa del mundo. Junto a sus nuevos amigos Ron y Hermione, debe enfrentar misterios, criaturas mágicas y descubrir la verdad sobre sus padres mientras alguien busca robar la legendaria Piedra Filosofal. Una historia mágica sobre amistad, valentía y el poder del amor.', '68c3543a50ada_Harry Potter y la piedra filosofal - Edición de Minalima _ Reseña Pekeleke.jpg', NULL, 'intercambio', 45.00, 21),
(31, '1984', 'George Orwell', 'Ciencia Ficción', 'nuevo', 'La distopía más influyente del siglo XX que predijo con escalofriante precisión aspectos de nuestra sociedad moderna. Winston Smith vive en un mundo totalitario donde el Gran Hermano lo vigila todo, la historia se reescribe constantemente y hasta los pensamientos están controlados. Cuando se enamora de Julia, ambos se rebelan contra el sistema en una lucha desesperada por la libertad y la humanidad. Una obra profética sobre vigilancia, manipulación de la información y la resistencia del espíritu humano.', NULL, NULL, NULL, NULL, 21),
(32, 'Dune', 'Frank Herbert', 'Ciencia Ficción', 'nuevo', 'La saga de ciencia ficción más vendida de todos los tiempos. En el planeta desértico Arrakis, única fuente de la especia melange, Paul Atreides debe navegar por una compleja red de política galáctica, religión y ecología para vengar a su familia y cumplir su destino como líder mesiánico. Una obra maestra que combina aventura épica con profundas reflexiones sobre poder, religión, ecología y evolución humana en un universo ricamente detallado.', NULL, NULL, NULL, NULL, 21),
(33, 'Orgullo y Prejuicio', 'Jane Austen', 'Romance', 'usado', 'La novela romántica más querida de la literatura inglesa. Elizabeth Bennet, una joven inteligente e independiente, debe superar sus prejuicios hacia el aparentemente arrogante Mr. Darcy, mientras él debe vencer su orgullo de clase. A través de malentendidos, revelaciones y crecimiento personal, ambos descubren que el verdadero amor requiere comprensión, respeto mutuo y la capacidad de cambiar. Una historia atemporal sobre el amor que trasciende las diferencias sociales.', NULL, NULL, NULL, NULL, 21),
(34, 'Me Before You', 'ojo Moyes', 'Romance', 'usado', 'Una historia de amor profundamente emotiva que cambió la vida de millones de lectores. Louisa Clark acepta un trabajo cuidando a Will Traynor, un joven adinerado que quedó tetrapléjico tras un accidente. Lo que comienza como una relación laboral se transforma en una conexión profunda que cambiará ambas vidas para siempre. Una novela que explora temas de discapacidad, dignidad, amor incondicional y la complejidad de las decisiones más difíciles de la vida.', NULL, NULL, NULL, NULL, 21),
(35, 'El Código Da Vinci', 'Dan Brown', 'Thriller', 'usado', 'El thriller internacional que mantuvo en vilo a millones de lectores. Cuando el conservador del Louvre es asesinado, el profesor Robert Langdon se ve envuelto en una conspiración milenaria que involucra símbolos secretos, sociedades clandestinas y uno de los mayores misterios de la historia cristiana. Junto a la criptógrafa Sophie Neveu, debe descifrar pistas dejadas por Leonardo Da Vinci mientras huye de fuerzas poderosas que harán cualquier cosa por proteger un secreto ancestral.', NULL, NULL, NULL, NULL, 21),
(36, 'Perdida', 'Gillian Flynn', 'Thriller', 'nuevo', 'Un thriller psicológico que redefine el concepto de matrimonio y confianza. Cuando Amy Dunne desaparece en su quinto aniversario de boda, todas las sospechas recaen sobre su esposo Nick. Pero nada es lo que parece en esta historia contada desde múltiples perspectivas que revela las capas más oscuras de una relación aparentemente perfecta. Una novela perturbadora que mantiene al lector adivinando hasta la última página sobre quién es realmente la víctima y quién el villano.', NULL, NULL, NULL, NULL, 21),
(37, 'El Asesinato de Roger Ackroyd', 'Agatha Christie', 'Misterio', 'nuevo', 'Considerada la obra maestra de la Reina del Crimen y una de las novelas de misterio más innovadoras jamás escritas. Cuando el adinerado Roger Ackroyd es encontrado muerto en su estudio, el detective belga Hércules Poirot emerge de su retiro para resolver el caso. Con un final que revolucionó el género del misterio, Christie demuestra una vez más su genio para crear tramas imposibles de predecir y personajes inolvidables en esta joya de la literatura detectivesca.', NULL, NULL, NULL, NULL, 21),
(38, 'Los Crímenes del Alfabeto', 'Agatha Christie', 'Misterio', 'nuevo', 'Hércules Poirot enfrenta uno de sus casos más desafiantes cuando un asesino en serie mata siguiendo el orden alfabético: Alice Ascher en Andover, Betty Barnard en Bexhill, Carmichael Clarke en Churston. Cada víctima es encontrada junto a una guía de ferrocarriles ABC, y el asesino envía cartas burlándose del detective. Una carrera contra el tiempo para detener a un criminal metódico antes de que complete su macabro alfabeto.', NULL, NULL, NULL, NULL, 22),
(39, 'Sapiens: De Animales a Dioses', 'Yuval Noah Harari', 'No Ficción', 'usado', 'Una fascinante exploración de la historia de la humanidad desde la aparición del Homo sapiens hasta nuestros días. Harari examina cómo nuestra especie logró dominar el mundo a través de tres revoluciones fundamentales: la cognitiva, la agrícola y la científica. Con un estilo accesible y provocativo, el autor desafía nuestras concepciones sobre progreso, felicidad y el futuro de nuestra especie en una obra que ha redefinido cómo entendemos nuestro lugar en el mundo.', NULL, NULL, NULL, NULL, 22),
(40, 'El Arte de la Guerra', 'Sun Tzu', 'No Ficción', 'usado', 'El tratado militar más influyente de la historia, escrito hace más de 2.500 años pero sorprendentemente relevante en el mundo moderno. Sun Tzu presenta estrategias y tácticas que van más allá del campo de batalla, aplicables a los negocios, la política y la vida cotidiana. Sus enseñanzas sobre liderazgo, planificación estratégica y psicología del conflicto han influido a generales, empresarios y líderes mundiales a lo largo de los siglos.', NULL, NULL, NULL, NULL, 22),
(41, 'Cien Años de Soledad', 'Gabriel García Márquez', 'Clásicos', 'usado', 'La obra cumbre del realismo mágico y una de las novelas más importantes del siglo XX. La saga de la familia Buendía en el mítico pueblo de Macondo, donde lo extraordinario y lo cotidiano se entrelazan en una narrativa que abarca siete generaciones. García Márquez teje una historia que es a la vez íntima y universal, explorando temas de soledad, amor, poder y el destino cíclico de América Latina con una prosa poética incomparable que le valió el Premio Nobel de Literatura.', NULL, NULL, NULL, NULL, 22),
(42, 'El Gran Gatsby', 'F. Scott Fitzgerald', 'Clásicos', 'usado', 'La novela definitiva sobre el sueño americano y la era del jazz. Narrada por Nick Carraway, cuenta la historia de Jay Gatsby, un misterioso millonario obsesionado con reconquistar a su amor perdido, Daisy Buchanan. Ambientada en los locos años veinte, la novela es una crítica brillante a la sociedad americana, explorando temas de clase, amor idealizado, corrupción moral y la imposibilidad de recuperar el pasado con una prosa elegante y memorable.', NULL, NULL, NULL, NULL, 22),
(43, 'Los Juegos del Hambre', 'Suzanne Collins', 'Juvenil', 'usado', ' La trilogía que definió la literatura juvenil distópica moderna. En un futuro post-apocalíptico, Katniss Everdeen se convierte en el símbolo de la rebelión cuando se ofrece como voluntaria para reemplazar a su hermana menor en los brutales Juegos del Hambre, donde 24 jóvenes luchan a muerte en una arena televisada. Una historia poderosa sobre supervivencia, sacrificio, amor y la lucha contra la opresión que resonó con toda una generación.', NULL, NULL, NULL, NULL, 22),
(44, 'Bajo la Misma Estrella', 'John Green', 'Juvenil', 'usado', 'Una historia de amor profundamente emotiva que redefinió la literatura juvenil contemporánea. Hazel Grace Lancaster, una adolescente con cáncer, conoce a Augustus Waters en un grupo de apoyo. Juntos emprenden un viaje extraordinario a Ámsterdam para conocer al autor de su libro favorito. Green combina humor, filosofía y emoción cruda en una novela que explora el amor, la mortalidad y el significado de la vida con una honestidad que ha tocado millones de corazones.', NULL, NULL, NULL, NULL, 23),
(45, 'La Isla del Tesoro', 'Robert Louis Stevenson', 'Aventura', 'usado', 'La novela de aventuras más emocionante jamás escrita y el arquetipo de todas las historias de piratas. El joven Jim Hawkins descubre un mapa del tesoro y se embarca en una expedición hacia una isla misteriosa, donde debe enfrentar a piratas traicioneros liderados por el carismático pero peligroso Long John Silver. Una historia atemporal de valor, traición, amistad y la búsqueda del tesoro más famoso de la literatura que ha inspirado innumerables adaptaciones.', NULL, NULL, NULL, NULL, 23),
(46, 'Las Aventuras de Tom Sawyer', 'Mark Twain', 'Aventura', 'usado', ' Las travesuras del muchacho más famoso de la literatura americana en el pintoresco pueblo de St. Petersburg, a orillas del río Mississippi. Tom Sawyer, con su ingenio y espíritu aventurero, junto a su mejor amigo Huckleberry Finn, vive aventuras que incluyen presenciar un asesinato, buscar tesoros piratas y asistir a su propio funeral. Una celebración nostálgica de la infancia y la inocencia americana que captura perfectamente el espíritu de una época.', NULL, NULL, NULL, NULL, 23),
(47, 'El Alquimista', 'Paulo Coelho', 'Otro', 'usado', 'Una fábula inspiradora sobre seguir nuestros sueños que se ha convertido en uno de los libros más vendidos de todos los tiempos. Santiago, un joven pastor andaluz, emprende un viaje desde España hasta las pirámides de Egipto en busca de un tesoro, pero descubre que el verdadero tesoro está en el camino mismo y en escuchar a su corazón. Una novela llena de sabiduría sobre destino, propósito de vida y la importancia de perseguir nuestras leyendas personales.', NULL, NULL, NULL, NULL, 23),
(48, 'El Monje que Vendió su Ferrari', 'Robin Sharma', 'Otro', 'nuevo', 'Una fábula transformadora sobre liderazgo personal y desarrollo espiritual. Julian Mantle, un exitoso abogado al borde del colapso, abandona su lujosa vida para buscar la iluminación en los Himalayas. Al regresar, comparte con su ex-colega las lecciones de sabiduría antigua que aprendió de los sabios de Sivana, ofreciendo herramientas prácticas para vivir una vida más plena, equilibrada y significativa en el mundo moderno.', NULL, NULL, NULL, NULL, 23),
(49, 'Juego de Tronos', 'George R.R. Martin', 'Fantasía', 'nuevo', 'La saga épica que revolucionó la fantasía moderna con su realismo político y complejidad moral. En los Siete Reinos de Westeros, múltiples casas nobles luchan por el Trono de Hierro mientras una antigua amenaza despierta en el Norte. Martin teje una narrativa donde nadie está a salvo y las decisiones tienen consecuencias devastadoras, creando un mundo donde la política, la guerra y la magia se entrelazan en una historia adictiva.', NULL, NULL, NULL, NULL, 24),
(50, 'Las Crónicas de Narnia: El León, la Bruja y el Ropero', 'C.S. Lewis', 'Fantasía', 'usado', 'El clásico portal de fantasía que ha encantado a generaciones. Cuatro hermanos descubren un mundo mágico dentro de un armario donde reina una bruja malvada que ha sumido Narnia en un invierno eterno. Con la ayuda del noble león Aslan, deben cumplir una antigua profecía y restaurar la paz al reino. Una alegoría rica en simbolismo que combina aventura, magia y profundas lecciones sobre valor, sacrificio y redención.', NULL, NULL, NULL, NULL, 24),
(51, 'Fundación', 'Isaac Asimov', 'Ciencia Ficción', 'usado', 'La obra maestra de Asimov que estableció las bases de la ciencia ficción moderna. Hari Seldon, creador de la psicohistoria, predice la caída del Imperio Galáctico y establece dos Fundaciones para preservar el conocimiento humano y reducir la era oscura venidera. Una saga que explora temas de historia cíclica, predicción del futuro y la evolución de la civilización a través de milenios, combinando ciencia rigurosa con narrativa épica.', NULL, NULL, NULL, NULL, 24),
(52, 'Fahrenheit 451', 'Ray Bradbury', 'Ciencia Ficción', 'nuevo', 'Una distopía visionaria sobre censura y el poder de los libros. Guy Montag es un bombero cuyo trabajo es quemar libros en una sociedad donde la lectura está prohibida y el entretenimiento superficial domina. Cuando conoce a Clarisse, una joven que cuestiona el mundo, Montag comienza a dudar de su misión y descubre el valor transformador de la literatura. Una advertencia profética sobre la manipulación mediática y la importancia del pensamiento crítico.', NULL, NULL, NULL, NULL, 24),
(53, 'Romeo y Julieta', 'William Shakespeare', 'Romance', 'nuevo', 'La tragedia romántica más famosa de todos los tiempos. En Verona, dos jóvenes de familias enemigas se enamoran perdidamente, desafiando el odio ancestral que separa a los Montesco y los Capuleto. Su amor prohibido los lleva a casarse en secreto, pero una serie de malentendidos trágicos culmina en el sacrificio final que reconcilia a las familias rivales. Una obra atemporal sobre la pasión, el destino y el precio del amor verdadero.', NULL, NULL, NULL, NULL, 24),
(54, 'La Chica del Tren', 'Paula Hawkins', 'Thriller', 'nuevo', 'Un thriller psicológico adictivo contado desde tres perspectivas femeninas. Rachel, una divorciada alcoholizada, observa diariamente desde el tren a una pareja aparentemente perfecta hasta que presencia algo que la convierte en parte de un misterio más grande de lo que imaginaba. Cuando la mujer desaparece, Rachel se ve envuelta en una investigación que revelará secretos perturbadores sobre mentiras, obsesiones y la fragilidad de la memoria.', NULL, NULL, NULL, NULL, 24);

-- --------------------------------------------------------

--
-- Table structure for table `libros_catalogo`
--

CREATE TABLE `libros_catalogo` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) DEFAULT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `estado` enum('nuevo','usado') DEFAULT 'nuevo',
  `genero` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `libros_venta`
--

CREATE TABLE `libros_venta` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `fecha_publicacion` datetime DEFAULT current_timestamp(),
  `estado` enum('nuevo','usado') NOT NULL DEFAULT 'nuevo',
  `id_genero` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
(13, 22, 21, 'Hola, Muy buenas tardes, ¿Disculpa, aun tienes disponible el libro de la comunidad del anillo?\r\nme parece un libro excelente y me gustaria saber por que te gusto, ademas de comprarlo, ya que siento que es un excelente libro para una tarde soleada.\r\nEspero tu pronta respuesta, Gracias.', '2025-09-11 19:06:48', 0);

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
(41, 22, '🔄 Has recibido una solicitud de intercambio por tu libro \"El Gran Gatsby\".', 'index.php?c=IntercambioController&a=notificaciones', 38, 'info', '2025-09-11 18:53:22', 1),
(42, 21, 'Tu solicitud de intercambio ha sido rechazada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-11 18:54:02', 0),
(43, 21, 'Tu solicitud de intercambio ha sido rechazada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-11 18:54:07', 1),
(44, 23, '🔄 Has recibido una solicitud de intercambio por tu libro \"Bajo la Misma Estrella\".', 'index.php?c=IntercambioController&a=notificaciones', 39, 'info', '2025-09-11 18:54:48', 1),
(45, 21, 'Tu solicitud de intercambio ha sido aceptada.', 'index.php?c=IntercambioController&a=misIntercambios', NULL, 'info', '2025-09-11 18:55:29', 1);

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
(9, 29, 21, 5, 'OBRA MAESTRA ABSOLUTA\r\nTolkien no solo creó una novela; fundó un género completo. Su construcción lingüística es impecable: inventó idiomas completos con gramática y etimología coherentes. La profundidad mitológica rivaliza con las grandes epopeyas clásicas, mientras que su prosa conserva una elegancia que nunca cae en lo pretencioso. Críticos han señalado el ritmo ocasionalmente lento, pero esto es precisamente lo que permite la inmersión total en la Tierra Media. Una obra que establece el estándar dorado de la fantasía épica.', '2025-09-11 19:01:53'),
(10, 32, 21, 4, 'COMPLEJIDAD NARRATIVA EXTRAORDINARIA.\r\nHerbert construye el universo de ciencia ficción más detallado y coherente jamás creado. La integración de política, ecología, religión y evolución humana es magistral. Su prosa puede ser densa, pero cada elemento sirve a la construcción del mundo. Las secuelas decaen, pero este primer volumen mantiene un equilibrio perfecto entre acción y filosofía. Una obra que eleva la ciencia ficción al nivel de la gran literatura', '2025-09-11 19:02:33'),
(11, 52, 21, 5, 'METÁFORA CULTURAL PODEROSA.\r\nBradbury crea una metáfora potente sobre censura y anti-intelectualismo que resulta proféticamente relevante en la era digital. Su prosa poética contrasta efectivamente con la frialdad del mundo que describe. Algunas explicaciones del sistema resultan simplificadas, pero esto sirve al propósito alegórico. Una obra que funciona mejor como advertencia cultural que como ciencia ficción hard, pero igualmente valiosa.', '2025-09-11 19:03:17'),
(12, 32, 22, 3, 'perfecto entre acción y filosofía. Una obra que eleva la ciencia ficción al nivel de la gran literatura', '2025-09-11 19:04:37');

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
(20, 'Angel David Vanegas Bulla', 'angelvanegas944@gmail.com', '$2y$10$ta6C5cu8b.eqT/aR1OaD3uyP0to0b/EPXvqCML7Dc3WzQwcjYwEkS', 'admin', '68c37134069ad_client9.jpg', 'Estudiante Tecnologo del SENA.\r\nADSO', NULL, NULL),
(21, 'Cristian Giovanny Salgado Vaquez', 'giovannyv292@gmail.com', '$2y$10$sOHQ0Aje0NxoH6WQ/TMhkOm0wS3CpJLguzx71p/MDRs1K/TJQzeSS', 'usuario', '68c35d873788d_client5.jpg', 'Estudiante SENA, ADSO', NULL, NULL),
(22, 'Ana Elizabeth Carreño', 'aelixabeth201@gmail.com', '$2y$10$U8XfcxcDZRVHE/bQ9g1RXe2gI/4.x.CXeB44Qs35UkGBaAAPX0OcC', 'usuario', '68c35ac35e1ab_client3.jpg', 'Estudiante del SENA', NULL, NULL),
(23, 'Jair Santiago Guerra Alarcon', 'jguerra9806@gmail.com', '$2y$10$HYy0ziLNMREQjYJwnLA3leJJ68uliHM8e.M51/xe/lFKFt7El3/3a', 'usuario', '68c35d3ea85ff_client7.jpg', 'Estudiante SENA', NULL, NULL),
(24, 'Libros Wap Usuario', 'libroswapgroup@gmail.com', '$2y$10$LPX03EXqHCGrFwWfFGYBiuAxBaVX9fxEude7jMHoyhOG4R59Q6Vpy', 'usuario', NULL, NULL, NULL, NULL);

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
-- Indexes for table `generos`
--
ALTER TABLE `generos`
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
-- Indexes for table `libros_catalogo`
--
ALTER TABLE `libros_catalogo`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `config_usuario`
--
ALTER TABLE `config_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `generos`
--
ALTER TABLE `generos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `intercambios`
--
ALTER TABLE `intercambios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `libros_catalogo`
--
ALTER TABLE `libros_catalogo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `libros_venta`
--
ALTER TABLE `libros_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `resenas`
--
ALTER TABLE `resenas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

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
