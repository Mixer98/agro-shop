-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-07-2025 a las 19:24:55
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `agroshop`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `producto_id` int(50) NOT NULL,
  `cantidad` int(50) NOT NULL,
  `precio_total` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `carrito`
--

INSERT INTO `carrito` (`id`, `usuario_id`, `producto_id`, `cantidad`, `precio_total`) VALUES
(26, 3, 39, 2, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `fecha` datetime DEFAULT current_timestamp(),
  `estado` varchar(20) DEFAULT 'pendiente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `usuario_id`, `total`, `fecha`, `estado`) VALUES
(1, 3, 180.00, '2024-10-29 23:26:06', 'pendiente'),
(2, 3, 1834800.00, '2024-10-30 16:21:21', 'Completado'),
(3, 3, 540000.00, '2024-10-30 23:18:40', 'En Proceso'),
(4, 3, 1410000.00, '2024-10-31 00:05:50', 'pendiente'),
(5, 3, 452000.00, '2024-10-31 14:12:58', 'Cancelado'),
(6, 3, 2514000.00, '2024-10-31 21:00:26', 'Completado'),
(7, 3, 464000.00, '2024-11-01 13:55:57', 'En Proceso'),
(8, 3, 20000.00, '2024-11-01 16:57:54', 'En Proceso'),
(9, 5, 4518000.00, '2024-11-08 15:04:06', 'Completado'),
(10, 4, 1021500.00, '2024-11-12 16:19:48', 'pendiente'),
(11, 4, 150000.00, '2025-06-20 19:50:44', 'Completado'),
(12, 4, 666000.00, '2025-06-20 23:19:27', 'Completado'),
(13, 4, 4714000.00, '2025-06-20 23:31:11', 'Completado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_detalle`
--

CREATE TABLE `pedido_detalle` (
  `id` int(11) NOT NULL,
  `pedido_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `pedido_detalle`
--

INSERT INTO `pedido_detalle` (`id`, `pedido_id`, `producto_id`, `cantidad`, `precio`) VALUES
(1, 1, 48, 12, 15.00),
(2, 2, 28, 15, 50000.00),
(3, 2, 26, 12, 113000.00),
(4, 3, 40, 12, 45000.00),
(5, 4, 62, 12, 102000.00),
(6, 4, 58, 2, 93000.00),
(7, 5, 26, 5, 113000.00),
(8, 6, 61, 24, 41000.00),
(9, 6, 62, 15, 102000.00),
(10, 7, 32, 4, 116000.00),
(11, 8, 43, 1, 20000.00),
(12, 9, 50, 3, 1500000.00),
(13, 9, 55, 12, 1500.00),
(14, 10, 42, 15, 40000.00),
(15, 10, 74, 5, 84300.00),
(16, 11, 53, 5, 30000.00),
(17, 12, 27, 2, 88000.00),
(18, 12, 28, 1, 50000.00),
(19, 12, 51, 7, 65000.00),
(20, 13, 54, 5, 800000.00),
(21, 13, 62, 7, 102000.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `marca` varchar(100) NOT NULL,
  `categoria` varchar(100) NOT NULL,
  `subtipo` varchar(100) DEFAULT NULL,
  `medida` int(10) NOT NULL,
  `unidad_medida` varchar(50) NOT NULL,
  `unidades_disponibles` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `tipo_almacenamiento` varchar(100) DEFAULT NULL,
  `lugar_almacenamiento` varchar(100) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `descuento` int(11) NOT NULL DEFAULT 0,
  `precio_con_descuento` decimal(10,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `marca`, `categoria`, `subtipo`, `medida`, `unidad_medida`, `unidades_disponibles`, `precio`, `tipo_almacenamiento`, `lugar_almacenamiento`, `descripcion`, `imagen`, `descuento`, `precio_con_descuento`) VALUES
(26, 'Urea Granula', 'Nutrimon', 'fertilizante', 'químico', 50, 'kilogramos', 83, 113000.00, 'Lugar Seco', 'Finca #1', 'Fertilizante simple a base de Nitrógeno (46%) para aplicación en el suelo, ideal para etapas de desarrollo, ya que promueve la formación de tejido vegetal. Eficaz en cultivos de arroz, algodón, sorgo, maíz, caña, pastos banano, café, aguacate y frutales.', 'imagenesproductos/67141b96476a5.png', 0, 0.00),
(27, 'Sulfato de Amonio', 'Fertimax', 'fertilizante', 'químico', 50, 'kilogramos', 48, 88000.00, 'Lugar Seco', 'Finca #1', 'El sulfato de amonio es un fertilizante nitrogenado en forma de cristales o gránulos blancos. Contiene alrededor del 21% de nitrógeno y 24% de azufre, lo que lo hace ideal para suelos que necesitan ambos nutrientes. Se disuelve fácilmente en agua y es utilizada de forma combinada para mejorar el crecimiento de plantas, especialmente en cultivos que requieren más nitrógeno, como cereales y pastos.', 'imagenesproductos/67141c172e4df.png', 0, 0.00),
(28, 'Nitrato De Amonio', 'Molinos & Cia', 'fertilizante', 'químico', 50, 'kilogramos', 34, 50000.00, 'Lugar Seco', 'Finca #2', 'El nitrato de amonio es un fertilizante nitrogenado que contiene alrededor del 34% de nitrógeno, lo que lo hace altamente eficaz para promover el crecimiento de las plantas. Viene en forma de cristales o gránulos blancos y es fácilmente soluble en agua. Además de su uso agrícola, es conocido por su alta reactividad y, por tanto, requiere un manejo y almacenamiento seguros debido a su potencial explosivo en ciertas condiciones.', 'imagenesproductos/67141c8590f84.png', 30, 35000.00),
(29, 'Fosfato Monoamonico', 'Granular', 'fertilizante', 'químico', 50, 'kilogramos', 50, 470000.00, 'Lugar Seco', 'Finca #3', '\r\nEl sulfato monoamónico (o fosfato monoamónico) es un fertilizante que contiene fósforo y nitrógeno, con una composición típica de 11% de nitrógeno y 52% de fósforo (P2O5). Se presenta en forma de gránulos y es fácilmente soluble en agua. Es ideal para mejorar el enraizamiento y el desarrollo temprano de las plantas, siendo ampliamente utilizado en la agricultura, especialmente en suelos que necesitan más fósforo para promover el crecimiento saludable de cultivos.', 'imagenesproductos/67141e36d5867.png', 0, 0.00),
(30, 'Fosfato De Diamonico (DAP)', 'Nutrimon', 'fertilizante', 'químico', 50, 'kilogramos', 50, 179700.00, 'Lugar Seco', 'Finca #3', '\r\nEl fosfato diamónico (DAP) es un fertilizante compuesto que contiene aproximadamente 18% de nitrógeno y 46% de fósforo (P2O5). Se presenta en forma de gránulos solubles en agua y es uno de los fertilizantes fosfatados más utilizados en la agricultura. El DAP es ideal para suelos que requieren tanto nitrógeno como fósforo, y es especialmente', 'imagenesproductos/67141e9f8a507.png', 0, 0.00),
(31, 'Cloruro De Potasio', 'Nutrimon', 'fertilizante', 'químico', 50, 'kilogramos', 50, 106000.00, 'Lugar Seco', 'Finca #3', 'El cloruro de potasio es una sal inorgánica compuesta por potasio y cloro, de apariencia cristalina y sabor salado. Es un compuesto esencial en la agricultura como fertilizante, en la medicina como suplemento para tratar niveles bajos de potasio y en la industria alimentaria como sustituto de la sal. ', 'imagenesproductos/67141f1b208a2.png', 0, 0.00),
(32, 'Nitrato De Calcio', 'Aboterra', 'fertilizante', 'químico', 25, 'kilogramos', 46, 116000.00, 'Lugar Seco', 'Finca #3', '\r\nEl nitrato de calcio es un fertilizante que contiene aproximadamente 15.5% de nitrógeno y 19% de calcio. Se presenta en forma granular y es altamente soluble en agua, lo que lo hace ideal para su uso en sistemas de riego por goteo. Es particularmente útil para mejorar la calidad de los frutos y fortalecer las paredes celulares de las plantas, ayudando a prevenir problemas como la podredumbre apical en cultivos como el tomate y el pimiento.', 'imagenesproductos/67141f6f7b010.png', 0, 0.00),
(33, 'Compost', 'Provicomp', 'fertilizante', 'orgánico', 46, 'kilogramos', 50, 75000.00, 'Refrigerado', 'Finca #1', '\r\nEl compost es un fertilizante orgánico producido a partir de la descomposición de materia orgánica, como restos de plantas, frutas, verduras y estiércol. Es rico en nutrientes esenciales como nitrógeno, fósforo y potasio, además de mejorar la estructura del suelo al aumentar su capacidad para retener agua y nutrientes. El compost también fomenta la actividad microbiana beneficiosa y ayuda a reducir la erosión del suelo, siendo una opción sostenible y natural para mejorar la fertilidad del suelo en jardines y cultivos.', 'imagenesproductos/6714201e3636f.png', 0, 0.00),
(34, 'Humus De Lombriz', 'Pa abonar', 'fertilizante', 'orgánico', 40, 'kilogramos', 50, 60000.00, 'Lugar Seco', 'Finca #4', 'El humus de lombriz es un fertilizante orgánico natural, producido por la descomposición de materia orgánica a través de la digestión de las lombrices. Es rico en nutrientes esenciales como nitrógeno, fósforo, potasio, y contiene microorganismos beneficiosos que mejoran la salud del suelo. Este abono mejora la estructura del suelo, retiene la humedad, y favorece el crecimiento saludable de las plantas, haciéndolo ideal para jardinería, agricultura ecológica y horticultura. Además, es suave y no quema las raíces, por lo que es seguro para todo tipo de cultivos.', 'imagenesproductos/6714208e226ee.png', 0, 0.00),
(35, 'Guano', 'Confiabonos', 'fertilizante', 'orgánico', 40, 'kilogramos', 50, 175000.00, 'Lugar Seco', 'Finca #2', 'El guano es un fertilizante natural compuesto principalmente por excrementos de aves marinas, murciélagos o focas. Es altamente rico en nutrientes, especialmente en nitrógeno, fósforo y potasio, lo que lo convierte en un abono potente para mejorar el crecimiento de las plantas. Además de estos macronutrientes, contiene otros minerales y microorganismos beneficiosos que enriquecen el suelo. Es utilizado en la agricultura para estimular el desarrollo de cultivos y mejorar la calidad del suelo de manera ecológica.', 'imagenesproductos/671421213bb2d.png', 0, 0.00),
(36, 'Solucion Nutritiva', 'Hidro-invert', 'fertilizante', 'líquido', 1, 'litros', 50, 24000.00, 'Lugar Seco', 'Finca #2', 'La solución nutritiva es una mezcla de agua y nutrientes esenciales disueltos, utilizada en cultivos hidropónicos o en fertirrigación para proporcionar a las plantas los minerales necesarios para su crecimiento. Estas soluciones contienen macronutrientes como nitrógeno, fósforo, potasio, calcio, magnesio y azufre, así como micronutrientes como hierro, zinc, cobre, manganeso y boro. La solución nutritiva es ajustada según las necesidades de las plantas, y permite un control preciso sobre la nutrición, promoviendo un crecimiento rápido y saludable sin la necesidad de suelo.', 'imagenesproductos/67142461f24d5.png', 0, 0.00),
(37, 'Foliar', 'Activate', 'fertilizante', 'líquido', 1, 'litros', 50, 41200.00, 'Lugar Seco', 'Finca #3', '\r\nEl fertilizante foliar es un tipo de abono que se aplica directamente sobre las hojas de las plantas en forma de pulverización. Las plantas absorben los nutrientes a través de los estomas de las hojas, permitiendo una absorción más rápida que a través del suelo. Los fertilizantes foliares suelen contener micronutrientes como hierro, zinc, manganeso, y a veces macronutrientes en pequeñas cantidades. Son útiles cuando las plantas muestran deficiencias específicas o cuando el suelo no puede proporcionar ciertos nutrientes de manera efectiva.', 'imagenesproductos/671424fa3a722.png', 0, 0.00),
(38, 'Bio Estimulante', 'Vita Company', 'fertilizante', 'líquido', 500, 'Mililitros', 50, 35400.00, 'Lugar Seco', 'Finca #2', 'Un bioestimulante es un producto natural o sintético que mejora el crecimiento y desarrollo de las plantas, independientemente de su contenido de nutrientes. Actúa sobre los procesos fisiológicos de las plantas, aumentando su resistencia al estrés (sequía, salinidad, plagas) y mejorando la eficiencia en la absorción de nutrientes. Los bioestimulantes incluyen sustancias como extractos de algas, ácidos húmicos, aminoácidos, y microorganismos beneficiosos. Se utilizan para optimizar la salud de las plantas y aumentar los rendimientos de los cultivos de manera sostenible.', 'imagenesproductos/67142554ca470.png', 0, 0.00),
(39, 'Maiz', 'Tropical', 'semillas', 'cereales_y_granos', 25, 'kilogramos', 50, 50000.00, 'Clima Controlado', 'Finca #2', '\r\nEl maíz (Zea mays) es un cereal originario de América, ampliamente cultivado en todo el mundo por sus granos, que son una importante fuente de alimento para humanos y animales. Es una planta anual que crece en climas templados y cálidos, y sus granos se utilizan en la producción de alimentos como tortillas, harina de maíz, aceite, almidón, y también como materia prima para productos industriales. El maíz es rico en carbohidratos y contiene algunas proteínas, vitaminas y minerales, lo que lo convierte en un cultivo básico en muchas dietas.', 'imagenesproductos/671425b630210.png', 0, 0.00),
(40, 'Arroz', 'Vigor Y Pureza', 'semillas', 'cereales_y_granos', 20, 'kilogramos', 38, 45000.00, 'Clima Controlado', 'Finca #3', 'El arroz (Oryza sativa) es un cereal básico y una importante fuente de carbohidratos para más de la mitad de la población mundial. Cultivado principalmente en regiones cálidas y húmedas, existen diversas variedades, incluyendo grano largo, medio y corto. Es versátil en la cocina, utilizado en numerosos platos y procesado en productos como harinas y cereales. Además de carbohidratos, el arroz aporta pequeñas cantidades de proteínas, vitaminas y minerales.', 'imagenesproductos/6714268c6644b.png', 0, 0.00),
(41, 'Frijol', 'Su Despensa', 'semillas', 'cereales_y_granos', 10, 'kilogramos', 50, 30000.00, 'Clima Controlado', 'Finca #3', 'El frijol (Phaseolus vulgaris) es una leguminosa ampliamente cultivada y consumida en todo el mundo. Es una fuente rica en proteínas, fibra, vitaminas y minerales, lo que lo convierte en un alimento básico en muchas dietas. Existen diversas variedades de frijoles, como negros, pintos, rojos y blancos, cada uno con diferentes usos culinarios y sabores. Además, los frijoles son valorados por su capacidad para mejorar la fertilidad del suelo al fijar nitrógeno, lo que los hace beneficiosos en la agricultura sostenible. Se pueden consumir de diversas maneras, ya sea cocidos, en sopas, guisos o ensaladas.', 'imagenesproductos/6714271834a5c.png', 0, 0.00),
(42, 'Soya', 'Solla Max', 'semillas', 'vegetales', 15, 'kilogramos', 35, 40000.00, 'Clima Controlado', 'Finca #2', '\r\nLa soja (Glycine max) es una leguminosa rica en proteínas y aceite, originaria de Asia. Se utiliza en una variedad de productos como aceite de soja, tofu y leche de soja, siendo un alimento básico en dietas vegetarianas y veganas. Además, es rica en isoflavonas con propiedades antioxidantes y ayuda a mejorar la fertilidad del suelo al fijar nitrógeno, lo que la convierte en un cultivo valioso en la agricultura sostenible.', 'imagenesproductos/671429332985d.png', 0, 0.00),
(43, 'Girasol', 'Salugran', 'semillas', 'vegetales', 5, 'kilogramos', 49, 20000.00, 'Clima Controlado', 'Finca #3', 'El girasol (Helianthus annuus) es una planta anual famosa por sus grandes flores amarillas y su capacidad para seguir la luz del sol. Se cultiva principalmente por sus semillas, que son ricas en aceite (aceite de girasol) y nutrientes. Este aceite es muy utilizado en la cocina y la industria alimentaria. Además, las semillas son un snack saludable, y el girasol también se cultiva como planta ornamental en jardines.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'imagenesproductos/67142995633da.png', 0, 0.00),
(44, 'Semilla De Tomate', 'Agro', 'semillas', 'vegetales', 500, 'kilogramos', 50, 15000.00, 'Clima Controlado', 'Finca #1', 'La semilla de tomate proviene del fruto del tomate (Solanum lycopersicum) y es esencial para cultivar esta popular hortaliza. Las semillas son pequeñas y pueden variar en forma y tamaño según la variedad de tomate. Son ricas en nutrientes y se utilizan en la agricultura para cultivar tomates frescos, que son fundamentales en diversas cocinas alrededor del mundo. Además, las semillas de tomate son apreciadas por su capacidad para producir plantas resistentes y de alto rendimiento, y se pueden almacenar y plantar en diferentes temporadas para obtener cosechas continuas.', 'imagenesproductos/67142a160ddab.png', 0, 0.00),
(45, 'Semilla De Lechuga', 'Jarditec', 'semillas', 'vegetales', 250, 'kilogramos', 50, 10000.00, 'Clima Controlado', 'Finca #3', 'La semilla de lechuga proviene de la planta de lechuga (Lactuca sativa) y es fundamental para cultivar esta hortaliza de hoja verde. Las semillas son pequeñas y suelen tener un color marrón claro o negro. La lechuga se cultiva en diversas variedades, incluyendo lechuga romana, iceberg y de hoja suelta, y es popular en ensaladas y otros platos. Las semillas de lechuga son fáciles de sembrar y germinan rápidamente, lo que permite cosechas en un corto periodo de tiempo. También son apreciadas por su valor nutricional, ya que son ricas en vitaminas y minerales.', 'imagenesproductos/67142a9839d7d.png', 0, 0.00),
(46, 'Semilla De Melon', 'Anasac', 'semillas', 'frutas', 1, 'kilogramos', 50, 25000.00, 'Clima Controlado', 'Finca #4', '\r\nLa semilla de melón proviene del fruto del melón (Cucumis melo) y es crucial para el cultivo de esta fruta dulce y refrescante. Las semillas son planas y ovaladas, con una cáscara dura que puede variar en color, desde blanco hasta beige. El melón es popular en diversas gastronomías y se consume fresco, en ensaladas, o como jugo. Las semillas de melón son ricas en nutrientes, incluyendo grasas saludables, proteínas y minerales. Se pueden sembrar para cultivar melones en huertos, y también se utilizan en algunos lugares para la producción de snacks y aceites.', 'imagenesproductos/67142b132980b.png', 0, 0.00),
(47, 'Semilla De Sandia', 'Anasac', 'semillas', 'frutas', 1, 'kilogramos', 50, 30000.00, 'Clima Controlado', 'Finca #3', '\r\nLa semilla de sandía proviene del fruto de la sandía (Citrullus lanatus) y es esencial para el cultivo de esta fruta refrescante y jugosa. Las semillas son planas, ovaladas y de color negro o marrón, a menudo presentes en el interior de la pulpa roja o amarilla de la sandía.\r\n\r\nLas sandías son populares en el verano y se consumen frescas, en jugos, o en ensaladas. Las semillas de sandía son ricas en nutrientes, como grasas saludables, proteínas y antioxidantes. También se pueden sembrar para cultivar sandías en huertos, y en algunos lugares se tuestan y se comen como un snack saludable.', 'imagenesproductos/67142b95f328f.png', 0, 0.00),
(48, 'Manzanila', 'Anasac', 'semillas', 'hierbas', 100, 'gramos', 38, 15000.00, 'Clima Controlado', 'Finca #3', '\r\nLa manzanilla (Matricaria chamomilla o Chamaemelum nobile) es una planta herbácea conocida por sus flores blancas y su centro amarillo, que se utiliza comúnmente en infusiones y remedios naturales. Es famosa por sus propiedades calmantes y antiinflamatorias, y se utiliza para aliviar problemas digestivos, insomnio y ansiedad. Las flores se cosechan y secan para preparar tés, extractos y aceites esenciales. La manzanilla también se emplea en cosmética y productos para el cuidado de la piel debido a sus propiedades suavizantes y antiirritantes.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'imagenesproductos/67142c3d3671c.png', 0, 0.00),
(49, 'Menta', 'Anasac', 'semillas', 'hierbas', 100, 'gramos', 50, 15000.00, 'Clima Controlado', 'Finca #2', '\r\nLa menta (Mentha) es una planta herbácea aromática ampliamente utilizada en la cocina, medicina y productos cosméticos. Sus hojas tienen un sabor y aroma refrescante, y se emplean para hacer tés, infusiones, postres, ensaladas y bebidas. La menta es conocida por sus propiedades digestivas, ayudando a aliviar problemas estomacales, además de tener efectos calmantes y refrescantes. También se utiliza en productos para el cuidado bucal, como pastas dentales y enjuagues, debido a su capacidad para refrescar el aliento.', 'imagenesproductos/67142ca2eef03.png', 0, 0.00),
(50, 'Vaca Lechera', 'Emirat', 'animales', 'mamíferos', 400, 'kilogramos', 47, 1500000.00, 'Corral Animal', 'Finca #2', '\r\nLa vaca lechera es un tipo de ganado bovino especializado en la producción de leche. Las razas más comunes para la producción lechera incluyen la Holstein, Jersey y Guernsey, conocidas por su alta productividad y calidad de leche. Estas vacas se crían específicamente para obtener grandes volúmenes de leche, que es procesada para producir productos lácteos como queso, yogur, mantequilla y leche líquida. Una vaca lechera necesita una dieta balanceada y cuidados especiales para mantener su salud y optimizar la producción de leche.', 'imagenesproductos/67142d42312e0.jpg', 0, 0.00),
(51, 'Gallinas Ponedoras', 'Sellecion Agricola', 'animales', 'aves', 2, 'kilogramos', 43, 65000.00, 'Corral Animal', 'Finca #3', '\r\nLas gallinas ponedoras son aves criadas específicamente para la producción de huevos. Algunas de las razas más comunes incluyen la Leghorn, Rhode Island Red y Sussex, conocidas por su alta capacidad de poner huevos de forma regular. Estas gallinas comienzan a poner huevos alrededor de los 5 a 6 meses de edad y pueden producir entre 250 y 300 huevos al año, dependiendo de la raza y el manejo. Las gallinas ponedoras requieren una dieta rica en calcio y proteínas, así como un entorno limpio y cómodo para asegurar una buena salud y una producción de huevos constante.', 'imagenesproductos/67142ea960649.jpg', 50, 32500.00),
(52, 'Patos Criolllos', 'Granja Santa Isabel', 'animales', 'aves', 4, 'kilogramos', 50, 60000.00, 'Corral Animal', 'Finca #3', 'Los patos criollos son una raza de pato domesticado, común en América Latina y el Caribe, reconocidos por su adaptabilidad y resistencia. Se alimentan de granos, vegetales e insectos, y son valorados por su carne sabrosa y sus huevos, aunque su producción de huevos es menor que la de otras razas. Su crianza es común en granjas familiares, donde ayudan al control de plagas y contribuyen a la economía local.', 'imagenesproductos/6714301f1cc9b.jpg', 20, 48000.00),
(53, 'Conejo Silvestre', 'Granja Santa Isabel', 'animales', 'mamíferos', 400, 'gramos', 45, 30000.00, 'Corral Animal', 'Finca #3', '\r\nEl conejo silvestre (Oryctolagus cuniculus) es un mamífero herbívoro conocido por su pelaje suave y orejas largas. Vive en colonias en madrigueras subterráneas y se alimenta de hierbas, hojas y raíces. Es un animal muy activo, especialmente al amanecer y al atardecer, y tiene una alta capacidad de reproducción. Los conejos silvestres son importantes en los ecosistemas como presa para depredadores y son cazados en algunas regiones por su carne y piel.', 'imagenesproductos/671430769ca6b.jpg', 0, 0.00),
(54, 'Cerdo', 'Porcicola', 'animales', 'mamíferos', 100, 'kilogramos', 45, 800000.00, 'Corral Animal', 'Finca #3', 'El cerdo (Sus scrofa) es un mamífero domesticado criado principalmente por su carne, conocida como cerdo o puerco. Omnívoros y versátiles, se alimentan de granos, vegetales y desechos orgánicos. Son animales inteligentes y se crían en diversas razas que varían en tamaño y características. Además de la carne, proporcionan productos como tocino, jamón y gelatina, y su crianza es fundamental en la agricultura de muchas culturas.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'imagenesproductos/671431d372238.jpg', 0, 0.00),
(55, 'Pasto', 'Arroz Premium', 'alimento', 'frescos', 1, 'kilogramos', 38, 1500.00, 'Lugar Ventilado', 'Finca #3', '\r\nEl pasto se refiere a un tipo de hierba o forraje que crece en praderas, campos y áreas abiertas. Es una fuente esencial de alimento para animales herbívoros, como vacas, ovejas y caballos. El pasto puede incluir diversas especies de gramíneas y leguminosas, y su calidad nutricional varía según la especie, la época del año y las condiciones de crecimiento. Además de su uso como forraje, el pasto también ayuda a prevenir la erosión del suelo y puede ser utilizado en la jardinería y paisajismo.', 'imagenesproductos/67143361c2f4b.jpg', 0, 0.00),
(56, 'Heno', 'Granja Santa Isabel', 'alimento', 'seco', 1, 'kilogramos', 50, 11900.00, 'Lugar Ventilado', 'Finca #3', '\r\nEl heno es forraje seco hecho de hierbas y leguminosas, cortado y dejado secar al sol antes de ser almacenado. Es una fuente clave de alimento para herbívoros como caballos, vacas y ovejas, especialmente en invierno. Rico en fibra, vitaminas y minerales, el heno contribuye a la salud animal. Para mantener su calidad, debe almacenarse en un lugar seco, seguro y ventilado. Se presenta en pacas sueltas o comprimidas y es esencial en la alimentación en muchas granjas.', 'imagenesproductos/67143402554ff.jpg', 0, 0.00),
(57, 'Ensilaje', 'Arroz Premium', 'alimento', 'seco', 100, 'kilogramos', 50, 265000.00, 'Lugar Seco', 'Finca #4', '\r\nEl ensilaje es un método de conservación de forraje que consiste en almacenar plantas, como maíz o pasto, en un ambiente sin oxígeno para que fermenten. Este proceso preserva el forraje durante largos períodos, manteniendo su valor nutricional. El ensilaje es rico en energía y se utiliza para alimentar ganado en épocas de escasez de pasto fresco. Se almacena en silos o bolsas y es común en la alimentación de ganado lechero y de carne.', 'imagenesproductos/67143452a05f2.jpg', 0, 0.00),
(58, 'Alimentos Para Pollos', 'Nutrimon', 'alimento', 'concentrados', 40, 'kilogramos', 48, 93000.00, 'Lugar Ventilado', 'Finca #4', '\r\nLos alimentos para pollos son mezclas nutritivas que incluyen granos como maíz y soja, y se dividen en formulaciones para pollitos (crecimiento rápido), pollos de engorde (maximiza carne) y ponedoras (ricas en calcio para la producción de huevos), y deben almacenarse en un lugar seco y ventilado.', 'imagenesproductos/671434e3ccb70.png', 0, 0.00),
(59, 'Alimentos Para Cerdos', 'Sellecion Agricola', 'alimento', 'concentrados', 40, 'kilogramos', 50, 72900.00, 'Lugar Ventilado', 'Finca #3', '\r\nLos alimentos para cerdos son formulaciones nutricionales que incluyen granos como maíz y sorgo, así como proteínas, vitaminas y minerales, y se clasifican en tipos como inicio (para lechones), engorde (para cerdos en crecimiento) y reproductores (para cerdas gestantes y lactantes); deben almacenarse en un lugar seco y ventilado para mantener su calidad.', 'imagenesproductos/671435a3cdb62.png', 0, 0.00),
(60, 'Alimentos Para Vacas', 'Granja Santa Isabel', 'alimento', 'concentrados', 40, 'kilogramos', 50, 76000.00, 'Lugar Ventilado', 'Finca #3', 'Los alimentos para vacaciones incluyen pasto, heno, ensilaje y concentrados ricos en proteínas, diseñados para proporcionar los nutrientes esenciales que necesitan para producir leche o ganar peso; se divide en forrajes (fuente de fibra) y suplementos minerales, y deben almacenarse en un lugar seco y ventilado para mantener su calidad.', 'imagenesproductos/671435f49d3ca.png', 0, 0.00),
(61, 'Alimentos Para Perros', 'Granja Santa Isabel', 'alimento', 'concentrados', 4, 'libras', 26, 41000.00, 'Lugar Ventilado', 'Finca #1', 'Los alimentos para perros son formulaciones diseñadas para satisfacer las necesidades nutricionales de estas mascotas. Pueden ser secos (croquetas), húmedos (latas) o una combinación de ambos, e incluyen ingredientes como carne, granos, vegetales y suplementos vitamínicos y minerales. Existen diferentes tipos según la edad, tamaño y nivel de actividad del perro, incluyendo alimentos para cachorros, perros adultos y perros mayores. Es importante almacenar estos alimentos en un lugar seco y ventilado para preservar su frescura y calidad.', 'imagenesproductos/67143651c5cfb.png', 0, 0.00),
(62, 'Alimentos Para Gatos', 'Arroz Premium', 'alimento', 'concentrados', 22, 'libras', 16, 102000.00, 'Lugar Ventilado', 'Finca #4', 'Los alimentos para gatos son formulaciones específicas que satisfacen las necesidades nutricionales de estos felinos. Se presentan en formas secas (croquetas), húmedas (latas) o semihúmedas, e incluyen ingredientes como carne, pescado, granos y vegetales, además de vitaminas y minerales esenciales. Existen diferentes tipos según la edad, el tamaño y las necesidades de salud del gato, como alimentos para gatitos, gatos adultos y gatos mayores. Es fundamental almacenar estos alimentos en un lugar seco y ventilado para mantener su frescura y calidad.', 'imagenesproductos/671436b1b8c8c.png', 0, 0.00),
(63, 'Amoxicilina', 'La Casa De Ganadero', 'medicina', 'antibióticos', 100, 'mililitros', 50, 150000.00, 'Refrigerado', 'Finca #2', 'La amoxicilina es un antibiótico de amplio espectro que se utiliza en el ámbito agropecuario para tratar infecciones bacterianas en animales de granja, como cerdos, vacas, ovejas y aves de corral. Su eficacia contra diversas bacterias la convierte en una herramienta valiosa para prevenir y tratar enfermedades infecciosas que pueden afectar la salud y productividad del ganado.', 'imagenesproductos/6714370bb43f9.png', 0, 0.00),
(64, 'tetraciclina', 'Genfar', 'medicina', 'antibióticos', 500, 'miligramos', 50, 43000.00, 'Refrigerado', 'Finca #2', 'la tetracicilina se utiliza para tratar infecciones respiratorias, digestivas y de la piel en animales de granja, como cerdos, vacas, ovejas y aves de corral. Se puede administrar por vía oral, inyectable o en el agua de bebida, y es importante que su uso\r\n\r\nAl igual que con otros antibióticos, es crucial respetar los períodos de retiro, que son los tiempos necesarios para que el medicamento se elimine del organismo del animal antes de su sacrificio o de que se utilicen sus productos, como carne o leche, para consumo humano. . Esto ayuda a garantizar', 'imagenesproductos/67143852867c2.png', 0, 0.00),
(65, 'Eritromicina', 'Genfar', 'medicina', 'antibióticos', 500, 'miligramos', 50, 66000.00, 'Refrigerado', 'Finca #1', ' la eritromicina se utiliza para tratar infecciones respiratorias, digestivas y de la piel, así como para controlar enfermedades en aves de corral. Se puede administrar por vía oral, inyectable o en el agua de bebida. Es importante que su uso sea supervisado por un veterinario para garantizar la cor\r\n\r\nComo con otros antibióticos, es crucial respetar los períodos de retiro, asegurando que no haya residuos de eritromicina en la carne, leche o huevos antes de su consumo, garantizando así', 'imagenesproductos/671438a8729df.png', 0, 0.00),
(66, 'Enrofloxacina', 'Coasphama', 'medicina', 'antibióticos', 500, 'miligramos', 50, 14000.00, 'Refrigerado', 'Finca #3', '\r\nLa enrofloxacina es un antibiótico de la familia de las fluoroquinolonas utilizado en medicina veterinaria para tratar infecciones bacterianas en animales de granja y mascotas, siendo eficaz contra una amplia variedad de bacterias gramnegativas y grampositivas. Se utiliza combinado en el tratamiento de infecciones respiratorias, gastrointestinales y urogenitales en aves, cerdos, vacas y perros, y se puede administrar por vía oral, inyectable o en el agua de bebida. Su uso debe ser supervisado por un veterinario para asegurar la correcta dosificación y minimizar el riesgo de resistencia bacteriana, y es importante respetar el período de retiro antes de sacrificar a los animales o utilizar sus productos, como carne o leche, para consumo humano, garantizando así la seguridad alimentaria.\r\n\r\n\r\n\r\n\r\n\r\n\r\n', 'imagenesproductos/6714391c27389.png', 0, 0.00),
(67, 'Flunixin Meglumine', 'Weizur', 'medicina', 'analgesico', 100, 'mililitros', 50, 152000.00, 'Refrigerado', 'Finca #1', 'el flunixin meglumina se administra por vía intravenosa, intramuscular o subcutánea, y su uso debe ser supervisado por un veterinario para garantizar la dosificación adecuada y prevenir efectos adversos. Es importante respetar los períodos de retiro antes de sacrificar a los animales o utilizar sus productos, como carne o leche, para consumo humano, asegurando así la seguridad alimentaria.', 'imagenesproductos/671439a5c75f0.png', 0, 0.00),
(68, 'Meloxican', 'Erma', 'medicina', 'analgesico', 10, 'mililitros', 50, 11600.00, 'Refrigerado', 'Finca #4', 'El meloxicam es un antiinflamatorio no esteroideo (AINE) utilizado en medicina veterinaria para tratar el dolor y la inflamación en animales de granja y mascotas, como perros, gatos, vacas y cerdos. Es especialmente efectivo en el manejo de condiciones como artritis, lesiones musculoesqueléticas y dolor postoperatorio. El meloxicam se puede administrar por vía oral o inyectable, y su uso debe ser supervisado por un veterinario para asegurar la correcta dosificación y minimizar posibles efectos secundarios. Es importante respetar los períodos de retiro antes de sacrificar a los animales o utilizar sus productos, como carne o leche, para consumo humano, garantizando así la seguridad alimentaria.', 'imagenesproductos/671439f2b1f30.png', 0, 0.00),
(69, 'Vacuna Contra La Rabia', 'Novibarc', 'medicina', 'analgesico', 10, 'mililitros', 50, 50000.00, 'Refrigerado', 'Finca #1', 'Vacuna Contra La Rabia\r\n\r\nChatGPT dijo:\r\nChatGPT\r\nLa vacuna contra la rabia es una inmunización esencial para prevenir esta enfermedad viral grave que afecta a mamíferos, incluyendo humanos. La rabia se transmite principalmente a través de la mordedura de un animal infectado, y una vez que aparecen los síntomas, es casi siempre mortal.\r\n\r\nEn medicina veterinaria, la vacuna contra la rabia es fundamental para proteger a perros, gatos y otros animales domésticos. Se recomienda vacunar a los animales a partir de las 12 semanas de edad, con refuerzos anuales o trienales, según el tipo de vacuna utilizada y la normativa local. Además, muchas regiones requieren que los animales domésticos estén vacunados contra la rabia para garantizar la seguridad pública y la salud animal.\r\n\r\nEs importante que la vacunación sea realizada por un veterinario y que se mantenga un registro de las vacunas, ya que esto es crucial para la salud del animal y para cumplir con las regulaciones de salud pública.', 'imagenesproductos/67143a4d0ae0d.png', 0, 0.00),
(70, 'Extracto De piretro', 'Green Protec', 'insecticida', 'liquido', 1, 'litros', 50, 126000.00, 'Seguro Y Aislado', 'Finca #3', 'El extracto de piretro es un insecticida natural obtenido de las flores de Chrysanthemum cinerariifolium, que contiene piretrinas, compuestos que afectan el sistema nervioso de los insectos, causando parálisis y muerte. Se utiliza en agricultura y jardinería para controlar una amplia gama de plagas, y es valorado por su rápida acción y menor persistencia en el medio ambiente en comparación con insecticidas sintéticos. Sin embargo, debe usarse con precaución para evitar dañar insectos beneficiosos y otros organismos no objetivo.', 'imagenesproductos/67143aab97cd0.png', 0, 0.00),
(71, 'Malation', 'Fertiche', 'insecticida', 'liquido', 1, 'litros', 50, 126400.00, 'Seguro Y Aislado', 'Finca #3', '\r\nEl malatión es un insecticida organofosforado utilizado en la agricultura y el control de plagas en el hogar. Actúa como un inhibidor de la colinesterasa, una enzima esencial para el funcionamiento del sistema nervioso en los insectos, lo que provoca la acumulación de acetilcolina y, finalmente, la muerte del insecto. Es eficaz contra una variedad de plagas, incluyendo moscas, pulgones y chinches.', 'imagenesproductos/67143b54c34e6.webp', 0, 0.00),
(72, 'Carbaryl', 'Bio Pest Solution', 'insecticida', 'polvo', 1, 'kilogramos', 50, 63200.00, 'Seguro Y Aislado', 'Finca #1', '\r\nEl carbaryl es un insecticida carbamato utilizado en la agricultura y el control de plagas en jardines y áreas residenciales. Actúa como un inhibidor de la colinesterasa, interfiriendo en el funcionamiento del sistema nervioso de los insectos, lo que provoca su parálisis y muerte. Es eficaz contra una amplia variedad de plagas, como orugas, pulgones y escarabajos.', 'imagenesproductos/67143b8001da3.png', 0, 0.00),
(73, 'Aceite De Nem', 'Natural Pest Control', 'insecticida', 'liquido', 1, 'litros', 50, 105000.00, 'Seguro Y Aislado', 'Finca #1', '\r\nEl aceite de neem es un insecticida natural derivado de las semillas del árbol de neem (Azadirachta indica). Contiene compuestos activos como la azadiractina, que actúan como reguladores del crecimiento de insectos y repelentes, interfiriendo en su desarrollo y comportamiento. Es eficaz contra una amplia variedad de plagas, incluyendo pulgones, ácaros, orugas y moscas.\r\n\r\n', 'imagenesproductos/67143ba7e883e.png', 0, 0.00),
(74, 'Extracto De Ajo', 'Ecoguard', 'insecticida', 'liquido', 1, 'litros', 45, 84300.00, 'Seguro Y Aislado', 'Finca #4', '\r\nEl extracto de ajo es un insecticida natural obtenido de los bulbos de ajo (Allium sativum). Este extracto es conocido por sus propiedades repelentes y fungicidas, siendo eficaz contra una variedad de plagas, como pulgones, moscas y ácaros. Además, tiene propiedades antifúngicas que ayudan a prevenir enfermedades en las plantas.', 'imagenesproductos/67143c2b3c82c.png', 0, 0.00),
(75, 'Imadacloprid', 'Green Argo', 'insecticida', 'liquido', 1, 'litros', 50, 147500.00, 'Seguro Y Aislado', 'Finca #3', 'El imidacloprid es un insecticida neonicotinoide utilizado en la agricultura y el control de plagas en jardines. Actúa como un disruptor del sistema nervioso de los insectos, bloqueando los receptores nicotínicos de la acetilcolina, lo que provoca parálisis y muerte de las plagas. Es eficaz contra una amplia variedad de insectos, incluyendo pulgones, mosquitos, termitas y escarabajos.', 'imagenesproductos/67143ca5a296b.png', 0, 0.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `promocion`
--

CREATE TABLE `promocion` (
  `id` int(255) NOT NULL,
  `id_producto` int(255) NOT NULL,
  `promocion` varchar(999) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `promocion`
--

INSERT INTO `promocion` (`id`, `id_producto`, `promocion`) VALUES
(22, 28, 'Hasta un 30% de descuento con Nitrato De Amonio '),
(24, 51, 'Hasta un 50% de descuento con Gallinas Ponedoras Las Mejores Gallinas'),
(25, 52, 'Hasta un 20% de descuento con Patos Criolllos Los Mejores');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `id` int(30) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `sexo` varchar(30) NOT NULL,
  `edad` int(11) NOT NULL,
  `contrasena` varchar(30) NOT NULL,
  `rol` enum('admin','usuario','invita') NOT NULL,
  `documento` int(30) NOT NULL,
  `direccion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `id`, `correo`, `sexo`, `edad`, `contrasena`, `rol`, `documento`, `direccion`) VALUES
('admin', 1, 'polloneitor@frito.com', 'Femenino', 25, 'pollo', 'admin', 151515, ''),
('juan', 2, 'polloneitor@frito.com', 'Femenino', 25, '123456', 'usuario', 1003655160, ''),
('isaac', 3, 'polloneitor@frito.com', 'Masculino', 26, '159823', 'usuario', 2147483647, 'Carrera 23 calle #14'),
('juan', 4, 'pollos@frito.com', 'Masculino', 25, 'pollo', 'usuario', 155454, 'La esperanza'),
('nicolas', 5, 'nicolascapa@gmail.com', 'Masculino', 18, '123456', 'usuario', 2147483647, 'porvenir');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`);

--
-- Indices de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_id` (`pedido_id`),
  ADD KEY `producto_id` (`producto_id`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `promocion`
--
ALTER TABLE `promocion`
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
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `promocion`
--
ALTER TABLE `promocion`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`);

--
-- Filtros para la tabla `pedido_detalle`
--
ALTER TABLE `pedido_detalle`
  ADD CONSTRAINT `pedido_detalle_ibfk_1` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`),
  ADD CONSTRAINT `pedido_detalle_ibfk_2` FOREIGN KEY (`producto_id`) REFERENCES `producto` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
