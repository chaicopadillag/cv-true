-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 20-10-2020 a las 13:25:38
-- Versión del servidor: 10.5.5-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cv-true`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cvs`
--

CREATE TABLE `cvs` (
  `id_cv` int(11) NOT NULL,
  `url` text NOT NULL,
  `nombre` text NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cvs`
--

INSERT INTO `cvs` (`id_cv`, `url`, `nombre`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'cv-card', 'CV Card', 1, '2020-08-07 11:59:44', '0000-00-00 00:00:00'),
(2, 'cv-material', 'CV Material Desing', 1, '2020-08-14 11:56:44', '0000-00-00 00:00:00'),
(3, 'cv-moderno', 'CV Moderno', 1, '2020-08-14 12:01:53', '0000-00-00 00:00:00'),
(4, 'cv-dark', 'CV Dark', 1, '2020-08-14 11:58:08', '0000-00-00 00:00:00'),
(5, 'cv-clasica', 'CV Clásica', 1, '2020-08-14 11:58:08', '0000-00-00 00:00:00'),
(6, 'cv-gray', 'CV Gray', 1, '2020-08-14 11:58:23', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudios`
--

CREATE TABLE `estudios` (
  `id_estudio` int(11) NOT NULL,
  `universidad` text NOT NULL,
  `especialidad` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `estudios`
--

INSERT INTO `estudios` (`id_estudio`, `universidad`, `especialidad`, `fecha_inicio`, `fecha_fin`, `descripcion`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
(5, 'Udemy', 'Diseño Gráfico', '2018-01-08', '2018-12-29', 'Tenetur alias aut laboriosam dolores consectetur vero quia harum mollitia, quidem autem ut perferendis corporis tempora officia ab quod iusto, eos at voluptatum minima dicta voluptatem.', 3, 1, '2020-08-14 00:42:36', '2020-08-14 00:42:36'),
(6, 'EDteam', 'UI Desing', '2018-04-16', '2018-12-03', 'Soluta voluptatum iste, delectus fugit veniam blanditiis voluptas illo? Accusantium, nisi, pariatur. Consequatur vero similique libero nemo distinctio quam voluptatibus sint id odit impedit, odio expedita consequuntur laboriosam ea ex dignissimos doloremque repudiandae sed deserunt illum.', 3, 1, '2020-08-14 00:44:24', '2020-08-14 00:44:24'),
(7, 'Platzy', 'Desarrollo Web', '2018-01-08', '2018-12-29', 'Sed ducimus facere, cupiditate earum eaque possimus molestias natus iusto fuga dolores? Obcaecati quod laborum cupiditate sapiente fugiat facere ad delectus dignissimos, architecto ab eveniet esse voluptates totam voluptatibus quo pariatur quam blanditiis.', 3, 1, '2020-08-14 00:48:20', '2020-08-15 00:20:13'),
(8, 'Ejercito del Perú', 'Servicio Militar', '2012-01-01', '2013-12-31', 'Servicio Militar Voluntario en el Glorioso Ejercito Peruano - Perteneciente al Batallón de Comunicaciones Abasto y Manto Nº 511 (BCOM-511). Dado de alta 01/01/2012 (Promoción enero 2012). Especialidad - \"Ayudante Operador de Comunicaciones\". Destacado dos veces al Centro de Municiones del Ejército (CEMUNE). Dado de baja 31/12/2013 con el grado de Sgto 2° SMV, con certificado de conducta - \"Muy Buena Conducta\", tiempo de servicio dos años completo.', 7, 1, '2020-10-18 12:42:48', '2020-10-18 12:42:48'),
(9, 'CIBERTEC', 'Computación e Informática', '2014-03-10', '2016-12-24', 'Fundamentos de programación desde cero con C#. Uso de Variables, estructuras de control, bucles, funciones condicionales y funciones. Programación en N capas y conexión a SQL Server.\r\nCreación Sitios Web Increíbles y Dinámicos con PHP y bases de datos en MYSQL. Programación Orientada a Objetos. Crear Bases de Datos en MySQL.\r\nDominar los fundamentos de Java, conexión a base de datos, hasta la creación de aplicaciones Web con Servlets, JPS\'s, HTML, CSS y JavaScript, incluyendo HTML5 y CSS3.', 7, 1, '2020-10-18 12:44:02', '2020-10-18 12:44:02'),
(10, 'TELESUP', 'Ingeniería de Sistemas e Informática', '2018-03-12', '2020-10-18', 'Fundamentos de Algoritmos. Fundamentos de Programación.\r\nEstructura de Base de Datos. Técnicas de Programación Orientadas a Objetos.\r\nBase de Datos Relacionales. Análisis de Algoritmos y estrategias de programación.\r\nModelamiento y Análisis de Software. Diseño y Arquitectura de Software. Desarrollado de Aplicaciones móviles y web con PHP, Java, C# y JavaScript.', 7, 1, '2020-10-18 12:44:46', '2020-10-18 12:44:46'),
(11, 'Udemy', 'Master en PHP 7+', '2020-07-01', '2020-10-10', 'Programación Orientada a Objetos (POO).\r\nEjecutar el patrón Modelo-Vista-Controlador (MVC).\r\nBases de datos Relacionales con MySQL y conexión a las bases de datos con protección PDO (PHP DATA OBJECT).\r\nEjecutar un CRUD (Create – Read – Update - Delete) con MVC-POO para administrar cualquier información en Base de datos.\r\nSeguridad Informática: Prevenir ataques XSS (Cross-Site Scripting), ataques CSFR (Cross-Site Request Forgeries), SQL Injection, Code Injection, Brute Force Robots, encriptación de contraseñas.\r\nAJAX: Procesos Asíncronos con el Servidor usando Javascript (jQuery) y PHP.', 7, 1, '2020-10-18 12:45:46', '2020-10-18 12:45:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias`
--

CREATE TABLE `experiencias` (
  `id_experiencia` int(11) NOT NULL,
  `empresa` text NOT NULL,
  `cargo` text NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `descripcion` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `experiencias`
--

INSERT INTO `experiencias` (`id_experiencia`, `empresa`, `cargo`, `fecha_inicio`, `fecha_fin`, `descripcion`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
(4, 'Coorporatión UI & UX Desing', 'Diseñadora UI', '2019-04-01', '2019-11-01', 'Voluptatibus exercitationem doloribus iste neque deserunt sequi ex pariatur voluptatem recusandae quas harum odit, error quos velit perspiciatis, architecto distinctio omnis! Necessitatibus, maiores, dolorum. In quam mollitia vero aliquam modi cumque eius, officiis porro, fuga reiciendis recusandae voluptas eligendi nesciunt ducimus molestiae dolore facere odit libero tempore fugiat quod unde illum exercitationem error commodi.', 3, 1, '2020-08-14 00:50:56', '2020-08-14 00:51:32'),
(5, 'Soft Tech Page', 'Desarrollador Web Jr', '2019-11-04', '2020-08-13', 'Quasi, tempore, facere alias autem blanditiis asperiores molestiae nam saepe, explicabo laborum aspernatur? Ab similique iure quisquam fugit rerum itaque blanditiis est sapiente, voluptatem, enim reprehenderit, ratione consequuntur explicabo exercitationem aspernatur quibusdam.', 3, 1, '2020-08-14 00:53:17', '2020-08-14 00:53:17'),
(6, 'Freelance', 'Desarrollador Freelance', '2015-02-02', '2016-12-30', 'Desarrollo de proyectos como sistemas, aplicaciones y sitios web modernos, adaptables a todo tipo de dispositivos desde móvil, tablet, laptop y escritorio, bien interactivas, intuitivas, amigables y fácil de uso para el usuario. Sistemas desarrollados - \"Sistema de Planilla, Sistema de Taller Mecánica, Sistema de Reclutamiento del Personal en Web, entre otros\".', 7, 1, '2020-10-18 12:46:51', '2020-10-18 17:56:53'),
(7, 'HALEMA S.A.C', 'Programador', '2017-02-01', '2019-03-23', 'Programador en el desarrollo de sistema ventas de la empresa con Power Builder como mantenimiento de tablas maestras, reportes y soporte remoto al usuario; Gestión de Base de Datos en PostgreSql mediante PgAdmin (Consultas, Funciones, Reportes, Actualización de datos, etc.)', 7, 1, '2020-10-18 12:47:35', '2020-10-18 17:57:06'),
(8, 'Freelance', 'Desarrollador Freelance', '2015-02-02', '2020-10-18', 'Desarrollo de sitios webs de Media News con WordPress, posicionamiento web - SEO, Social Media Manager, aplicaciones webs adaptables a todo tipo de dispositivos desde móvil, tablet, laptop y escritorio, bien interactivas, intuitivas, amigables y fácil de uso para el usuario.', 7, 1, '2020-10-18 12:48:18', '2020-10-18 17:57:39');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `habilidades`
--

CREATE TABLE `habilidades` (
  `id_habilidad` int(11) NOT NULL,
  `habilidad` text NOT NULL,
  `nivel` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `habilidades`
--

INSERT INTO `habilidades` (`id_habilidad`, `habilidad`, `nivel`, `descripcion`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
(4, 'SASS', 61, 'Ipsam vel, molestias accusantium harum nesciunt provident minus aspernatur odio id excepturi, libero cum atque aliquid aperiam.', 3, 1, '2020-08-14 00:56:20', '2020-08-14 00:56:20'),
(5, 'Office Excell', 85, 'Velit earum libero sequi quo rem quisquam similique, obcaecati enim aliquid at placeat soluta facilis nam officia omnis itaque voluptate asperiores delectus illo quidem unde.', 3, 1, '2020-08-14 01:02:00', '2020-08-14 01:02:00'),
(6, 'Corel Drawn', 47, 'Amet, architecto, ad! Voluptatem fuga debitis suscipit animi assumenda ipsa amet consequatur numquam, velit, ipsum nulla necessitatibus placeat officia!', 3, 1, '2020-08-14 01:02:38', '2020-08-14 01:02:38'),
(7, 'CSS3', 93, 'Doloribus inventore asperiores quam voluptatibus, consequatur velit, illo, officia veritatis necessitatibus soluta nisi, dignissimos hic ullam facere deserunt magni.', 3, 1, '2020-08-14 01:03:09', '2020-08-14 01:03:09'),
(8, 'HTML5', 81, 'Ducimus doloribus distinctio? Mollitia perferendis eligendi facere, aut a cumque optio nobis tempore explicabo tempora ea laborum ab reiciendis', 3, 1, '2020-08-14 01:03:41', '2020-08-14 01:03:41'),
(9, 'PHP Laravel', 64, 'Lusto fugiat impedit quis molestiae, earum in cum ex minima dicta eligendi reiciendis, enim officia nisi. Consequatur deserunt est commodi ratione, iusto hic.', 3, 1, '2020-08-14 01:04:59', '2020-08-14 01:04:59'),
(10, 'Bootstrap 5', 48, 'Accusamus, blanditiis, voluptatem! Repellat nemo officiis perferendis hic placeat illum, quia eos cumque, praesentium deleniti.', 3, 1, '2020-08-14 01:24:01', '2020-08-14 01:24:01'),
(11, 'Vue', 62, 'Consequatur expedita est, fuga ex error. Asperiores omnis et cupiditate quis aut reprehenderit sint dolore laborum? Animi nostrum commodi quia dolorem sunt', 3, 1, '2020-08-14 01:24:37', '2020-08-14 01:24:37'),
(12, 'Angular', 43, 'Soluta nam fugit vero ipsum, aliquam qui labore aperiam est ut, nemo incidunt voluptates quia atque aut nesciunt ex delectus magni quisquam quasi.', 3, 1, '2020-08-14 01:25:01', '2020-08-14 01:25:01'),
(13, 'Javascript', 44, 'Alias quis ea similique quia nam est, vitae ad ipsam consequuntur in neque id possimus nostrum aliquam eaque totam laboriosam, tempora accusantium natus.', 3, 1, '2020-08-14 01:27:39', '2020-08-14 01:27:39'),
(14, 'PHP (Laravel 7.x + API RESTful)', 90, 'Desarrollo de aplicaciones web con lenguaje de PHP (Framework Laravel y CodeIgniter) y API RESTful', 7, 1, '2020-10-18 12:49:16', '2020-10-18 14:17:04'),
(15, 'JavaScript', 70, 'Nivel avanzado', 7, 1, '2020-10-18 12:49:59', '2020-10-18 14:16:37'),
(16, 'C# csharp', 60, 'Nivel avanzado', 7, 1, '2020-10-18 12:52:04', '2020-10-18 14:16:03'),
(17, 'Java', 40, 'Nivel intermedio', 7, 1, '2020-10-18 12:52:36', '2020-10-18 14:15:38'),
(18, 'MySql', 40, 'Administración de Base de Datos', 7, 1, '2020-10-18 12:53:07', '2020-10-18 14:15:16'),
(19, 'HTML5', 98, 'Nivel avanzado', 7, 1, '2020-10-18 12:54:13', '2020-10-18 14:15:03'),
(20, 'Python', 10, 'Nivel básico', 7, 1, '2020-10-18 12:54:39', '2020-10-18 14:14:46'),
(21, 'CSS3', 90, 'Nivel avanzado', 7, 1, '2020-10-18 12:55:30', '2020-10-18 14:14:24'),
(22, 'Git', 40, 'Nivel intermedio', 7, 1, '2020-10-18 12:55:52', '2020-10-18 14:13:52'),
(23, 'WordPress', 90, 'Nivel avanzado', 7, 1, '2020-10-18 12:56:44', '2020-10-18 14:13:39'),
(24, 'Android (Java)', 20, 'Nivel básico', 7, 1, '2020-10-18 12:57:21', '2020-10-18 14:13:02'),
(25, 'SEO', 50, 'Nivel intermedio', 7, 1, '2020-10-18 12:57:47', '2020-10-18 14:12:47'),
(26, 'Social Media Manager', 30, 'Nivel intermedio', 7, 1, '2020-10-18 12:58:13', '2020-10-18 14:12:35'),
(27, 'Firebase', 20, 'Nivel básico', 7, 1, '2020-10-18 12:58:43', '2020-10-18 14:12:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `id_proyecto` int(11) NOT NULL,
  `titulo` text NOT NULL,
  `foto` text NOT NULL,
  `url` text NOT NULL,
  `descripcion` text NOT NULL,
  `fecha` date NOT NULL,
  `lugar` text NOT NULL,
  `id_user` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`id_proyecto`, `titulo`, `foto`, `url`, `descripcion`, `fecha`, `lugar`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
(5, 'UI Desing Web Portal', 'img/proyectos/proyecto713.jpeg', 'http://localhost.com/cv-true', 'Error labore modi saepe explicabo fuga corrupti nulla earum dolorum reprehenderit soluta necessitatibus commodi aspernatur dolores itaque ad eius quo amet accusantium, aperiam impedit assumenda natus.', '2019-05-25', 'Lima', 3, 1, '2020-08-14 01:07:52', '2020-08-14 01:07:52'),
(6, 'Mockup de Tarjeta', 'img/proyectos/proyecto88.jpeg', 'https://www.cv-true.com', 'Illum sint est fugit temporibus! Quia tempora minima provident corporis error autem quaerat magni reiciendis esse, nesciunt voluptatem, ex sint in!.', '2020-03-02', 'Lima', 3, 1, '2020-08-14 01:09:02', '2020-08-14 01:09:02'),
(7, 'Diseño de Logo', 'img/proyectos/proyecto19.jpeg', 'https://logo.com', 'Lure, recusandae dolores doloremque illum voluptatum, voluptate earum fugit quos reprehenderit quas deleniti, quibusdam cumque, iste possimus id aperiam.', '2020-05-08', 'Lima', 3, 1, '2020-08-14 01:10:19', '2020-08-14 01:14:21'),
(8, 'System Now', 'img/proyectos/proyecto416.jpeg', 'https://system-now.com', 'Doloribus inventore asperiores quam voluptatibus, consequatur velit, illo, officia veritatis necessitatibus soluta nisi,nam perferendis eum labore.', '2020-04-24', 'Lima', 3, 1, '2020-08-14 01:13:13', '2020-08-14 01:13:13'),
(9, 'Portal News Tomorrowland Latino', 'img/proyectos/proyecto1065.jpeg', 'https://tomorrowlandlatino.com/', 'Medio de comunicación, news music electronic', '2020-10-18', 'Lima', 7, 1, '2020-10-18 14:04:21', '2020-10-18 14:04:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `redes_sociales`
--

CREATE TABLE `redes_sociales` (
  `id_red_social` int(11) NOT NULL,
  `pagina_web` text DEFAULT NULL,
  `github` text DEFAULT NULL,
  `linkedin` text DEFAULT NULL,
  `facebook` text DEFAULT NULL,
  `instagram` text DEFAULT NULL,
  `twitter` text DEFAULT NULL,
  `tumblr` text DEFAULT NULL,
  `pinterest` text DEFAULT NULL,
  `spotify` text DEFAULT NULL,
  `tiktok` text DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `redes_sociales`
--

INSERT INTO `redes_sociales` (`id_red_social`, `pagina_web`, `github`, `linkedin`, `facebook`, `instagram`, `twitter`, `tumblr`, `pinterest`, `spotify`, `tiktok`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
(2, 'https://cv-true.com/lorem', '', 'https://linkedin.com/user/lorem', 'https://facebook.com/lorem', 'https://instagram.com/lorem', 'https://twitter.com/lorem', 'https://tumblr.com/', 'https://pinterest.com/lorem', 'https://spotify.com/lorem', NULL, 3, 1, '2020-08-14 01:19:40', '2020-08-14 23:43:02'),
(5, 'https://chaicopadillag.github.io', 'https://github.com/codecodero', 'https://www.linkedin.com/in/chaicopadillag', 'https://www.facebook.com/chaicopadillag', 'https://www.instagram.com/chaicopadillag', 'https://twitter.com/chaicopadillag', NULL, NULL, NULL, NULL, 7, 1, '2020-10-18 13:55:51', '2020-10-18 15:28:17');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1,
  `modulos` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `estado`, `modulos`) VALUES
(1, 'admin', 1, 'todos'),
(2, 'user', 1, 'modulos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `softwares`
--

CREATE TABLE `softwares` (
  `id_software` int(11) NOT NULL,
  `softwares` text NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `softwares`
--

INSERT INTO `softwares` (`id_software`, `softwares`, `id_user`, `estado`, `created_at`, `updated_at`) VALUES
(2, '[\"Excell\",\"Photoshop\",\"Visual Studio Code\",\"Illustraitor\",\"Figma\",\"Sublime Text\",\"Corel Draw\"]', 3, 1, '2020-08-14 06:22:51', '2020-08-14 06:22:51'),
(3, '[\"VS Code\",\"Postman\",\"Netbeans\",\"Android Studio\",\"Adobe XD\",\"Visual Studio\",\"MySQL Workbench\",\"GitHub Desktop\"]', 7, 1, '2020-10-18 18:57:56', '2020-10-18 18:57:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `apellidos` text DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `direccion` text DEFAULT NULL,
  `telefono` char(20) DEFAULT NULL,
  `especialidad` text DEFAULT NULL,
  `ciudad` text DEFAULT NULL,
  `pais` text DEFAULT NULL,
  `edad` int(11) DEFAULT NULL,
  `estado_civil` text DEFAULT NULL,
  `foto` text DEFAULT NULL,
  `genero` tinyint(1) NOT NULL DEFAULT 1,
  `rol` int(11) DEFAULT 2,
  `frase` text DEFAULT NULL,
  `resumen` text DEFAULT NULL,
  `url_usuario` text DEFAULT NULL,
  `public` tinyint(1) NOT NULL DEFAULT 0,
  `id_cv` int(11) NOT NULL DEFAULT 2,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `apellidos`, `password`, `direccion`, `telefono`, `especialidad`, `ciudad`, `pais`, `edad`, `estado_civil`, `foto`, `genero`, `rol`, `frase`, `resumen`, `url_usuario`, `public`, `id_cv`, `email_verified_at`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Kath', 'lorem@cv-true.com', 'Spencer Huel', '$2y$10$okE5ryIo1YoVUBtfOAKLIuaXUZevZc//xrCysr7aY3qYlkQpFWAFm', '27700 Mckenna Landing', '+51 999 999 999', 'Diseñadora UI', 'Port August', 'Perú', 20, 'Soltera', 'img/usuarios/user464.jpeg', 2, 2, 'Id repudiandae inventore qui vitae.', 'Ad sed et quod quis qui rerum tempore. Et delectus laborum tenetur ut praesentium est dolor sint consequatur. Rerum blanditiis recusandae perferendis magni. Et neque consequatur iste aut rerum cumque ratione minima.', 'demo', 1, 2, NULL, NULL, '2020-08-13 17:57:03', '2020-09-16 20:52:19'),
(7, 'Code', 'chaicopadillag@gmail.com', 'Chaico Padilla', '$2y$10$03sSlzXQvahbjlpzuX1lk.lMZHw5jeh0dRKzzcc5hC3143VEboza.', 'Calle S/N Mz. H-18 Lt. 25 A.H.M J.C.M', '928522616', 'Programmer / Web Developer', 'SJL', 'Perú', 26, 'Soltero', 'img/usuarios/user7074.jpeg', 1, 2, 'El éxito es gustarte a ti mismo, gustarte lo que haces y gustarte cómo lo haces.', 'Soy Programador y Desarrollador Web autodidacta, proactivo y eficaz de Lima, Perú. Me apasiona mucho trabajar con nuevas tecnologías, disfruto creando aplicaciones de alto rendimiento tanto en Backend como en Frontend.\r\nContribuyo a proyectos de Open-source y comunidades de programación ayudando a otros usuarios. En el futuro me gustaría poder crear mi propio negocio.', 'chaicopadillag', 1, 2, NULL, 'J7yfrDv5ATflVgXM3O3Z5mp1WEjJjY3j3NQMomYpPjBGjfDmb2T7ueqYorA3', '2020-10-18 17:38:37', '2020-10-18 19:27:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cvs`
--
ALTER TABLE `cvs`
  ADD PRIMARY KEY (`id_cv`),
  ADD UNIQUE KEY `url` (`url`) USING HASH;

--
-- Indices de la tabla `estudios`
--
ALTER TABLE `estudios`
  ADD PRIMARY KEY (`id_estudio`);

--
-- Indices de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  ADD PRIMARY KEY (`id_experiencia`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  ADD PRIMARY KEY (`id_habilidad`);

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
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`id_proyecto`);

--
-- Indices de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  ADD PRIMARY KEY (`id_red_social`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `softwares`
--
ALTER TABLE `softwares`
  ADD PRIMARY KEY (`id_software`) USING BTREE;

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD UNIQUE KEY `cel` (`telefono`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cvs`
--
ALTER TABLE `cvs`
  MODIFY `id_cv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estudios`
--
ALTER TABLE `estudios`
  MODIFY `id_estudio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `experiencias`
--
ALTER TABLE `experiencias`
  MODIFY `id_experiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `habilidades`
--
ALTER TABLE `habilidades`
  MODIFY `id_habilidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `redes_sociales`
--
ALTER TABLE `redes_sociales`
  MODIFY `id_red_social` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `softwares`
--
ALTER TABLE `softwares`
  MODIFY `id_software` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
