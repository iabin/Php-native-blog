-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 13-07-2017 a las 01:06:03
-- Versión del servidor: 10.1.24-MariaDB
-- Versión de PHP: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `Blog`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `articulo_id` int(4) NOT NULL,
  `categoria_id` varchar(60) DEFAULT NULL,
  `usuario_id` int(4) NOT NULL,
  `titulo` varchar(40) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `contenido` text CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` varchar(20) NOT NULL,
  `img` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`articulo_id`, `categoria_id`, `usuario_id`, `titulo`, `contenido`, `fecha`, `img`) VALUES
(1, '81 82 83', 1, 'Acerca de mi', 'CONTENIDO DE PRUEBA', '2017-07-13 00:52:57', 'https://i.ytimg.com/vi/kN_8gpDilfg/maxresdefault.jpg'),
(50, ' 81', 1, 'La segunda guerra mundial', '<h2 class=\"section-heading\">El inicio</h2><br>\r\nSegunda Guerra Mundial fue un conflicto militar global que se desarrollÃ³ entre 1939 y 1945. En Ã©l se vieron implicadas la mayor parte de las naciones del mundo, incluidas todas las grandes potencias, agrupadas en dos alianzas militares enfrentadas: los Aliados de la Segunda Guerra Mundial y las Potencias del Eje. Fue la mayor contienda bÃ©lica de la Historia, con mÃ¡s de cien millones de militares movilizados y un estado de Â«guerra totalÂ» en que los grandes contendientes destinaron toda su capacidad econÃ³mica, militar y cientÃ­fica al servicio del esfuerzo bÃ©lico, borrando la distinciÃ³n entre recursos civiles y militares. Marcada por hechos de enorme repercusiÃ³n histÃ³rica que incluyeron la muerte masiva de civiles, el Holocausto y el uso, por primera y Ãºnica vez, de armas nucleares en un conflicto militar, la Segunda Guerra Mundial fue el conflicto mÃ¡s mortÃ­fero en la historia de la humanidad,1â€‹ con un resultado final de entre 50 y 70 millones de vÃ­ctimas.\r\n<br><br>\r\nEl comienzo del conflicto se suele situar en el 1 de septiembre de 1939, con la invasiÃ³n alemana de Polonia, el primer paso bÃ©lico de la Alemania nazi en su pretensiÃ³n de fundar un gran imperio en Europa, que produjo la inmediata declaraciÃ³n de guerra de Francia y la mayor parte de los paÃ­ses del Imperio britÃ¡nico y la Commonwealth al Tercer Reich. Desde finales de 1939 hasta inicios de 1941, merced a una serie de fulgurantes campaÃ±as militares y la firma de tratados, Alemania conquistÃ³ o sometiÃ³ gran parte de la Europa continental. En virtud de los acuerdos firmados entre los nazis y los soviÃ©ticos, la nominalmente neutral UniÃ³n SoviÃ©tica ocupÃ³ o se anexionÃ³ territorios de las seis naciones vecinas con las que compartÃ­a frontera en el oeste. El Reino Unido y la Commonwealth se mantuvieron como la Ãºnica gran fuerza capaz de combatir contra las Potencias del Eje en el Norte de Ãfrica y en una extensa guerra naval. En junio de 1941 las potencias europeas del Eje comenzaron la invasiÃ³n de la UniÃ³n SoviÃ©tica, dando asÃ­ inicio a la mÃ¡s extensa operaciÃ³n de guerra terrestre de la Historia, donde desde ese momento se empleÃ³ la mayor parte del poder militar del Eje. En diciembre de 1941 el Imperio del JapÃ³n, que habÃ­a estado en guerra con China desde 19372â€‹ y pretendÃ­a expandir sus dominios en Asia, atacÃ³ a los Estados Unidos y a las posesiones europeas en el ocÃ©ano PacÃ­fico, conquistando rÃ¡pidamente gran parte de la regiÃ³n.\r\n<br><br>\r\n<img class=\'img-responsive imagenes\' src=\'https://upload.wikimedia.org/wikipedia/commons/6/60/Bundesarchiv_Bild_102-09042%2C_Genf%2C_V%C3%B6lkerbund%2C_Sitzungssaal.jpg\' alt=\'Liga de las naciones\'><br> <span class=\'caption text-muted\'>Liga de las naciones</span>\r\nEl avance de las fuerzas del Eje fue detenido por los Aliados en 1942 tras la derrota de JapÃ³n en varias batallas navales y de las tropas europeas del Eje en el Norte de Ãfrica y en la decisiva batalla de Stalingrado. En 1943, como consecuencia de los diversos reveses de los alemanes en Europa del Este, la invasiÃ³n aliada de la Italia Fascista y las victorias de los Estados Unidos en el PacÃ­fico, el Eje perdiÃ³ la iniciativa y tuvo que emprender la retirada estratÃ©gica en todos los frentes. En 1944 los aliados occidentales invadieron Francia, al mismo tiempo que la UniÃ³n SoviÃ©tica recuperÃ³ las pÃ©rdidas territoriales y ambos invadÃ­an Alemania.\r\n<br><br>\r\nLa guerra en Europa terminÃ³ con la captura de BerlÃ­n por tropas soviÃ©ticas y polacas y la consiguiente rendiciÃ³n incondicional alemana el 8 de mayo de 1945. La Armada Imperial Japonesa resultÃ³ derrotada por los Estados Unidos y la invasiÃ³n del archipiÃ©lago japonÃ©s se hizo inminente. Tras el bombardeo atÃ³mico sobre Hiroshima y Nagasaki por parte de los Estados Unidos y la invasiÃ³n soviÃ©tica de Manchuria, la guerra en Asia terminÃ³ el 15 de agosto de 1945 cuando JapÃ³n aceptÃ³ la rendiciÃ³n incondicional.\r\n<br><br>\r\nLa guerra acabÃ³ con una victoria total de los Aliados sobre el Eje en 1945. La Segunda Guerra Mundial alterÃ³ las relaciones polÃ­ticas y la estructura social del mundo. La OrganizaciÃ³n de las Naciones Unidas (ONU) fue creada tras la conflagraciÃ³n para fomentar la cooperaciÃ³n internacional y prevenir futuros conflictos. La UniÃ³n SoviÃ©tica y los Estados Unidos se alzaron como superpotencias rivales, estableciÃ©ndose el escenario para la Guerra FrÃ­a, que se prolongÃ³ por los siguientes 46 aÃ±os. Al mismo tiempo declinÃ³ la influencia de las grandes potencias europeas, materializado en el inicio de la descolonizaciÃ³n de Asia y Ãfrica. La mayorÃ­a de los paÃ­ses cuyas industrias habÃ­an sido daÃ±adas iniciaron la recuperaciÃ³n econÃ³mica, mientras que la integraciÃ³n polÃ­tica, especialmente en Europa, emergiÃ³ como un esfuerzo para establecer las relaciones de posguerra.', '2017-07-13 00:52:57', 'http://marcianosmx.com/wp-content/uploads/2017/01/imagen-de-la-segunda-guerra-mundial-blando-y-negro-1.jpg'),
(51, ' 82 83', 1, 'Get out', 'Aunque al inicio esta pelÃ­cula podrÃ­a parecer una versiÃ³n moderna de Guess Whoâ€™s Coming to Dinner, es realmente una extraordinaria pelÃ­cula de terror donde no existe un Ãºnico elemento supernatural (aunque sÃ­ algo de ciencia ficciÃ³n).<br><br>\r\n\r\nLa pelÃ­cula funciona en gran medida por el elenco, encabezado por Daniel Kaluuya que da una actuaciÃ³n espectacular como el tranquilo, ligeramente friqueado y demoledoramente atractivo novio de la niÃ±a blanca interpretada por Allison Williams. Catherine Keener y Bradley Whitford son entraÃ±ables como los papÃ¡s â€œliberalesâ€ de la niÃ±a blanca que lleva a su novio negro a un fin de semana; y Caleb Landry Jones es excelente como el pavoroso hermano. AdemÃ¡s, Lil Rel Howery es extraordinario como el mejor alivio cÃ³mico que he visto en mucho tiempo; completamente natural, nada forzado, y sin ser ridÃ­culo o molesto en ningÃºn momento.\r\n<br><br>\r\nGet Out es la primera pelÃ­cula de terror que veo en aÃ±os que no tenga elementos supernaturales o copiosas cantidades de sangre lanzadas a la pantalla con el objetivo de nausear a los espectadores. El terror viene de comprender el objetivo de los villanos, sus razones y la perversa sensaciÃ³n de que un plan de ese estilo podrÃ­a totalmente funcionar. \r\n<br><img class=\'img-responsive imagenes\' src=\'https://aztlan.fciencias.unam.mx/~canek/pensadero/posts-images/2017/07/get-out.jpg\' alt=\'get out\'><br> <span class=\'caption text-muted\'>Muy buena Pelicula</span><br>\r\nLa pelÃ­cula estÃ¡ magistralmente dirigida por Jordan Peele, un negro (por supuesto) cuya fama viene de ser un comediante del cual yo Ãºnicamente habÃ­a oÃ­do tangencialmente. Y aunque obviamente las tensiones raciales gringas juegan un papel importante en la pelÃ­cula, no son lo mÃ¡s importante. Eso me gustÃ³ mucho en la misma; los gringos continÃºan pagando el haber nacido como naciÃ³n con el imperdonable pecado de permitir e incluso fomentar (institucionalmente) la esclavitud basada en la idea de que los negros no son seres humanos o que son â€œmenosâ€ humanos (y lo continuarÃ¡n pagando, mientras no lo resuelvan realmente); y en ese sentido fue hilarante como muchas reseÃ±as que leÃ­ de la pelÃ­cula mencionaban lo â€œsorprendenteâ€ de que los villanos no fueran racistas.\r\n<br><br>\r\nY yo sÃ³lo podÃ­a botarme de la risa de la miopÃ­a de estos crÃ­ticos que no pudieron entender que Peele por supuesto que pone a los villanos como racistas; nada mÃ¡s no racistas que odian o temen a los negros como los neonazis o el Ku-Klux-Klan, sino como gente blanca que se autodenomina liberal y que sinceramente se considera aliada de los negros â€œen su luchaâ€, pero que aÃºn asÃ­ son racistas. Es de hecho lo mÃ¡s fuerte que tiene la pelÃ­cula, me parece.\r\n<br><br>\r\nLa pelÃ­cula es maravillosa, y no puedo recomendarla lo suficiente; dentro de poco estarÃ¡ disponible en VOD y yo expero que la vean, porque ademÃ¡s me parece que Peele continuarÃ¡ haciendo cosas muy interesantes como director, y no me molestarÃ­a en lo mÃ¡s mÃ­nimo ver mÃ¡s pelÃ­culas con Kaluuya como protagonista.', '2017-07-13 00:57:58', 'http://d3cprjxvoejtmm.cloudfront.net/images/2017/03/17101315/Get-Out.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`articulo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `articulo_id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
